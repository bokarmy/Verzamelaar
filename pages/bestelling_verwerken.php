<?php
// Maak een databaseverbinding
$hostname = "localhost:3306";
$username = "dbz88885";
$password = "bokarmy6806";
$database = "88885_database";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Ontvang de gegevens van het bestelformulier
$shoeId = $_POST['shoe_id'];
$shoeSize = $_POST['shoe_size'];
$customerName = $_POST['customer_name'];
$customerAddress = $_POST['customer_address'];

// Voeg de bestelling toe aan de database
$query = "INSERT INTO bestellingen2 (shoe_id, shoe_size, customer_name, customer_address) VALUES (?, ?, ?, ?)";

if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("iiss", $shoeId, $shoeSize, $customerName, $customerAddress);
    $stmt->execute();
    $stmt->close();
    
    // Hier kun je verdere verwerking toevoegen, zoals een bedankpagina of een bevestigingsbericht
    echo "Bestelling geplaatst. Bedankt, $customerName!";
} else {
    // Foutafhandeling
    echo "Er is een fout opgetreden bij het verwerken van de bestelling.";
}

// Sluit de databaseverbinding
$conn->close();
?>

