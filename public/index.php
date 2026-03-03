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
	
	<script>
			document.querySelectorAll(".status-option").forEach(item => {

			item.addEventListener("click", function(e) {
				e.preventDefault();

		let novoStatus = this.getAttribute("data-status");

		let linha = this.closest("tr");
		let badge = linha.querySelector(".status-badge");

		let linha = this.closest("tr");
		let badge = linha.querySelector(".status-badge");

		badge.classList.remove("bg-warning", "bg-success", "bg-primary");


		if (novoStatus === "Produção") {
		  badge.classList.add("bg-warning");
		}

		if (novoStatus === "Faturamento") {
		  badge.classList.add("bg-primary");
		}

		if (novoStatus === "Enviado") {
		  badge.classList.add("bg-success");
		}

		badge.textContent = novoStatus;

	  });
				
		document.getElementById("btnNovoPedido")
    	.addEventListener("click", () => {
        document.getElementById("modal").style.display = "flex";
      });		

	});
	</script>
	
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
    <button type="button" id="btnNovoPedido" class="btn btn-md btn-primary ms-22">
        <i class="bi bi-plus-lg bi-plus"></i>
    </button>
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