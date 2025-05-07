<?php
$questions = [
    [
        'question' => 'Quelle est la capitale de la France?',
        'options' => ['Londres', 'Paris', 'Berlin', 'Madrid'],
        'answer' => 1
    ],
    [
        'question' => '2 + 2 = ?',
        'options' => ['3', '4', '5', '6'],
        'answer' => 1
    ],
    [
        'question' => 'Quel langage est côté serveur?',
        'options' => ['HTML', 'CSS', 'JavaScript', 'PHP'],
        'answer' => 3
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    echo "<h2>Résultats:</h2>";
    
    foreach ($questions as $i => $q) {
        $userAnswer = $_POST['q'.$i] ?? null;
        $isCorrect = ($userAnswer == $q['answer']);
        
        if ($isCorrect) $score++;
        
        echo "<p>Question ".($i+1).": ".$q['question']."<br>";
        echo "Votre réponse: ".$q['options'][$userAnswer]." - ";
        echo $isCorrect ? "✅ Correct" : "❌ Faux (Réponse: ".$q['options'][$q['answer']].")";
        echo "</p>";
    }
    
    echo "<h3>Score final: $score/".count($questions)."</h3>";
    echo '<a href="'.$_SERVER['PHP_SELF'].'">Recommencer</a>';
} else {
    echo '<form method="post">';
    foreach ($questions as $i => $q) {
        echo "<fieldset>";
        echo "<legend>".$q['question']."</legend>";
        foreach ($q['options'] as $j => $option) {
            echo "<label><input type='radio' name='q$i' value='$j' required> $option</label><br>";
        }
        echo "</fieldset>";
    }
    echo '<button type="submit">Valider</button>';
    echo '</form>';
}
?>