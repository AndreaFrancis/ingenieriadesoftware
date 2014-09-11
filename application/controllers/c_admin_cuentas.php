<?php
class c_admin_cuentas extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        
                $datos['nombre'] = $this->session->userdata('nombre_usu');
                $datos['apellido'] = $this->session->userdata('apellido_usu');
                $datos['mensaje'] = 0;
                $this->load->view('v_cabecera_registrarse');
                $this->load->view('v_admin_cuentas',$datos);
                $this->load->view('footer');
            
    }

    public function registrar_cuentas()
    {
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $email = $_POST['txtemail'];
        $rol = "ADMINISTRADOR";
        $login = $_POST['txtlogin'];
        $password = $_POST['txtpassword'];
        $password2 = $_POST['txtpassword2'];

        if (($nombre == "")||($apellido == "")||($email == "")||($login == "")||($password == "")||($password2 == ""))
        {
            $datos['nombre'] = $this->session->userdata('nombre_usu');
            $datos['apellido'] = $this->session->userdata('apellido_usu');
            $datos['mensaje'] = 1;
            $this->load->view('v_cabecera_registrarse');
            $this->load->view('v_admin_cuentas',$datos);
            $this->load->view('footer');
        }
        else
        {
            if($password ==$password2)
            {
                $this->load->model('m_admin_cuentas','consulta');
                $verificar = $this->consulta->registrarCuenta($nombre, $apellido, $email, $rol, $login, $password);
                //function registrarCuenta($nombres,$apellidos,$ci,$extension,$direccion,$telefono,$email, $rol, $login, $password) //registro de nuevas cuentas
        
                if ($verificar == 1) 
                {
                    $datos['nombre'] = $this->session->userdata('nombre_usu');
                    $datos['apellido'] = $this->session->userdata('apellido_usu');
                    $datos['mensaje'] = 2;
                    $this->load->view('inicio_sesion');
                }
            }
            else
            {
                $datos['nombre'] = $this->session->userdata('nombre_usu');
                $datos['apellido'] = $this->session->userdata('apellido_usu');
                $datos['mensaje'] = 3;
                $this->load->view('v_cabecera_registrarse');
                $this->load->view('v_admin_cuentas',$datos);
                $this->load->view('footer');
            }
        }
    }

    public function cancelar()
    {
        $this->load->view('validacion');
    }

    
}