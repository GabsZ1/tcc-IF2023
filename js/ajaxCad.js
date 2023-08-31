let xhr = new XMLHttpRequest();

xhr.open('GET', url, true);

xhr.onreadystatechange = function() {
    if (xhr.readyState == 4) {/*requisição finalizada*/  }
    if (xhr.status = 200) { /*requisição bem sucedida*/
    console.log(xhr.responseText); 
    } 
    xhr.send(); 
}

function buscaCida() {
    let inputCida = document.querySelector('select[name=estado]');
    let cida = inputCida.value;
    let url = 'http://academico.engsupport.eti.br/servicos/cidades.asmx' + cida + '/json';
}

console.log(JSON.parse(xhr.responseText));

function preencheCampos(json) { 
    document.querySelector('input[name=cidade]').value = json.cidade;
}