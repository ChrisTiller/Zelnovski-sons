
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/menu.css">
  		<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  		<link rel="stylesheet" type="text/css" href="../css/button.css">
  		<link rel="stylesheet" type="text/css" href="../css/input.css">
  		<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  		<title>Z&amp;S - Invoices</title>

  
	</head>

<body>

	<div class="menu" style="width: 100%; height: 110px;">

		<a style="position: absolute; top: 5px; left: 5px; line-height: 105px; vertical-align: middle;"><b>Zelnovski &amp; Son's - Invoices</b></a>

	</div>


	<div class="sidebar" style="position: absolute; top: 110px; left: 0px; height: calc(100% - 110px); width: 300px;">
			
			<br><br><br><br>

			<a href="../index.php" class="sidebarButton" style="border-bottom: none;">Home</a>

			<a href="query.php" class="sidebarButton">Query</a>


	</div>	

	<div style="position: absolute; top: 110px; left: 300px; width: calc(100% - 300px); height: calc(100% - 110px); background: linear-gradient(rgb(255,255,255), rgb(228,241,254) 70%); text-align: center;">

			<br>

			<b><big><big>Query An Invoice</big></big></b>

			<div style="position: relative; text-align: left; top: 20px; left: 15; width: calc(100% - 30px); height: 60px; border-bottom: 2px solid black;">

			<form name="salesperson_query" method="post" action="query.php" enctype="multipart/form-data">

				<label style="font-size: 20px; font-family: Helvetica;" for="card">Invoice: </label>
				<input type="number" id="invoice" name="invoice" value="">

				<button style="position: relative; left: 10px;" type="submit" class="button">Search</button>


			</form>


			</div>
			
			<div style="position: relative; top: 30px; text-align: center;">
                <?php include("../connect.php");

                	$hasRows = true;

                	if (isset($_POST['invoice']) > 0) {
                		$invoice = $_POST['invoice'];

                		
                        $sql = "SELECT InvNo, Customer, CUSTOMERS.Name as CName, Date, Item, ItemName, Salesperson, SALESPEOPLE.Name as SName, Cash_Credit, Retail_Price FROM SALES, ITEMS, CUSTOMERS, SALESPEOPLE WHERE (InvNo = $invoice) and (SALES.Item = ITEMS.Id) and (SALES.Customer = CUSTOMERS.Credit_card) and (SALES.Salesperson = SALESPEOPLE.Id)";

                        if ($invoice == "") {
                        	$sql = "SELECT * FROM SALES WHERE 1 = 0";
                        }


                        $query = mysqli_query($connection, $sql) or die("Cannot query the database.<br>".mysqli_error($connection));

                        

                        if (mysqli_num_rows($query) == 0) {
                        	$hasRows = false;
                        } 

                        $result = mysqli_fetch_array($query);
                        
                        $id = $result["InvNo"];
                        $customer = $result["Customer"];
                        $name = $result["CName"];
                        $date = $result["Date"];
                        $item = $result["Item"];
                        $itemName = $result["ItemName"];
                        $salesperson = $result["Salesperson"];
                        $salespersonName = $result["SName"];
                        $paymentType = $result["Cash_Credit"];
                        $price = $result['Retail_Price'];

                        if ($hasRows) {
                ?>

                <table  style="margin: 0 auto; font-size: 20px; font-family: Helvetica;">
					<tr>
						<td style="padding: 8px;"><label style="font-size: 20px; font-family: Helvetica;">Invoice Number: </label> </td>
						<td style="padding: 8px;"><label style="font-size: 20px; font-family: Helvetica;"><?php print "$id"; ?></label></td> 
					</tr>
					<tr>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;">Customer: </label> </td>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "$customer"; ?></label></td>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "$name"; ?></label></td> 
					</tr>
					<tr>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;">Date: </label> </td>
						<td> </td>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "$date"; ?></label></td> 
					</tr>
					<tr>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;">Item: </label> </td>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "$item"; ?></label></td> 
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "$itemName"; ?></label></td>
					</tr>
					<tr>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;">Salesperson: </label> </td>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "$salesperson"; ?></label></td> 
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "$salespersonName"; ?></label></td> 
					</tr>
					<tr>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;">Payment Type: </label> </td>
						<td> </td>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "$paymentType"; ?></label></td> 
					</tr>
					<tr>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;">Price: </label> </td>
						<td> </td>
						<td style="padding: 8px;"> <label style="font-size: 20px; font-family: Helvetica;"><?php print "\$$price"; ?></label></td> 
					</tr>
				</table>

	            <?php 
	            	}

	        	}
	            	if ($hasRows == false) {
	            		print "<a style=\"font-size: 20px; font-family: Helvetica;\"><b>No Invoice To Show</b></a>";
	            	}
	            ?>

            </div>

		<br>

	</div>

	<br>
	<br>

</body>

</html>