$(function() {
    
    /////////////////////////////////////////////////////
    // EVENTOS DE FORMULÁRIO/////////////////////////////
    /////////////////////////////////////////////////////
    
    function Adicionar() {
        
        var produto_id        = $("#produto_id").val() //form.produto_id.value
        var produto_descricao = $("#produto_id option:selected").text()
        var quantidade        = Number($("#quantidade").val())
        var valorUnitario     = Number($("#valorUnitario").val().replace(',', '.'))
        var valorTotalDoItem  = quantidade * valorUnitario

        //Troca de ponto pra vírgula para exibir os decimais no valor
        var valorUnitarioStr  = formataValorStr(valorUnitario)
        var valorTotalItemStr = formataValorStr(valorTotalDoItem)

		
	};

    function Excluir() {
        var par = $(this).parent().parent(); //tr
	    par.remove();

        recalculaValores()
	};

	
    /////////////////////////////////////////////////////
    // FUNÇÕES AUXILIARES ///////////////////////////////
    /////////////////////////////////////////////////////


    
    function recalculaValores() {
        var conteudo = document.getElementById("tabela").rows //Pega todas as 'tr' da tabela

        var somaProdutos = 0
        for (i = 1; i < conteudo.length; i++) { //Começa a partir de 1, pq a linha 0 é o cabeçalho
            var valorItemStr = conteudo[i].querySelector(`#valorTotalItem`).textContent //Pega o valor total do item
            somaProdutos += Number(valorItemStr) //Converte pra numérico e soma com somaProdutos
        }

        //document.getElementById("resumoSoma").textContent = formataValorStr(somaProdutos)
        $("#resumoSoma").text(formataValorStr(somaProdutos)) //Substitui a linha acima, porém agora usando jQuery
        var desconto   = Number(form.desconto.value.replace(',', '.'))
        var valorTotal = somaProdutos - desconto
        $("#resumoValorTotal").text(formataValorStr(valorTotal))
    }

    function formataValorStr(valor) {
        return valor.toFixed(2).toString().replace('.', ',')
    }


    $(".btnExcluir").bind("click", Excluir);
	$(".btnAdicionar").bind("click", Adicionar);
	$("#btnAplicarDesconto").bind("click", AplicarDesconto);
});