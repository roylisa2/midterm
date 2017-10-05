<?php
    require_once('database.php');

    
    //Midterm ----------------
    // Fresh Start
    
    //Set search term or hard-code the parameter value
    $state = "CA";
    
    $query = "SELECT firstName, lastName, city FROM customers WHERE state = ? ORDER BY lastName";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $state);
    $stmt->execute();
    
    $stmt->store_result();
    //store result fields in variables
    $stmt->bind_result($firstName, $lastName, $city);
?>

<!-- header information comes from include file -->
    <p><?php include 'header.php'; ?></p>

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

 <!-- shared footer information comes from include file -->
    <p><?php include 'footer.php'; ?></p>
