<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

    class M_sesion extends CI_Model
    {
     
        public function __construct()
        {
        $this->load->library('session');
        $this->load->database();
        }
        
        public function get_existe_usuario($login, $password)
        {
            $query = $this->db->where('usuario',$login);
            $query = $this->db->where('contrasena',$password);
            $query = $this->db->get('DATOS_PERSONALES');
            if($query ->num_rows() > 0)
            {
                    return(1);//existe la marca
            }
            else
            {
                    return(0);//no existe la marca
            }
        }

        function getusuario_nombre($pass,$login)
        {
            $nombre="";
            $query = $this->db->select('nombres');
            $query = $this->db->where('usuario',$login);
            $query = $this->db->where('contrasena',$pass);
            $query = $this->db->get('DATOS_PERSONALES');
            $a=$query->result_array();
            foreach($a as $c => $v)
            {
                foreach($v as $cl => $va)
                {
                    $nombre=$va;
                }
            }
            return $nombre;
        }

        function datos($usuario,$pass)
        {
            $query = $this->db->where('usuario',$usuario);
            $query = $this->db->where('contrasena',$pass);
            $query = $this->db->get('DATOS_PERSONALES');                    
            return $query->result();
        }
                
        function conteo($usuario,$pass)
        {
            $query = $this->db->where('usuario',$usuario);
            $query = $this->db->where('contrasena',$pass);
            $query = $this->db->get('DATOS_PERSONALES');                    
            return $query->num_rows();
        }

        function getusuario_id($pass,$login)
        {
            $id="";
            $query = $this->db->select('id_rol');
            $query = $this->db->where('usuario',$login);
            $query = $this->db->where('contrasena',$pass);
            $query = $this->db->get('DATOS_PERSONALES');
            $a=$query->result_array();
            foreach($a as $c => $v)
            {
                foreach($v as $cl => $va)
                 {
                        $id=$va;
                 }
            }
            return $id;
        }

        function getnombre_rol($rol)
        {
            $rol_u="";
            $query = $this->db->select('nombre_rol');
            $query = $this->db->where('id_rol',$rol);
            $query = $this->db->get('ROL');
            $a=$query->result_array();
            foreach($a as $c => $v)
            {
                foreach($v as $cl => $va)
                 {
                        $rol_u=$va;
                 }
            }
            return $rol_u;
        }

        public function getLogin($username,$password)
        {
        //comprobamos que el nombre de usuario y contraseña coinciden
        $data = array(
        'usuario' => $username,
        'contrasena' => $password
        );
       
        $query = $this->db->get_where('DATOS_PERSONALES',$data);
        return $query->result_array();
        }
       
       
        public function isLogged()
        {
        //Comprobamos si existe la variable de sesión username. En caso de no existir, le impediremos el paso a la página para usuarios registrados
       
            if(isset($this->session->userdata['username']))
            {
            return TRUE;
            }
            else
            {
            return FALSE;
            }
           
        }
       
       
       
        public function close()
        {
        //cerrar sesión
        return $this->session->sess_destroy();
        }
    }
?>
