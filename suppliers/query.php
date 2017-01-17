
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/menu.css">
  		<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  		<link rel="stylesheet" type="text/css" href="../css/button.css">
  		<link rel="stylesheet" type="text/css" href="../css/input.css">
  		<link rel="stylesheet" type="text/css" href="../css/table.css">
  		<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  		<title>Z&amp;S - Suppliers</title>

  
	</head>

<body>

	<div class="menu" style="width: 100%; height: 110px;">

		<a style="position: absolute; top: 5px; left: 5px; line-height: 105px; vertical-align: middle;"><b>Zelnovski &amp; Son's - Suppliers</b></a>

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

			<b><big><big>Query A Supplier</big></big></b>

			<div style="position: relative; text-align: left; top: 20px; left: 15; width: calc(100% - 30px); height: 60px; border-bottom: 2px solid black;">

			<form name="salesperson_query" method="post" action="query.php" enctype="multipart/form-data">

				<label style="font-size: 20px; font-family: Helvetica;" for="name">Name: </label>
				<input type="text" id="name" name="name" value="">

				<button type="submit" class="button">Search</button>


			</form>


			</div>
			

			<div style="overflow-x: auto; position: relative; top: 30px; left: 50px; height: calc(100% - 160px); width: calc(100% - 100px);">

                <table  style="margin: 0 auto;">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>

                    <?php include("../connect.php");

                    	$hasRows = true;

                    	if (isset($_POST['name']) > 0) {
                    		$name = $_POST['name'];

	                        $sql = "SELECT * FROM SUPPLIERS WHERE Name = '$name'";

	                        $query = mysqli_query($connection, $sql) or die("Cannot query the database.<br>".mysqli_error($connection));

	                        if (mysqli_num_rows($query) == 0) {
	                        	$hasRows = false;
	                        }

	                        while($result = mysqli_fetch_array($query)) {
	                            $id = $result["Id"];
	                            $name = $result["Name"];


                    ?>

                    <tr>
                        <td> <?php echo $id; ?> </td>
                        <td> <?php echo $name; ?> </td>
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