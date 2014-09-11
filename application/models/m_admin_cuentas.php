<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

    class m_admin_cuentas extends CI_Model{
		function __construct() {
        parent::__construct();  
        $this->load->helper('url');
    }


		//***********************************************//
		// consultas para la administracion de tabla ROL \\
		//***********************************************//

		function registrarRol($nombre) //registro de nuevo rol
		{                    
		    if($nombre!= "")
		    {
				    $datos = array();
				    $datos['nombre_rol'] = $nombre;
				    $this->db->insert('ROL',$datos);
		        return 1;//1 registro exitoso
        }
        else
        {
            return 0;//0 registro fracasado
        }
		}

		function getRoles()// retorna lista de toda la tabla 'ROL'
		{
        $query = $this->db->get('ROL');
        return $query->result();
		}

		function getRol_id($id)// retorna el rol que se busca por id
		{
			$query = $this->db->where('id_rol',$id);
       		$query = $this->db->get('ROL');
       		return $query->result();
		}

		function getRol_nombre($nombre)// retorna el rol que se busca por nombre
		{
			$query = $this->db->where('nombre_rol',$nombre);
       		$query = $this->db->get('ROL');
       		return $query->result();
		}

		function editRol_nombre($nombre, $nuevo_nombre)// se realiza una edicion de rol por nombre actual 
		{   
        if($nombre != "" && $nuevo_nombre != "" )
  		 	{
          	$datos = array();
          	$datos['nombre_rol'] = $nuevo_nombre;
            $this->db->where('nombre_rol',$nombre);
  				  $this->db->update('ROL',$datos);
            return 1;//1 modificacion exitosa
        }
        else
        {
              return 0;//0 modificacion fracasada
        }
		}

    function editRol_id($nuevo_nombre, $id)// se realiza una edicion de rol por id  
    {   
        if($nombre != "" && $id != "" )
        {
            $datos = array();
            $datos['nombre_rol'] = $nuevo_nombre;
            $this->db->where('id_rol',$id);
            $this->db->update('ROL',$datos);
            return 1;//1 modificacion exitosa
        }
        else
        {
            return 0;//0 modificacion fracasada
        }
    }

    function delRol_nombre($nombre)// elimina la cuenta por nombre de usuario
    {
        if($nombre != "") 
        {
            $query = $this->db->where('nombre_rol',$nombre);
            $query = $this->db->delete('ROL');
            return 1;
        }
        else
        {
            return 0;           
        }
    }

    function delRol_id($id)// elimina la cuenta por id
    {
        if($id != "") 
        {
            $query = $this->db->where('id_rol',$id);
            $query = $this->db->delete('ROL');
            return 1;
        }
        else
        {
            return 0;           
        }
    }

    /*function editRol_nombre($nombre, $nuevo_nombre)// se realiza una edicion de nombre de rol. Con referencia el nombre actual 
    {   
          if($nuevo_nombre != "" && $nombre != "")
          {
              $datos=array();
              $datos['nombre_rol']=$nuevo_nombre;
              $this->db->where('nombre_rol',$nombre);
              $this->db->update('ROL',$datos);
              return 1;//1 modificacion exitosa
          }
          else
          {
              return 0;//0 modificacion fracasada
          }
    }  

    function editRol_id($id, $nuevo_nombre)// se realiza una edicion de nombre de rol. Con referencia el id 
    {   
          if($nuevo_nombre != "" && $id != "")
          {
              $datos=array();
              $datos['nombre_rol']=$nuevo_nombre;
              $this->db->where('id_rol',$id);
              $this->db->update('ROL',$datos);
              return 1;//1 modificacion exitosa
          }
          else
          {
              return 0;//0 modificacion fracasada
          }
    }

    function existeRol_nombre($nombre)// retorna 1 si el rol buscado existe y 0 si no existe. Busqueda por nombre de rol
    {
        $query = $this->db->where('nombre_rol',$nombre);
        $query = $this->db->get('ROL');
        if($query ->num_rows() > 0)
        {
            return(1);//existe el rol
        }
        else
        {
            return(0);//no existe el rol
        }
    }
                
    function existeRol_id($id)//retorna 1 si el usuario buscado existe y 0 si no existe. Busqueda por nombre de id
    {
        $query = $this->db->where('id_rol',$id);
        $query = $this->db->get('ROL');
        if($query ->num_rows() > 0)
        {
            return(1);//existe el rol
        }
        else
        {
            return(0);//no existe el rol
        }
    }
                
    function conteo_roles($nombre) //Retorna la cantidad de roles registrados
    {
        $query = $this->db->where('nombre_rol',$nombre);
        $query = $this->db->get('ROL');                    
        return $query->num_rows();
    }**/

    function obtenerIdRol($rol)// a partir del rol
    {
        $id=0;
        $query = $this->db->select('id_rol');
        $query = $this->db->where('nombre_rol',$rol);
        $query = $this->db->get('ROL');
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

		//************************************************************//
		// consultas para la administracion de tabla DATOS PERSONALES \\
		//************************************************************//

		function registrarCuenta($nombres,$apellidos,$email, $rol, $login, $password) //registro de nuevas cuentas
		{                 
            $id=$this->obtenerIdRol($rol);   
		    if($nombres!= "" && $apellidos!= "" && $email!= ""  && $rol!= '0' && $login!= "" && $password!= "")
		    {
    			$datos = array();
    			$datos['nombres'] = $nombres;
    			$datos['apellidos'] = $apellidos;
    			$datos['email'] = $email;
    			$datos['id_rol'] = $id;
    			$datos['usuario'] = $login;
    			$datos['contrasena'] = $password;
    			$this->db->insert('DATOS_PERSONALES',$datos);
		        return 1;//1 registro exitoso
            }
            else
            {
                return 0;//0 registro fracasado
            }
		}

		function getCuenta()// retorna lista de todas las cuentas
		{
			$query = $this->db->get('DATOS_PERSONALES');
            return $query->result();
		}

		function getCuenta_id($id)// retorna la cuenta que se busca por id
		{
			$query = $this->db->where('id_datospersonales',$id);
       		$query = $this->db->get('DATOS_PERSONALES');
       		return $query->result();
		}

		function getCuenta_ci($ci)// retorna la cuenta  que se busca por ci
		{
			$query = $this->db->where('ci',$ci);
       		$query = $this->db->get('DATOS_PERSONALES');
       		return $query->result();
		}
                
    function getCuenta_nombre($login, $password)// retorna el nombre completo de la cuenta por login y password
    {
        $nombre="";
        $query = $this->db->select('nombre');
        $query = $this->db->where('usuario',$login);
		    $query = $this->db->where('contrasena',$password);
        $query = $this->db->get('DATOS_PERSONALES');
        $a=$query->result_array();
        foreach($a as $c => $v)
        {
            foreach($v as $cl => $va)
            {
                $nombre=$va;
            }
        }

        $apellido="";
        $query = $this->db->select('apellidos');
        $query = $this->db->where('usuario',$login);
		    $query = $this->db->where('contrasena',$password);
        $query = $this->db->get('DATOS_PERSONALES');
        $a=$query->result_array();
        foreach($a as $c => $v)
        {
           	foreach($v as $cl => $va)
               	{
                   	$apellido=$va;
             	  }
        }
        return $nombre." ".$apellido;
    }

		function getCuenta_usuario($login)// retorna la cuenta que se busca por nombre de usuario
		{
        $query = $this->db->where('usuario',$login);
        $query = $this->db->get('DATOS_PERSONALES');
        return $query->result();
		}

		function delCuenta_usuario($login)// elimina la cuenta por nombre de usuario
		{
            if($login != "") 
            {
                $query = $this->db->where('usuario',$login);
                $query = $this->db->delete('DATOS_PERSONALES');
                return 1;
            }
            else
            {
                return 0;
            }
    		}

    		function delCuenta_id($id)// elimina la cuenta por id
    		{
    		    if($id != "")
    		    {
    		        $query = $this->db->where('id_datospersonales',$id);
                $query = $this->db->delete('DATOS_PERSONALES');
                return 1;
            }
            else
            {
                return 0;
            }
		}

		function delCuenta_ci($ci)// elimina la cuenta por ci
		{
            if($ci != "")
            {
                $query = $this->db->where('ci',$ci);
                $query = $this->db->delete('DATOS_PERSONALES');
                return 1;
            }
            else
            {
                return 0;
            }
		}

		function editPassword($login, $password)// se realiza una edicion de contrasena por nombre de usuario(login) 
		{   
        	if($login != "" && $password != "")
		 	    {
        		  $datos=array();
        		  $datos['contrasena']=$password;
              $this->db->where('usuario',$login);
				      $this->db->update('DATOS_PERSONALES',$datos);
              return 1;//1 modificacion exitosa
         	}
          else
          {
              return 0;//0 modificacion fracasada
          }
		}

		function editCuenta($nombre, $apellidos, $ci, $extension, $direccion, $telefono, $email, $estado, $rol, $login, $password) // Modificacion de toda la cuenta 
		{
          if($nombre != "" && $apellidos != "" && $ci != "" && $extension != "" && $direccion != "" && $telefono != "" && $email != "" && $estado != ""  && $rol != '0' && $login != "" && $password != "")
		 	    {
        		  $datos=array();
              $datos['nombres']=$nombre;
              $datos['apellidos']=$apellidos;
              $datos['ci']=$ci;
              $datos['extension_ci']=$extension;
              $datos['direccion']=$direccion;
              $datos['telefono']=$telefono;
              $datos['email']=$email;
              $datos['estado_laboral']=$estado;
              $datos['id_rol']=$rol;
              $this->db->where('usuario',$login);
              $this->db->where('contrasena',$password);
              $this->db->update('DATOS_PERSONALES',$datos);
              return 1;//1 modificacion exitosa
          }
              else
          {
              return 0;//0 modificacion fracasada
          }
		}
                
    function existeCuenta_login($login)// retorna 1 si el usuario buscado existe y 0 si no existe. Busqueda por nombre de usuario
    {
        $query = $this->db->where('usuario',$login);
        $query = $this->db->get('DATOS_PERSONALES');
        if($query ->num_rows() > 0)
        {
            return(1);//existe el usuario
        }
        else
        {
            return(0);//no existe el usuario
        }
    }
                
    function existeCuenta_password($password)//retorna 1 si el usuario buscado existe y 0 si no existe. Busqueda por nombre de contrasena
    {
        $query = $this->db->where('contrasena',$password);
        $query = $this->db->get('DATOS_PERSONALES');
        if($query ->num_rows() > 0)
        {
            return(1);//existe el usuario
        }
        else
        {
            return(0);//no existe el usuario
        }
    }
                
    function conteo_cuentas($login,$password) //Retorna la cantidad de cuentas registradas
    {
        $query = $this->db->where('usuario',$login);
        $query = $this->db->where('contrasena',$password);
        $query = $this->db->get('DATOS_PERSONALES');                    
        return $query->num_rows();
    }
                
    function datos($login,$password)
    {
        $query = $this->db->where('usuario',$login);
        $query = $this->db->where('contrasena',$password);
        $query = $this->db->get('DATOS_PERSONALES');                    
        return $query->result();
    }

    //***********************************************************//
    // consultas para la administracion de tabla HISTORIAL_DATOS \\
    //***********************************************************//

    function registrarHistorial($id_datos, $fecha ,$accion) //registro de nuevo historial
    {                    
        if($id_datos!= "" && $fecha!= "" && $accion!= "")
        {
            $datos = array();
            $datos['id_datospersonales'] = $id_datos;
            $datos['fecha'] = $fecha;
            $datos['accion'] = $accion;
            $this->db->insert('HISTORIAL_DATOS',$datos);
            return 1;//1 registro exitoso
        }
        else
        {
            return 0;//0 registro fracasado
        }
    }

    function getHistorial()// retorna lista de toda la tabla HISTORIAL
    {
        $query = $this->db->get('HISTORIAL_DATOS');
        return $query->result();
    }

    function getHistorial_id($id)// retorna el historial que se busca por id
    {
        $query = $this->db->where('id_historial',$id);
        $query = $this->db->get('HISTORIAL_DATOS');
        return $query->result();
    }

    function getHistorial_cuenta($id_datos)// retorna el historial  que se busca por id_datos_personales
    {
        $query = $this->db->where('id_datospersonales',$id_datos);
        $query = $this->db->get('HISTORIAL_DATOS');
        return $query->result();
    }
                
    function getHistorial_fecha($fecha)// realiza una busqueda de historiales por fecha
    {
        $query = $this->db->where('fecha',$fecha);
        $query = $this->db->get('HISTORIAL_DATOS');
        return $query->result();
    }

    function getHistorial_accion($accion)// retorna el historial que se busca por accion
    {
        $query = $this->db->where('accion',$accion);
        $query = $this->db->get('HISTORIAL_DATOS');
        return $query->result();
    }
                
    function existeHistorial_cuenta($id_datos)// retorna 1 si el historial buscado existe y 0 si no existe. Busqueda por id_datospersonales
    {
        $query = $this->db->where('id_datospersonales',$id_datos);
        $query = $this->db->get('HISTORIAL_DATOS');
        if($query ->num_rows() > 0)
        {
            return(1);//existe el usuario
        }
        else
        {
            return(0);//no existe el usuario
        }
    }
                
    function existeHistorial_fecha($fecha)// retorna 1 si el historial buscado existe y 0 si no existe. Busqueda por fecha
    {
        $query = $this->db->where('fecha',$fecha);
        $query = $this->db->get('HISTORIAL_DATOS');
        if($query ->num_rows() > 0)
        {
            return(1);//existe el usuario
        }
        else
        {
            return(0);//no existe el usuario
        }
    }
     
    function existeHistorial_accion($accion)// retorna 1 si el historial buscado existe y 0 si no existe. Busqueda por accion
    {
        $query = $this->db->where('accion',$accion);
        $query = $this->db->get('HISTORIAL_DATOS');
        if($query ->num_rows() > 0)
        {
            return(1);//existe el usuario
        }
        else
        {
            return(0);//no existe el usuario
        }
    }

    function conteo_historiales($id_datos, $fecha, $accion) //Retorna la cantidad de historiales registrados
    {
        $query = $this->db->where('id_datospersonales',$id_datos);
        $query = $this->db->where('fecha',$fecha);
        $query = $this->db->where('accion',$accion);
        $query = $this->db->get('HISTORIAL_DATOS');                    
        return $query->num_rows();
    }

	
	}

?>
