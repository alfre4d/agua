<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    include_once 'public/src/Google_Client.php';
    include_once 'public/src/contrib/Google_Oauth2Service.php';

class Users extends School 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('role');
    }
    
   
    function get_clients()
    {
        //return $this->db->get_where('admin','type','2');
        $this->db->order_by('client_id', 'DESC');
        return $this->db->get('clients')->result_array();
    }
    
    
    function forgot_password($email)
    {
        $this->db->select('email');
        $this->db->from('admin'); 
        $this->db->where('email', $email); 
        $query = $this->db->get();
        return $query->row_array();
    }
    
    //reestablecer contraseña
    function send_password($data)
    {
        $email = $data['email'];
        $query1=$this->db->query("SELECT * from admin where email = '".$email."' ");
        $row = $query1->result_array();
        if ($query1->num_rows()>0)
        {
            $passwordplain = "";
            $passwordplain  = rand(999999999,9999999999);
            $newpass['password'] = sha1($passwordplain);
            $this->db->where('email', $email);
            $this->db->update('admin', $newpass); 
            $current_date = date('Y-m-d H:i:s'); 
            $new_date = strtotime ( '+30 minute' , strtotime ($current_date)) ; 
            $new_date = date ( 'Y-m-d H:i:s' , $new_date); 
    
            $mail_message='Estimad@ '.$row[0]['first_name']." ".$row[0]['last_name'].','. "\r\n";
            $mail_message.='Gracias por contactar con respecto a la contraseña olvidada,<br> '.date('d').', de '.date('M').' a las '.date('H:i A').' Su <b>Constraseña</b> es <b>'.$passwordplain.'</b>'."\r\n";
            $mail_message.='<br>Por favor actualice su contraseña.</br>';
            $mail_message.='<br>Gracias saludos';
            date_default_timezone_set('Etc/UTC');
            require("class.phpmailer.php");
            $mail = new PHPMailer();
            $mail->IsMail();
            $mail->CharSet = 'UTF-8';
            $mail->Debugoutput = 'html';
            $mail->SMTPAuth = true;   
            $mail->setFrom('no-reply@mayansource.dev', 'Recuperar credenciales de acceso');
            $mail->IsHTML(true);
            $mail->addAddress($email);
            $mail->Subject = 'Recuperar credenciales de acceso';
            $mail->Body    = $mail_message;
            $mail->AltBody = $mail_message;
            
            if (!$mail->send()) 
            {
                $this->session->set_flashdata('message','No se pudo enviar la contraseña, intente nuevamente!');
            }
            else 
            {
                $this->session->set_flashdata('message1','Contraseña enviada a su correo electrónico!');
            }
                redirect(base_url().'login/new_request/','refresh');       
        }
            else
            {  
                $this->session->set_flashdata('message','Correo electrónico no encontrado inténtalo de nuevo!');
                redirect(base_url().'login/new_request/','refresh');
            }
    }
    
    //chat mensaje 
    function getMensajesCanalOnTime($notnick)
    {
        $this->db->where('TIMESTAMPDIFF(SECOND,creado_en,NOW()) <= 2',null,false);
        $this->db->where('m_chat_usuario !=',$notnick);
        $query = $this->db->get('chat_mensaje');
        return $query->result_array();
    }
    
    function addMensaje($usuario,$mensaje)
    {
        $data = array(
        'm_chat_usuario' => $usuario,
        'chat_mensaje' => $mensaje,
                        );
        $this->db->set('creado_en', 'NOW()', FALSE);
        return $this->db->insert('chat_mensaje', $data);
    }
//consultas para chat en tiempo real
	function ownerDetails($mysession){
			$this->db->select('*');
			$this->db->where('admin_id',$mysession);
			$res = $this->db->get('admin')->result_array();
			return $res;
	}
    function allUser($mysession){
			$this->db->select('*');
			$this->db->where('type',1);
			$this->db->where('admin_id != ',$mysession);
			$data = $this->db->get('admin');
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		
	}
    function getLastMessage($data,$mysession)
    {
		$this->db->select('*');
		//$session_id = $_SESSION['uniqueid'];
		$where = "sender_message_id = '$mysession' AND receiver_message_id = '$data' OR 
		sender_message_id = '$data' AND receiver_message_id = '$mysession'";
		$this->db->where($where);
		$this->db->order_by('time', 'DESC');
		$result = $this->db->get('user_messages', 1)->result_array();
		return $result;
	}
	function getIndividual($id){
		$this->db->select('*');
		$this->db->where('admin_id',$id);
		$res = $this->db->get('admin')->result_array();
		return $res;
	}

    function viewmessage($idSession, $idUser){
        $this->db->select('*');
        $where = "sender_message_id = '$idSession' AND receiver_message_id = '$idUser' OR  
        sender_message_id = '$idUser' AND receiver_message_id = '$idSession'";
        $this->db->where($where); 
        $query = $this->db->get('user_messages')->result_array();
        return $query;        
    }
    function viewhist($id){
        $this->db->select('*');
        $where = "message_thread_code = '$id'";
        $this->db->where('file_name !=',''); 
        $this->db->where($where); 
        $query = $this->db->get('message');
        return $query; 
    }
    
    
    /*function countmessage($idSession){
    
        return $this->db->query("SELECT COUNT(message) as Total FROM user_messages WHERE receiver_message_id = '$idSession' ")->row_array();
        
    }*/
    function usermsg($idSession){
        return $this->db->query("SELECT admin.admin_id, admin.first_name, COUNT(CASE WHEN user_messages.sender_message_id THEN admin.first_name ELSE NULL END)  AS cont 
                                FROM user_messages left JOIN admin ON admin.admin_id = user_messages.sender_message_id 
                                WHERE user_messages.receiver_message_id = '$idSession' GROUP by admin.admin_id")->result_array();
    }
    
    function usermsga($idSession)
    {
        return $this->db->query("SELECT  admin.admin_id, admin.first_name, admin.last_name, admin.photography, admin.status_message
                                 FROM user_messages left JOIN admin ON admin.admin_id = user_messages.receiver_message_id
                                 WHERE user_messages.sender_message_id = '$idSession' GROUP by admin.admin_id ORDER BY user_messages.msg_id DESC")->result_array();
    }
    function get_pdf($id)
    {
        $this->db->where('msg_id',$id);
        return $this->db->get('user_messages')->result_array();
    }

}