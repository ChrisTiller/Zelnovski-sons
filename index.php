<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/menu.css">
  		<link rel="stylesheet" type="text/css" href="css/sidebar.css">
  		<link rel="stylesheet" type="text/css" href="css/table.css">
  		<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  		<title>Z&amp;S - Home</title>


	</head>

<body>

	<div class="menu" style="width: 100%; height: 110px;">

		<a style="position: relative; top: 5px; left: 5px; line-height: 105px; vertical-align: middle;"><b>Zelnovski &amp; Son's - Home</b></a>

	</div>

	<div class="sidebar" style="position: absolute; top: 110px; left: 0px; height: calc(100% - 110px); width: 300px;">

			<br><br><br><br>

			<a href="index.php" class="sidebarButton" style="border-bottom: none;">Home</a>

			<a href="salespeople/new.php" class="sidebarButton" style="border-bottom: none;">Salespeople</a>

			<a href="suppliers/new.php" class="sidebarButton" style="border-bottom: none;">Suppliers</a>

			<a href="items/new.php" class="sidebarButton" style="border-bottom: none;">Items</a>

			<a href="customers/new.php" class="sidebarButton" style="border-bottom: none;">Customers</a>

			<a href="invoices/query.php" class="sidebarButton">Invoices</a>


	</div>

	<div style="position: absolute; top: 110px; left: 300px; width: calc(100% - 300px); height: calc(100% - 110px); background: linear-gradient(rgb(255,255,255), rgb(228,241,254) 70%);">
		<div style="text-align: center;">
			
			<br>

			<b><big><big>At A Glance</big></big></b>

			<div style="text-align: center; overflow-x: auto; position: relative; top: 50px; margin: 0 auto; height: 300px; width: 500px; text-align: center; vertical-align: top;">

				<a style="font-size: 20px; font-family: Helvetica;"><b>Top 5 Salespeople</b></a>

				<table style="margin: 0 auto;">
					<tr>
						<th>ID</th>
						<th>Salesperson</th>
						<th>Sales Made</th>
					</tr>

					<?php
						include("connect.php");

						$sql = "SELECT SALESPEOPLE.Id, SALESPEOPLE.Name, COUNT(SALES.Salesperson) AS Sales_Made FROM SALES, SALESPEOPLE WHERE SALESPEOPLE.Id = SALES.Salesperson GROUP BY SALES.Salesperson ORDER BY Sales_Made DESC, SALESPEOPLE.Id ASC LIMIT 5";


						$query = mysqli_query($connection, $sql) or die("Cannot query the database.<br>".mysqli_error($connection));

						while($result = mysqli_fetch_array($query)) {
							$id = $result["Id"];
							$name = $result["Name"];
							$sales = $result["Sales_Made"];
				

					?>

					<tr>
						<td> <?php echo $id; ?> </td>
						<td> <?php echo $name; ?> </td>
						<td> <?php echo $sales; ?> </td>
					</tr>

					<?php
						}
					?>
					
				</table>

			</div>

			<br>
			<br>
			<br>
			<br>


			<div style="text-align: center; overflow-x: auto; position: relative; margin: 0 auto; height: 300px; width: 500px; text-align: center; vertical-align: top;">

				<a style="font-size: 20px; font-family: Helvetica;"><b>Top 5 Items</b></a>

				<table style="margin: 0 auto;">
					<tr>
						<th>ID</th>
						<th>Item Name</th>
						<th>Sales Made</th>
					</tr>

					<?php
						//include("connect.php");

						$sql = "SELECT ITEMS.Id, ITEMS.ItemName, COUNT(SALES.Item) AS Sales_Made FROM SALES, ITEMS WHERE ITEMS.Id = SALES.Item GROUP BY SALES.Item ORDER BY Sales_Made DESC, SALES.Item ASC LIMIT 5";


						$query = mysqli_query($connection, $sql) or die("Cannot query the database.<br>".mysqli_error($connection));

						while($result = mysqli_fetch_array($query)) {
							$id = $result["Id"];
							$name = $result["ItemName"];
							$sales = $result["Sales_Made"];
				

					?>

					<tr>
						<td> <?php echo $id; ?> </td>
						<td> <?php echo $name; ?> </td>
						<td> <?php echo $sales; ?> </td>
					</tr>

					<?php
						}
					?>
					
				</table>

			</div>


		</div>
	</div>

</body>

</html>
