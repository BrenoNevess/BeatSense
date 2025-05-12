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
    escondermsg('mensagem-login', 5000);
    escondermsg('message-error', 2000);
    escondermsg('message-success', 3000);
    escondermsg('message-update', 3000);
    escondermsg('message-delete', 3000);
    escondermsg('cadastrado-com-sucesso', 2500);
});
