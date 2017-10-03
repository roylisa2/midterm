<?php
    require_once('database.php');

    
    //MidtermPractice Additions ----------------
    // -Updated Database to tech_support
    // -Updated user to ts_user
    // -Updated query
    
    //Set search term or hard-code the parameter value
    $state = "CA";
    
    $query = "SELECT firstName, lastName, city FROM customers WHERE state = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $state);
    $stmt->execute();
    
    $stmt->store_result();
    //store result fields in variables
    $stmt->bind_result($firstName, $lastName, $city);
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
        <h1>Customer Manager</h1>
    </div>

    <div id="main">

        <h1>Customers</h1>
        <div id="content">
            <!-- display a table of orders -->
            
            <table>
                <tr>
                    <th>Fist Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                </tr>
                <?php while ($stmt->fetch()) { ?>
                <tr>
                    <td><?php echo $firstName; ?></td>
                    <td><?php echo $lastName ?></td>
                    <td><?php echo $city ?></td>
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