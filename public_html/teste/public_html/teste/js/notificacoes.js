let totalAnterior = 0;

export function verificarNovoPedido(pedidos) {
    if (pedidos.length > totalAnterior) {
        document.getElementById("somNovoPedido").play();
    }

    totalAnterior = pedidos.length;
}

export function mostrarMensagem(texto) {
    const msg = document.getElementById("mensagem");
    msg.innerText = texto;
    msg.style.display = "block";

    setTimeout(() => {
        msg.style.display = "none";
    }, 3000);
}