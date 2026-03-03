const CHAVE_PEDIDOS = "vm_pedidos";

function obterPedidosSalvos() {
    const pedidos = localStorage.getItem(CHAVE_PEDIDOS);
    return pedidos ? JSON.parse(pedidos) : [];
}

function formatarData(dataIso) {
    if (!dataIso) return "-";
    const [ano, mes, dia] = dataIso.split("-");
    if (!ano || !mes || !dia) return dataIso;
    return `${dia}/${mes}/${ano}`;
}

function carregarPedidosNoPainel() {
    const tbody = document.getElementById("painel-tabela-dinamico");
    if (!tbody) return;

    tbody.innerHTML = "";

    const pedidos = obterPedidosSalvos();
    pedidos.forEach((pedido) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <th scope="row">${pedido.codigo}</th>
            <td>${pedido.cliente}</td>
            <td>${formatarData(pedido.dataEntrega)}</td>
            <td>${pedido.quantidade}</td>
            <td>${pedido.status}</td>
        `;
        tbody.appendChild(tr);
    });
}

carregarPedidosNoPainel();
