<!DOCTYPE html>
<html>
<head>
    <title>Maior Valor</title>
</head>
<body>
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
