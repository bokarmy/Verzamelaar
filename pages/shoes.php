<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Index</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f0015e972f.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="#"><label class="logo">Sneakerz</label></a>
        <ul>
            <li><a href="../Index.html">Home</a></li>
            <li><a class="active" href="shoes.php">Sneakers</a></li>
            <li><a href="./about.html">About</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./admin.php">Admin</a></li>
        </ul>
    </nav>
    <section class="search-section">
        <input type="text" id="searchInput" placeholder="Search for shoes...">
    </section>
    <main>
        <div class="container">
            <div class="title">
                <h2>Shoe Collection</h2>
            </div>
            <div class="shoe-grid">
                <?php
                // Definieer de databaseverbinding parameters
                $hostname = "localhost:3306";
                $username = "dbz88885";
                $password = "bokarmy6806";
                $database = "88885_database";

                // Maak een databaseverbinding
                $conn = new mysqli($hostname, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Verbinding mislukt: " . $conn->connect_error);
                }

                // Query de database om schoeninformatie op te halen
                $sql = "SELECT * FROM schoenen";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="shoe-card">';
                        echo '<h3>' . $row["title"] . '</h3>';
                        echo '<p>' . $row["description"] . '</p>';
                        echo '<p>Price: $' . $row["price"] . '</p>';
                        echo '<img src="' . $row["imageUrl"] . '" alt="' . $row["title"] . '">';
                        echo '</div>';
                    }
                } else {
                    echo "Geen schoeninformatie beschikbaar.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </main>
     <!-- Footer -->
     <footer>
        <div class="footer-content">
            <div class="go-to-top">
                <a href="#top">Ga naar boven <i class="fas fa-arrow-up"></i></a>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="Index.html">Home</a></li>
                    <li><a href="./pages/shoes.php">Sneakers</a></li>
                    <li><a href="./pages/about.html">Over ons</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./pages/admin.php">Admin</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-image">
            
        </div>
    </footer>
</body>
</html>
