<?php include 'config.php';

if(isset($_GET['alterar'])){
    $id = $_GET['alterar'];

    $ordem = $conn->query("SELECT status FROM ordens_producao WHERE id=$id")->fetch_assoc();

    $novo_status = null;

    if($ordem['status'] == 'Pendente'){
        $novo_status = 'Faturado';
    } elseif($ordem['status'] == 'Faturado'){
        $novo_status = 'Entregue';
    }

    if($novo_status){
        $conn->query("UPDATE ordens_producao SET status='$novo_status' WHERE id=$id");
    }
}

if(isset($_GET['excluir'])){
    $id = $_GET['excluir'];
    $conn->query("DELETE FROM ordens_producao WHERE id=$id");
}

$result = $conn->query("SELECT * FROM ordens_producao ORDER BY data_entrega DESC");
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gerenciar Ordens</title>
</head>
<body class="container mt-4">

<h3>Gerenciamento de Ordens</h3>

<table class="table table-bordered">
<tr>
<th>Ordem</th>
<th>Cliente</th>
<th>Status</th>
<th>Ações</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['numero_ordem'] ?></td>
<td><?= $row['cliente'] ?></td>
<td><?= $row['status'] ?></td>
<td>
<a href="?alterar=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Avançar Status</a>
<a href="?excluir=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Confirma exclusão?')">Excluir</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</body>
</html>