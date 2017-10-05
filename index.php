<?php
    require_once('database.php');

    
    //Midterm ---------------- 10 5 2017
    
    //Set search term or hard-code the parameter value
    $version = "2";
    // Advanced $customerID = "1004";
    
    //SO I got the advanced query to work in phpmyadmin
    // but I kept getting errors when trying to implement it in here :(
    // ADVANCED QUERY:
    //             $query = "SELECT p.productCode, p.name, c.firstName, c.lastName 
    //                       FROM products p, registrations r, customers c 
    //                       WHERE (r.customerID = ? and c.customerID = ?) and (r.productCode = p.productCode)";
    // I am having issues HERE trying to get it to work, I really wanted to figure this out, but there is not enough time...
    // ERROR I get: Warning: mysqli_stmt::bind_param(): Number of variables doesn't match number of parameters in prepared statement in /home/ubuntu/workspace/Midterm/index.php on line 17 
    $query = "SELECT productCode, name FROM products WHERE version = ?";
    $stmt = $conn->prepare($query);
    // Advanced $stmt->bind_param('s', $customerID);
    $stmt->bind_param('s', $version);
    $stmt->execute();
    
    $stmt->store_result();
    //store result fields in variables
    $stmt->bind_result($productCode, $productName);
    //Advanced $stmt->bind_result($productCode, $productName, $firstName, $lastName);
?>

<!-- header information comes from include file -->
    <p><?php include 'header.php'; ?></p>

    <div id="header">
        <h1>Product Manager</h1>
    </div>

    <div id="main">

        <h1>Product Query</h1>
        <div id="content">
            <!-- display a table of orders -->
            
            <table>
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                </tr>
                <?php while ($stmt->fetch()) { ?>
                <tr>
                    <td><?php echo $productCode; ?></td>
                    <td><?php echo $productName ?></td>
                </tr>
                <?php } 
                
    $stmt->free_result();
    $conn->close();?>
            </table>
        </div>
    </div>

 <!-- shared footer information comes from include file -->
    <p><?php include 'footer.php'; ?></p>
