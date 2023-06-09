<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends EduAppGT
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
        $this->runningYear = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
        $this->perPage = 8;
    }

    //Index function for Admin controller.
    public function index()
    {
        if ($this->session->userdata('admin_login') != 1) 
        {
            redirect(base_url(), 'refresh');
        }
        if ($this->session->userdata('admin_login') == 1) {
            redirect(base_url() . 'admin/panel/', 'refresh');
        }
    }

    //Admin dashboard function.
    function panel($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'panel';
        $page_data['page_title'] = 'Panel de administración';
        $this->load->view('backend/index', $page_data);
    }
    
    function message($param1 = 'message_home', $param2 = '', $param3 = '') 
    {
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        if ($this->session->userdata('admin_login') != 1)
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
            redirect(base_url() . 'admin/message/message_read/' . $message_thread_code, 'refresh');
        }
        if ($param1 == 'send_reply') 
        {
            $this->crud->send_reply_message($param2);
            $this->session->set_flashdata('flash_message' , 'Respuesta enviada correctamente');
            redirect(base_url() . 'admin/message/message_read/' . $param2, 'refresh');
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

    function validate_dni()
    {
        $var = $this->input->get('value');
        $query = $this->db->query("SELECT admin.admin_id, admin.doc_dni FROM admin WHERE admin.doc_dni = '" . $var . "'")->result_array();
        if ($var != '') {
            echo json_encode($query);
        } else {
            echo 0;
        }
    }

    function admins($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }
        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getRows($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'admin/admins/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['cur_tag_open'] = '<li><span class="inline-flex items-center justify-center cc yr mo vg bg-white border border-slate-200 text-indigo-500">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="inline-flex items-center justify-center yr mo vg bg-white xh border border-slate-200 ys xw">';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '
<div class="r_">
    <span class="inline-flex items-center justify-center rounded yr vk vg bg-white xh border border-slate-200 ys xw bw">
        <span class="tc">Siguiente</span><wbr/>
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
        $config['prev_link'] = '
<div class="mr-2">
        <span class="inline-flex items-center justify-center rounded yr vk vg bg-white xh border border-slate-200 ys xw bw">
            <span class="tc">Anterior</span><wbr />
            <svg class="on ue db" viewBox="0 0 16 16">
                <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z"></path>
            </svg>
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
        $page_data['admon'] = $this->Crud->getRows($conditions);

        $page_data['page_name']  = 'admins';
        $page_data['page_title'] = 'Administradores';
        $this->load->view('backend/index', $page_data);
    }

    //muestra el formulario de registro
    function create_admin()
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name']  = 'create_admin';
        $page_data['page_title'] = 'Crear tu cuenta';
        $this->load->view('backend/index', $page_data);
    }
    //funcion para insertar registro
    function insert_admin()
    {
        $nombre_imagen = $_FILES['photography']['name'];
        $tipo_imagen = $_FILES['photography']['type'];
        $tam_imagen = $_FILES['photography']['size'];
        $pass_current = sha1($this->input->post('pass_current'));
        $password = $this->input->post('password');
        $comparation = $this->crud->get_password($pass_current);
        if ($nombre_imagen != '') {
            if ($tam_imagen <= 1000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/agua/public/uploads/img_photography/';
                    move_uploaded_file($_FILES['photography']['tmp_name'], $path . $nombre_imagen);
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name') . ' ' . $this->input->post('last_name_mom'),
                        'email' => $this->input->post('email'),
                        'photography' => $nombre_imagen,
                        'password' => sha1($this->input->post('password')),
                        'doc_dni' => $this->input->post('doc_dni'),
                        'type' => 1,
                        'phone' => $this->input->post('phone'),
                        'address' => $this->input->post('address'),
                        'date_of_birth' => $this->input->post('date_of_birth'),
                        'gender' => $this->input->post('gender'),
                        'role' => ('Administrador'),
                        'status' => ('Activo'),
                    );
                    $this->db->insert('admin', $data);
                    $_SESSION['item'] = 'Datos han sido insertado con éxito';
                    $this->session->mark_as_flash('item');
                    redirect(base_url() . 'admin/admins/', 'refresh');

                } else {
                    echo "solo se pueden subir imagenes de tipo jpg/jpeg/png/gif";
                }
            } else {
                echo "El tamanio es demasiado grande";
            }
        }else{
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name') . ' ' . $this->input->post('last_name_mom'),
            'email' => $this->input->post('email'),
            'photography' => 'profile.jpg',
            'password' => sha1($this->input->post('password')),
            'doc_dni' => $this->input->post('doc_dni'),
            'type' => 1,
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender' => $this->input->post('gender'),
            'role' => ('Administrador'),
            'status' => ('Activo'),
        );
        $this->db->insert('admin', $data);
        $_SESSION['item'] = 'Datos han sido insertado con éxito';
        $this->session->mark_as_flash('item');
        redirect(base_url() . 'admin/admins/', 'refresh');
        }
    }

    //Editar administrador
    function updateAdmin_post($id)
    {
        $nombre_imagen = $_FILES['photography']['name'];
        $tipo_imagen = $_FILES['photography']['type'];
        $tam_imagen = $_FILES['photography']['size'];
        if ($nombre_imagen != '') {
            if ($tam_imagen <= 1000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/agua/public/uploads/img_admins/';
                    move_uploaded_file($_FILES['photography']['tmp_name'], $path . $nombre_imagen);
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'photography' => $nombre_imagen,
                        'address' => $this->input->post('address'),
                    );
                    $this->db->where('admin_id', $id);
                    $this->db->update('admin', $data);
                    $page_data['page_name']  = 'updateAdmin_post';
                    $page_data['page_title'] = 'Actualizar adminitrador';
                    $_SESSION['message'] = 'Se actualizo con éxito';
                    $this->session->mark_as_flash('message');
                    redirect(base_url() . 'admin/admins/', 'refresh');
                } else {
                    $_SESSION['message'] = 'Solo se pueden subir imagenes de tipo jpg/jpeg/png/gif';
                    $this->session->mark_as_flash('message');
                }
            } else {
                $_SESSION['message'] = 'El tamaño es demasiado grande';
                $this->session->mark_as_flash('message');
            }
        } else {
            if ($nombre_imagen) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'photography' => $nombre_imagen,
                    'address' => $this->input->post('address'),
                );
                $this->db->where('admin_id', $id);
                $this->db->update('admin', $data);
                $_SESSION['message'] = 'Se actualizo con éxito';
                $this->session->mark_as_flash('message');
                redirect(base_url() . 'admin/admins/', 'refresh');
            } else {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                );
                $this->db->where('admin_id', $id);
                $this->db->update('admin', $data);
                $_SESSION['message'] = 'Se actualizo con éxito';
                $this->session->mark_as_flash('message');
                redirect(base_url() . 'admin/admins/', 'refresh');
            }
        }
    }
    
    
    function delete_admins($id)
    {
        $data = array(
            'status' => 'Inactivo',

        );
        $this->db->where('admin_id', $id);
        $this->db->update('admin', $data);
        $_SESSION['message'] = 'Desactivado correctamente';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/admins/', 'refresh');
    }
    
    
    function active_admins($id)
    {
        $data = array(
            'status' => 'Activo',
        );

        $this->db->where('admin_id', $id);
        $this->db->update('admin', $data);
        $_SESSION['message'] = 'Reactivado correctamente';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/admins/', 'refresh');
    }
    
    function group($param1 = "group_message_home", $param2 = "", $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }
       
            
        if ($param1 == "create_group") 
        {
            $this->crud->create_group();
            $this->session->set_flashdata('flash_message' , 'Grupo creado');
            redirect(base_url() . 'admin/group/', 'refresh');
        }
        elseif($param1 == "delete_group")
        {
            $this->crud->deleteGroup($param2);
            $this->session->set_flashdata('flash_message' , 'Grupo eliminado');
            redirect(base_url() . 'admin/group/', 'refresh');
        }
        elseif ($param1 == "edit_group") 
        {
            $this->crud->update_group($param2);
            $this->session->set_flashdata('flash_message' , 'Grupo actualizado');
            redirect(base_url() . 'admin/group/', 'refresh');
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
            redirect(base_url() . 'admin/group/group_message_read/'.$param2, 'refresh');
        }
        
        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'group';
        $page_data['page_title']                = 'Grupos de mensajes';
        $this->load->view('backend/index', $page_data);
       
    }

    function profileUpdateAdmin($id)
    {
        $nombre_imagen = $_FILES['photography']['name'];
        $tipo_imagen = $_FILES['photography']['type'];
        $tam_imagen = $_FILES['photography']['size'];

        $password_actual_veri = $this->input->post('password_actual_veri');
        $password_actual = $this->input->post('password_actual');
        $password = $this->input->post('password');
        $comparation = array('admin_id' => $id, 'password' => sha1($password_actual_veri));
        $query = $this->crud->get_login('admin', $comparation);

        if ($query->num_rows() > 0) {

            if ($nombre_imagen != '') {
                if ($tam_imagen <= 1000000) {
                    if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                        //unlink($_SERVER['DOCUMENT_ROOT'].'/agua/public/uploads/img_admins/'.$img);

                        $path = $_SERVER['DOCUMENT_ROOT'] . '/agua/public/uploads/img_photography/';
                        move_uploaded_file($_FILES['photography']['tmp_name'], $path . $nombre_imagen);

                        $profile = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name' => $this->input->post('last_name'),
                            'email' => $this->input->post('email'),
                            'photography' => $nombre_imagen,
                            'phone' => $this->input->post('phone'),
                            'address' => $this->input->post('address'),
                            'date_of_birth' => $this->input->post('date_of_birth')
                        );
                        $this->db->where('admin_id', $id);
                        $this->db->update('admin', $profile);
                        $_SESSION['item'] = 'Fotografía actualizada';
                        $this->session->mark_as_flash('item');
                        redirect(base_url() . 'admin/my_profile/', 'refresh');
                    } else {
                        $_SESSION['error'] = 'Solo se pueden subir imagenes de tipo jpg/jpeg/png/gif';
                        $this->session->mark_as_flash('error');
                        redirect(base_url() . 'admin/my_profile/', 'refresh');
                    }
                } else {
                    $_SESSION['error'] = 'El tamaño del archivo es muy grande ';
                    $this->session->mark_as_flash('error');
                    redirect(base_url() . 'admin/my_profile/', 'refresh');
                }
            } else {

                if ($password != '' && $password_actual != '') {
                    $profile = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'email' => $this->input->post('email'),
                        'password' => sha1($this->input->post('password')),
                        'phone' => $this->input->post('phone'),
                        'address' => $this->input->post('address'),
                        'date_of_birth' => $this->input->post('date_of_birth'),

                    );

                    $this->db->where('admin_id', $id);
                    $this->db->update('admin', $profile);
                    $_SESSION['item'] = 'Perfil actualizado con éxito';
                    $this->session->mark_as_flash('item');
                    redirect(base_url() . 'admin/my_profile/', 'refresh');
                } else {
                    $profile = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'address' => $this->input->post('address'),
                        'date_of_birth' => $this->input->post('date_of_birth')
                    );
                    $this->db->where('admin_id', $id);
                    $this->db->update('admin', $profile);
 
                    $_SESSION['item'] = 'Perfil actualizado con éxito';
                    $this->session->mark_as_flash('item');
                    //$this->session->set_flashdata('update', '1');
                    redirect(base_url() . 'admin/my_profile/', 'refresh');
                }
            }
        } else {
            $_SESSION['error'] = 'Contraseña incorrecta vuelva a intentarlo';
            $this->session->mark_as_flash('error');
            redirect(base_url() . 'admin/my_profile/', 'refresh');
        }
    }


    //muestra el formulario de registro
    function create_accountant()
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name']  = 'create_accountant';
        $page_data['page_title'] = 'Crear tu cuenta';
        $this->load->view('backend/index', $page_data);
    }

    //funcion para insertar registro---------------------------------------------------
    function insert_accountant()
    {
        $nombre_imagen = $_FILES['photography']['name'];
        $tipo_imagen = $_FILES['photography']['type'];
        $tam_imagen = $_FILES['photography']['size'];
        $pass_current = sha1($this->input->post('pass_current'));
        $password = $this->input->post('password');
        $comparation = $this->crud->get_password($pass_current);
        if ($nombre_imagen != '') {
            if ($tam_imagen <= 1000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/agua/public/uploads/img_photography/';
                    move_uploaded_file($_FILES['photography']['tmp_name'], $path . $nombre_imagen);

                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name').' '.$this->input->post('last_name_mom'),
                        'email' => $this->input->post('email'),
                        'photography' => $nombre_imagen,
                        'password' => sha1($this->input->post('password')),
                        'doc_dni' => $this->input->post('doc_dni'),
                        'status' => 'Activo',
                        'type' => 2,
                        'phone' => $this->input->post('phone'),
                        'address' => $this->input->post('address'),
                        'date_of_birth' => $this->input->post('date_of_birth'),
                        'gender' => $this->input->post('gender'),
                        'role' => 'Contador',
                    );
                    $this->db->insert('admin', $data);
                    $_SESSION['item'] = 'Datos han sido insertado con éxito';
                    $this->session->mark_as_flash('item');
                    redirect(base_url() . 'admin/accountants/', 'refresh');
                } else {
                    echo "solo se pueden subir imagenes de tipo jpg/jpeg/png/gif";
                }
            } else {
                echo "El tamanio es demasiado grande";
            }
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name').' '.$this->input->post('last_name_mom'),
                'email' => $this->input->post('email'),
                'photography' => 'profile.jpg',
                'password' => sha1($this->input->post('password')),
                'doc_dni' => $this->input->post('doc_dni'),
                'status' => 'Activo',
                'type' => 2,
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'gender' => $this->input->post('gender'),
                'role' => 'Contador',
            );
            $this->db->insert('admin', $data);
            $_SESSION['item'] = 'Datos insertados con éxito';
            $this->session->mark_as_flash('item');
            redirect(base_url() . 'admin/accountants/', 'refresh');
        }
    }
    

    function delete_account($id)
    {
        $profile = array(
            'status' => 'Inactivo',

        );

        $this->db->where('admin_id', $id);
        $this->db->update('admin', $profile);
        $_SESSION['item'] = 'Contador desactivado correctamente';
        $this->session->mark_as_flash('item');
        redirect(base_url() . 'admin/accountants/', 'refresh');
    }
    
    
    function active_account($id)
    {
        $profile = array(
            'status' => 'Activo',
        );

        $this->db->where('admin_id', base64_decode($id));
        $this->db->update('admin', $profile);
        $_SESSION['item'] = 'Contador reactivado correctamente';
        $this->session->mark_as_flash('item');
        redirect(base_url() . 'admin/accountants/', 'refresh');
    }

    //Editar Contador-Modal
    function updateAccount($id)
    {
        $nombre_imagen = $_FILES['photography']['name'];
        $tipo_imagen = $_FILES['photography']['type'];
        $tam_imagen = $_FILES['photography']['size'];
        if ($nombre_imagen != '') {
            if ($tam_imagen <= 1000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/agua/public/uploads/img_photography/';
                    move_uploaded_file($_FILES['photography']['tmp_name'], $path . $nombre_imagen);
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'photography' => $nombre_imagen,
                        'address' => $this->input->post('address'),
                    );
                    $this->db->where('admin_id', $id);
                    $this->db->update('admin', $data);
                    $page_data['page_name']  = 'updateAdmin_post';
                    $page_data['page_title'] = 'Actualizar adminitrador';
                    $_SESSION['message'] = 'Se actualizo con éxito';
                    $this->session->mark_as_flash('message');
                    redirect(base_url() . 'admin/accountants/', 'refresh');
                } else {
                    $_SESSION['message'] = 'Solo se pueden subir imagenes de tipo jpg/jpeg/png/gif';
                    $this->session->mark_as_flash('message');
                }
            } else {
                $_SESSION['message'] = 'El tamaño es demasiado grande';
                $this->session->mark_as_flash('message');
            }
        } else {
            if ($nombre_imagen) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'photography' => $nombre_imagen,
                    'address' => $this->input->post('address'),
                );
                $this->db->where('admin_id', $id);
                $this->db->update('admin', $data);
                $_SESSION['message'] = 'Se actualizo con éxito';
                $this->session->mark_as_flash('message');
                redirect(base_url() . 'admin/accountants/', 'refresh');
            } else {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                );
                $this->db->where('admin_id', $id);
                $this->db->update('admin', $data);
                $_SESSION['message'] = 'Se actualizo con éxito';
                $this->session->mark_as_flash('message');
                redirect(base_url() . 'admin/accountants/', 'refresh');
            }
        }
    }


    //muestra el formulario de registro
    function create_specialyst()
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name']  = 'create_specialyst';
        $page_data['page_title'] = 'Crear tu cuenta';
        $this->load->view('backend/index', $page_data);
    }
    

    //funcion para insertar registro
    function insert_specialyst()
    {
        $nombre_imagen = $_FILES['photography']['name'];
        $tipo_imagen = $_FILES['photography']['type'];
        $tam_imagen = $_FILES['photography']['size'];
        $pass_current = sha1($this->input->post('pass_current'));
        $password = $this->input->post('password');
        $comparation = $this->crud->get_password($pass_current);
        if ($nombre_imagen != '') {
            if ($tam_imagen <= 1000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/agua/public/uploads/img_photography/';
                    move_uploaded_file($_FILES['photography']['tmp_name'], $path . $nombre_imagen);

                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name').' '.$this->input->post('last_name_mom'),
                        'email' => $this->input->post('email'),
                        'photography' => $nombre_imagen,
                        'password' => sha1($this->input->post('password')),
                        'doc_dni' => $this->input->post('doc_dni'),
                        'status' => 'Activo',
                        'type' => 3,
                        'phone' => $this->input->post('phone'),
                        'address' => $this->input->post('address'),
                        'date_of_birth' => $this->input->post('date_of_birth'),
                        'gender' => $this->input->post('gender'),
                        'role' => 'Especialista',
                    );
                    $this->db->insert('admin', $data);
                    $_SESSION['item'] = 'Datos han sido insertado con éxito';
                    $this->session->mark_as_flash('item');
                    redirect(base_url() . 'admin/specialists/', 'refresh');
                } else {
                    echo "solo se pueden subir imagenes de tipo jpg/jpeg/png/gif";
                }
            } else {
                echo "El tamanio es demasiado grande";
            }
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'photography' => 'profile.jpg',
                'password' => sha1($this->input->post('password')),
                'doc_dni' => $this->input->post('doc_dni'),
                'status' => 'Activo',
                'type' => 3,
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'gender' => $this->input->post('gender'),
                'role' => 'Especialista',
            );
            $this->db->insert('admin', $data);
            $_SESSION['item'] = 'Datos insertados con éxito';
            $this->session->mark_as_flash('item');
            redirect(base_url() . 'admin/specialists/', 'refresh');
        }
    }


    function active_specialyst($id)
    {
        $profile = array(
            'status' => 'Activo',
        );

        $this->db->where('admin_id', base64_decode($id));
        $this->db->update('admin', $profile);
        $_SESSION['item'] = 'Especialista reactivado correctamente';
        $this->session->mark_as_flash('item');
        redirect(base_url() . 'admin/specialists/', 'refresh');
    }


    function delete_specialyst($id)
    {
        $profile = array(
            'status' => 'Inactivo',

        );

        $this->db->where('admin_id', $id);
        $this->db->update('admin', $profile);
        $_SESSION['item'] = 'Especialista desactivado correctamente';
        $this->session->mark_as_flash('item');
        redirect(base_url() . 'admin/specialists/', 'refresh');
    }
    

    //muestra el formulario de editar especialistas desde el admin
    function update_specialists($id)
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $specialyst = $this->crud->get_specialyst($id);
        $page_data['page_name']  = 'update_specialists';
        $page_data['page_title'] = 'Editar tu cuenta';
        $page_data['specialyst'] = $specialyst;
        $this->load->view('backend/index', $page_data);
    }
    //Editar especialista-Modal
    function updateSpecialists($id)
    {
        $nombre_imagen = $_FILES['photography']['name'];
        $tipo_imagen = $_FILES['photography']['type'];
        $tam_imagen = $_FILES['photography']['size'];
        if ($nombre_imagen != '') {
            if ($tam_imagen <= 1000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/agua/public/uploads/img_photography/';
                    move_uploaded_file($_FILES['photography']['tmp_name'], $path . $nombre_imagen);
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'photography' => $nombre_imagen,
                        'address' => $this->input->post('address'),
                    );
                    $this->db->where('admin_id', $id);
                    $this->db->update('admin', $data);
                    $page_data['page_name']  = 'updateAdmin_post';
                    $page_data['page_title'] = 'Actualizar adminitrador';
                    $_SESSION['message'] = 'Se actualizo con éxito';
                    $this->session->mark_as_flash('message');
                    redirect(base_url() . 'admin/specialists/', 'refresh');
                } else {
                    $_SESSION['message'] = 'Solo se pueden subir imagenes de tipo jpg/jpeg/png/gif';
                    $this->session->mark_as_flash('message');
                }
            } else {
                $_SESSION['message'] = 'El tamaño es demasiado grande';
                $this->session->mark_as_flash('message');
            }
        } else {
            if ($nombre_imagen) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'photography' => $nombre_imagen,
                    'address' => $this->input->post('address'),
                );
                $this->db->where('admin_id', $id);
                $this->db->update('admin', $data);
                $_SESSION['message'] = 'Se actualizo con éxito';
                $this->session->mark_as_flash('message');
                redirect(base_url() . 'admin/specialists/', 'refresh');
            } else {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                );
                $this->db->where('admin_id', $id);
                $this->db->update('admin', $data);
                $_SESSION['message'] = 'Se actualizo con éxito';
                $this->session->mark_as_flash('message');
                redirect(base_url() . 'admin/specialists/', 'refresh');
            }
        }
    }


    function create_client()
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name']  = 'create_client';
        $page_data['page_title'] = 'Crear tu cuenta';
        $this->load->view('backend/index', $page_data);
    }
    

    //function insert client
    function insert_client()
    {
        /*$pass_current = sha1($this->input->post('pass_current'));
        $password = $this->input->post('password');
        $comparation = $this->crud->get_password($pass_current);*/
        
        $doc_ruc = $this->input->post('doc_ruc');
        $social_reason = $this->input->post('social_reason');
        if($doc_ruc !='' && $social_reason !=''){
        
         $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name').' '.$this->input->post('last_name_mom'),
            'supply_number' => $this->input->post('supply_number'),
            'social_reason' => $this->input->post('social_reason'),
            'phone' => $this->input->post('phone'),
            'doc_dni' => $this->input->post('doc_dni'),
            'doc_ruc' => $this->input->post('doc_ruc'),
            'status' => 'Sin acción',
            'person_type' => $this->input->post('person_type'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'priority' =>'Seleccione una opción',
            'rates_id' =>$this->input->post('reciever'),
         

        );
        $this->db->insert('clients', $data);
        $_SESSION['message'] = 'Cliente insertado con éxito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/clients/', 'refresh');    
            
        }else{
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name').' '.$this->input->post('last_name_mom'),
            'supply_number' => $this->input->post('supply_number'),
            'phone' => $this->input->post('phone'),
            'doc_dni' => $this->input->post('doc_dni'),
            'status' => 'Sin acción',
            'person_type' => $this->input->post('person_type'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'priority' =>'Seleccione una opción',
            'rates_id' =>$this->input->post('reciever'),
          

        );
        $this->db->insert('clients', $data);
        $_SESSION['message'] = 'Cliente insertado con éxito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/clients/', 'refresh'); 
        }

       
    }

    //Edit client
    function update_client($id)
    {
        $doc_ruc = $this->input->post('doc_ruc');
        $social_reason = $this->input->post('social_reason');
        if($doc_ruc !='' && $social_reason !=''){
        
          $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'supply_number' => $this->input->post('supply_number'),
            'social_reason' => $this->input->post('social_reason'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
    
        );
        $this->db->where('client_id', $id);
        $this->db->update('clients', $data);
        $page_data['page_name']  = 'update_client';
        $page_data['page_title'] = 'Actualizar cliente';
        $_SESSION['message'] = 'Cliente actualizado con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/clients/', 'refresh');
        
        }else{
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'supply_number' => $this->input->post('supply_number'),
            'social_reason' => $this->input->post('social_reason'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
        );
        $this->db->where('client_id', $id);
        $this->db->update('clients', $data);
        $page_data['page_name']  = 'update_client';
        $page_data['page_title'] = 'Actualizar cliente';
        $_SESSION['message'] = 'Cliente actualizado con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/clients/', 'refresh');
        }
    }
    
    function up_clientpdf($id){
        $nombre_pdf = $_FILES['file_pdf']['name'];
        $tipo_pdf = $_FILES['file_pdf']['type'];
        $tam_pdf = $_FILES['file_pdf']['size'];
        
        if($tipo_pdf == 'application/pdf')
        {
            $path = $_SERVER['DOCUMENT_ROOT'] . '/agua/public/uploads/archive_contract/';
            move_uploaded_file($_FILES['file_pdf']['tmp_name'], $path . $nombre_pdf);
            $data = array(
                'file_pdf' => $nombre_pdf,
                'creation_date' => $this->input->post('creation_date'),
            );
            
            $this->db->where('client_id', $id);
            $this->db->update('clients', $data);
            $_SESSION['message'] = 'Documento insertado con éxito';
            $this->session->mark_as_flash('message');
            redirect(base_url() . 'admin/contracts/', 'refresh');
            
        }
        
        
        
        echo $id.' '.$nombre_pdf.'_'.$tam_pdf;
        
    }
    

