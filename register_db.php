<?php 
include_once('connection.php');
$action=$_REQUEST['action'];


switch($action){

	case 'save': 

		$uname=$_REQUEST['uname'];
		$pwd=$_REQUEST['pwd'];

		$sql="SELECT cid from users WHERE uname='$uname'";
		$query = $pdoconn->prepare($sql);
		$query->execute();
		$arr_trade = $query->fetchAll(PDO::FETCH_ASSOC);
		if(count($arr_trade)>0){
			echo "User Exists";
			break;
		}

		$sql="INSERT INTO users (uname, pwd) VALUE ('$uname', '$pwd')";
		$query = $pdoconn->prepare($sql);
		$query->execute();
		echo "Registraion Successfull!";
		break;
}
?> 