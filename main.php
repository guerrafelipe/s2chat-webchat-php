<?php                                                               
	$data = [
	  	"auth" =>[
			"username" => "usuario_api",
			"password" => "senha_api"
		]
	];	
	$data_string = json_encode($data);                                                                                   
	                                                                                                                     
	$ch = curl_init("https://s2chat-api.herokuapp.com/api_key/create");                                                          
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json',                                                                                
	    'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                                                                                                                              
	$result = curl_exec($ch);
	$json = json_decode($result, true);
	$client_id = "";
	$access_token = "";
	$success = "";
	$expires_at = "";
	foreach ($json as $key => $value) {
		if (!is_array($value)) {
	   		if($key == "client_id"){
	   			$client_id = $value;
	   		}	
	   		elseif($key == "access_token") {
	   			$access_token = $value;
	   		}
	   		elseif($key == "success"){
	   			$success = $value;
	   		}
	   		elseif($key == "expires_at"){
	   			$expires_at = $expires_at;
	   		}
	   		else {}
	    } 
	    else {
	        foreach ($value as $key => $val) {
		   		if($key == "client_id"){
		   			$client_id = $value;
		   		}	
		   		elseif($key == "access_token") {
		   			$access_token = $value;
		   		}
		   		elseif($key == "success"){
		   			$success = $value;
		   		}
		   		elseif($key == "expires_at"){
		   			$expires_at = $expires_at;
		   		}
		   		else {}	        
	        }
	    }
	}
?>

<!--Insira em <head></head> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://s2chat-api.herokuapp.com/asset/initializer.js"></script>
<link rel="stylesheet" href="https://s2chat-api.herokuapp.com/asset/css_initializer.css">
<script src="https://js.pusher.com/4.0/pusher.min.js"></script>

<!--Insira na janela de chat -->
<div class="row">
	<input type="hidden" id="serverDNS" value="">
	<input type="hidden" id="clientID" value="<?php echo $client_id?>">
	<input type="hidden" id="accessToken" value="<?php echo $access_token?>">
	<div id="chat">		
	</div>
</div>
