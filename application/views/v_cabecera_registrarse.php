<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>Administrador</title>

   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
   
</head>
<script language="javascript">

    function validarDec(e) //solo valida numeros decimales con punto y backspace
    {
        var key;
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if (key < 48 || key > 57 || key == 11)
        {
            if(key == 46 || key == 8 ) // Detectar . (punto) y backspace (retroceso)
            { return true; } 
            else { return false; }
        }
        return true;
    }
    
    function validarInt(e) //valida solo numeros enteros y el backspace
    {
        var key;
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if (key < 48 || key > 57 || key == 11 || key == 22)
        {
            if(key == 8 ) // Detectar backspace (retroceso)
            { return true; } 
            else { return false; }
        }
        return true;
    }
    
    function validarAlfanumerico(e) //valida alfanumerico sin espacios ni caracteres especiales
    {
        var key;
        
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if ((key < 48 || key > 57) && (key < 65 || key > 90) && (key < 97 || key > 122))
        {
            if(key == 8  || key == 11) // Detectar backspace (retroceso)
            { return true; } 
            else { return false; }
        }
        return true;
    }

    function validarEmail(e) //valida alfanumerico sin espacios ni caracteres especiales
    {
        var key;
        
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if ((key < 48 || key > 57) && (key < 65 || key > 90) && (key < 97 || key > 122)&&(key!=64)&&(key!=45)&&(key!=46)&&(key!=95))
        {
            if(key == 8  || key == 11) // Detectar backspace (retroceso)
            { return true; } 
            else { return false; }
        }
        return true;
    }

    
    function validarSoloLetras(e) //valida alfanumerico con espacios 
    {
        var key;
        
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if ((key < 65 || key > 90) && (key < 97 || key > 122))
        {
            if(key == 8  || key == 11) // Detectar backspace (retroceso)
            { return true; } 
            else { return false; }
        }
        return true;
    }

    function validarLetras(e) //valida alfanumerico con espacios 
    {
        var key;
        
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if ((key < 65 || key > 90) && (key < 97 || key > 122) && (key != 32))
        {
            if(key == 8  || key == 11) // Detectar backspace (retroceso)
            { return true; } 
            else { return false; }
        }
        return true;
    }
    
    function validarFecha(e) //solo valida fechas en el siguiente formato 12/12/2013
    {
        var key;
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if (key < 48 || key > 57 || key == 11)
        {
            if(key == 47 || key == 8) // Detectar / 
            { return true; } 
            else { return false; }
        }
        return true;
    }

    function validarAlfanumericoGuion(e) //valida alfanumerico y el caracter guion, sin espacios 
    {
        var key;
        
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if ((key < 48 || key > 57) && (key < 65 || key > 90) && (key < 97 || key > 122) && (key != 45))
        {
            if(key == 8  || key == 11) // Detectar backspace (retroceso)
            { return true; } 
            else { return false; }
        }
        return true;
    }

    validarAlfanumericoGuionEsp

    function validarAlfanumericoGuionEsp(e) //valida alfanumerico y el caracter guion, sin espacios 
    {
        var key;
        
        if(window.event) // IE
        {
            key = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            key = e.which;
        }
        if ((key < 48 || key > 57) && (key < 65 || key > 90) && (key < 97 || key > 122) && (key != 45) && (key != 32))
        {
            if(key == 8  || key == 11) // Detectar backspace (retroceso)
            { return true; } 
            else { return false; }
        }
        return true;
    }
    function conMayusculas(field) 
    {
            field.value = field.value.toUpperCase()
    }
</script>
<body class="" style="">
	<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
         <div class="navbar-header">
            <a href="../" class="navbar-brand">AULA-VIRTUAL</a>

            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
         </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            

          </ul>


        </div>
      </div>
    </div>


    
