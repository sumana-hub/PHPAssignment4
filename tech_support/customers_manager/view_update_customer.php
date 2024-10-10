<?php
// Include database connection and customer database functions
require('../model/database.php');
require('../model/customer_db.php'); 
include('../includes/header.php');

// Get customerID from GET request and validate it
$customerID = filter_input(INPUT_GET, 'customerID', FILTER_VALIDATE_INT);

if ($customerID) {
    // Fetch customer data from the database based on customerID
    $customer = get_customer_by_id($customerID);
} else {
    // Redirect back to search page if no valid customerID is provided
    header('Location: index.php');
    exit; // Exit to prevent further execution
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View/Update Customer</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<header>
    <h1>SportsPro Technical Support</h1> 
    <p>Sports management software for the sports enthusiast</p> 
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li> 
        </ul>
    </nav>
</header>

<main>
<h1>View/Update Customer</h1>
<!-- Form to update customer details, method should be POST -->
<form action="update_customer.php" method="post">
    <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>"> <!-- Hidden input to send customerID -->
    </br>
    <!-- Input fields for customer data with current values populated -->
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" value="<?php echo htmlspecialchars($customer['firstName']); ?>" required><br>
    </br>
    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" value="<?php echo htmlspecialchars($customer['lastName']); ?>" required><br>
    </br>
    <label for="address">Address:</label>
    <input type="text" name="address" value="<?php echo htmlspecialchars($customer['address']); ?>" required><br>
    </br>
    <label for="city">City:</label>
    <input type="text" name="city" value="<?php echo htmlspecialchars($customer['city']); ?>" required><br>
    </br>
    <label for="state">State:</label>
    <input type="text" name="state" value="<?php echo htmlspecialchars($customer['state']); ?>" required><br>
    </br>
    <label for="postalCode">Postal Code:</label>
    <input type="text" name="postalCode" value="<?php echo htmlspecialchars($customer['postalCode']); ?>" required><br>
    </br>
    <label for="countryCode">Country Code:</label>
    <input type="text" name="countryCode" value="<?php echo htmlspecialchars($customer['countryCode']); ?>" required><br>
    </br>
    <label for="phone">Phone:</label>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>" required><br>
    </br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required><br>
    </br>
    <label for="password">Password:</label>
    <input type="password" name="password" value="<?php echo htmlspecialchars($customer['password']); ?>" required><br>
    </br>
    <!-- Submit button to update customer information -->
    <input type="submit" value="Update Customer">
</form>
</br>
<!-- Link to return to the search customers page -->
<p><a href="index.php">Back to Search Customers</a></p>
</main>

<?php include("../view/footer.php"); ?> <!-- Include footer -->
</body>
</html>
