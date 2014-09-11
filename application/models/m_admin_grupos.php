<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

    class m_admin_grupos extends CI_Model{
		function __construct() {
        parent::__construct();  
        $this->load->helper('url');
    }



		//************************************************************//
		// consultas para la administracion de tabla DATOS PERSONALES \\
		//************************************************************//


		function registrarGrupo($nombres,$descripcion,$creador) //registro de nuevos grupos
		{                 
		    if($nombres!= "" && $descripcion!= "" && $creador!= "")
		    {
    			$datos = array();
    			$datos['nombres'] = $nombres;
    			$datos['descripcion'] = $descripcion;
    			$datos['creador'] = $creador;
    			$this->db->insert('grupo',$datos);
		        return 1;//1 registro exitoso
            }
            else
            {
                return 0;//0 registro fracasado
            }
		}
	}

?>
