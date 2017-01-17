
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/menu.css">
  		<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  		<link rel="stylesheet" type="text/css" href="../css/button.css">
  		<link rel="stylesheet" type="text/css" href="../css/input.css">
  		<link rel="stylesheet" type="text/css" href="../css/table.css">
  		<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  		<title>Z&amp;S - Items</title>

  
	</head>

<body>

	<div class="menu" style="width: 100%; height: 110px;">

		<a style="position: absolute; top: 5px; left: 5px; line-height: 105px; vertical-align: middle;"><b>Zelnovski &amp; Son's - Items</b></a>

	</div>


	<div class="sidebar" style="position: absolute; top: 110px; left: 0px; height: calc(100% - 110px); width: 300px;">
			
			<br><br><br><br>

			<a href="../index.php" class="sidebarButton" style="border-bottom: none;">Home</a>

			<a href="new.php" class="sidebarButton" style="border-bottom: none;">New</a>

			<a href="view.php" class="sidebarButton" style="border-bottom: none;">View</a>


	</div>	

	<div style="position: absolute; top: 110px; left: 300px; width: calc(100% - 300px); height: calc(100% - 110px); background: linear-gradient(rgb(255,255,255), rgb(228,241,254) 70%); text-align: center;">

			<br>

			<b><big><big>All Items</big></big></b>
			

			<div style="overflow-x: auto; position: relative; top: 50px; left: 50px; height: calc(100% - 160px); width: calc(100% - 100px);">

			<table  style="margin: 0 auto;">
				<tr>
					<th>ID</th>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Wholesale Price</th>
					<th>Retail Price</th>
					<th>Supplier</th>
				</tr>

				<?php include("../connect.php");

					$sql = "SELECT ITEMS.Id, ItemName, Quantity, Wholesale_Price, Retail_Price, Name FROM ITEMS, SUPPLIERS WHERE ITEMS.Supplier = SUPPLIERS.Id ORDER BY ITEMS.Id ASC";
					
					$query = mysqli_query($connection, $sql) or die("Cannot query the database.<br>".mysqli_error($connection));

					while($result = mysqli_fetch_array($query)) {
						$id = $result["Id"];
						$item = $result["ItemName"];
						$quantity = $result["Quantity"];
						$wholesale = $result["Wholesale_Price"];
						$retail = $result["Retail_Price"];
						$supplier = $result["Name"];

				?>

				<tr>
					<td> <?php echo $id; ?> </td>
					<td> <?php echo $item; ?> </td>
					<td style="text-align: right;"> <?php echo $quantity; ?> </td>
					<td style="text-align: right;"> <?php echo "\$$wholesale"; ?> </td>
					<td style="text-align: right;"> <?php echo "\$$retail"; ?> </td>
					<td> <?php echo $supplier; ?> </td>
				</tr>

				<?php
					}
				?>

				
			</table>

			<br>

			</div>

	</div>

	<br>
	<br>

</body>

</html>