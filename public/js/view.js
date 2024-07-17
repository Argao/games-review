//envia o formulário de busca ao alterar o select
console.log(1)
document.addEventListener('DOMContentLoaded', function() {
    var selectElement = document.getElementById('filtro-select');

    selectElement.addEventListener('change', function() {
        var form = document.getElementById('busca-form');
        form.submit();
    });
});






function confirmaDelete(jogoId) {
    if (confirm("Tem certeza que deseja deletar este jogo?")) {
        document.getElementById("delete_" + jogoId).submit();
    }
}


