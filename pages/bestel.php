<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../media/logosneaker.png">
    <title>Bestel</title>
</head>
<body>
    <h1>Bestel hier:</h1>

    <?php
    // Haal de schoen-ID, -titel en -afbeelding op uit de URL-parameters
    $shoeId = $_GET['id'];
    $shoeTitle = urldecode($_GET['title']);
    $shoeImage = urldecode($_GET['image']);
    
    // Voeg hier een databaseverbinding toe als je die nog niet hebt
    $hostname = "localhost:3306";
    $username = "dbz88885";
    $password = "bokarmy6806";
    $database = "88885_database";
    
    // Maak een databaseverbinding
    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Verbinding mislukt: " . $conn->connect_error);
    }
    
    // Probeer de beschrijving uit de database op te halen
    $shoeDescription = "Beschrijving niet gevonden"; // Standaardwaarde

    if (isset($_GET['title'])) {
        // Controleer of de 'title' parameter is ingesteld en haal de beschrijving op uit de database
        $title = urldecode($_GET['title']);

        // Hier wordt een databasequery uitgevoerd om de beschrijving op te halen
        $query = "SELECT description FROM schoenen WHERE title = '" . $title . "'";
        
        // Voer de query uit
        $result = $conn->query($query);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $shoeDescription = $row['description'];
        }
    }

    // Hier wordt de titel, beschrijving en afbeelding weergegeven op de pagina
    echo "<h2>Geselecteerde schoen: $shoeTitle</h2>";
    echo "<p>Beschrijving: $shoeDescription</p>";
    echo "<img src='$shoeImage' alt='$shoeTitle' width='200'>"; // Afbeelding toegevoegd
    ?>
<br>

<h2>Kies je maat:</h2>
<form action="bestelling_verwerken.php" method="post">
    <input type="hidden" name="shoe_id" value="<?php echo $shoeId; ?>">
    <label for="shoe_size">Maat:</label>
    <input type="text" id="shoe_size" name="shoe_size" required>
    <label for="customer_name">Naam:</label>
    <input type="text" id="customer_name" name="customer_name" required>
    <label for="customer_address">Adres:</label>
    <input type="text" id="customer_address" name="customer_address" required>
    <input type="submit" value="Bestel">
</form>
<br>
    <a href="shoes.php">Terug naar schoenen</a>
    
</body>
</html>
