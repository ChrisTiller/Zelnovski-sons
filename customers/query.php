
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/menu.css">
  		<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  		<link rel="stylesheet" type="text/css" href="../css/button.css">
  		<link rel="stylesheet" type="text/css" href="../css/input.css">
  		<link rel="stylesheet" type="text/css" href="../css/table.css">
  		<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  		<title>Z&amp;S - Customers</title>

  
	</head>

<body>

	<div class="menu" style="width: 100%; height: 110px;">

		<a style="position: absolute; top: 5px; left: 5px; line-height: 105px; vertical-align: middle;"><b>Zelnovski &amp; Son's - Customers</b></a>

	</div>


	<div class="sidebar" style="position: absolute; top: 110px; left: 0px; height: calc(100% - 110px); width: 300px;">
			
			<br><br><br><br>

			<a href="../index.php" class="sidebarButton" style="border-bottom: none;">Home</a>

			<a href="new.php" class="sidebarButton" style="border-bottom: none;">New</a>

			<a href="view.php" class="sidebarButton" style="border-bottom: none;">View</a>

			<a href="query.php" class="sidebarButton">Query</a>


	</div>	

	<div style="position: absolute; top: 110px; left: 300px; width: calc(100% - 300px); height: calc(100% - 110px); background: linear-gradient(rgb(255,255,255), rgb(228,241,254) 70%); text-align: center;">

			<br>

			<b><big><big>Query A Customer</big></big></b>

			<div style="position: relative; text-align: left; top: 20px; left: 15; width: calc(100% - 30px); height: 60px; border-bottom: 2px solid black;">

			<form name="salesperson_query" method="post" action="query.php" enctype="multipart/form-data">

				<label style="font-size: 20px; font-family: Helvetica;" for="card">Credit Card: </label>
				<input type="number" id="card" name="card" value="">



				<label style="font-size: 20px; font-family: Helvetica; position: relative; left: 10px;" for="name">Name: </label>
				<input style="position: relative; left: 10px;" type="text" id="name" name="name" value="">

				<button style="position: relative; left: 10px;" type="submit" class="button">Search</button>


			</form>


			</div>
			

			<div style="overflow-x: auto; position: relative; top: 30px; left: 50px; height: calc(100% - 160px); width: calc(100% - 100px);">

                <table  style="margin: 0 auto;">
                    <tr>
                        <th>Credit Card</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Credit Limit</th>
                    </tr>

                    <?php include("../connect.php");

                    	$hasRows = true;

                    	if (isset($_POST['name']) || isset($_POST['card'])) {
                    		$name = $_POST['name'];
                    		$card = $_POST['card'];

                    		$sql = "SELECT * FROM CUSTOMERS WHERE 1 = 0";

                    		if ($card > 0) {
	                        	$sql = "SELECT * FROM CUSTOMERS WHERE Credit_Card = $card";
	                        	if (strlen($name) > 0) {
	                        		$sql = $sql." and Name = '$name'";
	                        	}
	                        }

                    		if (strlen($name) > 0) {
	                        	$sql = "SELECT * FROM CUSTOMERS WHERE Name = '$name'";
	                        	if ($card > 0) {
	                        		$sql = $sql." and Credit_Card = $card";
	                        	}
	                        }

	                        $query = mysqli_query($connection, $sql) or die("Cannot query the database.<br>".mysqli_error($connection));

	                        

	                        if (mysqli_num_rows($query) == 0) {
	                        	$hasRows = false;
	                        }

	                        while($result = mysqli_fetch_array($query)) {
	                            $id = $result["Credit_Card"];
	                            $name = $result["Name"];
	                            $address = $result["Address"];
	                            $limit = $result["Credit_Limit"];


                    ?>

                    <tr>
                        <td> <?php echo $id; ?> </td>
                        <td> <?php echo $name; ?> </td>
                        <td> <?php echo $address; ?> </td>
                        <td> <?php echo $limit; ?> </td>
                    </tr>

                    <?php
                        	}
                    	}
                    ?>


                </table>

                <?php 
                	if ($hasRows == false) {
                		print "<a style=\"font-size: 20px; font-family: Helvetica;\"><b>No Records To Show</b></a>";
                	}
                ?>

			<br>

			</div>

	</div>

	<br>
	<br>

</body>

</html>