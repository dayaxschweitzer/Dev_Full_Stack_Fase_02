<!-- 2) Fibonacci

Os números de Fibonacci são uma sequência de números onde cada número após os dois primeiros é uma soma
dos dois anteriores.
A título ilustrativo, segue uma pequena sequência dada a valores iniciais de (0, 1) é (0, 1, 1, 2, 3, 5, 8, 13).
Dado um inteiro $n, calcule os primeiros n números na sequência de Fibonacci, dados os elementos iniciais de (0,1).

Retorna um array com todos os valores em ordem crescente.

Caso de teste 01
Dados Fornecidos
$n= 4
Resultado esperado
0, 1, 1, 2 -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sequência de Fibonacci</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 5px;
            text-align: center;
        }

        h1 {
            color: #555;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        label {
            font-size: 1.2rem;
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="number"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #f5f5f5;
            font-size: 1.2rem;
            margin-right: 10px;
            width: 100px;
        }

        button[type="submit"], button[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            font-size: 1.2rem;
            margin-right: 10px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        button[type="submit"]:hover, button[type="reset"]:hover {
            background-color: #444;
        }

        ul {
            list-style: none;
            margin-top: 30px;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        li {
            background-color: #333;
            color: #fff;
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 5px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        button[type="reset"] {
            background-color: #ddd;
            color: #555;
        }

        button[type="reset"]:hover {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sequência de Fibonacci</h1>
        <form method="post">
            <label for="n">Digite o valor de n:</label>
            <input type="number" id="n" name="n" min="1" required>
            <button type="submit">Gerar Sequência</button>
            <button type="reset">Limpar</button>
        </form>

	<?php
	//Verifica se o método de requisição é POST
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$n = $_POST['n'];
		//Chama a função que gera a sequência de Fibonacci
		$fibonacciArray = fibonacciSequence($n);
		//Verifica se n foi definido
		if (isset($n)) {
			echo '<p>A sequência de Fibonacci gerada é:</p>';
			//Inicia a lista que irá exibir a sequência
			echo '<ul>';
			//Loop para exibir cada número da sequência
			foreach ($fibonacciArray as $fibonacciNumber) {
				echo '<li>' . $fibonacciNumber . '</li>';
			}
			//Encerra a lista
			echo '</ul>';
		}
	}
	?>
	<?php
	function fibonacciSequence($n) {
		//Inicializa o array com os dois primeiros números da sequência
		$fibonacciArray = array(0, 1);
		for ($i = 2; $i < $n; $i++) {
			//Calcula o próximo número da sequência
			$fibonacciArray[$i] = $fibonacciArray[$i-1] + $fibonacciArray[$i-2];
		}
		//Retorna o array com a sequência gerada
		return $fibonacciArray;
	}
	?>
</body>
</html>
