<!-- 3) Vogais Mágicas

Nós definimos uma subsequência mágica para ser uma sequência de letras dentro de uma string que contém todas as cinco vogais em ordem: a, e, i, o, u.

Pode haver qualquer número de ocorrências de cada vogal, mas elas devem estar nessa ordem.

Por exemplo, aeeiou é uma sequência mágica, mas aeaioua não é Julia tem uma string, s, consistindo de uma ou mais das seguintes letras: a, e, i, o e u.

Ela quer determinar a sequência mágica mais longa em sua corda.

A função deve retornar o comprimento da sequência mágica mais longa dentro da string de entrada.
Se não ocorrer uma subsequência, retorne 0

Exemplo:
$s = aeiaaioooau
a e i a a i o o o a u
Resultado esperado: 8 -->

<!DOCTYPE html>
<html>
<head>
	<title>Vogais Mágicas</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			padding: 20px;
		}
		h1 {
			text-align: center;
			color: #333;
		}
		form {
			margin: 20px auto;
			max-width: 500px;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		label {
			display: block;
			margin-bottom: 10px;
			color: #333;
		}
		input[type="text"] {
			display: block;
			width: 100%;
			padding: 6px;
			font-size: 15px;
			border: 2px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
		}
		button[type="submit"], button[type="reset"] {
			background-color: #333;
			color: #fff;
			padding: 10px 20px;
			font-size: 16px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.2s ease-in-out;
		}
		button[type="submit"]:hover, button[type="reset"]:hover {
			background-color: #555;
		}
		p.error {
			color: red;
			margin: 0;
			margin-bottom: 20px;
		}
		p.success {
			color: green;
			margin: 0;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<h1>Vogais Mágicas</h1>
	<form method="post">
		<label for="string">Digite a sequência de vogais:</label>
		<input type="text" name="string" id="string" required>
		<button type="submit">Contar</button>
		<button type="reset">Limpar</button>
	<?php
		function contar_sequencia_vogais($string) {
            $vogais_sequencia = "aeiou"; // Sequência de vogais esperada
            $count = 0; // Contador de sequências de vogais encontradas
            $index_sequencia = 0; // Índice da vogal da sequência esperada

            // Percorre a string
            for ($i = 0; $i < strlen($string); $i++) {
                // Se a letra atual for a vogal da sequência esperada, incrementa o contador
                // e avança o índice da sequência para a próxima vogal
                if ($string[$i] == $vogais_sequencia[$index_sequencia]) {
                    $count++;
                    $index_sequencia++;
                    // Se chegou ao final da sequência, reinicia o índice para começar de novo
                    if ($index_sequencia == strlen($vogais_sequencia)) {
                        $index_sequencia = 0;
                    }
                }
                // Se a letra atual não for a vogal da sequência esperada, reinicia o índice
                else if (strpos($vogais_sequencia, $string[$i]) !== false) {
                    $index_sequencia = 0;
                }
            }

            // Retorna o número de sequências de vogais encontradas
            return $count;
        }

        // Se o formulário foi submetido
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $string = $_POST["string"]; // Recupera a string digitada no formulário

            // Verifica se a string contém apenas vogais
            if (!preg_match('/^[aeiou]+$/i', $string)) {
                // Se não contém, exibe mensagem de erro
                echo "<p>Erro: Digite apenas vogais, sem números, símbolos ou letras consoantes.</p>";
            } else {
                // Se contém, conta o número de sequências de vogais na string e exibe o resultado
                $count = contar_sequencia_vogais($string);
                echo "<p>Sequências de Vogais encontrada: $count </p>";
                echo "<p>Valor digitado: $string </p>";
            }
        }
 ?>
</body>
</html>
