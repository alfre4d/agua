<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Specialyst extends EduAppGT
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
            $this->load->library('m_pdf');
            $this->load->library('session');
            $this->load->library("pagination");
            $this->load->database();
            $this->load->model('Crud');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $this->output->set_header('Pragma: no-cache');    
            $this->runningYear = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
            $this->perPage =8;
        }
        //Index function for specialyst controller.
        public function index()
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            if ($this->session->userdata('specialyst_login') == 1)
            {
                redirect(base_url() . 'admin/panel/', 'refresh');
            }
        }
        
        //Admin dashboard function.
        function panel($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'panel';
            $page_data['page_title'] = 'Panel de administración';
            $this->load->view('backend/index', $page_data);
        } 
        function admins($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'admins';
            $page_data['page_title'] = 'Administradores';
            $this->load->view('backend/index', $page_data);
        }
        
        
        
        function accountants($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'accountants';
            $page_data['page_title'] = 'Contadores';
            $this->load->view('backend/index', $page_data);
        }
        
        function specialists($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $data = array();
            
            //get rows count
            $conditions['returnType'] = 'count';
            $totalRec = $this->Crud->getRows1($conditions);
            
            //pagination config
            $config['base_url']    = base_url().'specialyst/specialists/';
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
            //initialize pagination library
            $this->pagination->initialize($config);
            
            //define offset
            $page = $this->uri->segment(3);
            $offset = !$page?0:$page;
            //get rows
            $conditions['returnType'] = '';
            $conditions['start'] = $offset;
            $conditions['limit'] = $this->perPage;
            $page_data['speci'] = $this->Crud->getRows1($conditions);
            
            $page_data['page_name']  = 'specialists';
            $page_data['page_title'] = 'Especilistas';
            $this->load->view('backend/index', $page_data);
        }
        
        function finance($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'finance';
            $page_data['page_title'] = 'Finanzas';
            $this->load->view('backend/index', $page_data);
        }
        
        
        
        function settings($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'settings';
            $page_data['page_title'] = 'Configuración';
            $this->load->view('backend/index', $page_data);
        }
        
        
        function my_profile($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'my_profile';
            $page_data['page_title'] = 'Mi perfil';
            $this->load->view('backend/index', $page_data);
        }
        
        
      function message($param1 = 'message_home', $param2 = '', $param3 = '') 
        {
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        if ($this->session->userdata('specialyst_login') != 1)
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
            $message_thread_code = $this->crud->send_new_private_message();
            $this->session->set_flashdata('flash_message' , 'Mensaje enviado correctamente');
            redirect(base_url() . 'specialyst/message/message_read/' . $message_thread_code, 'refresh');
        }
        if ($param1 == 'send_reply') 
        {
            $this->crud->send_reply_message($param2);
            $this->session->set_flashdata('flash_message' , 'Respuesta enviada correctamente');
            redirect(base_url() . 'specialyst/message/message_read/' . $param2, 'refresh');
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
        if ($this->session->userdata('specialyst_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }
       
            
        if ($param1 == "create_group") 
        {
            $this->crud->create_group();
            $this->session->set_flashdata('flash_message' , 'Grupo creado');
            redirect(base_url() . 'specialyst/group/', 'refresh');
        }
        elseif($param1 == "delete_group")
        {
            $this->crud->deleteGroup($param2);
            $this->session->set_flashdata('flash_message' , 'Grupo eliminado');
            redirect(base_url() . 'specialyst/group/', 'refresh');
        }
        elseif ($param1 == "edit_group") 
        {
            $this->crud->update_group($param2);
            $this->session->set_flashdata('flash_message' , 'Grupo actualizado');
            redirect(base_url() . 'specialyst/group/', 'refresh');
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
            redirect(base_url() . 'specialyst/group/group_message_read/'.$param2, 'refresh');
        }
        
         $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'group';
        $page_data['page_title']                = 'Grupos de mensajes';
        $this->load->view('backend/index', $page_data);
       
    }

        function create_message_group($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'create_message_group';
            $page_data['page_title'] = 'Grupos';
            $this->load->view('backend/index', $page_data);
        }
        
        
        
        
        function clients($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $page_data['page_name']  = 'clients';
            $page_data['page_title'] = 'Clientes';
            $this->load->view('backend/index', $page_data);
        }    
        
        public function validation_passw()
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
                            //unlink($_SERVER['DOCUMENT_ROOT'].'/agua/public/uploads/img_photography/'.$img);
    
                            $path = $_SERVER['DOCUMENT_ROOT'].'/agua/public/uploads/img_photography/';
                            move_uploaded_file($_FILES['photography']['tmp_name'], $path.$nombre_imagen);
    
                            $profile = array 
                            (
                                'first_name'=>$this->input->post('first_name'),
                                'last_name'=>$this->input->post('last_name'),
                                'email'=>$this->input->post('email'),
                                'photography'=>$nombre_imagen,
                                'phone'=>$this->input->post('phone'),
                                'address'=>$this->input->post('address'),
                                'date_of_birth'=>$this->input->post('date_of_birth'),
                                'gender'=>$this->input->post('gender')
                            );
                            $this->db->where('admin_id', $id);
                            $this ->db->update('admin',$profile);
                            $_SESSION['item'] = 'Fotografía actualizada';
                            $this->session->mark_as_flash('item');
                            redirect(base_url() . 'specialyst/my_profile/', 'refresh');
    
                        }
                        else
                        {
                            $_SESSION['error'] = 'Solo se pueden subir imagenes de tipo jpg/jpeg/png/gif';
                            $this->session->mark_as_flash('error');
                            redirect(base_url() . 'specialyst/my_profile/', 'refresh');
                            
                        }
                    } 
                    else
                    {
                        $_SESSION['error'] = 'El tamaño del archivo es muy grande ';
                        $this->session->mark_as_flash('error');
                        redirect(base_url() . 'specialyst/my_profile/', 'refresh');
                        
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
                            'gender'=>$this->input->post('gender')
    
                        );
                        
                        $this->db->where('admin_id', $id);
                        $this ->db->update('admin',$profile);
                        $_SESSION['item'] = 'Perfil actualizado con éxito';
                        $this->session->mark_as_flash('item');
                        redirect(base_url() . 'specialyst/my_profile/', 'refresh');
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
                            'date_of_birth'=>$this->input->post('date_of_birth'),
                            'gender'=>$this->input->post('gender')
                        );
                        $this->db->where('admin_id', $id);
                        $this ->db->update('admin',$profile);

                        $_SESSION['item'] = 'Perfil actualizado con éxito';
                        $this->session->mark_as_flash('item');
                        //$this->session->set_flashdata('update', '1');
                        redirect(base_url() . 'specialyst/my_profile/', 'refresh');   
                    }

                   
                }        
                                     
            }
            else
            {
                $_SESSION['error'] = 'Contraseña incorrecta vuelva a intentarlo';
                $this->session->mark_as_flash('error');
                redirect(base_url() . 'specialyst/my_profile/', 'refresh');
            }
                
        }

       function requests($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            $data = array();
            
            //get rows count
            $conditions['returnType'] = 'count';
            $totalRec = $this->Crud->getPaginaterequest($conditions);
            
            //pagination config
            $config['base_url']    = base_url().'specialyst/requests/';
            $config['uri_segment'] = 3;
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['cur_tag_open'] = '<li><span class="inline-flex items-center justify-center cc yr mo vg bg-white border border-slate-200 text-indigo-500">';
            $config['cur_tag_close'] = '</span></li>';
            $config['num_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
            $config['num_tag_close'] = '</li>';
            $config['next_link'] = '
                <div class="r_">
                        <span href="#0" >
                            <span class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500" >Siguiente -&gt;</span><wbr />
                        </span>
                    </div>
                    ';
            $config['last_link'] = 'Último'; 
            $config['first_link'] = 'Primero'; 
            $config['first_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] ='
            <div class="mr-2">
                
                    <span href="#0" >
                        <span class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500" >&lt;- Anterior</span><wbr />
                                    </span>
               
            </div>
                        '; 
            //initialize pagination library
            $this->pagination->initialize($config);
            
            //define offset
            $page = $this->uri->segment(3);
            $offset = !$page?0:$page;
            //get rows
            $conditions['returnType'] = '';
            $conditions['start'] = $offset;
            $conditions['limit'] = $this->perPage;
            $page_data['reque'] = $this->Crud->getPaginaterequest($conditions);
            
            $page_data['page_name']  = 'requests';
            $page_data['page_title'] = 'Solicitudes';
            $this->load->view('backend/index', $page_data);
        }
        
        function request_made($param1 = '', $param2 = '')
        {
        if ($this->session->userdata('specialyst_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getPaginaterequest_made($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'specialyst/request_made/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['cur_tag_open'] = '<li><span class="inline-flex items-center justify-center cc yr mo vg bg-white border border-slate-200 text-indigo-500">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '
                <div class="r_">
                        <span href="#0" >
                            <span class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500" >Siguiente -&gt;</span><wbr />
                        </span>
                    </div>
                    ';
        $config['last_link'] = 'Último';
        $config['first_link'] = 'Primero';
        $config['first_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '
<div class="mr-2">
    
        <span href="#0" >
            <span class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500" >&lt;- Anterior</span><wbr />
                        </span>
</div>
            ';
        //initialize pagination library
        $this->pagination->initialize($config);

        //define offset
        $page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
        //get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        $page_data['reque_made'] = $this->Crud->getPaginaterequest_made($conditions);

        $page_data['page_name']  = 'request_made';
        $page_data['page_title'] = 'Solicitudes';
        $this->load->view('backend/index', $page_data);
    }
    
        
        
        
        
        
     function prueba($param1 = '', $param2 = '')
        {
        if ($this->session->userdata('specialyst_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getPaginatecontracts($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'specialyst/prueba/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['cur_tag_open'] = '<li><span class="inline-flex items-center justify-center cc yr mo vg bg-white border border-slate-200 text-indigo-500">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '
                <div class="r_">
                        <span href="#0" >
                            <span class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500" >Siguiente -&gt;</span><wbr />
                        </span>
                    </div>
                    ';
        $config['last_link'] = 'Último';
        $config['first_link'] = 'Primero';
        $config['first_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '
        <div class="mr-2">
    
        <span href="#0" >
            <span class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500" >&lt;- Anterior</span><wbr />
                        </span>
        </div>
            ';
        //initialize pagination library
        $this->pagination->initialize($config);

        //define offset
        $page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;
        //get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        $page_data['contract'] = $this->Crud->getPaginatecontracts($conditions);

        $page_data['page_name']  = 'prueba';
        $page_data['page_title'] = 'Prueba';
        $this->load->view('backend/index', $page_data);
    }
        
        //Function insert messages
            function sendmsg(){
            $time = date('Y-m-d H:i:s');
            $user_receiver = $_POST['id'];
            $msg = $_POST['msg'];
            $user_sender = $this->session->userdata('login_user_id');

          // $query = $this->db->where('admin_id',$var)->get('admin')->result_array();

            //echo $user_receiver.' '.$user_sender.' '.$msg.' '.$time;
            
            
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
                echo "Ha ocurrido un error";
            }
            
        }
        
        
        function viewpdf($param1 = '', $param2 = '')
        {
           
             if ($this->session->userdata('specialyst_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            $data = [];
            $page_data['page_name']  = 'viewpdf';
            $page_data['page_title'] = 'Mensajes insertados';
                
            $html=$this->load->view('backend/index', NULL, $page_data, $data, true);
            
           
            $pdfFilePath ="prueba.pdf";
            $this->load->library('m_pdf');
          
            $this->m_pdf->pdf->WriteHTML($html,2);
            $this->m_pdf->pdf->Output($pdfFilePath, "D");
        }   
      
      
      
      
      
        //End of Specialyst.php content.
    }