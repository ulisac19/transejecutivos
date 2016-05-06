<?php require_once('../../Connections/conexion.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "pax";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_usuario = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usuario = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexion, $conexion);
$query_usuario = sprintf("SELECT * FROM `admin` WHERE usuario = %s", GetSQLValueString($colname_usuario, "text"));
$usuario = mysql_query($query_usuario, $conexion) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);

$colname_referencia = "-1";
if (isset($_GET['r'])) {
  $colname_referencia = $_GET['r'];
}
mysql_select_db($database_conexion, $conexion);
$query_referencia = sprintf("SELECT * FROM orden WHERE referencia = %s", GetSQLValueString($colname_referencia, "text"));
$referencia = mysql_query($query_referencia, $conexion) or die(mysql_error());
$row_referencia = mysql_fetch_assoc($referencia);
$totalRows_referencia = mysql_num_rows($referencia);

mysql_select_db($database_conexion, $conexion);
$query_pax = "SELECT * FROM pasajeros";
$pax = mysql_query($query_pax, $conexion) or die(mysql_error());
$row_pax = mysql_fetch_assoc($pax);
$totalRows_pax = mysql_num_rows($pax);

mysql_select_db($database_conexion, $conexion);
$query_tipo_vehiculo = "SELECT * FROM tipo_vehiculo";
$tipo_vehiculo = mysql_query($query_tipo_vehiculo, $conexion) or die(mysql_error());
$row_tipo_vehiculo = mysql_fetch_assoc($tipo_vehiculo);
$totalRows_tipo_vehiculo = mysql_num_rows($tipo_vehiculo);

mysql_select_db($database_conexion, $conexion);
$query_tipo_servicio = "SELECT * FROM tipo_servicio";
$tipo_servicio = mysql_query($query_tipo_servicio, $conexion) or die(mysql_error());
$row_tipo_servicio = mysql_fetch_assoc($tipo_servicio);
$totalRows_tipo_servicio = mysql_num_rows($tipo_servicio);

