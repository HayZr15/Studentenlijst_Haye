<?php
// Step 1: Include database connection
include('db.php');

// Step 2: Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect data from the form (must match the 'name' attributes in toevoegen.php)
    $v = $_POST['v_naam'];
    $t = $_POST['t_voegsel'];
    $a = $_POST['a_naam'];
    $e = $_POST['e_mail'];

    // Step 3: Prepare the SQL statement using $conn (from db.php)
    // We use 4 placeholders (?) for 4 strings ("ssss")
    $stmt = $conn->prepare("INSERT INTO new1 (Voornaam, Tussenvoegsel, Achternaam, Email) VALUES (?, ?, ?, ?)");
    
    // Bind the variables to the prepared statement
    $stmt->bind_param("ssss", $v, $t, $a, $e);

    // Step 4: Execute the query and check for success
    if($stmt->execute()) { 
        // Success: redirect to overview page
        header("Location: index.php"); 
        exit();
    } else {
        // Error: show what went wrong
        echo "Database Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>