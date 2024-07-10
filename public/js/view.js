console.log('oi');
function confirmaDelete(jogoId) {
    if (confirm("Tem certeza que deseja deletar este jogo?")) {
        document.getElementById("delete_" + jogoId).submit();
    }
}
