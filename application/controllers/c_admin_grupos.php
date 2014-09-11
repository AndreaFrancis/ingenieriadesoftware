<?php
class c_admin_grupos extends CI_Controller 
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
                $this->load->view('v_admin_grupos',$datos);
                $this->load->view('footer');
            
    }

    public function mostrar_grupos(){
        
    }

    public function crear_grupo()
    {
           $datos['nombre'] = $this->session->userdata('nombre_usu');
            $datos['apellido'] = $this->session->userdata('apellido_usu');
            $datos['mensaje'] = 1;
            $this->load->view('v_cabecera_registrarse');
            $this->load->view('v_crear_grupo',$datos);
            $this->load->view('footer');
    }


public function registrar_grupo()
    {
        $nombre = $_POST['txtnombre'];
        $descripcion = $_POST['txtdescripcion'];
        $creador = $this->session->userdata('nombre_usu');

        if (($nombre == "")||($descripcion == "")||($creador == ""))
        {
            $datos['nombre'] = $this->session->userdata('nombre_usu');
            $datos['apellido'] = $this->session->userdata('apellido_usu');
            $datos['mensaje'] = 1;
            $this->load->view('v_cabecera_registrarse');
            $this->load->view('v_crear_grupo',$datos);
            $this->load->view('footer');
        }
        else
        {
                $this->load->model('m_admin_grupos','consulta');
                $verificar = $this->consulta->registrarGrupo($nombre, $descripcion, $creador);
                if ($verificar == 1) 
                {
                    $datos['nombre'] = $this->session->userdata('nombre_usu');
                    $datos['apellido'] = $this->session->userdata('apellido_usu');
                    $datos['mensaje'] = 2;
                    $this->load->view('v_admin_grupos');
                }
            else
            {
                $datos['nombre'] = $this->session->userdata('nombre_usu');
                $datos['apellido'] = $this->session->userdata('apellido_usu');
                $datos['mensaje'] = 3;
                $this->load->view('v_cabecera_registrarse');
                $this->load->view('v_crear_grupo',$datos);
                $this->load->view('footer');
            }
        }
    }
    public function cancelar()
    {
        $this->load->view('validacion');
    }

    
}