window.onload = function() {
    fetch('http://localhost/php/api.php')
        .then(response => response.json())
        .then(data => preencherTabela(data))
        .catch(error => console.error(error));
};

function preencherTabela(aplicacoes) {
    const tabela = document.getElementById('tabelaAplicacoes');
    aplicacoes.forEach(aplicacao => {
        const linha = tabela.insertRow();
        const celulaNome = linha.insertCell();
        const celulaStatus = linha.insertCell();
        const celulaUltimaVerificacao = linha.insertCell();
        celulaNome.textContent = aplicacao.nome;
        celulaStatus.textContent = aplicacao.status;
        celulaUltimaVerificacao.textContent = new Date(aplicacao.ultima_verificacao).toLocaleString();
    });
}