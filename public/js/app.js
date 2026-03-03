import { buscarPedidos, inserirPedido } from "./api.js";
import { renderizarTabela } from "./tabela.js";
import { verificarNovoPedido, mostrarMensagem } from "./notificacoes.js";
import { configurarModal } from "./modal.js";

async function carregarPedidos() {
    const pedidos = await buscarPedidos();
    renderizarTabela(pedidos);
    verificarNovoPedido(pedidos);
}

function configurarFormulario() {

    document.getElementById("formPedido")
        .addEventListener("submit", async function(e) {

            e.preventDefault();

            const formData = new FormData(this);
            await inserirPedido(formData);

            mostrarMensagem("Pedido salvo com sucesso ✅");

            this.reset();
            carregarPedidos();
        });
}

function iniciarApp() {
    configurarModal();
    configurarFormulario();
    carregarPedidos();
    setInterval(carregarPedidos, 5000);
}

iniciarApp();