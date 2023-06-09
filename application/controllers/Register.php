<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends EduAppGT 
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
    
    function panel($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'panel';
        $page_data['page_title'] = 'Panel de administración';
        $this->load->view('backend/index', $page_data);
    }
    
    public function mensajes_canal()
    {
        $usuario = $this->input->post('usuario');
        $mensajesCanal = $this->Users->getMensajesCanalOnTime($usuario);
        echo json_encode($mensajesCanal);
    }
     
    public function add_mensaje_canal()
    {
        $mensaje = $this->input->post('mensaje');
        $usuario = $this->input->post('usuario');
        $this->users->addMensaje($usuario,$mensaje);
        $data['fecha'] = date('Y-m-d H:i:s');
        $data['usuario'] = $usuario;
        $data['mensaje'] = $mensaje;
        echo json_encode($data);
    }
    
    function group($param1 = '', $param2 = '')
    {
        if($this->session->userdata('admin_login') !=1){
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name'] = 'create_message_group';
        $page_data['page_title'] = 'Crear grupo';
        $this->load->view('backend/index',$page_data);
    }
    
    function create_group()
    {
        $data = array(
            'name_group' =>$this->input->post('name_group'),
            'first_name' =>$this->input->post('check_admin').' '.$this->input->post('check_account').' '.$this->input->post('check_specialist'),
           );
            $this->db->insert('create_message_group',$data);
            $_SESSION['msg'] = 'El grupo ha sido creado con éxito';
            $this->session->mark_as_flash('msg');
            redirect(base_url() . 'register/group/', 'refresh');
    }
    
    //function update group 
    function update_group($id)
    {
        $data['name_group'] = $this->input->post('name_group');
        $data['first_name'] = $this->input->post('check_admin');
        $this->db->where('id_group',$id);
        $this->db->update('create_message_group',$data);
        $_SESSION['msg'] = 'Se actualizó con éxito';
        $this->session->mark_as_flash('msg');
        redirect(base_url(). 'register/group/', 'refresh');
    }
    
    //function delete group
    function delete_message_group($id)
    {
      $this->db->where('id_group',$id);
      $this->db->delete('create_message_group');
      $_SESSION['msg'] = 'Se eliminó con exito';
      $this->session->mark_as_flash('msg');
      redirect(base_url(). 'register/group/', 'refresh');
    }
    
    function add_msg()
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
    
    function view_chat()
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
                        foreach($queryss as $row){ 
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
            else {
               echo $message = '<div style="font-size:48px;text-align:center;" id="div1" class="fa">Ya puedes enviar y recibir mensajes...</div>';
           }
           /* {
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
            }*/
    }
    
     function view_pdf($id)
        {
            $query = $this->crud->get_pdf($id);
            $data['query'] = $query;
            //$id['id']=$id;
            $this->load->view('backend/admin/view_pdf.php', $data);
        }
    
    function view_user()
    {
         $idsession = $this->session->userdata('login_user_id');
            $user_receiver = $_POST['id'];
            $user = $this->Users->usermsga($idsession);
            $userc = $this->Users->usermsg($idsession); 
           if(empty($userc)):
               echo '<div class="gp i_">
                                <strong>
                                    <p>¡No se ha registrado ningún mensaje directo! 😞</p>
                                </strong>
                            </div>';
               else:
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
                                 if(empty($user)):
                                    //echo 'No hay datos'; 
                                else:
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
                 endif;
            }
           
            endif;
    }
    function add_archive()
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
}