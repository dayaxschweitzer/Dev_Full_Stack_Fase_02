<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sequência de Fibonacci</title>
</head>
<body>
	<!--Formulário para entrada do valor Sequência de Fibonacci-->
    <form method="post">
        <label for="n">Digite um valor numérico para gerar a Sequência de Fibonacci:</label>
        <input type="number" id="n" name="n" min="1" required>
        <button type="submit">Gerar Sequência</button>
        <button type="reset" onclick="location.reload()">Limpar</button>
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
