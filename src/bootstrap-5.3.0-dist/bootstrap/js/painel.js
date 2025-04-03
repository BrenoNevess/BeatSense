document.querySelectorAll(".editar").forEach(btn => {
    btn.addEventListener("click", function() {
        document.getElementById("id").value = this.getAttribute("data-id");
        document.getElementById("nome").value = this.getAttribute("data-nome");
        document.getElementById("email").value = this.getAttribute("data-email");
        document.getElementById("btnSalvar").name = "editar";
        document.getElementById("btnSalvar").textContent = "Atualizar";
    });
});