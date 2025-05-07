<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice PHP</title>
</head>
<body>
    <h1>Calculatrice</h1>
    
    <form method="post" action="">
        <input type="number" name="nombre1" step="any" required placeholder="Premier nombre">
        
        <select name="operation" required>
            <option value="">-- Choisir une opération --</option>
            <option value="addition">Addition (+)</option>
            <option value="soustraction">Soustraction (-)</option>
            <option value="multiplication">Multiplication (*)</option>
            <option value="division">Division (/)</option>
        </select>
        
        <input type="number" name="nombre2" step="any" required placeholder="Deuxième nombre">
        
        <input type="submit" name="calculer" value="Calculer">
    </form>

    <?php
    if (isset($_POST['calculer'])) {
        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $operation = $_POST['operation'];
        $resultat = 0;
        
        switch ($operation) {
            case 'addition':
                $resultat = $nombre1 + $nombre2;
                break;
            case 'soustraction':
                $resultat = $nombre1 - $nombre2;
                break;
            case 'multiplication':
                $resultat = $nombre1 * $nombre2;
                break;
            case 'division':
                if ($nombre2 != 0) {
                    $resultat = $nombre1 / $nombre2;
                } else {
                    echo "<p>Erreur : Division par zéro impossible</p>";
                    break;
                }
                break;
            default:
                echo "<p>Veuillez sélectionner une opération valide</p>";
                break;
        }
        
        if (in_array($operation, ['addition', 'soustraction', 'multiplication', 'division']) && !($operation == 'division' && $nombre2 == 0)) {
            echo "<h3>Résultat : $nombre1 " . getOperateur($operation) . " $nombre2 = $resultat</h3>";
        }
    }
    
    function getOperateur($operation) {
        switch ($operation) {
            case 'addition': return '+';
            case 'soustraction': return '-';
            case 'multiplication': return '*';
            case 'division': return '/';
            default: return '';
        }
    }
    ?>
</body>
</html>