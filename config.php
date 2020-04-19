<?php

class Connect extends PDO
{
	public function __construct()
	{
		parent::__construct("mysql:host=us-cdbr-iron-east-01.cleardb.net; dbname=heroku_8ab616a97278496", 'b395d6de31dcf5', '9fa27eb9',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
}

?>

