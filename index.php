<?php
    require_once('database.php');

    // Get customers for selected category
    $query = "SELECT firstName, lastName FROM customers order by lastName;";
    // Results set
    $customers = $db->query($query);
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
            <!-- display a table of customers -->
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                <?php foreach ($customers as $customer) : ?>
                <tr>
                    <td><?php echo $customer['firstName']; ?></td>
                    <td><?php echo $customer['lastName']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> My Customers, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>