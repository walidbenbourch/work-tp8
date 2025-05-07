<?php
session_start();

// Page de connexion (login.php)
if (!isset($_SESSION['loggedin'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Vérification simple (en pratique, utiliser une base de données)
        if ($username === 'admin' && $password === 'password123') {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: welcome.php');
            exit;
        } else {
            echo "Identifiants incorrects!";
        }
    }
    
    echo '
    <form method="post">
        Identifiant: <input type="text" name="username" required><br>
        Mot de passe: <input type="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>';
} else {
    header('Location: welcome.php');
}

// Page de bienvenue (welcome.php)
if (isset($_SESSION['loggedin'])) {
    echo "<h1>Bienvenue, " . $_SESSION['username'] . "!</h1>";
    echo '<a href="logout.php">Déconnexion</a>';
}

// Page de déconnexion (logout.php)
session_start();
session_destroy();
header('Location: login.php');
?>