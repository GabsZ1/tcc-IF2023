<?php
// Função para retornar o nome do status com base no número
function getStatusName($statusNumber)
{
    switch ($statusNumber) {
        case 1:
            return ['Pendente', 'warning'];
        case 2:
            return ['Em andamento', 'primary'];
        case 3:
            return ['Finalizado - A pagar', 'secondary'];
        case 4:
            return ['Finalizado - Pago', 'success'];
        case 5:
            return ['Cancelado', 'danger'];
        default:
            return ['Status Desconhecido', 'secondary'];
    }
}

require_once("conexao.php");

?>

<!DOCTYPE html>

<head>
    <title>Reservas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <style>
        /* style.css */

        /* Estilos para o botão de filtragem */
        .filter-button {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            background-color: #a70162;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-button:hover {
            background-color: #872850;
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="statusSelect">Filtrar por status:
                    <select name="status" id="statusSelect" class="form-control mr-sm-2">
                        <option value="">Todos</option>
                        <option value="1">Pendente</option>
                        <option value="2">Em andamento</option>
                        <option value="3">Finalizado - A pagar</option>
                        <option value="4">Finalizado - Pago</option>
                        <option value="5">Cancelado</option>
                    </select>
                </label>

                <label for="nome">Nome do Usuário:
                    <input type="text" id="nome" name="nome" class="form-control mr-sm-2">
                </label>

                <button type="submit" class="filter-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    
        <div class="row row-cols 1 row-cols-md-4 g-4">
            <?php
            // Reutilização da variável $conexao do arquivo conexão.php
            $filtroStatus = isset($_GET['status']) ? $_GET['status'] : '';
            $filtroUsuario = isset($_GET['nome']) ? $_GET['nome'] : '';

            $sql = "SELECT venda.*, usuario.nome as usuario_nome, livros.titulo as livros_titulo
                    FROM venda
                    LEFT JOIN usuario ON usuario.id = venda.usuario_id
                    LEFT JOIN livros ON livros.id = venda.produto_id
                    WHERE 1";

            if (!empty($filtroStatus)) {
                $sql .= " AND venda.status = $filtroStatus";
            }

            if (!empty($filtroUsuario)) {
                $sql .= " AND usuario.nome LIKE '%$filtroUsuario%'";
            }

            $resultado = mysqli_query($conexao, $sql);

            // Verifica se a consulta foi bem-sucedida
            if ($resultado) {
                $vendas = []; // Array para armazenar as vendas
            
                // Armazena os resultados em uma matriz
                while ($linha = mysqli_fetch_array($resultado)) {
                    $vendas[] = $linha;
                }


                // Itera sobre as reservas para exibir os cartões de reserva
                foreach ($vendas as $venda) {
                    $statusInfo = getStatusName($venda['status']);
                    $statusText = $statusInfo[0];
                    $statusClass = $statusInfo[1];
                    ?>


                    <div class="col-md">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5 style="color: #a70162; font-family: 'Segoe UI'">QUARTO
                                        <?= $venda['livros_titulo'] ?>
                                    </h5>
                                    <label class="badge text-bg-<?= $statusClass ?>">
                                        <?= $statusText ?>
                                    </label>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Hóspede:
                                        <?= $venda['usuario_nome'] ?>
                                    </li>
                                    <li class="list-group-item">Valor Total: R$
                                        <?= number_format($venda['valorTotalVenda'], 2, ',', '.') ?>
                                    </li>
                                </ul>

                                <!-- <a href="alterarReserva.php?id=<?= $venda['id'] ?>" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>Alterar
                                </a> -->
                                
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Erro na consulta: " . mysqli_error($conexao);
            }
            ?>
        </div>
    </div>
</body>

</html>
