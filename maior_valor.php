<!-- 4) Maior valor da lista

Neste desafio, você começará com uma matriz inicializada em zeros com índices começando em 1.
Você receberá uma série de operações para executar em segmentos da lista.
Cada operação consistirá em um índice inicial e final dentro do array e um número para adicionar a cada elemento dentro desse intervalo.

Por exemplo, comece com uma matriz de 5 elementos: $lista = array(0, 0, 0, 0, 0) “lembrando que o índice inicial
deve ser 1 e não 0”. As variáveis a e b representam os índices inicial e final, inclusive. Outra variável $v é usada
contendo o valor a ser adicionado.
O primeiro elemento está no índice 1.
$a $b $v $lista
[ 0, 0, 0, 0, 0]

1 2 10 [ 10, 10, 0, 0, 0] (somar 10 no intervalo dos índices 1 até 2)
2 4 5 [ 10, 15, 5, 5, 0] (somar 5 no intervalo dos índices 2 até 4)
3 5 12 [ 10, 15, 17, 17, 12] (somar 12 no intervalo dos índices 3 até 5)
O maior valor final da lista é 17, esse valor deve ser encontrado após a soma de todas as operações dentro de
$lista. -->

<!DOCTYPE html>
<html>
<head>
    <title>Maior Valor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        label {
            display: block;
            font-size: 1.1em;
            margin-bottom: 5px;
        }
        input[type="number"] {
            border: 1px solid #ccc;
            padding: 2px;
            font-size: 1em;
            margin-bottom: 10px;
            width: 100%;
            max-width: 200px;
        }
        table {
            border-collapse: collapse;
            margin-bottom: 20px;
            width: 100%;
            max-width: 500px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f7f7f7;
            font-weight: bold;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            padding: 10px 20px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #0069d9;
        }
        button:disabled {
            background-color: #ccc;
            cursor: default;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
        }
        .success-message {
            color: #28a745;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body style="margin-left: 20px; margin-top: 50px;">
    <!-- Formulário para entrada de dados -->
    <form method="post">
        <label for="tamanhoLista">Quantidade de elementos da Matriz:</label>
        <input type="number" id="tamanhoLista" name="tamanhoLista" required>
        <br><br>
        <label>Operações:</label>
        <table>
            <thead>
                <tr>
                    <th>Índice inicial</th>
                    <th>Índice final</th>
                    <th>Valor a ser somado</th>
                </tr>
            </thead>
            <tbody id="operacoes">
                <tr>
                    <td><input type="number" name="a[]" required></td>
                    <td><input type="number" name="b[]" required></td>
                    <td><input type="number" name="v[]" required></td>
                </tr>
                <tr>
                    <td><input type="number" name="a[]" required></td>
                    <td><input type="number" name="b[]" required></td>
                    <td><input type="number" name="v[]" required></td>
                </tr>
            </tbody>
        </table>
        <button type="button" onclick="adicionarOperacao()">Adicionar Operação</button>
        <button type="button" onclick="removerOperacao()">Remover Operação</button>
        <br><br>
        <button type="submit">Calcular Maior Valor</button>
    </form>
    <!-- Script para adicionar ou remover operações do formulário -->
    <script>
        function adicionarOperacao() {
            var tbody = document.getElementById('operacoes');
            var tr = document.createElement('tr');
            tr.innerHTML = `
                <td><input type="number" name="a[]" required></td>
                <td><input type="number" name="b[]" required></td>
                <td><input type="number" name="v[]" required></td>
            `;
            tbody.appendChild(tr);
        }

        function removerOperacao() {
            var tbody = document.getElementById('operacoes');
            if (tbody.childElementCount > 2) {
                tbody.removeChild(tbody.lastElementChild);
            }
        }
    </script>
    <?php
	// Função para calcular o maior valor da lista após as operações
        function calcularMaiorValor($tamanhoLista, $a, $b, $v) {
	    // Cria uma lista com $tamanhoLista elementos, inicializados com zero
            $lista = array_fill(1, $tamanhoLista, 0);
	    // Itera sobre cada operação
            foreach ($a as $i => $valor_a) {
		// Para cada operação, itera sobre todos os índices do intervalo [a,b]
                for ($j=$valor_a; $j <= $b[$i]; $j++) {
		    // Soma o valor $v[$i] em cada posição da lista
                    $lista[$j] += $v[$i];
                }
            }
	    // Retorna o maior valor da lista
            return max($lista);
        }

  	// Verifica se houve um envio de formulário via método POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Recupera os valores enviados pelo formulário
          	$tamanhoLista = $_POST['tamanhoLista'];
		$a = $_POST['a'];
		$b = $_POST['b'];
		$v = $_POST['v'];
		$maiorValor = calcularMaiorValor($tamanhoLista, $a, $b, $v);
		echo '<p>O maior valor da lista após as operações é: '.$maiorValor.'</p>';
	}
    ?>
</body>
</html>
