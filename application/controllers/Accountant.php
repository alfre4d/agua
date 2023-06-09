<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    //require FCPATH.'vendor/autolad.php';
    class Accountant extends EduAppGT
    {
        /*
        Software: We Effect - Inclusión al aprendizaje financiero.
        Author: MAYANSOURCE - Software, Web and Mobile developer.
        Author URI: https://mayansource.com
        PHP: 5.6+
        Created: 20 March 2022.
        */
        private $runningYear = '';
    
        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
           // $this->load->library('m_pdf');
            $this->load->library("pagination");
            $this->load->database();
            $this->load->model('Crud');
            $this->load->model('Users');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $this->output->set_header('Pragma: no-cache');    
            $this->runningYear = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
            $this->perPage = 8;
        }
        
        
        //Index function for Admin controller.
        public function index()
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            if ($this->session->userdata('accountant_login') == 1)
            {
                redirect(base_url() . 'admin/panel/', 'refresh');
            }
        }
        function print()
        {
            require_once'./vendor/autoload.php';
            $html = $this->load->view('backend/accountant/clients.php','',true);
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();    
        }
        
        //Admin dashboard function.
        function panel($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'panel';
            $page_data['page_title'] = 'Panel de administración';
            $this->load->view('backend/index', $page_data);
        }
        
        function message($param1 = 'message_home', $param2 = '', $param3 = '') 
        {
            parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            if($_GET['id'] != "")
            {
                $notify['status'] = 1;
                $this->db->where('id', $_GET['id']);
                $this->db->update('notification', $notify);
            }
            if ($param1 == 'send_new') 
            {
                $message_thread_code = $this->Crud->send_new_private_message();
                $this->session->set_flashdata('flash_message' , 'Mensaje enviado correctamente');
                redirect(base_url() . 'accountant/message/message_read/' . $message_thread_code, 'refresh');
            }
            if ($param1 == 'send_reply') 
            {
                $this->crud->send_reply_message($param2);
                $this->session->set_flashdata('flash_message' , 'Respuesta enviada correctamente');
                redirect(base_url() . 'accountant/message/message_read/' . $param2, 'refresh');
            }
            if ($param1 == 'message_read') 
            {
                $page_data['current_message_thread_code'] = $param2; 
                $this->crud->mark_thread_messages_read($param2);
            }
            $page_data['infouser'] = $param2;
            $page_data['message_inner_page_name']   = $param1;
            $page_data['page_name']                 = 'message';
            $page_data['page_title']                = "Mensajes privados";
            $this->load->view('backend/index', $page_data);
        }
        function group($param1 = "group_message_home", $param2 = "", $param3 = '')
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            if ($param1 == "create_group") 
            {
                $this->crud->create_group();
                $this->session->set_flashdata('flash_message' , 'Grupo creado');
                redirect(base_url() . 'accountant/group/', 'refresh');
            }
            elseif($param1 == "delete_group")
            {
                $this->crud->deleteGroup($param2);
                $this->session->set_flashdata('flash_message' , 'Grupo eliminado');
                redirect(base_url() . 'accountant/group/', 'refresh');
            }
            elseif ($param1 == "edit_group") 
            {
                $this->crud->update_group($param2);
                $this->session->set_flashdata('flash_message' , 'Grupo actualizado');
                redirect(base_url() . 'accountant/group/', 'refresh');
            }
            else if ($param1 == 'group_message_read') 
            {
                $page_data['current_message_thread_code'] = $param2;
            }
            else if ($param1 == 'create_message_group') 
            {
                $page_data['current_message_thread_code'] = $param2;
            }
            else if ($param1 == 'update_group') 
            {
                $page_data['current_message_thread_code'] = $param2;
            }
            else if($param1 == 'send_reply')
            {
                $this->crud->send_reply_group_message($param2);
                $this->session->set_flashdata('flash_message', 'Mensaje enviado');
                redirect(base_url() . 'accountant/group/group_message_read/'.$param2, 'refresh');
            }
            $page_data['message_inner_page_name']   = $param1;
            $page_data['page_name']                 = 'group';
            $page_data['page_title']                = 'Grupos de mensajes';
            $this->load->view('backend/index', $page_data);
        }
        
        
        function admins($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'admins';
            $page_data['page_title'] = 'Administradores';
            $this->load->view('backend/index', $page_data);
        }
        
        function accountants($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            $data = array();
            
            //get rows count
            $conditions['returnType'] = 'count';
            $totalRec = $this->Crud->getRows2($conditions);
            
            //pagination config
            $config['base_url']    = base_url().'accountant/accountants/';
            $config['uri_segment'] = 3;
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['cur_tag_open'] = '<li><span class="inline-flex items-center justify-center cc yr mo vg bg-white border border-slate-200 text-indigo-500">';
            $config['cur_tag_close'] = '</span></li>';
            $config['num_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
            $config['num_tag_close'] = '</li>';
            $config['next_link'] = '
                    <div class="r_">
                        <span href="#0" class="inline-flex items-center justify-center rounded yr vk vg bg-white xh border border-slate-200 ys xw bw">
                            <span class="tc">Siguiente</span><wbr />
                            <svg class="on ue db" viewBox="0 0 16 16">
                                <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z"></path>
                            </svg>
                        </span>
                    </div>
                    ';
            $config['last_link'] = 'Último'; 
            $config['first_link'] = 'Primero'; 
            $config['first_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] ='
            <div class="mr-2">
                
                    <span href="#0" class="inline-flex items-center justify-center rounded yr vk vg bg-white xh border border-slate-200 ys xw bw">
                        <span class="tc">Anterior</span><wbr />
                        <svg class="on ue db" viewBox="0 0 16 16">
                            <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z"></path>
                        </svg>
                    </span>
            
            </div>'; 
            $this->pagination->initialize($config);
                        
            //define offset
            $page = $this->uri->segment(3);
            $offset = !$page?0:$page;
            //get rows
            $conditions['returnType'] = '';
            $conditions['start'] = $offset;
            $conditions['limit'] = $this->perPage;
            $page_data['conta'] = $this->Crud->getRows2($conditions);

            
            $page_data['page_name']  = 'accountants';
            $page_data['page_title'] = 'Contadores';
            $this->load->view('backend/index', $page_data);
        }
        
        function my_profile($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'my_profile';
            $page_data['page_title'] = 'Mi perfil';
            $this->load->view('backend/index', $page_data);
        }
        


        function messages( $param2 = '')
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'messages';
            $page_data['page_title'] = 'Mensajes';
            $this->load->view('backend/index', $page_data); 
        }

        function messages_new()
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'messages_new';
            $page_data['page_title'] = 'Mensaje Nuevo';
            $this->load->view('backend/index', $page_data); 
        }



       /* function clients()
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
           // $mysession = $this->session->userdata('login_user_id');
            $data['page_name']  = 'clients';
            $data['page_title'] = 'clientes';
           // $data['data'] = $this->Users->ownerDetails($mysession);
            $this->load->view('backend/index', $data); 
        }*/
        function finance(){
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'finance';
            $page_data['page_title'] = 'Finanzas';
            $this->load->view('backend/index', $page_data); 
        }
        function payment()
        {
            if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'payment';
            $page_data['page_title'] = 'Pagos';
            $this->load->view('backend/index', $page_data);   
        }
        function addpayment()
        {
            $id = $_POST['id'];
            $query = $this->db->where('client_id',$id)->get('clients')->result_array();
            
            foreach($query as $data)
            {
                echo $data['first_name'].' '.$data['last_name'];
            }
        }
        
        function validation_passw()
        {
            $var = sha1($this->input->post('value'));
            if($var != '')
            {
                //$query = $this->db->query("SELECT admin.admin_id, admin.password, admin.first_name FROM admin WHERE admin.password LIKE '%".$this->db->escape_like_str($var)."%' ")->getResult();
                //$query = $this->db->select('admin_id, first_name, password,')->from('admin')->like('password', $var)->get(); 
                
                //$query = $this->db->query("SELECT admin_id, first_name, password FROM admin WHERE password='$var' ")->get();

                $query = $this->db->where('password',$var)->get('admin')->result_array();
                
                echo json_encode($query);
            }
            else
            {
                echo json_encode(0);
            }
        }

        function validation_account(){
            $cont = $this->input->post('cont');

            if($cont != '')
            {
                $query = $this->db->query("SELECT * FROM admin WHERE first_name like '%" . $cont . "%' OR last_name like '%" . $cont . "%'")->result_array();
                //$query = $this->db->select('first_name, last_name, phone, doc_dni, email')->like('first_name',$cont)->get('admin')->result_array();
                echo json_encode($query);
            }
            else
            {
                echo json_encode(0);
            }
        }
        //-------------------------------------------------------functions chats
        function addarchive()
        {
            $time = date('Y-m-d H:i:s');
            $archiv = $_FILES["archive"]["name"];
            $user_receiver = $_POST['id_user'];
            $user_sender = $this->session->userdata('login_user_id');
            
            
            
            $archive = array(
                'time'=>$time,
                'sender_message_id'=>$user_sender,
                'receiver_message_id'=>$user_receiver,
                'message'=>$archiv
            );
            if($this->db->insert('user_messages', $archive)){
                $path = $_SERVER['DOCUMENT_ROOT'].'/agua/public/uploads/archive/';
                move_uploaded_file($_FILES['archive']['tmp_name'], $path.$archiv);
                echo "datos enviados";
            }
            else
            {
                echo "error";
            }
            
        }


        function addmsg()
        {
            $time = date('Y-m-d H:i:s');
            $user_receiver = $_POST['id'];
            $msg = $_POST['msg'];
            $user_sender = $this->session->userdata('login_user_id');

            if($msg != ''){
                $messages = array(
                    'time'=>$time,
                    'sender_message_id'=>$user_sender,
                    'receiver_message_id'=>$user_receiver,
                    'message'=>$msg
                );
                if($this->db->insert('user_messages', $messages)){
                    echo "datos enviados";
                }
                else{
                    echo "error";
                }
            }
            else
            {
                echo "datos vacios, no se puede insertar";
            }
        }
        function viewchat()
        {
            $idsession = $this->session->userdata('login_user_id');
            $user_receiver = $_POST['id'];

            $msg = $this->Users->viewmessage($idsession, $user_receiver);
            $queryss = $this->db->where('admin_id',$idsession)->get('admin')->result_array();
            $queryus = $this->db->where('admin_id',$user_receiver)->get('admin')->result_array();
            
            if($user_receiver == true)
            {
            foreach($msg as $rowms){
                    $path = $rowms['message'];
                    $extension = pathinfo($path, PATHINFO_EXTENSION);
                if($rowms['sender_message_id'] == $idsession)
                {
                    if($extension == '')
                    {
                        echo $message ='
                        <div class="flex fd rw wj">';
                        foreach($queryss as $row){
                            echo $message = '<img class="rounded-full mr-4" src="'.base_url().'public/uploads/img_photography/'.$row['photography'].'" alt="User 01" width="40" height="40">';
                         }
                         echo $message = '
                         <div>
                            <div class="text-sm hb yo vf cl cg border he shadow-md rx">'.$rowms['message'].'</div>
                            <div class="flex items-center fg">
                                <div class="gb text-slate-500 gk">'.date("H:i a",strtotime($rowms['time'])).'</div>
                            </div>
                         </div>
                      </div>';
                    }
                    else
                    {
                        echo $message = '<div class="flex fd rw wj">';
                        foreach($queryss as $row){ // query para el usuario en session
                            echo $message = '<img class="rounded-full mr-4" src="'.base_url().'public/uploads/img_photography/'.$row['photography'].'" alt="User 01" width="40" height="40">';
                         }
                        echo $message = '
                            <div>
                            <div class="flex items-center">';
                            if($extension == 'pdf' ||$extension == 'docx'){
                                echo $message = '
                                <a href="'.base_url().'accountant/viewpdf/'.$rowms['msg_id'].'" target="_blank"><div class="text-sm hb yo vf cl cg border he shadow-md rx">'.$rowms['message'].'</div></a>
                                ';
                            }
                            else if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
                                echo $message = '
                                <img class="cl shadow-md rx" src="'.base_url().'public/uploads/archive/'.$rowms['message'].'" alt="Chat image" width="250" height="190">
                                ';
                            }
                             echo $message = '
                                <a class="vp rounded-full border border-slate-200 ix xp wr wu">
                                    <span class="tc">Download</span> 
                                    <svg class="ue on ap db yu" viewBox="0 0 16 16">
                                        <path d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"></path>
                                    </svg>
                                </a>
                             </div>
                                <div class="flex items-center fg">
                                    <div class="gb text-slate-500 gk">'.date("H:i a",strtotime($rowms['time'])).'</div>
                                </div>
                            </div> 
                        </div>
                        ';
                    }

                }
                else         //--------------------------------------Usuario a chatear----------------------------------------------------
                {
                    if($extension == '')
                    {
                        echo $message ='<div class="flex fd rw wj">';
                        foreach($queryus as $row){
                            echo $message = '<img class="rounded-full mr-4" src="'.base_url().'public/uploads/img_photography/'.$row['photography'].'" alt="User 01" width="40" height="40">';
                        }
                        echo $message = '<div>
                            <div class="text-sm bg-white text-slate-800 vf cl cg border border-slate-200 shadow-md rx">'.$rowms['message'].'</div>
                            <div class="flex items-center fg">
                            <div class="gb text-slate-500 gk">'.date("H:i a",strtotime($rowms['time'])).'</div>
                            </div>
                        </div>
                    </div>';
                    }
                    else
                    {
                        echo $message ='
                        <div class="flex fd rw wj">';
                            foreach($queryus as $row){
                                echo $message = '<img class="rounded-full mr-4" src="'.base_url().'public/uploads/img_photography/'.$row['photography'].'" alt="User 01" width="40" height="40">';
                            }
                            echo $message = '
                            <div>
                            <div class="flex items-center">';
                            if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
                                echo $message = '
                                <img class="cl shadow-md rx bg-white" src="'.base_url().'public/uploads/archive/'.$rowms['message'].'" alt="Chat image" width="250" height="190">
                                ';
                            }
                            if($extension == 'pdf' ||$extension == 'docx')
                            {
                                echo $message = '
                                <div class="text-sm bg-white text-slate-800 vf cl cg border border-slate-200 shadow-md rx">'.$rowms['message'].'</div>
                                ';
                            }
                            echo $message = '
                                <a class="vp rounded-full border border-slate-200 ix xp wr wu">
                                    <span class="tc">Download</span> 
                                    <svg class="ue on ap db yu" viewBox="0 0 16 16">
                                        <path d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"></path>
                                    </svg>
                                </a>
                            </div>                           
                                <div class="flex items-center fg">
                                    <div class="gb text-slate-500 gk">'.date("H:i a",strtotime($rowms['time'])).'</div>
                                </div>
                            </div>
                        </div>';
                    }
                }
            }
            }
            else // 
            {
                echo $message='
                    <div class="nk">
                        <div class="flex fh or">
                            <div class="ad vl">
                                <div class="gp i_">
                                    <div class="flex justify-center in">
                                        <img  class="rounded-full" src="'.base_url('public/uploads/messageimg2.png').'" width="400" height="1024" alt="Authentication image">
                                    </div>
                                    <strong><p>¡Ahora puedes enviar y recibir mensajes!</p></strong>  
                                </div>
                
                            </div>
                        </div>
                    </div>
                '; 
            }
        }

        function viewuser()
        {
            $idsession = $this->session->userdata('login_user_id');
            $user_receiver = $_POST['id'];
            $user = $this->Users->usermsga($idsession);
            $userc = $this->Users->usermsg($idsession); 
            
            foreach($user as $rowuser){
                echo $user = '
                    <li class="rv">
                        <form method="GET">
                            <input type="hidden" name="iduser" id="iduser" value="'.$rowuser['admin_id'].'">
                            <button class="flex items-center fg oq vc rounded" @click="msgSidebarOpen = false; $refs.contentarea.scrollTop = 99999999;">
                                <div class="flex items-center ci">
                                    <div class="td mr-2">
                                        <img class="uu of rounded-full mr-2" src="'.base_url().'public/uploads/img_photography/'.$rowuser['photography'].'"  alt="User 01" width="32" height="32">
                                    </div>
                                    <div class="ci"><span class="text-sm gk text-slate-800">'.$rowuser['first_name'].'</span> </div>
                                </div>
                                <div class="flex items-center r_">';
                                    foreach($userc as $rowcont)
                                    {
                                        if($rowcont['first_name'] == $rowuser['first_name'])
                                        {
                                            echo $user ='<div class="gb inline-flex gk pc yo rounded-full gp yr v_">'.$rowcont['cont'].'</div>';
                                        }
                                    }    
                  echo $user = '</div>
                            </button>
                        </form>
                    </li>
                ';
            }
        }
        
        function viewpdf($id)
        {
            /*if ($this->session->userdata('accountant_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }*/
            
            $query = $this->Users->get_pdf($id);
            //$data['page_name']  = 'viewpdf';
            //$data['page_title'] = 'viewpdf';
            $data['query'] = $query;
            //$id['id']=$id;
            $this->load->view('backend/accountant/viewpdf.php', $data);
        }
        //-------------------------------------------------------------------------end functions chat
        
        function vsearch_date(){

            $var = $_POST['date'];
            //$var = $this->input->post('cont');
            $query = $this->db->query("SELECT * FROM clients WHERE first_name like '%" . $var . "%' OR last_name like '%" . $var . "%'")->result_array();
            
            foreach($query as $row){
                $table = '
                  <tr>
                        <td class="v_ wk xe vm co ut">
                           <div class="flex items-center"> <label class="inline-flex"> <span class="tc">Select</span> <input class="table-item to" type="checkbox" @click="uncheckParent"> </label> </div>
                        </td>
                        <td class="v_ wk xe vm co">
                            <div class="gk yj gp"><span class="gk yj gp">#</span>'.$row['supply_number'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gp">'.$row['person_type'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                        <div class="gp">'.$row['doc_ruc'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                            <div class="gp">'.$row['social_reason'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                        <div class="gp">'.$row['doc_dni'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gp">'.$row['first_name'].' '.$row['last_name'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gp">'.$row['phone'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gp">'.$row['email'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                            <div class="gp">
                                  <!---Modal Maps////////////////////////////////////////////////////////////////////////////////////////////////////////--->
                        <div class="nz">
                           <!-- Start -->
                           <div x-data="{ modalOpen: false }">
                              <button class="yl xb rounded-full" @click.prevent="modalOpen = true" aria-controls="integration-modal">
                                   <span class="tc">Edit</span> 
                                <svg class="uu" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <circle cx="12" cy="11" r="3" />
                          <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                        </svg>
                              </button>
                              <!-- Modal backdrop -->
                              <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                              <!-- Modal dialog -->
                              <div id="integration-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                                 <div class="bg-white rounded by lj aa oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                    <div class="vs">
                                       <div class="td">
                                          <!-- Close button -->
                                          <button class="tp tk tw yu xm" @click="modalOpen = false">
                                             <div class="tc">Close</div>
                                             <svg class="ue on db">
                                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                             </svg>
                                          </button>
                                            <br>
                                          <!-- Modal content -->
                                          <div class="text-sm id">
                                             <div class="gk text-slate-800 it"></div>
                                             <div style ="height: 465px"><iframe src="https://www.google.com/maps?q='. $row["latitude"] .','. $row["longitude"].'&hl=es;z=14&output=embed" style="width: 100%; height: 100%;"></iframe></div>
                                             
                                          </div>
                                          <!-- Modal footer -->
                                          <div class="flex flex-wrap justify-end lt">
                                            
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- End ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                        </div>
                        </div>
                        </td>
                        <td class="v_ wk xe vm co">
                            <div class="flex items-center">'.$row['status'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                            <div class="gp">'.date("d/m/Y",strtotime($row['start_date'])).'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                            <div class="gp">'.$row['end_date'].'</div>
                        </td>
                        <td class="v_ wk xe vm co">
                            <div class="gp">'.$row['priority'].'</div>
                        </td>
                        <td class="v_ wk xe vm co ut">
                           <div class="nz">X</div>
                           <div class="nz">E</div>
                        </td>
                  </tr>
                
                ';

                echo $table;
            }
            
        }


    function getUser(){
        $returnVal = $this->Users->getIndividual($_POST['data']);
		print_r(json_encode($returnVal,true));
    }

    function profileUpdate($id)
    {
            $nombre_imagen = $_FILES['photography']['name'];
            $tipo_imagen = $_FILES['photography']['type'];
            $tam_imagen = $_FILES['photography']['size'];

            $password_actual_veri = $this->input->post('password_actual_veri');
            $password_actual = $this->input->post('password_actual');
            $password = $this->input->post('password');
            $comparation = array('admin_id' => $id, 'password' => sha1($password_actual_veri));
            $query = $this->crud->get_login('admin', $comparation);

            if ($query->num_rows() > 0) 
            {
                
                if($nombre_imagen != '')
                {
                    if($tam_imagen<=1000000)
                    {
                        if($tipo_imagen=="image/jpeg"||$tipo_imagen=="image/jpg"||$tipo_imagen=="image/png"||$tipo_imagen=="image/gif")
                        {
                            
                            //unlink($_SERVER['DOCUMENT_ROOT'].'/agua/public/uploads/img_profile/'.$img);
    
                            $path = $_SERVER['DOCUMENT_ROOT'].'/agua/public/uploads/img_profile/';
                            move_uploaded_file($_FILES['photography']['tmp_name'], $path.$nombre_imagen);
    
                            $profile = array 
                            (
                                'first_name'=>$this->input->post('first_name'),
                                'last_name'=>$this->input->post('last_name'),
                                'email'=>$this->input->post('email'),
                                'photography'=>$nombre_imagen,
                                'phone'=>$this->input->post('phone'),
                                'address'=>$this->input->post('address'),
                                'date_of_birth'=>$this->input->post('date_of_birth')
                            );
                            $this->db->where('admin_id', $id);
                            $this ->db->update('admin',$profile);
                            $_SESSION['item'] = 'Fotografía actualizada';
                            $this->session->mark_as_flash('item');
                            redirect(base_url() . 'accountant/my_profile/', 'refresh');
    
                        }
                        else
                        {
                            $_SESSION['error'] = 'Solo se pueden subir imagenes de tipo jpg/jpeg/png/gif';
                            $this->session->mark_as_flash('error');
                            redirect(base_url() . 'accountant/my_profile/', 'refresh');
                            
                        }
                    } 
                    else
                    {
                        $_SESSION['error'] = 'El tamaño del archivo es muy grande ';
                        $this->session->mark_as_flash('error');
                        redirect(base_url() . 'accountant/my_profile/', 'refresh');
                        
                    }
                }
                else{

                    if($password != '' && $password_actual != '')
                    {
                        $profile = array 
                        (
                            'first_name'=>$this->input->post('first_name'),
                            'last_name'=>$this->input->post('last_name'),
                            'email'=>$this->input->post('email'),
                            'password'=>sha1($this->input->post('password')),
                            'phone'=>$this->input->post('phone'),
                            'address'=>$this->input->post('address'),
                            'date_of_birth'=>$this->input->post('date_of_birth'),
    
                        );
                        
                        $this->db->where('admin_id', $id);
                        $this ->db->update('admin',$profile);
                        $_SESSION['item'] = 'Perfil actualizado con éxito';
                        $this->session->mark_as_flash('item');
                        redirect(base_url() . 'accountant/my_profile/', 'refresh');
                    }
                    else
                    {
                        $profile = array 
                        (
                            'first_name'=>$this->input->post('first_name'),
                            'last_name'=>$this->input->post('last_name'),
                            'email'=>$this->input->post('email'),
                            'phone'=>$this->input->post('phone'),
                            'address'=>$this->input->post('address'),
                            'date_of_birth'=>$this->input->post('date_of_birth')
                        );
                        $this->db->where('admin_id', $id);
                        $this ->db->update('admin',$profile);

                        $_SESSION['item'] = 'Perfil actualizado con éxito';
                        $this->session->mark_as_flash('item');
                        //$this->session->set_flashdata('update', '1');
                        redirect(base_url() . 'accountant/my_profile/', 'refresh');   
                    }

                   
                }        
                                     
            }
            else
            {
                $_SESSION['error'] = 'Contraseña incorrecta vuelva a intentarlo';
                $this->session->mark_as_flash('error');
                redirect(base_url() . 'accountant/my_profile/', 'refresh');
            }
                
    }    
        
        //End of Admin.php content.
    }