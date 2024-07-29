<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the text from POST request
    $text = $_POST['text'];
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO text (content) VALUES (?)");
    $stmt->bind_param("s", $text);

    // Execute
    if ($stmt->execute()) {
        echo "Text saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
