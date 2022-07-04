<?php
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipCode = $_POST['zipCode'];
	$cardName = $_POST['cardName'];
	$cardNumber = $_POST['cardNumber'];
	$expMonth = $_POST['expMonth'];
	$expYear = $_POST['expYear'];
	$cvv = $_POST['cvv'];

	// Database connection
	$conn = new mysqli('localhost','root','','pg');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into payment(fullName, email, address, city, state, zipCode, cardName, cardNumber, expMonth, expYear, cvv) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssssi", $fullName, $email, $address, $city, $state, $zipCode, $cardName, $cardNumber, $expMonth, $expYear, $cvv);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>