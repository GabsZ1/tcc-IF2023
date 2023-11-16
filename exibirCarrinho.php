<!-- mostra todos os produtos adicionados pelo usuario pegar dados da tabela carrinho e exibir
ACAO: SELECT NA TABELA CARRINHO FILTRANDO PELO SESSAO_ID -->

<?php

// $sql ="select produto.id, produto.nome, 
//               carrinho.quantidade, carrinho.valor_unitario,
//               carrinho.quantidade * valor_unitario as valor_total
//         from carrinho
//     inner join produto on produto.id = carrinho.produto_id
//         where sessao_id = '$sessao_id'";


session_start();
$sessao_id = session_id();

$sql ="select livros.id, livros.titulo, 
              carrinho.quantidade, livros.valor,
              carrinho.quantidade * livros.valor as valor_total
        from carrinho
    inner join livros on livros.id = carrinho.livros_id
        where sessao_id = '$sessao_id'";


// agora listar todos os dados dessa consulta , nome produto, qntd, valor unitario, valor total unitario, e no final o valor total da compra

?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="js/carrinho.js"></script>

<div class="container">
    <form action="exibirCarrinho.php" method="post">
        <div class="row">
            <!-- div resumo compra -->
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Resumo</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <span>Soma dos Produtos</span>
                        <span class="text-muted"><div id="resumoSoma">0,00</div></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <h6 class="my-0">Total (R$)</h6>
                        <strong><div id="resumoValorTotal">0,00</div></strong>
                    </li>
                </ul>
                <div class="input-group">
                    <button type="submit" name="finalizar" value="finalizar" class="btn btn-primary btn-lg btn-block">Finalizar</button>
                </div>
            </div>
            <!-- dados -->
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Lista de Produtos</h4>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tabela" class="table table-striped table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col" class="text-right">Qtd.</th>
                                    <th scope="col" class="text-right">Preço Un.</th>
                                    <th scope="col" class="text-right">Preço Total</th>
                                    <th scope="col" class="text-center">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Conteúdo dinâmico -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="mb-4">
            </div>
        </div>
    </form>
</div>
