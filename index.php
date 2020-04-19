<?php
require_once 'config.php';

class API {
	public function Select(){
		$db = new Connect;
		
		$user = array();
		$data = $db->prepare('select * from users');
		$data->execute();
		//while ($OutputData['id'] = $data->fetch(PDO::FETCH_ASSOC)){
		while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
	$users[$OutputData['id']] = array(
		'id' => $OutputData['id'],
		'name' => $OutputData['name'],
		'age' => $OutputData['age']
			);
		}
		return json_encode($users);
	}
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();


?>
