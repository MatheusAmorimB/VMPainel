const CHAVE_PEDIDOS = "vm_pedidos";

function obterPedidosSalvos() {
    const pedidos = localStorage.getItem(CHAVE_PEDIDOS);
    return pedidos ? JSON.parse(pedidos) : [];
}

function salvarPedidos(pedidos) {
    localStorage.setItem(CHAVE_PEDIDOS, JSON.stringify(pedidos));
}

function adicionarPedido(pedido) {
    const pedidos = obterPedidosSalvos();
    pedidos.push(pedido);
    salvarPedidos(pedidos);
}

function corStatus(status) {
    if (status === "Produção") return "bg-warning";
    if (status === "Faturamento") return "bg-primary";
    return "bg-success";
}

function criarLinhaIndex(pedido) {
    const tr = document.createElement("tr");
    tr.innerHTML = `
        <td>${pedido.codigo}</td>
        <td>${pedido.cliente}</td>
        <td><span class="badge status-badge ${corStatus(pedido.status)}">${pedido.status}</span></td>
        <td>
            <div class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">Alterar</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item status-option" data-status="Produção" href="#">Produção</a></li>
                    <li><a class="dropdown-item status-option" data-status="Faturamento" href="#">Faturamento</a></li>
                    <li><a class="dropdown-item status-option" data-status="Enviado" href="#">Enviado</a></li>
                </ul>
            </div>
        </td>
    `;

    return tr;
}

function carregarPedidosNaTabelaIndex() {
    const tbody = document.getElementById("corpo-tabela-dinamico");
    if (!tbody) return;

    tbody.innerHTML = "";
    const pedidos = obterPedidosSalvos();
    pedidos.forEach((pedido) => tbody.appendChild(criarLinhaIndex(pedido)));
}

function configurarTrocaStatus() {
    const tabela = document.querySelector("table");
    if (!tabela) return;

    tabela.addEventListener("click", (e) => {
        const opcao = e.target.closest(".status-option");
        if (!opcao) return;

        e.preventDefault();

        const novoStatus = opcao.dataset.status;
        const linha = opcao.closest("tr");
        const badge = linha.querySelector(".status-badge");

        badge.classList.remove("bg-warning", "bg-primary", "bg-success");
        badge.classList.add(corStatus(novoStatus));
        badge.textContent = novoStatus;
    });
}

function configurarFormulario() {
    const form = document.getElementById("formPedido");
    if (!form) return;

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const pedido = {
            codigo: formData.get("codigo"),
            cliente: formData.get("cliente"),
            dataEntrega: formData.get("dataEntrega"),
            quantidade: formData.get("quantidade"),
            status: formData.get("status"),
            prioridade: formData.get("prioridade")
        };

        adicionarPedido(pedido);
        carregarPedidosNaTabelaIndex();
        form.reset();

        const modalEl = document.getElementById("modalNovoPedido");
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.hide();
    });
}

function iniciarApp() {
    carregarPedidosNaTabelaIndex();
    configurarTrocaStatus();
    configurarFormulario();
}

iniciarApp();
