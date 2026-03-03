export function configurarModal() {

    const modal = document.getElementById("modal");
    const abrir = document.getElementById("abrirModal");
    const fechar = document.querySelector(".fechar");

    abrir.onclick = () => modal.style.display = "flex";
    fechar.onclick = () => modal.style.display = "none";

    window.onclick = (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    };
}