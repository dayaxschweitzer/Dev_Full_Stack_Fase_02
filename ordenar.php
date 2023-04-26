<?php
function sortByFrequencyAndValue($arr) {
    // Calcula a frequência de cada valor no array
    $freq = array_count_values($arr);

    // Ordena as chaves do array pela frequência em ordem crescente
    asort($freq);

    // Para cada grupo de valores com a mesma frequência, ordena-os em ordem crescente
    foreach ($freq as $num => $count) {
        $group = array_fill(0, $count, $num);
        sort($group);
        $freq[$num] = $group;
    }

    // Combina todos os grupos ordenados em um único array
    $result = array_merge(...array_values($freq));

    return $result;
}

// Verifica se foi enviado um array para ordenar
if (isset($_POST['arr'])) {
    // Verifica se a entrada contém a vírgula
    if (strpos($_POST['arr'], ',') === false) {
        echo "A entrada deve conter valores separados por vírgula.";
    } else {
        // Converte a string de entrada em um array de inteiros
		$arr = explode(',', $_POST['arr']);
		$isNumeric = true;

		// Verifica se todos os elementos do array são numéricos
		foreach ($arr as $value) {
			if (!is_numeric($value)) {
				$isNumeric = false;
				break;
			}
		}
		// Se a entrada não contiver apenas números, exibe uma mensagem de erro
		if (!$isNumeric) {
			echo "A entrada deve conter apenas números separados por vírgula.";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Resultado da Ordenação</title>
</head>
<body>
	<h1>Resultado da Ordenação</h1>
	<?php if (isset($sortedArr)): ?>
		<p>Array de entrada: <?php echo implode(', ', $arr); ?></p>
		<p>Array ordenado: <?php echo implode(', ', $sortedArr); ?></p>
	<?php elseif (isset($_POST['arr'])): ?>
		<p>Não foi possível ordenar o array fornecido. <?php echo $errorMsg; ?></p>
	<?php endif; ?>

	<button onclick="window.history.back()">Voltar</button>
</body>
</html>
