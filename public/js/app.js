const CHAVE_PEDIDOS = "vm_pedidos";

function obterPedidosSalvos() {
    const pedidos = localStorage.getItem(CHAVE_PEDIDOS);
    return pedidos ? JSON.parse(pedidos) : [];
}

function salvarPedidos(pedidos) {
    localStorage.setItem(CHAVE_PEDIDOS, JSON.stringify(pedidos));
}

function formatarData(dataIso) {
    if (!dataIso) return "-";
    const [ano, mes, dia] = dataIso.split("-");
    if (!ano || !mes || !dia) return dataIso;
    return `${dia}/${mes}/${ano}`;
}

function renderizarTabela() {
    const tbody = document.getElementById("corpo-tabela-dinamico");
    if (!tbody) return;

    const pedidos = obterPedidosSalvos();
    tbody.innerHTML = "";

    pedidos.forEach((pedido) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${pedido.codigo}</td>
            <td>${pedido.cliente}</td>
            <td>${formatarData(pedido.dataEntrega)}</td>
            <td>${pedido.quantidade}</td>
            <td>${pedido.status}</td>
            <td>${pedido.prioridade}</td>
            <td>
                <button class="btn btn-sm btn-warning me-2 btn-editar" data-id="${pedido.id}">Editar</button>
                <button class="btn btn-sm btn-danger btn-excluir" data-id="${pedido.id}">Excluir</button>
            </td>
        `;

        tbody.appendChild(tr);
    });
}

function limparFormulario() {
    const form = document.getElementById("formPedido");
    form.reset();
    document.getElementById("pedidoId").value = "";
    document.getElementById("btnSalvarPedido").textContent = "Salvar pedido";
    document.getElementById("modalNovoPedidoLabel").textContent = "Novo pedido";
}

function abrirModalEdicao(pedido) {
    document.getElementById("pedidoId").value = pedido.id;
    document.getElementById("codigo").value = pedido.codigo;
    document.getElementById("cliente").value = pedido.cliente;
    document.getElementById("dataEntrega").value = pedido.dataEntrega;
    document.getElementById("quantidade").value = pedido.quantidade;
    document.getElementById("status").value = pedido.status;
    document.getElementById("prioridade").value = pedido.prioridade;

    document.getElementById("btnSalvarPedido").textContent = "Salvar edição";
    document.getElementById("modalNovoPedidoLabel").textContent = "Editar pedido";

    const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById("modalNovoPedido"));
    modal.show();
}

function configurarFormulario() {
    const form = document.getElementById("formPedido");
    if (!form) return;

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const pedidoId = formData.get("pedidoId");
        const pedidos = obterPedidosSalvos();

        if (pedidoId) {
            const pedidosAtualizados = pedidos.map((pedido) => {
                if (String(pedido.id) === String(pedidoId)) {
                    return {
                        ...pedido,
                        codigo: formData.get("codigo"),
                        cliente: formData.get("cliente"),
                        dataEntrega: formData.get("dataEntrega"),
                        quantidade: formData.get("quantidade"),
                        status: formData.get("status"),
                        prioridade: formData.get("prioridade")
                    };
                }

                return pedido;
            });

            salvarPedidos(pedidosAtualizados);
        } else {
            pedidos.push({
                id: `${Date.now()}-${Math.floor(Math.random() * 10000)}`,
                codigo: formData.get("codigo"),
                cliente: formData.get("cliente"),
                dataEntrega: formData.get("dataEntrega"),
                quantidade: formData.get("quantidade"),
                status: formData.get("status"),
                prioridade: formData.get("prioridade")
            });

            salvarPedidos(pedidos);
        }

        renderizarTabela();
        limparFormulario();

        const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById("modalNovoPedido"));
        modal.hide();
    });
}

function configurarAcoesTabela() {
    const tbody = document.getElementById("corpo-tabela-dinamico");
    if (!tbody) return;

    tbody.addEventListener("click", (e) => {
        const btnExcluir = e.target.closest(".btn-excluir");
        if (btnExcluir) {
            const id = btnExcluir.dataset.id;
            const pedidos = obterPedidosSalvos().filter((pedido) => String(pedido.id) !== String(id));
            salvarPedidos(pedidos);
            renderizarTabela();
            return;
        }

        const btnEditar = e.target.closest(".btn-editar");
        if (btnEditar) {
            const id = btnEditar.dataset.id;
            const pedido = obterPedidosSalvos().find((item) => String(item.id) === String(id));
            if (pedido) {
                abrirModalEdicao(pedido);
            }
        }
    });
}

function configurarAberturaNovoPedido() {
    const botaoNovo = document.getElementById("btnNovoPedido");
    if (!botaoNovo) return;

    botaoNovo.addEventListener("click", () => {
        limparFormulario();
    });
}

function iniciarApp() {
    renderizarTabela();
    configurarFormulario();
    configurarAcoesTabela();
    configurarAberturaNovoPedido();
}

iniciarApp();
