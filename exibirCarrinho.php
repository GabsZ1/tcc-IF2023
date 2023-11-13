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