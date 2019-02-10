<?php
		require_once ("../database/Db.php");
		$connect = new Db();
		$connect->connect;
		

		function dispetcher(){
			$query = [];
			
			if(array_key_exists('id', $_POST)) {
				array_push($query, $_POST['id']);
			}
			else {
				array_push($query, false);
			}
			
			if (array_key_exists('city', $_POST)) {
				array_push($query, $_POST['city']);
			}
			else {
				array_push($query, false);
			}
			
			if (array_key_exists('sum', $_POST)) {
				array_push($query, $_POST['sum']);
			}
			else {
				array_push($query, false);
			}			
			return $query;
		}
		
		$arr = dispetcher();
		

		function queryDispatcher($arr) {
			$id = '';
			$city = '';
			$sum = '';
			
			if (array_key_exists(0, $arr) AND ($arr[0]) != "") {
				$id = $arr[0];
			}
			if (array_key_exists(1, $arr) AND ($arr[1]) != "") {
				$city = $arr[1];
			}
			if (array_key_exists(2, $arr) AND ($arr[2]) != "") {
				$sum = $arr[2];
			}
			
			return [$id, $city, $sum];
		}
		
		$test = queryDispatcher($arr);	
	
		$id= "";
		$city = "";
		$sum = "";
		if ($test[0] != "") {
			$id = "id=".$test[0]." AND ";
		}
		if ($test[1] != "") {
			$city = "city='".$test[1]."' AND ";
		}
		if ($test[2] != "") {
			$sum = "sum<=".$test[2];
		}
		
		
		$query = "SELECT * FROM orderTable WHERE $id $city $sum ORDER BY date DESC ";
		
		$result = mysqli_query($connect->connect, $query) or die (mysqli_error($connect-connect));
		
		for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);
		
		$data = $arr;
		$data['count'] = count($data);
		
		echo json_encode($data);
		