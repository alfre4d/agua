<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends EduAppGT 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Users');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Index and validation session function.
    public function index() 
    {
        if ($this->session->userdata('admin_login') == 1)
        {
            redirect(base_url() . 'admin/panel/', 'refresh');
        }
        $this->load->view('backend/auth/login');
    }
    
    
    //Check login credentials and set it function.
    function auth() 
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $dni      = $this->input->post('dni');
        
        $credential = array('email' => $email,'doc_dni' => $dni, 'password' => sha1($password));
        $query = $this->crud->get_login('admin', $credential);
        
        if ($query->num_rows() > 0) 
        {
            $row = $query->row();
            if($row->type == 1)
            {
                if($row->status == 'Activo')
                {
                    $this->session->set_userdata('admin_login', '1');
                    $this->session->set_userdata('admin_id', $row->admin_id);
                    $this->session->set_userdata('login_user_id', $row->admin_id);
                    $this->session->set_userdata('name', $row->first_name);
                    $this->session->set_userdata('login_type', 'admin');
        
                    $id = $this->session->userdata('login_user_id');
                    
                    if($id)
                    {
                        $data = array(
                            'status_message' => 'Activo ahora',
                            
                        );
                        $this->db->where('admin_id', $id);
                        $this->db->update('admin', $data);
                    }
                    
                    redirect(base_url() . 'admin/panel/', 'refresh');
                }
                else
                {
                    $_SESSION['item'] = '¡Tu usuario esta inactivo! ';
                    $this->session->mark_as_flash('item','1');
                    //$this->session->set_flashdata('error', '1');
                    redirect(base_url(), 'refresh');
                }
            }
            
            
            if($row->type == 2)
            {
                if($row->status == 'Activo')
                {
                    $this->session->set_userdata('accountant_login', '1');
                    $this->session->set_userdata('accountant_id', $row->admin_id);
                    $this->session->set_userdata('login_user_id', $row->admin_id);
                    $this->session->set_userdata('name', $row->first_name);
                    $this->session->set_userdata('login_type', 'accountant');
                    
                    $id = $this->session->userdata('login_user_id');
                    if($id)
                    {
                        $data = array(
                            'status_message' => 'Activo ahora',
                            
                        );
                        $this->db->where('admin_id', $id);
                        $this->db->update('admin', $data);
                    }
                    
                    redirect(base_url() . 'accountant/panel/', 'refresh');
                }
                else
                {
                    $_SESSION['item'] = '¡Tu usuario esta inactivo! ';
                    $this->session->mark_as_flash('item','1');
                    //$this->session->set_flashdata('error', '1');
                    redirect(base_url(), 'refresh');
                }
            }
             
             if($row->type == 3)
            {
                if($row->status == 'Activo')
                { 
                $this->session->set_userdata('specialyst_login', '1');
                $this->session->set_userdata('specialyst_id', $row->admin_id);
                $this->session->set_userdata('login_user_id', $row->admin_id);
                $this->session->set_userdata('name', $row->first_name);
                $this->session->set_userdata('login_type', 'specialyst');
                
                $id = $this->session->userdata('login_user_id');
                if($id)
                {
                    $data = array(
                        'status_message' => 'Activo ahora',
                            
                    );
                    $this->db->where('admin_id', $id);
                    $this->db->update('admin', $data);
                }
                redirect(base_url() . 'specialyst/panel/', 'refresh');    
            }
            else
            {
                $_SESSION['item'] = '¡Tu usuario esta inactivo! ';
                $this->session->mark_as_flash('item','1');
                //$this->session->set_flashdata('error', '1');
                redirect(base_url(), 'refresh');
            }
                
        }   
        }
        $_SESSION['item'] = '¡Error en el usuario o contraseña! ';
        $this->session->mark_as_flash('item','1');
        //$this->session->set_flashdata('error', '1');
        redirect(base_url(), 'refresh');
    }

    //Recover your passowrd function.
    function lost_password($param1 = '', $param2 = '')
    {
        if($param1 == 'recovery' && $this->input->post('email') != "")
        {
            $credential =   array('email' => $this->input->post('email'));
            $query1 = $this->db->get_where('admin' , $credential);
            
            if ($query1->num_rows() > 0) 
            {
                $row            = $query1->row();
                $current_date   = date('Y-m-d H:i:s'); 
                $new_date       = strtotime ( '+30 minute' , strtotime ($current_date)) ; 
                $new_date       = date('Y-m-d H:i:s' , $new_date); 

                $info['expire']     = $new_date;
                $info['auth_key']   = base64_encode($query1->row()->admin_id.'*'.sha1(date('d-m-y H:i:s')));
                $this->db->where('admin_id',$query1->row()->admin_id);
                $this->db->update('admin',$info);
                
                //infor
                if($this->input->post('email') != " ")
                {
                    log_message('error',$this->input->post('email'));
                    require("class.phpmailer.php");
                    $mail = new PHPMailer();
                    $mail->IsHTML(true);
                    $mail->IsMail();
                    $email->CharSet = 'UTF-8';
                    $email->SetFrom('no-reply@mayansource.dev','Recuperar credencial');
                    $email->Subject = 'Recuperar credencial';
                    $mail->Body = '¡Hola! Hemos recibido una solicitud para cambiar tu contraseña el <b>'.date('d').', de '.date('M').' a las '.date('H:i A').'</b>, para continuar y cambiar tu contraseña haz click en el botón de abajo, el enlace expira en 30 minutos.<br>
                                    <p>Si no has sido tú, ignora este mensaje, mantendremos segura tu cuenta.</p><hr>
                                    <a href="'.base_url().'auth/new_request?auth='.$info['auth_key'].'" style="padding: 8px 20px; background-color: #0044e9; border-radius: 5px; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 20px 0px; margin-right: 20px; text-decoration: none; -webkit-box-shadow: 0px 2px 14px rgba(0, 68, 233, 0.40);
                                            box-shadow: 0px 2px 14px rgba(0, 68, 233, 0.40);">Recuperar contraseña</a>
                                        <h4 style="margin-bottom: 10px;">¿Necesitas ayuda?</h4>
                                        <div style="color: #A5A5A5; font-size: 12px;">
                                    <p>Si tienes alguna pregunta o duda con respecto a este correo electrónico. Por favor escríbenos a <a href="mailto:'.$name.'" style="text-decoration: underline; color: #4B72FA;">'.$name.'</a>';
                    $mail->AddAddress($this->input->post('email'));
                    if(!$mail->Send())
                    {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                    $mail->ClearAllRecipients();
                }
            }
            
            $this->mail->submitPassword($query1->row()->email , $info['auth_key']);
                
            $this->session->set_flashdata('success_recovery', '1');
            redirect(base_url(), 'refresh'); 
        }
        $this->load->view('backend/auth/new_password');
    }
    
    
    function check_m()
    {
        $credential =   array('email' => $this->input->post('mail'));
        $query1 = $this->db->get_where('admin' , $credential)->num_rows();

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($query1);
        exit();
    }
    
    //view for forgot password
    function new_request()
    {
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET); 
        $page_data['page_name'] = 'new_password';
        $page_data['token']     = $_GET['auth'];
        $this->load->view('backend/auth/new_password');
    }
    
    //function for update new password
    function new_password()
    {
        $data['password']   = sha1($this->input->post('password'));
        $data['auth_key']   = '';
        $this->db->where('auth_key', $this->input->post('auth_key'));
        $this->db->update('admin',$data);
        
        $this->session->set_flashdata('success' ,"¡Tu contraseña ha sido reestablecida!");
        redirect(base_url(), 'refresh');
    }

    //Logout function.
    function logout() 
    { 
        $this->session->sess_destroy();
        $id = $this->session->userdata('login_user_id');
        if($id)
        {
            $data = array(
            'status_message' => 'Inactivo',
        );
            $this->db->where('admin_id', $id);
            $this->db->update('admin', $data);
        }
        redirect(base_url(), 'refresh');
    }
    
    //End of Login.php
    function forgot_password()
    {
        $email = $this->input->post('email');      
        $findemail = $this->Users->forgot_password($email);  
        if($findemail)
        {
            $this->Users->send_password($findemail);
        }
        else
        {
            $this->session->set_flashdata('message','¡El correo electrónico no encontrado!');
            redirect(base_url().'login/new_request/','refresh');
        }
    }
}