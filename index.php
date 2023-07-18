<?php 

	include "db.php";
	$obj = new db();

	// $paramList = ["ali"];
	// $sql = "SELECT std_id, std_name, city_name FROM students 
	// 		INNER JOIN city ON students.city_id = city.city_id 
	// 		WHERE std_name  = ?";
	
	$paramList = [];
	$sql = "SELECT * FROM users";
	$result = $obj->executeSQL($sql, $paramList, true);
	
	// echo "<pre>";
	// print_r($result);
	// echo "</pre>";

	
	// $paramList = [20];
	// $sql = "DELETE FROM students WHERE std_id > ?";
	// $result = $obj->executeSQL($sql, $paramList);
	// if($result["queryExecuted"] == true)
	// {
	// 	echo "$result[affectedRows] Record[s] Updated Successfully";
	// }
	// else
	// {
	// 	echo "No Record Updated";
	// }

	
	// $paramList = ["abc", 20, 2];
	// $sql  = "INSERT INTO students (std_name, std_age, city_id) VALUES (?,?,?)";
	// $result = $obj->executeSQL($sql, $paramList);
	// if($result["queryExecuted"] == true)
	// {
	// 	echo "$result[affectedRows] Record[s] Updated Successfully";
	// }
	// else
	// {
	// 	echo "No Record Updated";
	// }
	

	// $paramList = ["Noman", 20, 2, 3];
	// $sql  = "UPDATE students SET std_name = ?, std_age = ?, city_id = ? 
	// 		 WHERE std_id = ?;";
	// $result = $obj->executeSQL($sql, $paramList);
	// if($result["queryExecuted"] == true)
	// {
	// 	echo "$result[affectedRows] Record[s] Updated Successfully";
	// }
	// else
	// {
	// 	echo "No Record Updated";
	// }

?>


