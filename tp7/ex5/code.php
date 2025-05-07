<?php
// Formulaire
echo '
<form method="post">
    Nom: <input type="text" name="name" required><br>
    Message: <textarea name="message" required></textarea><br>
    <button type="submit">Envoyer</button>
</form>';

// Traitement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    $date = date('Y-m-d H:i:s');
    $entry = "$date - $name: $message\n";
    
    file_put_contents('guestbook.txt', $entry, FILE_APPEND);
}

// Affichage des messages
if (file_exists('guestbook.txt')) {
    $entries = file('guestbook.txt');
    echo "<h2>Messages:</h2>";
    echo "<div style='border:1px solid #ccc; padding:10px; max-height:300px; overflow-y:auto'>";
    foreach (array_reverse($entries) as $entry) {
        echo "<p>" . nl2br($entry) . "</p><hr>";
    }
    echo "</div>";
}
?>