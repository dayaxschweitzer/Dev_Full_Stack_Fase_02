<!-- 1) Você consegue ordenar?

Um array de inteiros $arr, de tamanho $n é definido as [a[0], a[1], ..., a[n-1]].
Será fornecido um array de inteiros para ordenar. A ordenação primeiro precisa ser pela frequência de ocorrência, então por valor.
Por exemplo, dado um array [4, 5, 6, 5, 4, 3], existe um 6 and 3, são dois 4’s e dois 5’s.

A ordem da lista deve ser [3, 6, 4, 4, 5, 5].
Explicação:
Array fornecido: $n = 7, $arr = [3, 1, 8, 8, 2, 2, 4]

Nossos dados parcialmente ordenados (com relação a $arr em ordem crescente em relação a quantidade de repetição) podem ser expressos como [[3, 1, 4], [8, 8, 2, 2]].

Então, classificamos cada subconjunto de elementos com a mesma frequência em ordem crescente, resultando em [[1, 3, 4], [8, 8, 2, 2]].

Tendo como resultado esperado o seguinte array, com ordenação final [1, 3, 4, 2, 2, 8, 8].

Caso de teste 01
Dados Fornecidos
$n= 5 | $arr = array(3, 1, 2, 2, 4)
Resultado esperado
array(1, 3, 4, 2, 2) -->

<!DOCTYPE html>
<html>
<head>
    <title>Ordenar Sequência</title>
    <style>
        /* estilo para o formulário */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            font-family: Arial, sans-serif;
        }

        /* estilo para o rótulo do campo de entrada */
        label {
            margin-bottom: 10px;
            font-size: 18px;
        }

        /* estilo para o campo de entrada */
        input {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }

        /* estilo para o botão de envio */
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* estilo para a mensagem de resultado */
        p {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="seq">Digite a sequência separada por vírgulas:</label>
        <input type="text" name="seq" id="seq">
        <button type="submit">Ordenar</button>
    </form>
    <?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	    $seq = $_POST['seq'];

	    // Verifica se o valor foi deixado em branco ou contém caracteres não numéricos
	    if (empty($seq) || !preg_match('/^[0-9,]+$/', $seq)) {
		echo '<p>Por favor, digite apenas números separados por vírgula, sem espaço!</p>';
	    } else {
		$arr = array_map('intval', explode(',', $seq));

		// cria um array associativo para contar a frequência de cada número
		$freq = array_count_values($arr);

		// separa os elementos em subconjuntos de elementos com a mesma frequência
		$subconjuntos = [];
		foreach ($freq as $numero => $frequencia) {
		    $subconjunto = [];
		    for ($i = 0; $i < $frequencia; $i++) {
			$subconjunto[] = $numero;
		    }
		    $subconjuntos[] = $subconjunto;
		}

		// elementos repetidos em ordem crescente e elementos não repetidos em ordem crescente
		$nao_repetidos = [];
		$repetidos = [];
		foreach ($subconjuntos as $subconjunto) {
		    if (count($subconjunto) === 1) {
			$nao_repetidos[] = $subconjunto[0];
		    } else {
			sort($subconjunto);
			$repetidos = array_merge($repetidos, $subconjunto);
		    }
		}

		// ordena cada subconjunto de elementos com a mesma frequência
		sort($nao_repetidos);
		sort($repetidos);

		// une todos os subconjuntos em um único array
		$resultado = array_merge($nao_repetidos, $repetidos);

		// apresenta o resultado
		echo '<p>Sequência ordenada: ' . implode(', ', $resultado) . '</p>';
	    }
	}
	?>
</body>
</html>
