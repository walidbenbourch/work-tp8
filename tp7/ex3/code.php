<form method="post">
    Nom: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Message: <textarea name="message" required></textarea><br>
    <button type="submit">Envoyer</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        echo "<h2>Merci pour votre message!</h2>";
        echo "<p>Nom: " . htmlspecialchars($_POST['name']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p>Message: " . nl2br(htmlspecialchars($_POST['message'])) . "</p>";
    } else {
        echo "<p style='color:red'>Veuillez remplir tous les champs.</p>";
    }
}
?>