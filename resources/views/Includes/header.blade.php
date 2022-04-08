<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- Bootstrap CSS -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous"
		/>
		<!-- Datatable -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
		<!-- Material Icon Link -->
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
		/>

		<!-- Google Font  -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;1,400;1,500&family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,700;0,800;1,100;1,200;1,600;1,700;1,800&family=Signika:wght@300&display=swap"
			rel="stylesheet"
		/>

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('./css/app.css')}}" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
		<!-- Title -->
		<title>Login</title>
	</head>

	<body>