<!DOCTYPE html>
<html lang="en">
<head>
   	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard VM</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-5.3.8.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
	
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5 fw-bold">
		<div class="container-fluid">
			<a class="navbar-brand fs-2" href="#">VM Etiquetas</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
			  <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse fs-5" id="painel">
			  <ul class="navbar-nav ms-auto">
				<li class="nav-item">
				  <a class="nav-link text-light" href="painel.php">Painel</a>
				</li>
			  </ul>
			  <ul class="navbar-nav ms-3">
				<li class="nav-item">
				  <a class="nav-link text-light" href="#">Histórico</a>
				</li>
			  </ul>
			</div>
	  </div>
	</nav>
	
	<div class="container overflow-hidden text-center fw-bold">
		<div class="row gy-5">
			<div class="col">
				<div class="card text-center" style="width: 18rem;">
				  <div class="card-body">
					<h5 class="card-title">Novos Pedidos</h5>
					<p class="card-text fs-1 mt-4">16</p>
					<a class="btn btn-primary" href="painel.php" role="button">Verificar Pedidos</a>
				  </div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center" style="width: 18rem;">
				  <div class="card-body">
					<h5 class="card-title">Pedidos em Produção</h5>
					<p class="card-text fs-1 mt-4">32</p>
					<a class="btn btn-primary" href="/public/painel.php" role="button">Verificar Painel</a>
				  </div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center" style="width: 18rem;">
				  <div class="card-body">
					<h5 class="card-title">Pedidos Atrasados</h5>
					<p class="card-text fs-1 mt-4">4</p>
					<a class="btn btn-danger" href="painel.php" role="button">Verificar Atrasados</a>
				  </div>
				</div>
			</div>
			<div class="col">
				<div class="card text-center" style="width: 18rem;">
				  <div class="card-body">
					<h5 class="card-title">Pedidos Enviados Hoje</h5>
					<p class="card-text fs-1 mt-4">8</p>
					<a class="btn btn-primary" href="painel.php" role="button">Verificar Enviados</a>
				  </div>
				</div>
			</div>
		</div>
  </div>
	  
  <div class="mt-4 ms-3 fw-bold">
	<p class="fs-3">Adicionar novo Pedido</p>
    <button type="button" id="btnNovoPedido" class="btn btn-md btn-primary ms-22" data-bs-toggle="modal" data-bs-target="#modalNovoPedido">
        <i class="bi bi-plus-lg bi-plus"></i>
    </button>
  </div>

  <div class="modal fade" id="modalNovoPedido" tabindex="-1" aria-labelledby="modalNovoPedidoLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg modal-dialog-centered">
		  <div class="modal-content">
			  <div class="modal-header">
				  <h5 class="modal-title" id="modalNovoPedidoLabel">Novo pedido</h5>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
			  </div>
			  <form id="formPedido">
				  <div class="modal-body">
					  <div class="row g-3">
						  <div class="col-md-6">
							  <label for="codigo" class="form-label">Código do produto</label>
							  <input type="text" class="form-control" id="codigo" name="codigo" required>
						  </div>
						  <div class="col-md-6">
							  <label for="cliente" class="form-label">Cliente</label>
							  <input type="text" class="form-control" id="cliente" name="cliente" required>
						  </div>
						  <div class="col-md-6">
							  <label for="dataEntrega" class="form-label">Data de entrega</label>
							  <input type="date" class="form-control" id="dataEntrega" name="dataEntrega" required>
						  </div>
						  <div class="col-md-6">
							  <label for="quantidade" class="form-label">Quantidade</label>
							  <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" required>
						  </div>
						  <div class="col-md-6">
							  <label for="status" class="form-label">Status</label>
							  <select class="form-select" id="status" name="status" required>
								  <option value="" selected disabled>Selecione</option>
								  <option value="Produção">Produção</option>
								  <option value="Faturamento">Faturamento</option>
								  <option value="Enviado">Enviado</option>
							  </select>
						  </div>
						  <div class="col-md-6">
							  <label for="prioridade" class="form-label">Prioridade</label>
							  <select class="form-select" id="prioridade" name="prioridade" required>
								  <option value="" selected disabled>Selecione</option>
								  <option value="Alta">Alta</option>
								  <option value="Média">Média</option>
								  <option value="Baixa">Baixa</option>
							  </select>
						  </div>
					  </div>
				  </div>
				  <div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					  <button type="submit" class="btn btn-primary">Salvar pedido</button>
				  </div>
			  </form>
		  </div>
	  </div>
  </div>
	  
	  
  <div class="bg-secondary"> 
  <table class="table table-striped mt-5">
  <thead>
    <tr>
      <th>Pedido</th>
      <th>Cliente</th>
      <th>Status</th>
      <th>Ação</th>
  </thead>

  <tbody id="corpo-tabela">
    <tr>
      <td>PA03850VB0080E</td>
      <td>LG Eletronics</td>
      <td>
        <span class="badge bg-warning status-badge">
          Produção
        </span>
      </td>
      <td>
        <div class="dropdown">
          <button class="btn btn-primary btn-sm dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown">
            Alterar
          </button>

          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item status-option" data-status="Produção" href="#">
                Produção
              </a>
            </li>
            <li>
              <a class="dropdown-item status-option" data-status="Faturamento" href="#">
                Faturamento
              </a>
            </li>
            <li>
              <a class="dropdown-item status-option" data-status="Enviado" href="#">
                Enviado
              </a>
            </li>
          </ul>
        </div>
      	</td>
    	</tr>
 	 </tbody>
	</table>
   </div>
	  
	  
	  
	  
	  
	  
	  
	<script type="module" src="js/app.js"></script> 
	<script src="js/bootstrap-5.3.8.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
