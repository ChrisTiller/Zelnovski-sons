<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/menu.css">
  		<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  		<link rel="stylesheet" type="text/css" href="../css/button.css">
  		<link rel="stylesheet" type="text/css" href="../css/input.css">
  		<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  		<title>Z&amp;S - Salespeople</title>

  
	</head>

<body>

<?php include("../connect.php");

	$complete=false;

	if (strlen($_POST['name']) > 0) {
		$name = $_POST['name'];
		$comm = $_POST['commission'];
	

	$sql = "INSERT INTO SALESPEOPLE (Name, Comm_Rate) VALUES ('".$name."', '".$comm."');";

	$query = mysqli_query($connection, $sql) or die("Cannot query the database.<br>".mysqli_error($query));

	if ($query) {
		$complete=true;
	}

	}

?>

	<div class="menu" style="width: 100%; height: 110px;">

		<a style="position: absolute; top: 5px; left: 5px; line-height: 105px; vertical-align: middle;"><b>Zelnovski &amp; Son's - Salespeople</b></a>

	</div>


	<div class="sidebar" style="position: absolute; top: 110px; left: 0px; height: calc(100% - 110px); width: 300px;">
			
			<br><br><br><br>

			<a href="../index.php" class="sidebarButton" style="border-bottom: none;">Home</a>

			<a href="new.php" class="sidebarButton" style="border-bottom: none;">New</a>

			<a href="view.php" class="sidebarButton" style="border-bottom: none;">View</a>

			<a href="query.php" class="sidebarButton">Query</a>


	</div>	

	<div style="position: absolute; top: 110px; left: 300px; width: calc(100% - 300px); height: calc(100% - 110px); background: linear-gradient(rgb(255,255,255), rgb(228,241,254) 70%);">
		<div style="text-align: center;">

			<br>

			<b><big><big>New Salesperson</big></big></b>
			<form name="salesperson" method="post" action="new.php" enctype="	multipart/form-data">

				<br>

				<table  style="margin: 0 auto;">
					<tr>
						<td> <label style="font-size: 20px; font-family: Helvetica;" for="name">Name: </label> </td>
						<td> <input type="text" id="name" name="name" value=""> </td> 
					</tr>
					<tr>
						<td> <label style="font-size: 20px; font-family: Helvetica;" for="commission">Commission Rate(%): </label> </td>
						<td> <input type="number" step="0.01" min="0" id="commission" name="commission" value="0.0"> </td> 
					</tr>
				</table>

				<br>

				<button type="reset" class="button">Reset</button>
				<button type="submit" class="button">Submit</button>
			</form>

			<?php

				if ($complete) {
					print "New Salesperson Added";
				}

			?>

		</div>


	</div>

	<br>
	<br>

</body>

</html>