//Edit status
    function update_status($id)
    {
         $data = array(
            'status' =>$this->input->post('status'),
        );
       
        
        $this->db->where('client_id', $id);
        $this->db->update('clients', $data);
        $_SESSION['message'] = 'Estados actualizados con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/clients/', 'refresh');
    }


    //Edit All status
    function update_allstatus()
    {
        $id = $_POST['id'];
        $option = $_POST['option'];
        echo $id.' '.$option;
        if($option=='Reparación'){
           $data = array(
         
            'status' =>'Reparación', 
        );
       
        } 
        if($option=='Corte'){
           $data = array(
         
            'status' =>'Corte', 
        );
       
        } 
        if($option=='Instalación'){
           $data = array(
         
            'status' =>'Instalación', 
        );
       
        } 
        if($option=='Sin acción'){
           $data = array(
         
            'status' =>'Sin acción', 
        );
       
        } 
        
        $this->db->where('client_id', $id);
        $this->db->update('clients', $data);
        $_SESSION['message'] = 'Estados actualizados con exito';
        $this->session->mark_as_flash('message');
   
    }

  


    //Edit rquest
    function update_request($id)
    {

        $data = array(
            'status' =>'Sin acción',
            'end_date' => $this->input->post('end_date'),
            'completion_status' =>'Finalizado',
        );
        $this->db->where('client_id', $id);
        $this->db->update('clients', $data);
        $page_data['page_name']  = 'update_request';
        $page_data['page_title'] = 'Actualizar solocitud';
        $_SESSION['message'] = 'Solicitud finalizada con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/request_made/', 'refresh');
    }

   //Delete All Client
    function deleteAllclient()
    {
       $id = $_POST['id'];
       
        $this->db->where('client_id', $id);
        $this->db->delete('clients');
        $_SESSION['message'] = 'El cliente fue eliminado con exito';
        $this->session->mark_as_flash('message');
     
    }
    //Delete client
    function deleteClient($id)
    {
        $this->db->where('client_id',$id);
        $this->db->delete('clients');
        $_SESSION['message'] = 'El cliente fue eliminado con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/clients/' , 'refresh');
    }
    //delete client and archive
    function deleteClientArchive($id)
    {
        $pdf = $this->db->get_where('clients', array('client_id' => $id))->row()->file_pdf;
        
        //echo $pdf;
        
        //$_SERVER['DOCUMENT_ROOT'].'/agua/public/uploads/archive_contract/'.$pdf;
        unlink($_SERVER['DOCUMENT_ROOT'].'/agua/public/uploads/archive_contract/'.$pdf);
        
        $this->db->where('client_id',$id);
        $this->db->delete('clients');
        $_SESSION['message'] = 'Cliente eliminado con éxito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/contracts/' , 'refresh');
    }
    
    //Delete allclient
    function deleteClient_id()
    {
       if(isset($_POST['deleteEmpBtn'])){
           if(!empty($this->input->post('checkbox_value'))){
            $checkedEmp = $this->input->post('checkbox_value');
            $checked_id = [];
            foreach ($checkedEmp as $clts){
                array_push($checked_id, $clts);
                
            }
            $this->load->model('Crud');
            $this->Crud->deleteSelectedEmp($checked_id);
            $_SESSION['message'] = 'Los clientes fueron eliminados con exito';
            $this->session->mark_as_flash('message');
            redirect(base_url() . 'admin/clients/', 'refresh');
              
           }else{
            $_SESSION['error'] = 'Seleccione una opción';
            $this->session->mark_as_flash('error');
            redirect(base_url() . 'admin/clients/', 'refresh');
           }
       }
    }
    
    //insert request client
    function insertrequest_client($id)
    {
        $start = $this->Crud->get_requestsClient($id);
        foreach($start as $row){
            if($row['completion_status']=='Activo'){
                 
                $_SESSION['error'] = 'Tiene una solicitud pendiente';
                $this->session->mark_as_flash('error');
                redirect(base_url() . 'admin/requests/', 'refresh');   
            }
            else{
            if($row['status']=='Sin acción'){
            $data = array(
            'start_date' =>$this->input->post('start_date'),
            'end_date' =>'',
            'priority' => $this->input->post('priority'),
            'completion_status' =>'Activo',
        );
        $this->db->where('client_id', $id);
        $this->db->update('clients', $data);
        $page_data['page_name']  = 'insertrequest_client';
        $page_data['page_title'] = 'Enviar solocitud';
        $_SESSION['message'] = 'Solicitud creada con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/requests/', 'refresh');  
        }
        else{
           if($row['status']!=''){
            $data = array(
            'start_date' =>$this->input->post('start_date'),
            'end_date' =>'',
            'priority' => $this->input->post('priority'),
            'completion_status' =>'Activo',
        );
        $this->db->where('client_id', $id);
        $this->db->update('clients', $data);
        $page_data['page_name']  = 'insertrequest_client';
        $page_data['page_title'] = 'Enviar solocitud';
        $_SESSION['message'] = 'Solicitud creada con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/requests/', 'refresh');   
            }
            }
            }
        }
    }
     
 
    
    //Delete request
      function deleteRequest_made($id)
    {
        $this->db->where('request_id',$id);
        $this->db->delete('requests');
        $_SESSION['message'] = 'La solicitud fue eliminada con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/request_made/' , 'refresh');
    }
    
      //Delete All Request
    function deleteAllrequest_made()
    {
       $id = $_POST['id'];
       
        $this->db->where('request_id', $id);
        $this->db->delete('requests');
        $_SESSION['message'] = 'La solicitud fue eliminada con exito';
        $this->session->mark_as_flash('message');
     
    }
    

    function accountants($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }
        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getRows2($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'admin/accountants/';
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
        $config['prev_link'] = '
<div class="mr-2">
    
        <span href="#0" class="inline-flex items-center justify-center rounded yr vk vg bg-white xh border border-slate-200 ys xw bw">
            <span class="tc">Anterior</span><wbr />
            <svg class="on ue db" viewBox="0 0 16 16">
                <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z"></path>
            </svg>
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
        $page_data['account'] = $this->Crud->getRows2($conditions);

        $page_data['page_name']  = 'accountants';
        $page_data['page_title'] = 'Contadores';
        $this->load->view('backend/index', $page_data);
    }


    function specialists($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getRows1($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'admin/specialists/';
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
        $config['prev_link'] = '
<div class="mr-2">
    
        <span href="#0" class="inline-flex items-center justify-center rounded yr vk vg bg-white xh border border-slate-200 ys xw bw">
            <span class="tc">Anterior</span><wbr />
            <svg class="on ue db" viewBox="0 0 16 16">
                <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z"></path>
            </svg>
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
        $page_data['specialyst'] = $this->Crud->getRows1($conditions);

        $page_data['page_name']  = 'specialists';
        $page_data['page_title'] = 'Especilistas';
        $this->load->view('backend/index', $page_data);
    }


    function finance($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'finance';
        $page_data['page_title'] = 'Finanzas';
        $this->load->view('backend/index', $page_data);
    }


    function settings($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'settings';
        $page_data['page_title'] = 'Configuración';
        $this->load->view('backend/index', $page_data);
    }


    function my_profile($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'my_profile';
        $page_data['page_title'] = 'Mi perfil';
        $this->load->view('backend/index', $page_data);
    }


    function messages($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'messages';
        $page_data['page_title'] = 'Mensajes';
        $this->load->view('backend/index', $page_data);
    }


    function clients($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getPaginateclient($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'admin/clients/';
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
        $page_data['clien'] = $this->Crud->getPaginateclient($conditions);

        $page_data['page_name']  = 'clients';
        $page_data['page_title'] = 'Clientes';
        $this->load->view('backend/index', $page_data);
    }


    function search_client()
    {
        //$var = $this->input->post('search');
        //$client = $this->db->query("SELECT * FROM client first_name like '%" . $var . "%' OR last_name like '%" . $var . "%'")->result_array();
        return $this->db->query("SELECT * FROM client")->result_array();

        //echo json_encode($clientall);

    }


    function requests($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getPaginaterequest($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'admin/requests/';
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
        $page_data['reque'] = $this->Crud->getPaginaterequest($conditions);

        $page_data['page_name']  = 'requests';
        $page_data['page_title'] = 'Solicitudes';
        $this->load->view('backend/index', $page_data);
    }
    
    
    
        function request_made($param1 = '', $param2 = '')
        {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getPaginaterequest_made($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'admin/request_made/';
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
    


       function contracts($param1 = '', $param2 = '')
        {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url(), 'refresh');
        }

        $data = array();

        //get rows count
        $conditions['returnType'] = 'count';
        $totalRec = $this->Crud->getPaginatecontracts($conditions);

        //pagination config
        $config['base_url']    = base_url() . 'admin/contracts/';
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

        $page_data['page_name']  = 'contracts';
        $page_data['page_title'] = 'Contratos';
        $this->load->view('backend/index', $page_data);
    }
    
    
    function rates($param1 = '', $param2 = '')
    {
        if($this->session->userdata('admin_login') !=1){
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name'] = 'rates';
        $page_data['page_title'] = 'Tarifas';
        $this->load->view('backend/index', $page_data);
    }
    
    function delete_all_rates()
    {
         $ids = $this->input->post('ids');  
        $this->db->where_in('id', explode(",", $ids));  
        $this->db->delete('rates');
        $_SESSION['msg'] = 'Se elmino con éxito';
        $this->session->mark_as_flash('msg');
        redirect(base_url() . 'admin/rates/' , 'refresh');
    }
    
    function insert_rates()
    {
        $data = array(
            'description' => $this->input->post('description'),
            'name' => $this->input->post('name'),
            'unit' => $this->input->post('unit'),
            'coste' => $this->input->post('coste'),
            );
            $this->db->insert('rates',$data);
            $_SESSION['msg'] = 'Tarifas insertado con éxito';
            $this->session->mark_as_flash('msg');
            redirect(base_url() . 'admin/rates/', 'refresh');
    }
    
    function delete_request($id)
    {
         $data = array(
            'completion_status' =>'',
        );
       
        
        $this->db->where('client_id', $id);
        $this->db->update('clients', $data);
        $_SESSION['message'] = 'Solicitud eliminada con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/requests/', 'refresh');
    }
    
     function delete_all_requests()
    {
       $id = $_POST['id'];
       $data = array(
            'completion_status' =>'',
        );
        
        $this->db->where('client_id', $id);
        $this->db->update('clients',$data);
        $_SESSION['message'] = 'La solicitudes fueron eliminadas con exito';
        $this->session->mark_as_flash('message');
        redirect(base_url() . 'admin/requests/', 'refresh');
     
    }
    
    
    function delete_rates($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('rates');
        $_SESSION['msg'] = 'Se elmino con éxito';
        $this->session->mark_as_flash('msg');
        redirect(base_url() . 'admin/rates/' , 'refresh');
    }
    
    
    function update_rates($id)
    {
        $data = array (
            'name'=> $this->input->post('name'),
            'unit' => $this->input->post('unit'),
            'description' => $this->input->post('description'),
            'coste' => $this->input->post('coste'),
            );
            $this->db->where('id', $id);
            $this->db->update('rates',$data);
            $_SESSION['msg'] = 'Se actualizo con éxito';
            $this->session->mark_as_flash('msg');
            redirect(base_url() . 'admin/rates', 'refresh');
        
    }
    
    function insert_finance()
    {
        $data = array();
        $data['month'] = $this->input->post('month');
        $data['id_rates'] = $this->input->post('consumptio');
        $data['consumption'] = $this->input->post('consumption');
        $data['id_client'] = $this->input->post('client');
        $data['igv'] = $this->input->post('igv');
        $data['supply'] = $this->input->post('supply');
        $data['total'] = $this->input->post('total');
        $data['creation_date'] = $this->input->post('creation_date');
        $data['cancellation_date'] = $this->input->post('cancellation_date');
        $data['payment_status'] = $this->input->post('payment_status');
        $this ->db->insert('finance', $data);
        $_SESSION['msg'] = 'Se insertó con éxito';
        $this->session->mark_as_flash('msg');
        redirect(base_url() . 'admin/finance', 'refresh');
    }
     
    function update_finance($id)
    {
        $data = array();
        $data['month'] = $this->input->post('month');
        $data['consumption'] = $this->input->post('consumption');
        $data['igv'] = $this->input->post('igv');
        $data['total'] = $this->input->post('total');
        $data['creation_date'] = $this->input->post('creation_date');
        $data['payment_status'] = $this->input->post('parment_status');
        $data['cancellation_date'] = $this ->input->post('cancellation_date');
        $this->db->where('id_finance',$id);
        $this->db->update('finance',$data);
        $_SESSION['msg'] = 'Se actaulizó con éxito';
        $this->session->mark_as_flash('msg');
        redirect(base_url(). 'admin/finance','refresh');
    }
    
    function delete_finance($id)
    {
        $this->db->where('id_finance',$id);
        $this->db->delete('finance');
        $_SESSION['msg'] = 'Se eliminó con éxito';
        $this->session->mark_as_flash('msg');
        redirect(base_url(). 'admin/finance', 'refresh');
    }
    
    function export_pdf($param1 = '',$param2 = '',$param3 = '')
    {
        if($this->session->userdata('admin_login') !=1)
        {
            redirect(base_url(),'refresh');
        }
        if($param1 == 'finance')
        {
            $this->crud->downloadPDFFinance();
        }
        redirect(base_url(), 'refresh');
    }
    
    //End of Admin.php content.
    function apiDNInames($dni)
    {
        if ($dni != "") {
            # code...
            $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';

            // Iniciar llamada a API
            $curl = curl_init();

            // Buscar dni
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 2,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Referer: https://apis.net.pe/consulta-dni-api',
                    'Authorization: Bearer ' . $token
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // Datos listos para usar
            //$persona = json_decode($response);
            // $var = var_dump($persona);
            print_r($response);
            return $response;
            //return 'success';
        } else {
            return  'No DNI';
        }
    }
    
        function report()
        {
            require_once'./vendor/autoload.php';
            $html = $this->load->view('backend/admin/report.php','',true);
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();    
        }
    
}
