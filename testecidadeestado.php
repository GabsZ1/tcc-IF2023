<?php
require_once('conexao.php');
 
?>

<?php

 
function listaEstadosOrderIdAsc(){
    return mysql_query("SELECT cod_estados, sigla FROM estados ORDER BY sigla ASC");
}
?>
<p>
  
  <select name="cod_estados" id="cod_estados">
  <option selected disabled value="">Seu Estado</option>
  <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
    <?php $estados = listaEstadosOrderIdAsc(); while ($row = mysql_fetch_object($estados)) { ?>
    <option value="<?php echo $row->cod_estados; ?>"><?php echo $row->sigla; ?></option>
    <?php } ?>
  </select>
  <label for="cod_cidades">Cidade:</label>
  <select name="cod_cidades" id="cod_cidades">
  <option selected disabled value="">Seu Estado</option>
                        

  </select>
</p>

<script>$(document).ready(function(){
 
 // Por Rogerio Coli, https://rogeriocoli.com.br - favor não remover
 jQuery.fn.carregaCidades = function() {
      
     // Objeto que guarda os argumentos
     var args                    = arguments[0] || {};
      
     //id do Select de Cidades
     var idSelectCidade          = args.idSelectCidade;
      
     // Página que irá criar o JSon
     var paginaPhpCidades        = 'cidades.ajax.php';
      
     // Conteúdo do elemento span que vai aparecer enquanto carregam as cidades, 
     // pode ser substituído por uma imagem. Coloque a tag completa  
     var carregandoMsg           = 'Aguarde, carregando...' 
      
     // Classe do elemento span que vai aparecer enquanto carregam as cidades
     var carregandoClass         = 'class';
     // após as cidades carregarem aparece esta mensagem
     var jsonPrimeiroElemento    = '(selecione a cidade)';
     // Aqui eu pego a frase do primeiro option de Cidade  
     var primeiroElemento        = $(idSelectCidade).find('option:first').html();
      
      
     if( $(this).val() ) {
         // escondendo as cidades até carregarem
         $(idSelectCidade).hide();
         // mensagem de espera: carregando
         $(idSelectCidade).after('<span class='+ carregandoClass +'>'+carregandoMsg+'</span>');
          
         $.getJSON(paginaPhpCidades+'?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
                 // É importante que o value seja vazio pra que o formulário não seja enviado vazio
                 // caso use o form validate
             var options = '<option value="">'+jsonPrimeiroElemento+'</option>';    
             for (var i = 0; i < j.length; i++) {
                 // É importante que o value seja vazio pra que o formulário não seja enviado vazio
                 // caso use o form validate
                 options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
             } 
             // mostrando as cidades após carregarem e removendo a mensagem de espera
             $(idSelectCidade).html(options).show();
             $(idSelectCidade).next().remove();
         });
     } else {
         $(idSelectCidade).html('<option value="">'+primeiroElemento+'</option>');
     }
      
 };
 //Inciando o SELECT, importante ao recarregar a página
 $("#cod_estados option:first").attr('selected','selected');
 // Aqui eu chamo a função e o método que irá carregá-la
 $('#cod_estados').change(function(){ $(this).carregaCidades({idSelectCidade: '#cod_cidades'}); })
});

header( 'Cache-Control: no-cache' );
header( 'Content-type: application/xml; charset="utf-8"', true );
 
require("conn.open.php");
 
$cod_estados = mysql_real_escape_string( $_REQUEST['cod_estados'] );
 
$cidades = array();
 
$sql = "SELECT cod_cidades, nome
        FROM cidades
        WHERE estados_cod_estados=$cod_estados
        ORDER BY nome";
$res = mysql_query( $sql );
while ( $row = mysql_fetch_assoc( $res ) ) {
    $cidades[] = array(
        'cod_cidades'   => $row['cod_cidades'],
        'nome'          => htmlentities($row['nome']),
    );
}
 
echo( json_encode( $cidades ) );
</script>