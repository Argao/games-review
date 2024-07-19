//envia o formulário de busca ao alterar o select
console.log(1)
document.addEventListener('DOMContentLoaded', function() {
    var selectElement = document.getElementById('filter-options');

    selectElement.addEventListener('change', function() {
        var form = document.getElementById('busca-form');
        form.submit();
    });
});


function confirmaDelete() {
    return confirm('Deseja realmente realizar a busca?');
}

