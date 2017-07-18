<?php 

	$pdo=new PDO('mysql:host=localhost;dbname=php83;charset=utf8;port=3306','root','');
	if($_GET['table']=="car_model"){
		$stmt=$pdo->prepare("SELECT * FROM car_model WHERE path=:path");
	}
	if($_GET['table']=="car_center"){
		if(isset($_GET['date'])){
			$_GET['date']="%".$_GET['date']."%";
			$stmt=$pdo->prepare("SELECT * FROM car_center WHERE c_id=:c_id AND ctype_name LIKE :date");
		}else{
			$stmt=$pdo->prepare("SELECT * FROM car_center WHERE c_id=:c_id");
		}
	}
	unset($_GET['table']);
	$res=$stmt->execute($_GET);

	if($res){
		$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($arr){
			echo json_encode($arr);
		}else{
			die('没有数据!');
		}
	}else{
		die('执行失败!');
	}	

 ?>