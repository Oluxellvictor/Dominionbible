<?php
//assigning value to a variable
function register(){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	// Validating against empty string
	if (empty($firstname)){
	return "Firstname is empty";
	}
	if (empty($lastname)){
	return "Lastname is empty";
	}
	if (empty($email)){
	return "Email is empty";
	}	
	if (empty($phone)){
	return "Phone is empty";
	}
//Connecting to the database
	$connection= @mysql_connect("localhost","dbsniger_users","niger@001!") or die (mysql_error());
	@mysql_select_db("dbsniger_data") or die (mysql_error());

	$query= @mysql_query("INSERT INTO tbl_users (firstname, lastname, email, phone) VALUES('$firstname', 										'$lastname', '$email', '$phone')");
	$count = @mysql_affected_rows();
//echo $count;
	if ($count==0){
	return "System Busy, try again later";	
	}
	else{
	return "Registration successful";
	}
	mysql_close($connection);
}
?>