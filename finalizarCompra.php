<?php

$sessao_id = session_id();

require_once("conexao.php");

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
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="operacao" class="font-weight-bold">Operação</label>
                        <select id="operacao" name="operacao" required class="custom-select d-block w-100">
                            <option value="V">Venda</option>
                            <option value="C">Compra</option>
                        </select>
                    </div>
                    
                    <div class="col-md-9">
                        <label for="cliente_id" class="font-weight-bold">Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="custom-select">
                            <option value="">-- Selecione --</option>
                        </select>
                    </div>
                </div>
                <hr>
                    
                <h4 class="mb-3">Produtos</h4>

                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="produto_id">Produto</label>
                            <select name="produto_id" id="produto_id" class="custom-select">
                                <option value="">-- Selecione --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="qtd">Qtd.</label>
                                <input type="number" id="quantidade" name="quantidade" class="form-control" value='1'>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="valorUnitario">Valor Un.</label>
                                <div class="input-group mb-2 text-right">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">R$</div>
                                    </div>
                                    <input type="text" id="valorUnitario" name="valorUnitario" placeholder='0,00' class="form-control text-right">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-secondary" id="btnAdicionar">Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
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