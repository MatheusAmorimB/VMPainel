<?php include 'config.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero_ordem = $_POST['numero_ordem'];
    $cliente = $_POST['cliente'];
    $codigo_produto = $_POST['codigo_produto'];
    $produto = $_POST['produto'];
    $quantidade = intval($_POST['quantidade']);
    $data_entrega = DateTime::createFromFormat('d/m/Y', $_POST['data_entrega'])->format('Y-m-d');
    $observacao = $_POST['observacao'];
    $status = $_POST['status'];

    if(empty($numero_ordem) || empty($cliente) || empty($produto)){
        echo "<div class='alert alert-danger'>Preencha os campos obrigatórios.</div>";
    } else {

        $stmt = $conn->prepare("INSERT INTO ordens_producao 
        (numero_ordem, cliente, codigo_produto, produto, quantidade, data_entrega, observacao, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssisss", 
            $numero_ordem, 
            $cliente, 
            $codigo_produto, 
            $produto, 
            $quantidade, 
            $data_entrega, 
            $observacao, 
            $status
        );

        $stmt->execute();
        echo "<div class='alert alert-success'>Ordem cadastrada com sucesso!</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Cadastro de Ordem</title>
</head>
<body class="container mt-4">

<h3>Cadastro de Ordem de Produção</h3>

<form method="POST">
<input type="text" name="numero_ordem" class="form-control mb-2" placeholder="Número da Ordem" required>
<input type="text" name="cliente" class="form-control mb-2" placeholder="Cliente" required>
<input type="text" name="codigo_produto" class="form-control mb-2" placeholder="Código do Produto" required>
<input type="text" name="produto" class="form-control mb-2" placeholder="Produto" required>
<input type="number" name="quantidade" class="form-control mb-2" placeholder="Quantidade" required>
<input type="text" name="data_entrega" class="form-control mb-2" placeholder="Data de Entrega (DD/MM/AAAA)" required>
<textarea name="observacao" class="form-control mb-2" placeholder="Observação"></textarea>

<select name="status" class="form-control mb-3">
<option value="Pendente">Pendente</option>
<option value="Faturado">Faturado</option>
<option value="Entregue">Entregue</option>
</select>

<button class="btn btn-primary w-100">Salvar</button>
</form>

</body>
</html>