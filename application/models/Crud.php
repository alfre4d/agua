<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    include_once 'public/src/Google_Client.php';
    include_once 'public/src/contrib/Google_Oauth2Service.php';

class Crud extends School 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    function getType($type){
        if($type == 0){
            echo 'Administradores';
        }else if($type == 1){
            echo 'Contadores';
        }else if($type == 2){
            echo 'Especialistas';
        }
    }
    
    function obtenerFoto(){
        return base_url().'public/uploads/img_photography/'.$this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->photography;
    }
    
    function get_name($type, $id)
    //function get_name($type, $id)
    {
        $first_name = $this->db->get_where('admin', array('admin_id'=>$id))->row()->first_name;
        $last_name = $this->db->get_where('admin', array('admin_id'=>$id))->row()->last_name;
        //$first_name = $this->db->get_where($type, array($type.'_id'=>$id))->row()->first_name;
        //$last_name = $this->db->get_where($type, array($type.'_id'=>$id))->row()->last_name;
        return $first_name.' '.$last_name;
    }
    
    function get_finance()
    {
        $this->db->select('*');
        $this->db->join('rates', 'rates.id = finance.id_rates');
        $this->db->join('clients', 'clients.client_id = finance.id_client');
        return $this->db->get('finance')->result_array();
    }
    
    function downloadPDFFinance()
    {
        $fecha = date('d-m-Y_h:i:s');
        $data = array(
            'status' => '1'
            );
        $html = $this->load->view('backend/viewspdf/finance.php',$data,TRUE);
        $pdfFilePath = 'Reporte_de_finanza-'.date('d/m/Y H:i:s'.".pdf");
        $this->load->library('M_pdf');
        $mpdf = new mPDF('utf-8','A4'); 
        $mpdf->packTableData = true;
        $mpdf->WriteHTML($html,2);
        $mpdf->Output($pdfFilePath, "D"); 
    }
    
    function get_image_url($type = '', $id = '') 
    {
        return base_url(). 'public/uploads/img_photography/'.$this->db->get_where('admin', array('admin_id'=> $id))->row()->photography;
    }
    
    
    function obtenerFotoAdmim($admin_id){
        return base_url().'public/uploads/img_photography/'.$this->db->get_where('admin', array('admin_id' => $admin_id))->row()->photography;
    }
     
    function create_group()
    {
        $data = array();
        $data['group_message_thread_code'] = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['created_timestamp'] = date('d/m/Y').' ' .date("H:i");
        $data['group_name'] = $this->input->post('group_name');
        if(!empty($_POST['user'])) 
        {
            array_push($_POST['user'], $this->session->userdata('login_type').'_'.$this->session->userdata('login_user_id'));
            $data['members'] = json_encode($_POST['user']);
        }
        else
        {
            $_POST['user'] = array();
            array_push($_POST['user'], $this->session->userdata('login_type').'_'.$this->session->userdata('login_user_id'));
            $data['members'] = json_encode($_POST['user']);
        }
        $this->db->insert('group_message_thread', $data);
    }
    
    function send_reply_group_message($message_thread_code) 
    {
       $max_size = 2097152;
       if(!file_exists('public/uploads/group_messaging_attached_file/')) 
        {
            $oldmask = umask(0);
            mkdir ('public/uploads/group_messaging_attached_file/', 0777);
        }
        if ($_FILES['attached_file_on_messaging']['name'] != "") 
        {
            if($_FILES['attached_file_on_messaging']['size'] > $max_size)
            {
                $this->session->set_flashdata('error_message' , 'Solo se permiten 2MB');
                redirect(base_url() . 'admin/group/group_message_read/'.$message_thread_code, 'refresh');
            }
            else{
                $file_path = 'public/uploads/group_messaging_attached_file/'.$_FILES['attached_file_on_messaging']['name'];
                move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
            }
        }
        $year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
        $message    = $this->input->post('message');
        $timestamp  = date('d/m/Y').' '.date("H:iA");
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        if ($_FILES['attached_file_on_messaging']['name'] != "") 
        {
          $data_message['attached_file_name'] = $_FILES['attached_file_on_messaging']['name'];
          $data_message['file_type'] = strtolower(pathinfo($_FILES["attached_file_on_messaging"]["name"], PATHINFO_EXTENSION));
        }
        $data['group_message_thread_code'] = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data_message['group_message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('group_message', $data_message);
    }
    
    function update_group($thread_code = "")
    {
          $data = array();
          $data['group_name'] = $this->input->post('group_name');
          if(!empty($_POST['user'])) 
          {
              array_push($_POST['user'], $this->session->userdata('login_type').'_'.$this->session->userdata('login_user_id'));
              $data['members'] = json_encode($_POST['user']);
          }
          else{
            $_POST['user'] = array();
            array_push($_POST['user'], $this->session->userdata('login_type').'_'.$this->session->userdata('login_user_id'));
            $data['members'] = json_encode($_POST['user']);
          }
          $this->db->where('group_message_thread_code', $thread_code);
          $this->db->update('group_message_thread', $data);
    }
    
    function deleteGroup($group_message_thread_code)
    {
        $this->db->where('group_message_thread_code', $group_message_thread_code);
        $this->db->delete('group_message');
        $this->db->where('group_message_thread_code', $group_message_thread_code);
        $this->db->delete('group_message_thread');    
    }
    
    function send_reply_message($message_thread_code) 
    {
        $year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
        $message    = $this->input->post('message');
        $timestamp  = date('d/m/Y').' '.date("H:iA");
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $name_file = $_FILES["file_name"]["name"];
        /*$extension = pathinfo($name_file, PATHINFO_EXTENSION);
        if($extension == 'pdf' ||$extension == 'docx' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')
        {
           $data_message['file_name'] = $name_file; 
        }
        else
        {
            $_SESSION['message'] = 'Archivo no encontrado';
            $this->session->mark_as_flash('message');
                redirect(base_url() . 'admin/message/message_read/' .$message_thread_code,'refresh');   
        }*/
        $data_message['file_name']              = $name_file;
        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $data_message['reciever'] = $this->input->post('reciever');
        //$data_message['file_type']              = strtolower(pathinfo($_FILES["file_name"]["name"], PATHINFO_EXTENSION));
        $this->db->insert('message', $data_message);
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "public/uploads/archive/" . $_FILES["file_name"]["name"]);
    }
    
    function send_new_private_message() 
    {
        $message    = $this->input->post('message');
        $timestamp  = date('d/m/Y').' '.date("H:iA");
        $reciever   = $this->input->post('reciever');
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();
        if ($num1 == 0 && $num2 == 0) 
        {
            $message_thread_code                        = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender']              = $sender;
            $data_message_thread['reciever']            = $reciever;
            $data_message_thread['last_message_timestamp']            = date('Y-m-d H:i:s');
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
        {
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        }
        if ($num2 > 0)
        {
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;
        }
        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['reciever']               = $reciever;
        $data_message['timestamp']              = $timestamp;
        $data_message['file_name']              = $_FILES["file_name"]["name"];
        $this->db->insert('message', $data_message);
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "public/uploads/archive/" . $_FILES["file_name"]["name"]);
        return $message_thread_code;
    }
    
    function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }
    
    function count_unread_message_of_thread_nav() {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get('message')->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }
    
    function mark_thread_messages_read($message_thread_code) {
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }


    function setLoginStatus()
    {
        session_start();
        $session    = session_id();
        $time       = time();
        $time_check = $time-300;
        $this->db->where('session', $session);
        $count = $this->db->get('online_users')->num_rows();
        if($count == 0)
        { 
            $data['time'] = $time;
            $data['type'] = $this->session->userdata('login_type');
            $data['id_usuario'] = $this->session->userdata('login_user_id');
            $data['gp'] = $this->session->userdata('login_user_id')."-".$this->session->userdata('login_type');
            $data['session'] = $session;
            $this->db->insert('online_users',$data);
        }
        else 
        {
            $data['session'] = $session;
            $data['time'] = $time;
            $data['gp'] = $this->session->userdata('login_user_id')."-".$this->session->userdata('login_type');
            $data['id_usuario'] = $this->session->userdata('login_user_id');
            $data['type'] = $this->session->userdata('login_type');
            $this->db->where('session', $session);
            $this->db->update('online_users', $data);
        }  
        $this->db->where('time <', $time_check);
        $this->db->delete('online_users');
    }
    
    function getInfo($type)
    {
        return $this->db->get_where('settings' , array('type' => $type))->row()->description;
    }
    
    function get_login($table, $arr)
    {
        return $this->db->get_where($table, $arr);
    }

    function get_validationpsw($table, $arr)
    {
        return $this->db->get_where($table, $arr);
    }

    function get_password($password) 
    {
        return $this->db->get_where('admin','password',$password);
    }
    
    function get_admins()
    {
        //$this ->db->where('admin_id',$id);
        return $this->db->get_where('admin', array('type','1'));
    }
    
    function get_accounts()
    {
      return $this->db->get_where('admin', array('type','2'))->result_array();  
    }


    function getPaginateclient($params = array())
    {
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('rates', 'rates.id = clients.rates_id');
        $this->db->order_by('client_id', 'DESC');
        if(array_key_exists("client_id",$params)){
            $this->db->where('client_id',$params['client_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            //set de inicio y limite
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        return $result;
    }
    
     function getPaginaterequest($params = array())
    {
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('rates', 'rates.id = clients.rates_id');
        $this->db->where('completion_status =','Activo');
        $this->db->order_by('start_date', 'DESC');
        if(array_key_exists("client_id",$params)){
            $this->db->where('client_id',$params['client_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            //set de inicio y limite
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        return $result;
    }
    
    function getPaginaterequest_made($params = array())
    {
        $this->db->select('*');
        $this->db->from('requests');
        //$this->db->join('rates', 'requests.rates_id = rates.id');
        $this->db->where('completion_status =','Finalizado');
        $this->db->order_by('request_id', 'DESC');
        if(array_key_exists("request_id",$params)){
            $this->db->where('request_id',$params['request_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            //set de inicio y limite
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        return $result;
    }
    
    
       function getPaginatecontracts($params = array())
        {
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('rates', 'rates.id = clients.rates_id');
        //$this->db->where('creation_date !=','');
        $this->db->order_by('client_id', 'DESC');
        if(array_key_exists("client_id",$params)){
            $this->db->where('client_id',$params['client_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            //set de inicio y limite
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        return $result;
    }
    
    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin.role="administrador"');
        $this->db->where('admin_id <>',$this->session->userdata('login_user_id'));
        $this->db->order_by('admin_id', 'DESC');
        if(array_key_exists("admin_id",$params)){
            $this->db->where('admin_id',$params['admin_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            //set de inicio y limite
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        return $result;
    }
    
     function getRows1($params = array())
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin.role="Especialista"');
        $this->db->where('admin_id <>',$this->session->userdata('login_user_id'));
        $this->db->order_by('admin_id', 'DESC');
        if(array_key_exists("admin_id",$params)){
            $this->db->where('admin_id',$params['admin_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    
     function getRows2($params = array())
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin.role="contador"');
        $this->db->where('admin_id <>',$this->session->userdata('login_user_id'));
        $this->db->order_by('admin_id', 'DESC');
        if(array_key_exists("admin_id",$params)){
            $this->db->where('admin_id',$params['admin_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    
    function admins_array($id)
    {
        $this->db->where('admin_id',$id);
        $this->db->where('admin.role ="Administrador"');
        return $this->db->get('admin')->result_array();
        
    }
    
    function getRows3($params = array())
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin.role="Especialista"');
        $this->db->where('admin_id <>',$this->session->userdata('login_user_id'));
        if(array_key_exists("admin_id",$params)){
            $this->db->where('admin_id',$params['admin_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    

    function get_contador($id)
    {
        $this->db->where('admin_id',$id);
        return $this->db->get('admin')->result_array();
    }

    function get_specialyst($id)
    {
        $this->db->where('admin_id',$id);
        return $this->db->get('admin')->result_array();
    }
    
    function get_requestsClient($id)
    {
        $this->db->where('client_id',$id);
        //$this->db->where('start_date !=','');
        return $this->db->get('clients')->result_array();
    }

    function get_rates()
    {
        //$this->db->where('id', $rates);
        return $this->db->get('rates')->result_array();
    }
    
    function get_admin(){
        $this->db->where('type',1);
        //$this->db->where('first_name !=',$user);
        return $this->db->get('admin')->result_array();
    }
    
    function get_accou()
    {
        $this->db->where('type',2);
        return $this->db->get('admin')->result_array();
    }
    
    function get_specialist()
    {
        $this->db->where('type', 3);
        return $this->db->get('admin')->result_array();
    }
    
    function get_group()
    {
        return $this->db->get('create_message_group')->result_array();
    }
    
    //function for view list of user administrators
    function get_admon()
    {
        $this->db->where('type',1);
        //$this->db->where('first_name !=',$n);
        $this->db->where('admin_id <>',$this->session->userdata('login_user_id'));
        $this->db->order_by('first_name', 'ASC');
        return $this->db->get('admin')->result_array();
    }
    
    //function for view list of user accountants
    function get_accountants()
    {
        $this->db->where('type',2);
        //$this->db->where('first_name !=',$user);
        $this->db->where('admin_id <>',$this->session->userdata('login_user_id'));
        $this->db->order_by('first_name', 'ASC');
        return $this->db->get('admin')->result_array();
    }
    
    //function for view list of user specialists
    function get_specialists()
    {
        $this->db->where('type',3);
        //$this->db->where('first_name !=',$user);
        $this->db->where('admin_id <>',$this->session->userdata('login_user_id'));
        $this->db->order_by('first_name', 'ASC');
        return $this->db->get('admin')->result_array();
    }
    
    //NOTIFICATION 
    function get_notification($var)
    {
        return $this->db->query("SELECT COUNT(*) AS Total_message_receiver FROM user_messages WHERE receiver_message_id ='$var'")->row_array();
    }
    
    //function chat 
    function view_message($id_session, $id_user)
    {
        $this->db->select('*');
        $var = "sender_message_id = '$id_session' && receiver_message_id = '$id_user' || sender_message_id ='$id_user' && receiver_message_id ='$id_session'";
        $this->db->where($var);
        return $query = $this->db->get('user_messages')->result_array();
    }
    
    //pdf
    function get_pdf($id)
    {
        $this->db->where('msg_id',$id);
        return $this->db->get('user_messages')->result_array();
    }
    
    
    function set_detils($id)
    {
        $this->db->where('admin_id', $id);
        return $this->db->get('admin')->result_array();
    } 
    
    function get_selectmsg($ids, $idr){
        $this->db->where('sender_message_id', $ids);
        $this->db->where('receiver_message_id', $idr);
        return $this->db->get('user_messages')->result_array();
    }
    
    function getmsg($notusr){
        $this->db->where('TIMESTAMPDIFF(SECOND,time,NOW()) <= 2',null,false);
        $this->db->where('sender_message_id  !=',$notusr);
        return $this->db->get('user_messages')->result_array();
    }
    
    function addmsg($usuario,$mensaje){
        $data = array(
        'sender_message_id' => $usuario,
        'message' => $mensaje,
                        );
        $this->db->set('time', 'NOW()', FALSE);
        return $this->db->insert('user_messages', $data);
    }
}