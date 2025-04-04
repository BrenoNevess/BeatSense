window.addEventListener('DOMContentLoaded', () => {
    const mensagem = document.getElementById('mensagem-login');
    if (mensagem) {
        setTimeout(() => {
            mensagem.style.transition = "opacity 0.5s ease";
            mensagem.style.opacity = "0";
            setTimeout(() => mensagem.remove(), 500);
        }, 5000);
    }
});