$colname_empresa = "-1";
$colname_empresa = $row_usuario['empresa'];
mysql_select_db($database_conexion, $conexion);
$query_empresa = sprintf("SELECT * FROM empresas2 WHERE nombre_empresa = %s", GetSQLValueString($colname_empresa, "text"));
$empresa = mysql_query($query_empresa, $conexion) or die(mysql_error());
$row_empresa = mysql_fetch_assoc($empresa);
$totalRows_empresa = mysql_num_rows($empresa);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "pax")) {

  $array = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$fecha = explode(" ", $_POST['fecha_s']);
$fecha_hora = explode("-", $fecha[1]);

$i = 0;

foreach ($array as $item) 
{
  if( $item == $fecha_hora[1] )
  {
    $mes = $i;
  }
  $i++;
}

$hora = explode(":", $_POST["hora_s"]);
if(($mes+1) == 1){$cad_mes = "01";}
if(($mes+1) == 2){$cad_mes = "02";}
if(($mes+1) == 3){$cad_mes = "03";}
if(($mes+1) == 4){$cad_mes = "04";}
if(($mes+1) == 5){$cad_mes = "05";}
if(($mes+1) == 6){$cad_mes = "06";}
if(($mes+1) == 7){$cad_mes = "07";}
if(($mes+1) == 8){$cad_mes = "08";}
if(($mes+1) == 9){$cad_mes = "09";}
if(($mes+1) == 10){$cad_mes = "10";}
if(($mes+1) == 11){$cad_mes = "11";}
if(($mes+1) == 12){$cad_mes = "12";}

$fecha_sql = $cad_mes."/".$fecha_hora[0]."/".$fecha_hora[2];

	if($hora[0] > 0 && $hora[0] < 10 )
	{
		$hora1 = "0".$hora[0];
	}else{
		$hora1 = $hora[0];
	}
	 
	$orden3 = mysql_fetch_array(mysql_query("SELECT obaservaciones FROM orden WHERE referencia = '".$_POST['referencia']."'", $conexion));
	 
	 
	//-----------------------------------------------------------------------------------------------------------
		
								$dia_de_la_semana = date('N', mktime(0,0,0,$cad_mes, $fecha_hora[0], $fecha_hora[2]));
								$hora_actua_militar = $hora1;
								$bandera = 1;
								$fecha_s = explode("/", $fecha_sql);
								$mes = $fecha_s[0];
								$dia = $fecha_s[1];
								$anho = $fecha_s[2];
								$mktime_orden = mktime($hora1, $hora[1],0 , $cad_mes, $fecha_hora[0], $fecha_hora[2]);
								$mktime_actual = mktime(date('G'),date('i'),0,date('m'),date('d'),date('Y'));
								$diferencia_tiempo =  $mktime_orden - $mktime_actual;
								
								// de Lunes a Viernes de 7 Am a 7 PM: 	No pueden cambiar  cualquier dato para servicios con menos de 4 horas
								if($dia_de_la_semana < 6 && $hora_actua_militar > 6 && $hora_actua_militar < 20  )
								{
									if($diferencia_tiempo < (60 * 60 * 4))
									{
										$bandera = 2; 
										$cad_error = 1;
										
									}else{
										$bandera = 1; 
									}
								}
								
								
								// De lunes a viernes de 7 PM a 7AM: 	Pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM 
								if($dia_de_la_semana < 6 && ($hora_actua_militar > 19 || $hora_actua_militar < 7))
								{
									if($hora1 > 10)
									{
										$bandera = 1;
									}else{
										$bandera = 2;
										$cad_error = 2;
									}
								}

								// de Sabados de 7 Am a 4 PM Pueden cambiar  cualquier dato para servicios con mas de 4 horas
								if($dia_de_la_semana == 6 && $hora_actua_militar > 6 && $hora_actua_militar < 17)
								{
									if($diferencia_tiempo < (60 * 60 * 4))
									{
										$bandera = 2;
										$cad_error = "De sabados de 7 Am a 4 PM pueden cambiar cualquier dato para servicios con mas de 4 horas";
									}else{
										$bandera = 1;
									}
								}
							
								// de Sabados de 4 PM  a Domingo 8AM: 	Pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM 
								if( ($dia_de_la_semana == 6 && $hora_actua_militar > 16) || ($dia_de_la_semana == 7 && $hora_actua_militar < 9 ) )
								{
									if($hora1 > 10)
									{
										$bandera = 1;
									}else{
										$bandera = 2;
										$cad_error = 3;
									}
								}
								
								// Domingos de 8AM 8:00PM: Pueden cambiar  cualquier dato para servicios con mas  de 6 horas
								if($dia_de_la_semana == 7 && $hora_actua_militar > 7 && $hora_actua_militar < 20 )
								{
									if($diferencia_tiempo < (60 * 60 * 6))
									{
										$bandera = 2;
										$cad_error = 4;
									}else{
										$bandera = 1;
									}
								}
								
								// Domingos de 8PM Luenes 7 AM pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM 
								if( ($dia_de_la_semana == 7 && $hora_actua_militar > 19) || ($dia_de_la_semana == 1 && $hora_actua_militar <  7) )
								{
									if($hora1 > 10)
									{
										$bandera = 1;
									}else{
										$bandera = 2;
										$cad_error = 5;
									}
								}
	//-----------------------------------------------------------------------------------------------------------
				if($bandera == 2)
				{
					header('Location: editar.php?error3='.$cad_error.'&r='.$_POST['referencia']);
				}else{
	 
	 
	 
	 if($_POST['obaservaciones'] != "")
	 {
		 $obs = $orden3["obaservaciones"].".El pasajero «".$row_usuario["nombre"]." ".$row_usuario["apellido"]."» añadio :	".$_POST['obaservaciones'];
	 }else{
		 $obs = $orden3["obaservaciones"];
	 }
	 
	 
		 $updateSQL = sprintf("UPDATE orden SET fecha_s=%s, hora_s1=%s, hora_s2=%s, tipo_s=%s,  ciudad_inicio=%s, dir_origen=%s, dir_destino=%s, aerolinea=%s, vuelo=%s, ciudad_destino=%s, obaservaciones=%s,  editado_por=%s, editado_por_fecha=%s WHERE referencia=%s",
							   
							   GetSQLValueString($fecha_sql, "text"),
							   GetSQLValueString($hora1, "text"),
							   GetSQLValueString($hora[1], "text"),
							   GetSQLValueString($_POST['tipo_s'], "text"),
							   GetSQLValueString($_POST['ciudad_inicio'], "text"),
							   GetSQLValueString($_POST['dir_origen'], "text"),
							   GetSQLValueString($_POST['dir_destino'], "text"),
							   GetSQLValueString($_POST['aerolinea'], "text"),
							   GetSQLValueString($_POST['vuelo'], "text"),
							   GetSQLValueString($_POST['ciudad_destino'], "text"),
							   GetSQLValueString($obs, "text"),
							   GetSQLValueString($_POST['editado_por'], "text"),
							   GetSQLValueString($_POST['editado_por_fecha'], "text"),

							   GetSQLValueString($_POST['referencia'], "text"));

		  mysql_select_db($database_conexion, $conexion);
		  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
		  mysql_query("INSERT INTO log(fecha_hora, usuario, accion, valor, tabla) VALUES ('".date('Y-m-d H:i:s')."', ".$row_usuario["id"].",2,'".$_POST['referencia']."','orden')", $conexion);
		 
		  $updateGoTo = "../../app/correoPHP_orden4.php?back=p&correccion=*** C A M B I O  P O R   E L  C L I E N T E *** por ".$_POST['elaboradopor2']." &codigo=".$_POST['referencia']."&mail=info@transportesejecutivos.com&mail2=".$_POST['elaboradopor3']."&proceso=999";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
			$updateGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $updateGoTo));
  
		}
}



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "referencia")) {

$colname_ver = $_POST['referencia'];
mysql_select_db($database_conexion, $conexion);
$query_verifica = "SELECT referencia FROM orden WHERE referencia = '$colname_ver'";
$verifica = mysql_query($query_verifica, $conexion) or die('Falló: ');
$row_verifica = mysql_fetch_assoc($verifica);
$este = $row_verifica['referencia'];

if((isset($este))&&($este)==($colname_ver)){
  $insertGoTo = "crear.php?task=".$_POST['referencia'];
  header(sprintf("Location: %s", $insertGoTo));
}else{

//inserto la ref en tabla de productos
  $insertSQL = sprintf("INSERT INTO orden(referencia) VALUES (%s)",
                       GetSQLValueString($_POST['referencia'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  


  $insertGoTo = "crear2.php?r=".$_POST['referencia'];
  header(sprintf("Location: %s", $insertGoTo));
}}



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form5") && $_POST["pax_agg"] != "-1" ) {
  $insertSQL = sprintf("INSERT INTO paxorden (pax, orden, estado, observaciones, creada, fecha) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['pax_agg'], "text"),
                       GetSQLValueString($_POST['orden'], "text"),
                       GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['observaciones'], "text"),
                       GetSQLValueString($_POST['creada'], "text"),
                       GetSQLValueString($_POST['fecha'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
 

	$query1 = mysql_query("SELECT count(*) FROM `paxorden` WHERE  orden = '".$_POST['orden']."' AND estado = 'activo' AND pax <> '-1'", $conexion);
	$arr = mysql_fetch_array($query1);
 
$query3 = mysql_query("SELECT * FROM orden WHERE referencia = '".$_POST['orden']."'", $conexion);
$orden2 = mysql_fetch_array($query3);
$edit_by = $orden2["editado_por"];

if(date('g') == date('h'))
{
	$mer = " am";
}else{
	$mer = " pm";
}


$cad = "[".$row_usuario["nombre"]." ".$row_usuario["apellido"]."(P+):".date('F')." ".date('d').", ".date('Y').", ".date('h').":".date('i').$mer."]";
/*  cant_pax = '".$arr[0]."' ,  */
mysql_query("UPDATE orden SET  editado_por = '".$edit_by.$cad."' WHERE referencia = '".$_POST['orden']."'", $conexion);
  header("Location: editar.php?pax=agregado&r=".$_POST['orden']);

  $insertGoTo = "editar.php?pax=agregado";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}




?>
<!DOCTYPE HTML>
<html lang="en-gb" dir="ltr">

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Editar Orden - TransportesEjecutivos.com</title>
  <link href="../favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <!--=================================================-->

  <!--Open Sans Font [ OPTIONAL ] -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


  <!--Bootstrap Stylesheet [ REQUIRED ]-->
  <link href="../../admin/nuevo_admin_2015/template/css/bootstrap.min.css" rel="stylesheet">


  <!--Nifty Stylesheet [ REQUIRED ]-->
  <link href="../../admin/nuevo_admin_2015/template/css/nifty.min.css" rel="stylesheet">

  
  <!--Font Awesome [ OPTIONAL ]-->
  <link href="../../admin/nuevo_admin_2015/template/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


  <!--Switchery [ OPTIONAL ]-->
  <link href="../../admin/nuevo_admin_2015/template/plugins/switchery/switchery.min.css" rel="stylesheet">


  <!--Bootstrap Select [ OPTIONAL ]-->
  <link href="../../admin/nuevo_admin_2015/template/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">


  <!--Bootstrap Validator [ OPTIONAL ]-->
  <link href="../../admin/nuevo_admin_2015/template/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">


  <!--Demo [ DEMONSTRATION ]-->
  <link href="../../admin/nuevo_admin_2015/template/css/demo/nifty-demo.min.css" rel="stylesheet">


  <!--Bootstrap Datepicker [ OPTIONAL ]-->
  <link href="../../admin/nuevo_admin_2015/template/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">

  <!--Bootstrap Timepicker [ OPTIONAL ]-->
  <link href="../../admin/nuevo_admin_2015/template/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

  <!--Chosen [ OPTIONAL ]-->
  <link href="../../admin/chosen_v1_4_2/chosen.min.css" rel="stylesheet">
  
   <!--Page Load Progress Bar [ OPTIONAL ]-->
  <link href="../../admin/nuevo_admin_2015/template/plugins/pace/pace.min.css" rel="stylesheet">
  <script src="../../admin/nuevo_admin_2015/template/plugins/pace/pace.min.js"></script>

<style>
input{
	border:none;
	cursor:pointer;
}
</style>

</head>

<body>
<div id="container" class="effect mainnav-sm">
    
    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
      <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
          <a href="http://www.transportesejecutivos.com/pasajeros/main.php" class="navbar-brand">
            <img src="http://www.transportesejecutivos.com/admin/nuevo_admin_2015/template/img/logo.png" alt="Nifty Logo" class="brand-icon">
            <div class="brand-title">
              <span class="brand-text">Pasajero</span>
            </div>
          </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">
          <ul class="nav navbar-top-links pull-left">

            <!--Navigation toogle button-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <li class="tgl-menu-btn">
              <a class="mainnav-toggle" href="#">
                <i class="fa fa-navicon fa-lg"></i>
              </a>
            </li>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End Navigation toogle button-->
	   <?php $back = "ordenes/editar.php?r=".$_GET["r"]."&"; ?>

          </ul>
          <ul class="nav navbar-top-links pull-right">

        

            <!--User dropdown-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <? 
      define('__ROOT__', dirname(dirname(__FILE__))); 
      require_once('../lib_php/usuario.php'); 
      ?>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End user dropdown-->

          </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

      </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">
        <div id="content-container">
        
        
          <!--CONTENT CONTAINER-->
      <!--===================================================-->
      
                        
        
        <!--Barra del titulo y navegacion y buscar orden exacta -->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
          <h5 class="page-header text-overflow">Editar orden: <span class="btn btn-dark"><?php echo $row_referencia['referencia']; ?></span><?php 
												$vector = explode("-", $_GET["r"]);
												mysql_select_db($database_conexion, $conexion);
												$sql = sprintf("SELECT * FROM orden WHERE  referencia <> '%s' AND referencia LIKE '%s'", mysql_real_escape_string($_GET["r"]), mysql_real_escape_string($vector[0]."%"));

												$query = mysql_query($sql, $conexion) or die(mysql_error()); 
												$numero = mysql_num_rows($query);
												if($numero > 0)
												{
												?>
												
														<?php 
														while( $info = mysql_fetch_array($query) ) {
															$query_elaborado = sprintf("SELECT * FROM pasajeros WHERE codigo = '%s'", mysql_real_escape_string($info['persona_origen']));
															$elaborado = mysql_query($query_elaborado, $conexion) or die(mysql_error());
															$row_elaborado = mysql_fetch_array($elaborado);
														?>
														<a title="Ir a Orden: <?= $info["referencia"] ?>" href="detalle.php?r=<?= $info["referencia"] ?>" target="_blank"><span class="btn btn-success"><?= $info["referencia"] ?></span></a>													
														<?php } ?>
												
													<?php } else{ ?>
												
												
													<span class="btn btn-warning">
														<strong>0 sub-ordenes</strong> Esta orden no tiene sub-ordenes.
													</span>
										
												<?php } ?>	</h5>
														
                    

        <ol class="breadcrumb">
          <li><a href="http://www.transportesejecutivos.com/pasajeros/main.php">Inicio</a></li>
             
          <li><a href="http://www.transportesejecutivos.com/pasajeros/ordenes/informes.php">Ordenes</a></li>
          <li class="active">Editar Orden</li>
        </ol>

      <div id="page-content">
          <div class="panel">
                
<!-- ------------------------------------------------------------------------------------------------------------ -->
<!--HORARIO HABIL -->
<?
/*
//hora actual
$hora_actual = date("H");
//$hora_actual = 21;
//convierte en entero
$hora_actual = (int)$hora_actual;
// echo "Hora Actual: ".$hora_actual."<br>";
//dia actual
$dia_actual = date("l");
//$dia_actual = "Sunday";
// echo "Dia Actual: ".$dia_actual."<br>";
?>

<!--SENTENCIA SI ES MAYOR Q 6 y MENOR Q 20 -->
<?
//sentencia

if ($hora_actual < 20 && $hora_actual > 6 && $dia_actual != "Sunday") {  

?>

                                    
<!--FECHA Y HORA DE LA ORDEN -->
<? 
// Creamos variable con la fecha y hora de la orden en alfanumerico
$fyh = $row_referencia['fecha_s']." ".$row_referencia['hora_s1'].":".$row_referencia['hora_s2'];
// echo "<br>Fecha y Hora de la orden: ".$fyh;
// Convertimos en hora Linux la Variable $fyh
$fyh = strtotime($fyh);
// echo "<br>Fecha y Hora de la orden en Linux: ".$fyh;
?>
<!--FECHA Y HORA ACTUAL y MENOS 3 HORAS -->
<?
// Variable de hora linux actual
$ya = time (); 
// echo "<br>Fecha y Hora actual EN LINUX: ".$ya;
// Variable de hora linux hace 3 horas
$hace3horas = time () - (1 * 3 * 60 * 60); 
// echo "<br>Fecha y Hora, hace 3 horas: ".$hace3horas;
?>
<!--DIFERENCIA DE HORAS -->
<?
// Resta de Horas linux actaul y hace 3 horas
$diferencia = $ya - $hace3horas;
// echo "<br>Diferencia en Linux minima: ".$diferencia;
// Resta de Horas linux hace 3 horas y la de la orden
$diferencia2 =  $fyh - $ya;
// echo "<br>Diferencia en Linux de la orden a YA: ".$diferencia2;
?>
<!--VALIDA SI ES POSIBLE EDITAR SI LA DIFERENCIA ES MAYOR A 10800 LINUX -->
<?
// Sentencia si es mayor la diferencia actual (2) con la optima
if ($diferencia2 > $diferencia) { ?>
<!--BOTON HABILIDADO                                     
<input name="Submit" type="submit" class="button-primary" value="CLIC PARA APLICAR LOS CAMBIOS EN LA ORDEN" />
--><?php $bandera = 1; }else{ ?>
<!--BOTON DES HABILIDADO                                     
<input class="button-primary" value="ORDEN NO EDITABLE" /><br>
La orden no se puede editar porque el limite de tiempo ha superado las 3 horas antes de la hora programada para el servicio, por favor cree una <a href="crear.php">Nueva Orden dando CLic Aquí</a>.
-->
<?php $bandera = 2; } ?>

<?php
//echo "Hora HABIL<br>";
}  */ ?>
								<?php 
								$dia_de_la_semana = date('N');
								$hora_actua_militar = date('G');
								$bandera = 1;
								$fecha_s = explode("/", $row_referencia["fecha_s"]);
								$mes = $fecha_s[0];
								$dia = $fecha_s[1];
								$anho = $fecha_s[2];
								$mktime_orden = mktime($row_referencia["hora_s1"], $row_referencia["hora_s2"],0 , $mes, $dia, $anho);
								$mktime_actual = mktime(date('G'),date('i'),0,date('m'),date('d'),date('Y'));
								$diferencia_tiempo =  $mktime_orden - $mktime_actual;
								
								// de Lunes a Viernes de 7 Am a 7 PM: 	No pueden cambiar  cualquier dato para servicios con menos de 4 horas
								if($dia_de_la_semana < 6 && $hora_actua_militar > 6 && $hora_actua_militar < 20  )
								{
									if($diferencia_tiempo < (60 * 60 * 4))
									{
										$bandera = 2; 
										$cad_error = "Lunes a Viernes de 7 Am a 7 PM no pueden cambiar  cualquier dato para servicios con menos de 4 horas";
									}else{
										$bandera = 1; 
									}
								}
								
								
								// De lunes a viernes de 7 PM a 7AM: 	Pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM 
								if($dia_de_la_semana < 6 && ($hora_actua_militar > 19 || $hora_actua_militar < 7))
								{
									if($row_referencia["hora_s1"] > 10)
									{
										$bandera = 1;
									}else{
										$bandera = 2;
										$cad_error = "De lunes a viernes de 7 PM a 7AM pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM";
									}
								}

								// de Sabados de 7 Am a 4 PM Pueden cambiar  cualquier dato para servicios con mas de 4 horas
								if($dia_de_la_semana == 6 && $hora_actua_militar > 6 && $hora_actua_militar < 17)
								{
									if($diferencia_tiempo < (60 * 60 * 4))
									{
										$bandera = 2;
										$cad_error = "De sabados de 7 Am a 4 PM pueden cambiar cualquier dato para servicios con mas de 4 horas";
									}else{
										$bandera = 1;
									}
								}
							
								// de Sabados de 4 PM  a Domingo 8AM: 	Pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM 
								if( ($dia_de_la_semana == 6 && $hora_actua_militar > 16) || ($dia_de_la_semana == 7 && $hora_actua_militar < 9 ) )
								{
									if($row_referencia["hora_s1"] > 10)
									{
										$bandera = 1;
									}else{
										$bandera = 2;
										$cad_error = "De sabados de 4 PM  a Domingo 8AM pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM";
									}
								}
								
								// Domingos de 8AM 8:00PM: Pueden cambiar  cualquier dato para servicios con mas  de 6 horas
								if($dia_de_la_semana == 7 && $hora_actua_militar > 7 && $hora_actua_militar < 20 )
								{
									if($diferencia_tiempo < (60 * 60 * 6))
									{
										$bandera = 2;
										$cad_error = "Domingos de 8AM 8:00PM pueden cambiar cualquier dato para servicios con mas de 6 horas";
									}else{
										$bandera = 1;
									}
								}
								
								// Domingos de 8PM Luenes 7 AM pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM 
								if( ($dia_de_la_semana == 7 && $hora_actua_militar > 19) || ($dia_de_la_semana == 1 && $hora_actua_militar <  7) )
								{
									if($row_referencia["hora_s1"] > 10)
									{
										$bandera = 1;
									}else{
										$bandera = 2;
										$cad_error = "Domingos de 8PM lunes 7 AM pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM";
									}
								}
								?>

							
									
									
									
									
									
									
									
									
									
									
									
									
<!-- ------------------------------------------------------------------------------------------------------------ -->										
															
                    <div class="panel-body">
                      <div class="tab-content">
                        <div class="row">
						<?php if($bandera == 2){ ?>
									<div class="col-sm-12">
										<div class="form-group text-center">
											<div class="alert alert-danger media fade in">
												<div class="media-left">
													<span class="icon-wrap icon-wrap-xs icon-circle alert-icon">
														<i class="fa fa-ban fa-lg"></i>
													</span>
												</div>
												<div class="media-body">
													<h4 class="alert-title"><b>HORARIO NO HABIL</b></h4>
													<p class="alert-message"><?= $cad_error ?></p>
												</div>
												
											</div>
										</div>
									</div>
									<?php } ?>

									<?php if(isset($_GET["error3"])){ 
										if($_GET["error3"] == 1){$cad_error2 = "Lunes a Viernes de 7 Am a 7 PM no pueden cambiar  cualquier dato para servicios con menos de 4 horas";}
										if($_GET["error3"] == 2){$cad_error2 = "De sabados de 7 Am a 4 PM pueden cambiar cualquier dato para servicios con mas de 4 horas";}
										if($_GET["error3"] == 3){$cad_error2 = "De sabados de 4 PM  a Domingo 8AM pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM";}
										if($_GET["error3"] == 4){$cad_error2 = "Domingos de 8AM 8:00PM pueden cambiar cualquier dato para servicios con mas de 6 horas";}
										if($_GET["error3"] == 5){$cad_error2 = "Domingos de 8PM lunes 7 AM pueden cambiar cualquier servicio del siguiente dia en adelante que este programado para despues de las 11.00 AM";}
									?>
									<div class="col-sm-12">
										<div class="form-group text-center">
											<div class="alert alert-danger media fade in">
												<div class="media-left">
													<span class="icon-wrap icon-wrap-xs icon-circle alert-icon">
														<i class="fa fa-ban fa-lg"></i>
													</span>
												</div>
												<div class="media-body">
													<h4 class="alert-title"><b>HORARIO NO HABIL</b></h4>
													<p class="alert-message"><?= $cad_error2 ?></p>
												</div>
												
											</div>
										</div>
									</div>
									<?php } ?>
						<?php /* ============================================================================================================================================================== */?>
							<div class="col-md-8 col-md-offset-2">
							<div class="panel">
								
					
								<!--Block Styled Form -->
								<!--===================================================-->
								<form name="pax" action="<?php echo $editFormAction; ?>" method="POST" id="pax">
									<div class="panel-body">

										<?php
											$dateg = date('G');
											$sumar = floor( ($dateg + 4) / 24 	);
											$hora_act = ( $dateg  + 4 ) % 24;
											$array = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
											$fecha =  date('N-d-m-Y', strtotime($row_referencia["fecha_s"]));
											$datos = explode("-", $fecha);
											if($datos[0] == 1){$dia = "Lunes";}
											if($datos[0] == 2){$dia = "Martes";}
											if($datos[0] == 3){$dia = "Miercoles";}
											if($datos[0] == 4){$dia = "Jueves";}
											if($datos[0] == 5){$dia = "Viernes";}
											if($datos[0] == 6){$dia = "Sabado";}
											if($datos[0] == 7){$dia = "Domingo";}
											
											
											
									
									if($row_referencia["hora_s1"] > 11){
													$meridiano2 = "PM";
													$color = "bg-dark text-default";
												}else{
													$meridiano2 = "AM";
													$color = "bg-light text-dark";
												}
									?>

										
										<div class="row">
											<div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2">
												<div class="form-group">
													<label class="control-label">FECHA VIAJE</label>
														<div class="input-group mar-btm">
															<div class="col-sm-12 col-md-12 col-lg-6">
																<div class="input-group mar-btm">
																<span class="input-group-btn"><button class="btn btn-info" type="button"><i class="fa fa-calendar"></i></button></span>
																  <input type="text" class="form-control bg-gray-light" readonly  autocomplete="off" name="fecha_s" id="textinputmes" value="<?= $dia.' '.$datos[1].'-'.$array[$datos[2]-1].'-'.$datos[3] ?>" />
																</div>
															</div>
															<div class="col-sm-12 col-md-12 col-lg-6">
																<div class="input-group mar-btm">
																  <span class="input-group-btn"><button class="btn btn-info" type="button"><i class="fa fa-clock-o"></i></button></span>
																  <input type="text" class="form-control" id="demo-tp-com"  readonly autocomplete="off" name="hora_s" value="<?= $row_referencia["hora_s1"].":".$row_referencia["hora_s2"] ?>" />
																  <?php
																	if($row_referencia["hora_s1"] < 12)
																	{
																		$cad2 = "AM";
																		$cad3 = "";
																	}else{
																		$cad2 = "PM";
																		$cad3 = "bg-dark text-light";
																	}
																		
																  ?>
																  <span id="cambiar2" class="input-group-addon <?= $cad3 ?>"><b id="cambiar"><?= $cad2 ?></b></span>
																</div>
															</div>
															</div>
															
														
												
														  <input type="hidden" name="fecha_lim" id="fecha_lim" value="<?= $fecha_lim ?>" />
														  <input type="hidden" name="hora_act" id="hora_act" value="<?= $hora_act ?>" />
												</div>
											</div>
										</div>
										<?php 
											$colname_elaborado = "-1";
											$colname_elaborado = $row_referencia['persona_origen'];

											mysql_select_db($database_conexion, $conexion);
											$query_elaborado = sprintf("SELECT * FROM `pasajeros` WHERE codigo = %s", GetSQLValueString($colname_elaborado, "text"));
											$elaborado = mysql_query($query_elaborado, $conexion) or die(mysql_error());
											$row_elaborado = mysql_fetch_assoc($elaborado);
											$totalRows_elaborado = mysql_num_rows($elaborado); 
											$j = $totalRows_elaborado;
											?>
										<div class="row">
											<div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2" data-target="#demo-default-modal4" data-toggle="modal">
													<label class="control-label">PAX principal:</label>
												<div class="input-group mar-btm">
														<span class="input-group-btn"><button class="btn btn-dark" type="button"><i class="fa fa-user"></i></button></span>
														<input readonly type="text" value="<?php echo $row_elaborado['nombre'].' '.$row_elaborado['apellido']  ?>" class="form-control" />														
												</div>
											</div>
										</div>
								
								<div class="modal fade" id="demo-default-modal4" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">
												<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title">Detalle Pax</h4>
											</div>
											
											
											<div class="modal-body">
												<?php
												$colname_pasajeros = $row_referencia['persona_origen'];
												mysql_select_db($database_conexion, $conexion);
												$query_pasajeros = sprintf("SELECT * FROM pasajeros WHERE codigo = %s", GetSQLValueString($colname_pasajeros, "text"));
												$pasajeros = mysql_query($query_pasajeros, $conexion) or die(mysql_error());
												$row_pasajeros2 = mysql_fetch_assoc($pasajeros);
												?>
												<div class="row">
												  <div class="panel-body form-horizontal form-padding">
													
													<div class="form-group">
													  <label class="col-md-3 control-label">Nombre:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?= $row_pasajeros2['nombre'] ?>" disabled ><br>
													  </div>
													</div>
													<div class="form-group">
													  <label class="col-md-3 control-label">Apellido:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?= $row_pasajeros2['apellido'] ?>" disabled><br>
													  </div>
													</div>
													<div class="form-group">
													  <label class="col-md-3 control-label">Empresa:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?= $row_pasajeros2['empresa'] ?>" disabled><br>
													  </div>
													</div>
													<div class="form-group">
													  <label class="col-md-3 control-label">Ciudad:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?= $row_pasajeros2['ciudad'] ?>" disabled><br>
													  </div>
													</div>
													 <div class="form-group">
													  <label class="col-md-3 control-label"> Persona de Contacto:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?= $row_pasajeros2['contacto'] ?>" disabled><br>
													  </div>
													</div>
													 <div class="form-group">
													  <label class="col-md-3 control-label">Dirección:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?=  $row_pasajeros2['direccion'] ?>" disabled><br>
													  </div>
													</div>
													 <div class="form-group">
													  <label class="col-md-3 control-label">E-mail:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?=  $row_pasajeros2['correo1'] ?>" disabled><br>
													  </div>
													</div>
															 <div class="form-group">
													  <label class="col-md-3 control-label">E-mail Alternativo:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?=  $row_pasajeros2['correo2'] ?>" disabled><br>
													  </div>
													</div>
													<div class="form-group">
													  <label class="col-md-3 control-label">Tel&eacute;fonos:</label>
													  <div class="col-md-9">
														<input type="text" class="form-control" value="<?=  $row_pasajeros2['telefono1'] ?> / <?= $row_pasajeros2['telefono2'] ?>" disabled><br>
													  </div>
													</div>
													<div class="col-sm-12">
													   <label class="col-md-3 control-label">Observaciones</label>
													  <div class="input-group col-md-9 mar-btm">
														  <textarea id="obsv" name="obsv" rows="5" class="form-control" disabled> <?= $row_pasajeros2['observaciones'] ?></textarea>
													  </div>
													</div>
												  </div>
												</div>
											</div>
											

											<div class="modal-footer">
												<button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
											</div>
										</div>
									</div>
								</div>
								
										
										
									<div class="row">
											<div class="col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
												<label class="control-label">Cantidad de pasajeros:</label>
												<div class="input-group mar-btm">
														<span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-users"></i></button></span>
														<input type="number" min="1" readonly class="form-control" autocomplete="off" id="cant_pax" name="cant_pax" value="<?= $row_referencia["cant_pax"] ?>" />	
												</div>
											</div>
											
										
								
									</div>
									
									<div id="pax_news" class="row">
										
						
								<?php
									$sql2 = "select * from paxorden where orden = '".$_GET['r']."' AND estado = 'activo' AND pax <> '-1'";
									$query2 = mysql_query($sql2 , $conexion);
									$i = 1;
									
									$cad3 = '';
									while( $info =  mysql_fetch_array($query2) ){ 			
												
																$colname_elaborado = "-1";
																$colname_elaborado = $info['pax'];
																mysql_select_db($database_conexion, $conexion);
																$query_elaborado = sprintf("SELECT * FROM `pasajeros` WHERE codigo = '%s'", $colname_elaborado);
																$elaborado = mysql_query($query_elaborado, $conexion) or die(mysql_error());
																$row_elaborado = mysql_fetch_array($elaborado);
															/*	$cad = $cad.'
															<div class="col-sm-12 col-md-6 col-lg-6">
																	<div class="panel panel-colorful panel-dark">	
																		<div class="panel-body" style="font-size:15px">
																				<div class="col-lg-5 col-md-12">
																				
																<b>Pax #'.$i.':</b> '.$row_elaborado["nombre"].' '.$row_elaborado["apellido"].' </b>
																				</div>
																				<div class="col-lg-7 col-md-12 text-right">	
																					<button id="'.$info['id'].'" class="btn btn-danger borrar" type="button" ><i class="fa fa-minus-circle"></i></button>
																				</div>
																		</div>
																	</div>
																</div>
																';*/
																
																$cad3 = $cad3.'
							<div class="col-sm-12 col-md-6 col-lg-6">
												<label class="control-label"><b>PAX #'.$i.': </b></label>
												<div class="input-group mar-btm">
														<span class="input-group-btn"><button class="btn btn-dark" type="button"><i class="fa fa-user-plus"></i></button></span>
														<input type="text" class="form-control" readonly value="'.$row_elaborado["nombre"].' '.$row_elaborado["apellido"].'" />	
												</div>
										</div>
							';
											$i++;		
								   
									} 
									echo $cad3; 
								?>
									</div>
									
									<div class="row">
										<div class="col-sm-12 col-md-6 col-lg-6">
												<label class="control-label">Ciudad o Aeropuerto origen:</label>
												<div class="input-group mar-btm">
														<span class="input-group-btn"><button class="btn btn-warning" type="button"><img src="http://www.transportesejecutivos.com/app/ordenes/logos/avion1.png" width="18px" /></button></span>
														<?php 
														  mysql_select_db($database_conexion, $conexion);
														  $query_pax_adicionales = sprintf("SELECT * FROM ciudad");
														  $pax_adicionales = mysql_query($query_pax_adicionales, $conexion) or die(mysql_error());
														  ?>
															<select required data-placeholder="Seleccione..." name="ciudad_inicio" id="ciudad_inicio" class="col-md-12 bg-info"> <option></option>
														  <?php while($info = mysql_fetch_array($pax_adicionales)){ ?> 
															<?php if($row_referencia['ciudad_inicio'] == $info["nombre"]){ ?>
																<option selected="selected" value="<?= $info['nombre'] ?>"><?= $info['nombre'] ?></option>
															<?php }else{ ?>
																<option value="<?= $info['nombre'] ?>"><?= $info['nombre'] ?></option>
															<?php } ?>
														  <?php } ?>
														  </select>	
												</div>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6">
													<label class="control-label">Direccion Origen:</label>
												<div class="input-group mar-btm">
													<span class="input-group-btn"><button class="btn btn-warning" type="button"><img src="http://www.transportesejecutivos.com/app/ordenes/logos/avion1.png" width="18px" /></button></span>
													<input class="form-control" name="dir_origen" value="<?= $row_referencia["dir_origen"] ?>" type="text"/>			
													
												</div>
										</div>
									</div>
									
									
									<!-- -------------------------------------------------------------------------------------------------------- -->
									<div class="row">
										<div class="col-sm-12 col-md-6 col-lg-6">
												<label class="control-label">Ciudad o Aeropuerto Destino:</label>
												<div class="input-group mar-btm">
														<span class="input-group-btn"><button class="btn btn-mint" type="button"><img src="http://www.transportesejecutivos.com/app/ordenes/logos/avion2.png" width="18px" /></button></span>
														<?php 
														  mysql_select_db($database_conexion, $conexion);
														  $query_pax_adicionales = sprintf("SELECT * FROM ciudad");
														  $pax_adicionales = mysql_query($query_pax_adicionales, $conexion) or die(mysql_error());
														  ?>
															<select required name="ciudad_destino" id="ciudad_destino" data-placeholder="Seleccione.." class="form-control"> <option></option>
														  <?php while($info = mysql_fetch_array($pax_adicionales)){ ?> 
															<?php if($row_referencia['ciudad_destino'] == $info["nombre"]){ ?>
																<option selected="selected" value="<?= $info['nombre'] ?>"><?= $info['nombre'] ?></option>
															<?php }else{ ?>
																<option value="<?= $info['nombre'] ?>"><?= $info['nombre'] ?></option>
															<?php } ?>
														  <?php } ?>
														  </select>	
												</div>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6">
												<label class="control-label">Direccion Destino:</label>
												<div class="input-group mar-btm">
														<span class="input-group-btn"><button class="btn btn-mint" type="button"><img src="http://www.transportesejecutivos.com/app/ordenes/logos/avion2.png" width="18px" /></button></span>
													<input class="form-control" name="dir_destino" value="<?= $row_referencia["dir_destino"] ?>" type="text"/>			

										</div>
										</div>
									</div>
									<!-- -------------------------------------------------------------------------------------------------------- -->
									
									<div class="row">
										<div class="col-sm-12 col-md-6 col-lg-6 ">
												<label class="control-label">Aerolinea:</label>
												<div class="input-group mar-btm">
														<span class="input-group-btn"><button class="btn btn-dark" type="button"><i class="fa fa-plane"></i></button></span>
														<select data-placeholder="Seleccione una aerolinea" name="aerolinea" id="aerolinea" class="form-control">
														  
																<?php 
														  mysql_select_db($database_conexion, $conexion);
														  $query_pax_adicionales = sprintf("SELECT * FROM aerolinea");
														  $pax_adicionales = mysql_query($query_pax_adicionales, $conexion) or die(mysql_error());
														  ?>
																	<?php while($info = mysql_fetch_array($pax_adicionales)){ ?>  
																	<?php
																		if($row_referencia['aerolinea'] == $info["nombre"]) { ?>
																				<option selected='selected' value="<?= $info['abreviacion'] ?>-<?= $info['nombre'] ?>"><?= $info['abreviacion'] ?> - <?= $info['nombre'] ?></option>
																		<?php }else{ ?>
																			<option  value="<?= $info['abreviacion'] ?>-<?= $info['nombre'] ?>"><?= $info['abreviacion'] ?> - <?= $info['nombre'] ?></option>
																		<?php } ?>
																	
																	<?php } ?> 
																	
														</select>
												</div>
										</div>

												
												
												
																					
										<div class="col-sm-12 col-md-6 col-lg-6">
												<label class="control-label">Vuelo:</label>
												<div class="input-group mar-btm">
														<span class="input-group-btn"><button class="btn btn-dark" type="button"><i class="fa fa-paperclip"></i></button></span>
														<input name="vuelo" id="vuelo" autocomplete="off" type="text" value="<?php 
														if($row_referencia['vuelo'] != "" )
														{
															echo $row_referencia['vuelo']; 
														}else{
															echo "No asignado";
														}
														?>" class="form-control">
												</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12 col-md-4 col-lg-4">
											<?php
												  $colname_pax_adicionales = $row_empresa['codigo'];
												  mysql_select_db($database_conexion, $conexion);
												  $query_pax_adicionales = sprintf("SELECT * FROM representando2 WHERE empresa = %s AND estado = 'activo' ORDER BY id ASC", GetSQLValueString($colname_pax_adicionales, "text"));
												  $pax_adicionales = mysql_query($query_pax_adicionales, $conexion) or die(mysql_error());		  
												?>
												
											<label class="control-label">Representando:</label>
											<div class="input-group mar-btm">
												<span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-bank"></i></button></span>			
														
														<input autocomplete="off" readonly type="text" class="form-control" value="<?= $row_referencia['representando']; ?>"  />
											</div> 
										</div> 						
					
													<? $colname_pax_adicionales = "-1";
                                $colname_pax_adicionales = $row_empresa['codigo'];
                                mysql_select_db($database_conexion, $conexion);
                                $query_pax_adicionales = sprintf("SELECT * FROM centrodecostos WHERE empresa = %s AND estado = 'activo' ORDER BY id ASC", GetSQLValueString($colname_pax_adicionales, "text"));
                                $pax_adicionales = mysql_query($query_pax_adicionales, $conexion) or die(mysql_error());
                                ?>
										
										
										
										
										<div class="col-sm-12 col-md-4 col-lg-4">
												
											<label class="control-label">Centro de Costos:</label>
											<div class="input-group mar-btm">
												<span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-file-zip-o"></i></button></span>			
													<input autocomplete="off" readonly type="text" class="form-control" value="<?= $row_referencia['centrodecosto']; ?>"  />

											</div> 
										</div> 
										<div class="col-sm-12 col-md-4 col-lg-4">
												
											<label class="control-label">Reserva No.:</label>
											<div class="input-group mar-btm">
												<span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-cc"></i></button></span>			
												<input autocomplete="off" readonly type="text" class="form-control" value="<?= $row_referencia['ordencliente']; ?>" />
											</div> 
										</div> 
										
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-offset-lg-3">
												<label class="control-label">Tipo de vehiculo:</label>
												<div class="input-group mar-btm">
													<span class="input-group-btn"><button class="btn btn-dark" type="button"><i class="fa fa-car"></i></button></span>
													<input autocomplete="off" readonly type="text" class="form-control" value="<?= $row_tipo_vehiculo['nombre']; ?>" />
														
												</div>
												
												
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
		
					
																	  
											<div class="panel panel-info">
														
																	<!--Panel heading-->
																	<div class="panel-heading">
																		<div class="panel-control">
														
																			<!--Nav tabs-->
																			<ul class="nav nav-tabs">
																				<li class="active"><a data-toggle="tab" href="#demoq-tabs-box-1">Observaciones y/o Indicaciones Adicionales</a></li>
																				<li><a data-toggle="tab" href="#demoq-tabs-box-3">Añadir observaciones y/o Indicaciones Adicionales</a></li>
																				<li><a data-toggle="tab" href="#demoq-tabs-box-2">Historial modificaciones</a></li>
																			</ul>
														
																		</div>
																		<h3 class="panel-title text-left"><i class="fa fa-info"></i>&nbsp; Informacion Adicional</h3>
																	</div>
														
																	<!--Panel body-->
																	<div class="panel-body">
														
																		<!--Tabs content-->
																		<div class="tab-content">
																			<div id="demoq-tabs-box-1" class="tab-pane fade in active">
																				<p><textarea class="form-control bg-gray-light" readonly rows="5"><?php echo $row_referencia['obaservaciones']; ?></textarea></p>
																			</div>
																			<div id="demoq-tabs-box-3" class="tab-pane fade">
																				<p><textarea name="obaservaciones" class="form-control bg-gray-light" id="obaservaciones_bosh"  rows="5"></textarea></p>
																			</div>
																			<div id="demoq-tabs-box-2" class="tab-pane fade">
																				<p class="mar-no text-thin"><?php echo $row_referencia['editado_por']; ?></p>
																			</div>
																		</div>
																	</div>
																</div>

											</div>
									</div>
									
									
									<input name="referencia" type="hidden" id="referencia" value="<?php echo $row_referencia['referencia']; ?>" />
                                  <input name="editado_por" type="hidden" id="editado_por" value="<?php echo $row_referencia['editado_por']; ?>  &#91;<?php echo $row_usuario['nombre']; ?> <?php echo $row_usuario['apellido']; ?>:<?php echo date("F j, Y, g:i a"); ?>&#93" />
                                  <input name="elaboradopor2" type="hidden" id="elaboradopor2" value="<?php echo $row_usuario['nombre']; ?>  <?php echo $row_usuario['apellido']; ?>" />
                                  <input name="elaboradopor3" type="hidden" id="elaboradopor3" value="<?php /* echo $row_usuario['correo2']; */ ?>" />
                                  <input name="alerta" type="hidden" id="alerta" value="editada" />
                                  <input name="editado_por_fecha" type="hidden" id="editado_por_fecha" value="<?php echo date ('m/d/Y'); ?>  <?php echo date ('h:i a'); ?>" />

								  <input name="id2" type="hidden" id="id2" value="<?php echo $row_ref['id']; ?>" />
                                      <input name="refgyg2" type="hidden" id="refgyg2" value="<?php echo $row_ref['refgyg']; ?>" />
                                      <input name="pax2" type="hidden" id="pax2" value="Seleccione una..." />
                                      <input name="pax3" type="hidden" id="pax3" value="Seleccione una..." />
                                      <input name="pax4" type="hidden" id="pax4" value="Seleccione una..." />
                                      <input name="pax5" type="hidden" id="pax5" value="Seleccione una..." />
                                      <input name="conductor" type="hidden" id="conductor" value="Seleccione una..." />
                                      <input name="conductor_asignar" type="hidden" id="conductor_asignar" value="Seleccione una..." />
                                      <input name="conductor_asignar_fecha" type="hidden" id="conductor_asignar_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="aviso_pdf" type="hidden" id="aviso_pdf" value="Seleccione una..." />
                                      <input name="aviso_pdf_fecha" type="hidden" id="aviso_pdf_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="enviar_cliente" type="hidden" id="enviar_cliente" value="Seleccione una..." />
                                      <input name="enviar_cliente_fecha" type="hidden" id="enviar_cliente_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="agendar" type="hidden" id="agendar" value="Seleccione una..." />
                                      <input name="agendar_fecha" type="hidden" id="agendar_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="reconfirmacion" type="hidden" id="reconfirmacion" value="Seleccione una..." />
                                      <input name="reconfirmacion_fecha" type="hidden" id="reconfirmacion_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="observaciones_reconfirmacion_fecha" type="hidden" id="observaciones_reconfirmacion_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="factura_ecxel" type="hidden" id="factura_ecxel" value="Seleccione una..." />
                                      <input name="factura_ecxel_fecha" type="hidden" id="factura_ecxel_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="factura_cobro_por" type="hidden" id="factura_cobro_por" value="Seleccione una..." />
                                      <input name="factura_cobro_por_fecha" type="hidden" id="factura_cobro_por_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="factura_cobro" type="hidden" id="factura_cobro" value="Sin Pago" />
                                      <input name="factura_cobro_fecha" type="hidden" id="factura_cobro_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="conductor_pagado_fecha" type="hidden" id="conductor_pagado_fecha" value="<?php echo date ('m/d/Y'); ?>" />
                                      <input name="factura_conductor_contabil" type="hidden" id="factura_conductor_contabil" value="Seleccione una..." />
                                    <input name="factura_conductor_contabil_fecha" type="hidden" id="factura_conductor_contabil_fecha" value="<?php echo date ('m/d/Y'); ?>" />

									
							<input type="hidden" name="MM_update" value="pax">
						<?php
					$fe = explode("/", $row_referencia['fecha_s']);
					$mktiempo = (mktime($row_referencia['hora_s1'],$row_referencia['hora_s2'],0,$fe[0],$fe[1],$fe[2]) - mktime(date('H'), date('i'), 0, date('n'), date('j'), date('Y')) ); 
   			      ?>
                      
									
                    <div id="send" class="panel-footer text-right">        
					
						 <?php if($bandera == 1){ ?>
                      <button class="btn btn-primary btn-labeled fa fa-check disabled" id="send" type="button">Editar</button>
                      <?php } ?>
                     
                      </div>
            
								</form>
								<!--===================================================-->
								<!--End Block Styled Form -->
					
							</div>
						</div>
       
	   
               					<?php if($_GET["error4"] == 1){ ?>
									<div class="col-md-8 col-md-offset-2">
										<div class="form-group text-center">
											<div class="alert alert-danger media fade in">
												<div class="media-left">
													<span class="icon-wrap icon-wrap-xs icon-circle alert-icon">
														<i class="fa fa-ban fa-lg"></i>
													</span>
												</div>
												<div class="media-body">
													<h4 class="alert-title"><b>ORDEN HO EDITABLE</b></h4>
													<p class="alert-message">La orden no se puede crear con menos de 4 horas anticipacion de la hora programada para el servicio.</p>
												</div>
												
											</div>
										</div>
									</div>
									<?php } ?>
          
                    

                </div>
						<?php /* ============================================================================================================================================================== */?>
                    

               
          </div>

<?
//inserto en la tabla nueva de ordenes
  $insertSQL = sprintf("INSERT INTO orden_back(referencia, empresa, representando, fecha_s, hora_s1, hora_s2, tipo_s, vehiculo_s, cant_pax, ciudad_inicio, dir_origen, ciudad_destino, dir_destino, aerolinea, vuelo, obaservaciones, conductor, editado_por, editado_por_fecha) VALUES ('".$row_referencia['referencia']."', '".$row_referencia['empresa']."', '".$row_referencia['representando']."', '".$row_referencia['fecha_s']."', '".$row_referencia['hora_s1']."', '".$row_referencia['hora_s2']."', '".$row_referencia['tipo_s']."', '".$row_referencia['vehiculo_s']."', '".$row_referencia['cant_pax']."', '".$row_referencia['ciudad_inicio']."', '".$row_referencia['dir_origen']."', '".$row_referencia['ciudad_destino']."', '".$row_referencia['dir_destino']."', '".$row_referencia['aerolinea']."', '".$row_referencia['vuelo']."', '".$row_referencia['obaservaciones']."', '".$row_referencia['conductor']."', '".$row_referencia['editado_por']."', '".$row_referencia['editado_por_fecha']."')",
                       GetSQLValueString($_POST['referencia'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
?>                                
         
      
      <!--MAIN NAVIGATION-->
      <!--===================================================-->
      <? 
      define('__ROOT__', dirname(dirname(__FILE__))); 
      require_once('../lib_php/main_navigation.php'); 
      ?>
      <!--===================================================-->
      <!--END MAIN NAVIGATION-->
  

    </div>

    <!-- FOOTER -->
    <!--===================================================-->
    <? 
      define('__ROOT__', dirname(dirname(__FILE__))); 
      require_once('../lib_php/footer.php'); 
      ?>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL TOP BUTTON -->
    <!--===================================================-->
    <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
    <!--===================================================-->

  </div>
  </div>
  </div>

  

<!--jQuery [ REQUIRED ]-->
  <script src="../../admin/nuevo_admin_2015/template/js/jquery-2.1.1.min.js"></script>


  <!--BootstrapJS [ RECOMMENDED ]-->
  <script src="../../admin/nuevo_admin_2015/template/js/bootstrap.min.js"></script>


  <!--Fast Click [ OPTIONAL ]-->
  <script src="../../admin/nuevo_admin_2015/template/plugins/fast-click/fastclick.min.js"></script>

  
  <!--Nifty Admin [ RECOMMENDED ]-->
  <script src="../../admin/nuevo_admin_2015/template/js/nifty.min.js"></script>


  <!--Switchery [ OPTIONAL ]-->
  <script src="../../admin/nuevo_admin_2015/template/plugins/switchery/switchery.min.js"></script>


  <!--Bootstrap Select [ OPTIONAL ]-->
  <script src="../../admin/nuevo_admin_2015/template/plugins/bootstrap-select/bootstrap-select.min.js"></script>


  <!--Bootstrap Wizard [ OPTIONAL ]-->
  <script src="../../admin/nuevo_admin_2015/template/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>


  <!--Bootstrap Validator [ OPTIONAL ]-->
  <script src="../../admin/nuevo_admin_2015/template/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>


  <!--Demo script [ DEMONSTRATION ]-->
  <script src="../../admin/nuevo_admin_2015/template/js/demo/nifty-demo.min.js"></script>


  <!--Form Wizard [ SAMPLE ]
  <script src="../../admin/nuevo_admin_2015/template/js/demo/form-wizard.js"></script>-->

  <!--Bootstrap Timepicker [ OPTIONAL ]-->
  <script src="../../admin/nuevo_admin_2015/template/plugins/bootstrap-timepicker/bootstrap-timepicker.js"></script>
	
	  <!--Chosen [ OPTIONAL ] El buscador  desplegable-->
  <script src="../../admin/chosen_v1_4_2/chosen.jquery.min.js"></script>
  
  <!--Bootstrap Datepicker [ OPTIONAL ]-->
  <script src="../../admin/nuevo_admin_2015/template/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
  <script src="../../admin/js/bootbox.min.js"></script>
  <script type="text/javascript">
	
		//$('#persona_origen').chosen();
		$('#ciudad_inicio').chosen();
		$('#ciudad_destino').chosen();
		$('#representando').chosen();
		$('#centrodecostos').chosen();
		$('#aerolinea').chosen();
		$('#persona_origen7').chosen();
		$('#vehiculo_s').chosen();
	
		$('#aerolinea').change(function(){
			var aerolinea =	$('#aerolinea').val();
			var ae = aerolinea.split("-");
			$('#vuelo').val(ae[0]+"-");
			$('#vuelo').focus();
		});
  $(document).ready(function() {

    $("#textinputmes").datepicker({
      viewMode: 'years',
      format: 'DD dd-MM-yyyy',
	  daysOfWeekDisabled: "0",
      autoclose:true
      });
  });
	$('#send').click(function(e){
	/*	$('#ordencliente').val($('#ordenclientep').text());
		$('#vuelo').val($('#vuelop').text());
		$('#dir_origen').val($('#dir_origenp').text());
		$('#dir_destino').val($('#dir_destinop').text());
		*/
		$("#pax").submit();
	});
	
	$('#aerolinea').change(function(){
			var aerolinea =	$('#aerolinea').val();
			var ae = aerolinea.split("-");
			$('#vuelo').val(ae[0]+"-");
			$('#vuelo').focus();
		}); 
 
        var hora = $('#demo-tp-com').val(); 
        var horas = hora.split(":");
        var ca = "";
        if(horas[0] < 13){
          ca = "AM";
        }else{
          ca = "PM";
        }
        $('#meridiano').html(ca);
  $('#demo-tp-com').timepicker({showMeridian:false, minuteStep:1, defaultTime:false});
  $('#demo-dp-range .input-daterange').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		todayHighlight: true
	});
	$('#txtinput').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		todayHighlight: true
	});
	
	 $('#sendCC').click(function(e){
	
		 var nuevo_cc = String( $('#nuevo_cc').val() );	
		 var empresa_cc = String($('#empresa_cc').val());	
		 var creada_cc = String($('#creada_cc').val());	
		 var fecha = String($('#fecha').val());		
		
		$.ajax({
			url: 'crear_cc_ajax.php',
			method: 'GET',
			data:{centrodecosto:nuevo_cc, empresa:empresa_cc, estado:'activo', observaciones:'...', creada:creada_cc, fecha:	fecha },
			success:function(data)
			{
				$('#demo-sm-modal').modal('hide');
				$('#select_cc').html(data);
			
			}
		});
	
	  });
	  
	   $('#sendR').click(function(e){
		  
		 var nuevo_r = String( $('#representando_nuevo').val() );	
		 var empresa_cc = String($('#empresa_cc').val());	
		 var creada_cc = String($('#creada_cc').val());	
		 var fecha = String($('#fecha').val());		
		
		$.ajax({
			url: 'crear_representado_ajax.php',
			method: 'GET',
			data:{representando:nuevo_r, empresa:empresa_cc, estado:'activo', observaciones:'...', creada:creada_cc, fecha:	fecha },
			success:function(data)
			{
				$('#demo-sm-modal2').modal('hide');
				$('#select_repre').html(data);
			
			}
		});

	  });

	$('.centrodecostos_eliminar').click(function(e){
		var item = $(this);
		var id = $(this).attr('data-id');
		var empresa_cc = String($('#empresa_cc').val());
		
			//	 $('#demo-sm-modal').modal('hide');
		bootbox.confirm("¿Esta seguro de eliminar este centro de costos?", function(result) {
			if(result)
			{
				$.ajax({
					url: 'eliminar_cc_ajax.php',
					method: 'GET',
					data:{id:id, empresa:empresa_cc},
					success:function(data)
					{
						$('#demo-sm-modal').modal('hide');
						$('#select_cc').html(data);
					}
				});
			
			item.parent().parent().remove();
			}	
	}); 
	});
	
	$('.representando_eliminar').click(function(e){
		
		var item = $(this);
		var id = $(this).attr('data-id');
		var empresa_cc = String($('#empresa_cc').val());
		
			//	 $('#demo-sm-modal').modal('hide');
		bootbox.confirm("¿Esta seguro de eliminar este Representando?", function(result) {
			if(result)
			{
				$.ajax({
					url: 'eliminar_representando_ajax.php',
					method: 'GET',
					data:{id:id, empresa:empresa_cc},
					success:function(data)
					{
						$('#demo-sm-modal2').modal('hide');
						$('#select_repre').html(data);
					}
				});
			
			item.parent().parent().remove();
			}	
	}); 
	});
	 
	 function GP_popupConfirmMsg(msg)
	{
		document.MM_returnValue = confirm(msg);
	}
	$('#new_pax').click(function(e){
		var pax_agg = $('#persona_origen7').val();	
		var orden = $('#orden_x').val();	
		var estado = $('#estado_x').val();	
		var observaciones = $('#observaciones_x').val();	
		var creada = $('#creada_x').val();	
		var fecha = $('#fecha_x').val();	

		$.ajax({
			url:'agg_pax_ajax.php',
			method:'GET',
			data:{pax_agg:pax_agg, orden:orden, estado:estado, observaciones:observaciones, creada:creada, fecha:fecha  },
			success:function(data)
			{
				$('#pax_news').html(data);
			}
		});
	});

	$('.borrar').click(function(e){
		var id = this.id;
		var orden = $('#orden_x').val();
		$.ajax({
			url:'emi_pax_ajax.php',
			method:'GET',
			data:{id:id, orden:orden  },
			success:function(data)
			{
				$('#pax_news').html(data);
			}
		});
		
	});
  </script>	
</body>
</html>
