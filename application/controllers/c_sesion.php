<?php
class c_sesion extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function login()
    {
        $this->form_validation->set_rules('txtlogin','Usuario','required');
        $this->form_validation->set_rules('txtpass','Contraseña','required');
        $this->form_validation->set_message('required','El Campo %s esta vacio');

        $this->load->model('m_sesion','consulta');
        
        if(!isset($_POST['txtlogin']))
        {
            if($this->session->userdata('login_usu'))
            {
                $tipo_rol = $this->session->userdata('tipo_usu');
                if($tipo_rol == "ADMINISTRADOR")
                {
                    $datos['nombre'] = $this->session->userdata('nombre_usu');
                    $datos['apellido'] = $this->session->userdata('apellido_usu');
                    $this->load->view('v_cabecera_admin');
                    $this->load->view('v_administrador',$datos);
                    $this->load->view('footer');
                }
                else
                {
                    //otro usuario
                }
            }
            else
            {
                //si no existe una cuenta creada
                $this->load->view('inicio_sesion');
            }
        }
        else
        {
            if($this->form_validation->run()==FALSE)
            {
                //$this->load->view("login/form_view");
                $this->load->view('inicio_sesion');
            }
            else
            {
                $nom_usu = $_POST['txtlogin'];
                $pass_usu = $_POST['txtpass'];
                $datos['info'] = $this->consulta->datos($nom_usu,$pass_usu);

                $extraer = $this->consulta->datos($nom_usu,$pass_usu);
                $tipo = $this->consulta->getnombre_rol($this->consulta->getusuario_id($pass_usu,$nom_usu));
                $conteo = $this->consulta->conteo($nom_usu,$pass_usu);
                
                foreach ($extraer as $c)
                {
                    $nom_usu2 = $c->usuario;
                    $pass_usu2 = $c->contrasena;
                    $nombre = $c->nombres;
                    $apellido = $c->apellidos;
                }
                
                if($conteo > 0)
                {
                    if($pass_usu == $pass_usu2)
                    {
                        $arreglo = array
                        (
                            'login_usu' => $nom_usu,
                            'nombre_usu' => $nombre,
                            'apellido_usu' => $apellido,
                            'tipo_usu' => $tipo,
                            'online' => TRUE
                        );
                        $this->session->set_userdata($arreglo);
                        $tipo_rol = $this->session->userdata('tipo_usu');
                        if($tipo_rol == "ADMINISTRADOR")
                        {
                            $datos['nombre'] = $this->session->userdata('nombre_usu');
                            $datos['apellido'] = $this->session->userdata('apellido_usu');
                            $this->load->view('v_cabecera_admin');
                            $this->load->view('v_administrador',$datos);
                            $this->load->view('footer');
                        }
                        else
                        {
                            echo "Sesión iniciada por: ";
                            echo $this->session->userdata('nombre_usu');
                            $this->load->view('V_aaencabezado');
                            $this->load->view('V_MENU2usuario');
                            $this->load->view('V_zpie');
                        }
                    }
                    else
                    {
                        //$this->load->view('form_error');
                        $this->load->view('V_aaencabezado');
                        $this->load->view('V_autenticacion');
                        $this->load->view('V_zpie'); 
                    }
                }
                else
                {
                    //$data['error'] = "el usuario no existe";
                    //$this->load->view('form_view',$data);
                    $datos['mensaje'] = 1;
                    //$this->load->view('V_aaencabezado');
                    
                    //$this->load->view('V_autenticacion',$error);
                
                    //$this->load->view('V_zpie'); 
                    //$this->load->view('include/header');
                    //$this->load->view('frontpage');
                    $this->load->view('inicio_sesion',$datos);
                    //$this->load->view('include/footer');   

                }
            }
        }
    }
    
    public function index()
    {
        if($this->session->userdata('login_usu'))
        {
            if($this->session->userdata('tipo_usu') == "ADMINISTRADOR")
            {
                $datos['nombre'] = $this->session->userdata('nombre_usu');
                $datos['apellido'] = $this->session->userdata('apellido_usu');
                $datos['mensaje'] = 0;
                $this->load->view('v_cabecera_admin');
                $this->load->view('v_admin_carreras',$datos);
                $this->load->view('footer');
            }
            else
            {
                $this->load->view('inicio_sesion');
            }
                //$this->load->view("login/cerrar");
        }
        else
        {
            //$this->load->view("login/form_view");
                $this->load->view('inicio_sesion');
        }  
    }

    function logout()
    {
        if($this->session->userdata("login_usu")==TRUE)
        {
            $this->session->sess_destroy();
            $this->load->view('inicio_sesion');
        }
        else
        {
            $tipo_rol = $this->session->userdata('tipo_usu');
            if($tipo_rol == "ADMINISTRADOR")
            {
                $datos['nombre'] = $this->session->userdata('nombre_usu');
                $datos['apellido'] = $this->session->userdata('apellido_usu');
                $this->load->view('v_cabecera_admin');
                $this->load->view('v_administrador',$datos);
                $this->load->view('footer');
            }
            else
            {                
                $this->load->view('inicio_sesion');
            }
        }
    }   
}
?>
