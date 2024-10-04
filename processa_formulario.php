<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['studentName']);
    $responses = [
        'resposta1' => htmlspecialchars($_POST['resposta1']),
        'resposta2' => htmlspecialchars($_POST['resposta2']),
        'resposta3' => htmlspecialchars($_POST['resposta3']),
        'resposta4' => htmlspecialchars($_POST['resposta4']),
        'resposta5' => htmlspecialchars($_POST['resposta5']),
        'resposta6' => htmlspecialchars($_POST['resposta6']),
        'resposta7' => htmlspecialchars($_POST['resposta7']),
        'resposta8' => htmlspecialchars($_POST['resposta8']),
        'resposta9' => htmlspecialchars($_POST['resposta9']),
        'resposta10' => htmlspecialchars($_POST['resposta10']),
    ];

    // Respostas corretas
    $correctAnswers = [
        'resposta1' => 'B',
        'resposta2' => 'B',
        'resposta3' => 'B',
        'resposta4' => 'B',
        'resposta5' => 'C',
        'resposta6' => 'B',
        'resposta7' => 'B',
        'resposta8' => 'B',
        'resposta9' => 'A',
        'resposta10' => 'B',
    ];

    $result = "";
    $correctCount = 0;

    foreach ($responses as $key => $value) {
        if (isset($correctAnswers[$key]) && $correctAnswers[$key] == $value) {
            $result .= "Pergunta " . substr($key, -1) . ": Correta<br>";
            $correctCount++;
        } else {
            $result .= "Pergunta " . substr($key, -1) . ": Incorreta (Resposta correta: " . $correctAnswers[$key] . ")<br>";
        }
    }

    $result .= "<h3>Total de Respostas Corretas: $correctCount de 10</h3>";

    // Envio de e-mail
    $to = "alan.duarte@bitzsoftwares.com.br"; // Substitua pelo seu e-mail
    $subject = "Resultados da Avaliação de $name";
    $message = "Nome: $name\n\n" . $result;
    $headers = "alan.duarte@bitzsoftwares.com.br"; // Substitua pelo seu e-mail

    mail($to, $subject, $message, $headers);
    echo "<h1>Obrigado por participar!</h1>";
    echo $result;
} else {
    echo "Método de requisição inválido.";
}
?>
