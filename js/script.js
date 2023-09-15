
  //pegando o valor de todos os campos necessários
  let nameValue = nameInput.value;
  let emailValue = emailInput.value;
  let cpfValue = cpfInput.value;


  let resultado = TestaCPF(cpfValue); // <== Chamando a funcao para validar e passando o valor do cpf digitado  

  if (resultado === true) { //  <== Se a função acabar retornando um valor verdadeiro
    errorMessage.textContent = "Cadastrado com Sucesso!" // atribuindo esse valor dentro da div
    errorMessage.classList = "acerto";

    //tempo na tela
    setTimeout(() => {
      errorMessage.textContent = "";
      errorMessage.classList = "";

      //formatando as caixinhas, zerando elas novamente
      format();
    }, 4000);

  } else { //     <== Se a função retornar false, é pq o cpf n é valido 
    errorMessage.textContent = "CPF Inválido! Por favor, insira um cpf válido!.";
    errorMessage.classList = "error"; //  na classe error

    //tempo para a div  error ficar em tela
    setTimeout(() => {
      errorMessage.textContent = "";
      errorMessage.classList = "";
      format();
    }, 4000);

  }

  ///Se um dos campos nome, email ou cpf estão vazios adentrará no if
  if (nameValue === "" || emailValue === "" || cpfValue === "") {
    errorMessage.textContent = "Por favor, preencha todos os campos!";//            <== pegando a constante e atribuindo dentro dela a string colocada
    errorMessage.classList = "error"; //busca na classe error

    //tempo para a faixa error ficar em tela
    setTimeout(() => {
      errorMessage.textContent = "";
      errorMessage.classList = "";
    }, 4000);
  }


  // if(TestaCPF(cpfValue)) 


// Criando uma formatação para os inputs
function format() {
  nameInput.value = "";
  emailInput.value = "";
  cpfInput.value = "";
}

//? função para testar o cpf 
function TestaCPF(strCPF) {

  let Soma = 0; //                                            <== Atribuindo uma váriavel para ir somando os elementos multiplicados
  let Resto;                                                 //<== Iniciando uma variavel para receber o resto 
  let verificacao = false; // Corrigido o nome da variável para "verificacao"

  let strCPFClear = deMaskCPF(strCPF); //     tirando os pontos e o traço através de uma váriavel e atribuindo a uma variavel 

  //todo:          Verificando o primeiro digito verificador
  for (i = 1; i <= 9; i++) { //             <== for de 1 até nove para pegar 
    Soma = Soma + parseInt(strCPFClear.substring(i - 1, i)) * (11 - i); // Fazendo a diminuição necessária para conforme o 'i', ele
    //siga a tabela demonstrada 
  }
  Resto = (Soma * 10) % 11;

  if (Resto === 10 || Resto === 11) { //?         <== Se o valor do resto dessa segunda divisão for igual 
    //? a 10 ou 11, este valor será considerado automaticamente como 0 (zero), o que não é o caso de nosso exemplo.
    Resto = 0;
  }

  if (Resto !== parseInt(strCPFClear.substring(9, 10))) { //? Verificando se Resto é diferente do penultimo digito através do comando
    //? substring(inicio, fim), o qual pegará o valor que está nessa intersecao

    verificacao = false;
  }


  //todo:        Reatribuindo zero para a váriavel soma pois testaremos o segundo verificador de cpf válido
  Soma = 0;

  for (i = 1; i <= 10; i++) {
    Soma = Soma + parseInt(strCPFClear.substring(i - 1, i)) * (12 - i); // Corrigido o comentário para "de 10 até 2"
  }

  Resto = (Soma * 10) % 11;

  if (Resto === 10 || Resto === 11) {
    Resto = 0;
  }

  if (Resto !== parseInt(strCPFClear.substring(10, 11))) {
    verificacao = false;
  }

  // Movido o retorno verdadeiro para dentro do último bloco de verificação
  if (Resto === parseInt(strCPFClear.substring(10, 11))) {
    verificacao = true;
  }

  return verificacao;
}


//colocando . e - conforme as especificações
function maskCPF() {
  let strCPF = cpfInput.value;
  if (strCPF.length == 3 || strCPF.length == 7) cpfInput.value += ".";
  if (strCPF.length == 11) cpfInput.value += "-";
}

//retirando tudo que n seja apenas digitos (. and - )
function deMaskCPF(cpf) {
  return cpf.replace(/\D/g, '');
}


cpfInput.addEventListener("input", function () {
  maskCPF();
});

