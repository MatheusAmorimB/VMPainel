export function renderizarTabela(pedidos) {

    const tbody = document.getElementById("corpo-tabela");
    tbody.innerHTML = "";

    pedidos.forEach(pedido => {
        const linha = document.createElement("tr");

        linha.innerHTML = `
            <td>${pedido.codigo}</td>
            <td>${pedido.quantidade}</td>
            <td>${pedido.dataEntrega}</td>
            <td>${pedido.cliente}</td>
            <td>${pedido.status}</td>
            <td>${pedido.prioridade}</td>
        `;

        tbody.appendChild(linha);
    });
}