//envia o formulário de busca ao alterar o select
document.addEventListener('DOMContentLoaded', function() {
    var selectElement = document.getElementById('filter-options');

    selectElement.addEventListener('change', function() {
        var form = document.getElementById('busca-form');
        form.submit();
    });
});

// Fecha a mensagem de sucesso após 5 segundos
document.addEventListener('DOMContentLoaded', function() {
    var successMessage = document.querySelector('.success-message');
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.opacity = '0';
            // Opcional: remover o elemento após a transição
            successMessage.addEventListener('transitionend', function() {
                successMessage.style.display = 'none';
            });
        }, 5000);
    }
});

function confirmaDelete() {
    return confirm('Tem certeza que deseja apagar o jogo?');
}

