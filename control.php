<?php
	use Sirius\Validation\Validator;

	include_once "index.php";
	require 'vendor/autoload.php';


	$validator = new Validator();

	$validator
		->add('title', 'Required | AlphaNumeric')
		->add('price', 'Required | Number')
		->add('description', 'Required')
		->add('description', 'Required');

	$update = false;
	$id = $title = $price = $description = $properties = '';

	if(isset($_POST['add-product']))
	{
		if ($validator->validate($_POST)) 
		{
			$title = $_POST['title'];
			$price = $_POST['price'];
			$description = $_POST['description'];
			$properties = $_POST['properties'];

			$res = mysqli_query($db->getConnection(), "INSERT INTO Product (title, price, description, properties)
				VALUES ('$title', '$price', '$description', '$properties')");
		}
		else 
		{
			echo '<script>alert("Validation error")</script>';
		}
		
	}
	if(isset($_GET['delete']))
	{
		$id = $_GET['delete'];
		mysqli_query($db->getConnection(), "DELETE FROM Product WHERE id=$id");
	}
	if(isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$update = true;
		$query = mysqli_query($db->getConnection(), "SELECT * FROM Product WHERE id=$id"); 
			$data = $query->fetch_array();
		print_r($data);
		$title = $data['title'];
		$price = $data['price'];
		$description = $data['description'];
		$properties = $data['properties'];
	}
	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		$price = $_POST['price'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$properties = $_POST['properties'];
		
		mysqli_query($db->getConnection(), "UPDATE
			Product SET title='$title', price='$price',
			description='$description', properties='$properties'
			WHERE id='$id'");
	}