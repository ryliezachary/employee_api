<?php
require_once 'config.php';
$id = $_GET['id'];

class API {
	public function Select($id = ''){
		$db = new Connect;
		
		$user = array();
		
		
		if ($id != ''){
			$data = $db->prepare("select * from users where id='" . $id . "'");
		}
		else
		{
			$data = $db->prepare("select * from users");
		}
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

$id = isset($_GET["id"]) ? $_GET["id"] : "";
echo $API->Select($id);


 ?>
