function escondermsg(id, delay) {
    const mensagem = document.getElementById(id);
    if (mensagem) {
        setTimeout(() => {
            mensagem.style.transition = "opacity 0.5s ease";
            mensagem.style.opacity = "0";
            setTimeout(() => mensagem.remove(), 500);
        }, delay);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    escondermsg('mensagem-login', 3000);
    escondermsg('erro_senha', 3000);
    escondermsg('message-success', 2000);
    escondermsg('message-update', 2000);
    escondermsg('message-delete', 2000);
    escondermsg('cadastrado-com-sucesso', 2000);
    escondermsg('erro_accExiste', 3000);
});
