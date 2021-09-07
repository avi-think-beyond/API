function callRestAPI($method, $url, $data, $username, $password, $functionName = '', $fileName = ''){
	   $curl 		= curl_init();
	   $username 	= $username;
	   $password 	= $password;

	   switch ($method){
		  case "POST":
			 curl_setopt($curl, CURLOPT_POST, 1);
			 if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			 break;
		  default:
			 if ($data)
				$url = sprintf("%s?%s", $url, http_build_query($data));
	   }

	  // OPTIONS:
	   curl_setopt($curl, CURLOPT_URL, $url);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type'=> 'application/json'));
	   curl_setopt($curl, CURLOPT_USERNAME, $username);
	   curl_setopt($curl, CURLOPT_PASSWORD, $password);
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);


	   // EXECUTE CURL REQUEST AND RETURN THE DATA :
	   $result = curl_exec($curl);
	   $erro   = curl_error($curl);
	   $info 	= curl_getinfo($curl);
	   // print_r($result );
	   // $this->apiCallLog($method, $url, $data, $result, $functionName, $fileName); 
	   
	   // print_r($info);
	   if(!$result){
	   	// die("Connection Failure..!");
	   //	echo "send data without acknowledgment..!";
	   }
	   curl_close($curl);
	   return $result;   
	}
