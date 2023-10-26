<?php
// Verbind met de database (vervang de databasegegevens met de juiste waarden)
$hostname = "localhost:3306";
$username = "dbz88885";
$password = "bokarmy6806";
$database = "88885_database";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Voeg een nieuwe schoen toe
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addShoe'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $imageUrl = $_POST['imageUrl'];
    $price = $_POST['price'];

    $sql = "INSERT INTO schoenen (title, description, imageUrl, price) VALUES ('$title', '$description', '$imageUrl', '$price')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Schoen succesvol toegevoegd.";
    } else {
        echo "Fout bij het toevoegen van de schoen: " . $conn->error;
    }
}

// Verwijder een bestaande schoen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteShoe'])) {
    $shoeId = $_POST['shoe_id'];

    $sql = "DELETE FROM schoenen WHERE id = $shoeId";

    if ($conn->query($sql) === TRUE) {
        echo "Schoen succesvol verwijderd.";
    } else {
        echo "Fout bij het verwijderen van de schoen: " . $conn->error;
    }
}

// Haal alle schoenen op
$sql = "SELECT * FROM schoenen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Voeg de nodige metatags en stijlen toe -->
</head>
<body>
    <main>
        <h1>Admin Panel</h1>
        <form class="admin" id="addShoeForm" action="admin.php" method="post">
            <!-- Voeg de invoervelden toe om nieuwe schoenen toe te voegen -->
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="description" placeholder="Description" required>
            <input type="text" name="imageUrl" placeholder="Image URL" required>
            <input type="text" name="price" placeholder="Price" required>
            <input type="submit" name="addShoe" value="Add Shoe">
        </form>
        
        <div id="shoeContainer" class="projects-container">
            <?php
            // Toon elke schoenkaart met een "Verwijder" knop
            while ($row = $result->fetch_assoc()) {
                echo '<div class="shoe-card">';
                echo '<h3>' . $row["title"] . '</h3>';
                echo '<p>' . $row["description"] . '</p>';
                echo '<p>Price: $' . $row["price"] . '</p>';
                echo '<img src="' . $row["imageUrl"] . '" alt="' . $row["title"] . '">';
                echo '<form method="post" action="admin.php" class="delete-form">';
                echo '<input type="hidden" name="shoe_id" value="' . $row["id"] . '">';
                echo '<input type="submit" name="deleteShoe" value="Verwijder" class="delete-button">';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
</body>
</html>
