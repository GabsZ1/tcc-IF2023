//  function buscaCep(){
//     let cep = document.getElementById('cep').value;
//     if(cep !== ""){
//          let url = "https://brasilapi.com.br/api/cep/v1/" + cep;
//         let req = new XMLHttpRequest();
//          Request.open("GET" , url);
//         req.send();

//         req.onload = function(){
//              if(req.status === 200){
//                  let endereco = JSON.parse(req.response);
//               document.getElementById("endereco"). value = endereco.street;
//           document.getElementById("cidade"). value = endereco.city;
//                 document.getElementById("estado"). value = endereco.state;
//             }
//            else if(req.status === 404){
//                alert("CEP inválido");
//           }
//             else{
//                 alert("Erro ao fazer a requisição");
//             }
//         }
//      }
//  }

//  window.onload = function() {
//      let cep = document.getElementById("cep");
//      cep.addEventListener("blur" , buscaCep);
//  }

 



function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('endereco').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('estado').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('endereco').value=(conteudo.logradouro);
    document.getElementById('cidade').value=(conteudo.localidade);
    document.getElementById('estado').value=(conteudo.estado);
} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('endereco').value="...";
        document.getElementById('cidade').value="...";
        document.getElementById('estado').value="...";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};