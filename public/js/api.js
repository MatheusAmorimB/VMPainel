import	buscarPedidos

export async function buscarPedidos() {
    const response = await fetch("http://localhost/buscar_pedidos.php");
    return await response.json();
}

export async function inserirPedido(formData) {
    await fetch("http://localhost/inserir_pedido.php", {
        method: "POST",
        body: formData
    });
}
