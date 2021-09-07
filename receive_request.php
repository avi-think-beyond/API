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


  $data = file_get_contents("php://input");
?>
