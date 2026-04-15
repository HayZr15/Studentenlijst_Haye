<?php
// Step 1: Include the database connection
include('db.php');

// Step 2: Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect data from the form (names must match the 'name' attributes in edit.php)
    $id = $_POST['id'];
    $v = $_POST['voornaam'];
    $t = $_POST['tussenvoegsel'];
    $a = $_POST['achternaam'];
    $e = $_POST['email'];

    // Step 3: Securely update the database using Prepared Statements
    // We use $conn (from db.php) and we include the StudentID in the WHERE clause
    $stmt = $conn->prepare("UPDATE new1 SET Voornaam=?, Tussenvoegsel=?, Achternaam=?, Email=? WHERE StudentID=?");
    
    // "ssssi" stands for 4 strings and 1 integer (the StudentID)
    $stmt->bind_param("ssssi", $v, $t, $a, $e, $id);

    // Step 4: Execute the statement and check for success
    if($stmt->execute()) {
        // Success: Redirect back to the overview page
        header("Location: index.php");
        exit();
    } else {
        // Error: Show what went wrong
        echo "Error updating record: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>