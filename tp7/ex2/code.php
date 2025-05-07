<form method="post">
    Longueur du mot de passe: <input type="number" name="length" min="6" max="32" required>
    <button type="submit">Générer</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $length = $_POST['length'];
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }
    
    echo "<p>Votre mot de passe: <strong>$password</strong></p>";
}
?>