<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../media/logosneaker.png">
    <title>About Us</title>
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
        <a href="../Index.html"><label class="logo">Sneakerz</label></a>
        <ul>
            <li><a href="../Index.html">Home</a></li>
            <li><a href="./shoes.php">Sneakers</a></li>
            <li><a href="about.html">About</a></li>
            <li><a class="active" href="contact.php">Contact</a></li>
            <li><a href="./login.html">Admin</a></li>
        </ul>
    </nav>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $company = $_POST["company"];
        $message = $_POST["message"];
        
        $to = "osmankarapinar68@gmail.com"; // Vervang dit met je eigen e-mailadres
        $subject = "Nieuw formulier ingediend";
        $body = "Naam: $name\n";
        $body .= "E-mail: $email\n";
        $body .= "Telefoonnummer: $phone\n";
        $body .= "Bedrijfsnaam: $company\n";
        $body .= "Bericht:\n$message";
        
        // Stuur de e-mail
        mail($to, $subject, $body);
        
        // Toon een succesbericht
        echo "<p>Bedankt! Je formulier is succesvol ingediend.</p>";
    }
    ?>
    <div class="containercont">
        <div class="contact">
            <h1>Contact us !</h1>
            
        </div>
        <div class="form-containercont">
            <div class="formcont">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name" required><br><br>
    
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" required><br><br>
    
                    <label for="phone">(Optional) Phone Number:</label><br>
                    <input type="tel" name="phone" id="phone"><br><br> 
    
                    <label for="company">(Optional) Company Name:</label><br>
                    <input type="text" name="company" id="company"><br><br> 
    
                    <label for="message">Message:</label><br>
                    <textarea name="message" id="message" rows="auto" required></textarea><br>
    
                    <input class="active" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
 <!-- Footer -->
 <footer>
        <div class="footer-content">
            <div class="go-to-top">
                <a href="#top">Ga naar boven <i class="fas fa-arrow-up"></i></a>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="../Index.html">Home</a></li>
                    <li><a href="./shoes.php">Sneakers</a></li>
                    <li><a href="./about.html">About us</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./login.html">Admin</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-image">
            
        </div>
    </footer>
    <script src="../app.js"></script>
</body>

</html>
