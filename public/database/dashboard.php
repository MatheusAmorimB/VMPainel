<?php include 'config.php'; 

$hoje = date('Y-m-d');

$sql = "SELECT * FROM ordens_producao
        WHERE data_entrega = '$hoje'
        OR (data_entrega < '$hoje' AND status != 'Entregue')
        ORDER BY cliente, data_entrega";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard Entregas</title>
</head>
<body class="container mt-4">

<h3>Entregas do Dia</h3>

<table class="table table-bordered table-striped">
<tr>
<th>Cliente</th>
<th>Ordem</th>
<th>Produto</th>
<th>Qtd</th>
<th>Data</th>
<th>Status</th>
</tr>

<?php while($row = $result->fetch_assoc()): 
    $atrasado = ($row['data_entrega'] < $hoje && $row['status'] != 'Entregue');
?>

<tr class="<?= $atrasado ? 'table-danger' : '' ?>">
<td><?= $row['cliente'] ?></td>
<td><?= $row['numero_ordem'] ?></td>
<td><?= $row['produto'] ?></td>
<td><?= $row['quantidade'] ?></td>
<td><?= date('d/m/Y', strtotime($row['data_entrega'])) ?></td>
<td><?= $row['status'] ?></td>
</tr>

<?php endwhile; ?>

</table>
</body>
</html>