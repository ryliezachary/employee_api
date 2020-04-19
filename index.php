<?php
require_once 'config.php';

class API {
	public function Select($id = ''){
		$db = new Connect;
		
		$user = array();
		
		
		if ($id != ''){
			
			$data = $db->prepare("select * from users where id='" . $id . "'");
			$data->execute();
			$OutputData = $data->fetch(PDO::FETCH_ASSOC);	
			$users = array(
				'id' => $OutputData['id'],
				'name' => $OutputData['name'],
				'age' => $OutputData['age']
			);
		}
		else
		{
			$data = $db->prepare("select * from users");
			$data->execute();
			while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
				$users[$OutputData['id']] = array(
					'id' => $OutputData['id'],
					'name' => $OutputData['name'],
					'age' => $OutputData['age']
				);
			}			
			
		}		
		//while ($OutputData['id'] = $data->fetch(PDO::FETCH_ASSOC)){
		
		return json_encode($users);
	}
}

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

$API = new API;

$id = isset($_GET["id"]) ? $_GET["id"] : '';
echo $API->Select($id);


 ?>
