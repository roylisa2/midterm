<?php
    require_once('database.php');

    
    //Lab 7 Additions ----------------
    //Set search term or hard-code the parameter value
    $customerID = 1;
    
    $query = "SELECT orderID, orderDate FROM orders WHERE customerID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $customerID);
    $stmt->execute();
    
    $stmt->store_result();
    //store result fields in variables
    $stmt->bind_result($orderID, $orderDate);
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Order Manager</h1>
    </div>

    <div id="main">

        <h1>Orders</h1>
        <div id="content">
            <!-- display a table of orders -->
            
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                </tr>
                <?php while ($stmt->fetch()) { ?>
                <tr>
                    <td><?php echo $orderID; ?></td>
                    <td><?php echo $orderDate ?></td>
                </tr>
                <?php } 
                
    $stmt->free_result();
    $conn->close();?>
            </table>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> My Customers, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>