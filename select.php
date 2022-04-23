<?php
require 'db.php';
function cors() {
    
	// Allow from any origin
	if (isset($_SERVER['HTTP_ORIGIN'])) {
			// Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
			// you want to allow, and if so:
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Max-Age: 86400');    // cache for 1 day
	}
	
	// Access-Control headers are received during OPTIONS requests
	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
					// may also be using PUT, PATCH, HEAD etc
					header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
			
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
					header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	
			exit(0);
	}
	
	echo "You have CORS!";
}
function get_data($connect){
	$res = mysqli_query($connect,"SELECT * FROM `products`");
	$data = array();

	while($r = mysqli_fetch_array($res)){
		$data[] = array(
			'name' => $r['name'],
			'description' => $r['description']
		);
	}
	return json_encode($data);
}
echo (get_data($connect));

$file_name = 'select.json';

if(file_put_contents($file_name, get_data($connect))){
	echo $file_name . ' file created';
}else{
	echo 'ERROR';
};