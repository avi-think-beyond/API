<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Credentials: true");
  

  if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']))
  {
  	header('WWW-Authenticate: Basic realm="My Realm"');
  	header('HTTP/1.0 401 Unauthorized');
  }
  file_put_contents("log.log", json_encode($_SERVER));
  if($_SERVER['PHP_AUTH_USER']=='test' && $_SERVER['PHP_AUTH_PW']=="test@123")
  {
    $data = file_get_contents("php://input");
    while(ob_get_level()) ob_end_clean();
    header('Connection: close');
    ignore_user_abort();
    ob_start();
    echo('Connection Closed');
    $size = ob_get_length();
    header("Content-Length: $size");
    ob_end_flush();
    flush();
  	
  	$fdata = json_decode($data, true);
    $output = passthru("python3 pdf_to_image.py ".$fdata['file_name']);  
  }
  else
  {
  	die("invalide user name and password");
  }
  
?>
