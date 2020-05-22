
<html>
	<head>
    <meta charset="utf-8" />
		<title>Chamados</title>
        <?php echo view('template/header') ?>

</head>

<body>
<?php echo view('template/menu') ?>

    <div class="container">
      
      <div class="row">
        <div class="col mb-3">
            <h1 class="display-4 text-center">Lista de Chamados</h1><br>
            <div class="alert alert-success d-none mb-0" role="alert">0</div>
        </div>
      </div>

      <form action="" method="POST">
        
        <div class="form-row">
          <div class="col-12 col-md-6 mb-2">
            <label for="" class="">Título</label>
            <input type="text" name="txtTitulo" class="form-control form-control-lg" placeholder="Título" value="" />
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label for="" class="">Status</label>
            <select name="txtStatus" class="form-control form-control-lg">
              <option value=""></option>
              <option value="Pendente">Pendente</option>
              <option value="Aguardando">Aguardando</option>
              <option value="Resolvido">Resolvido</option>
              <option value="Cancelado">Cancelado</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="col-12 col-md-4 mx-auto text-center mt-3">
            <button class="btn btn-dark w-100" id="btnInsert">Filtrar</button>
          </div>
        </div>
      </form>
	  
	  <br>
	  
		  <table class="table mt-4">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Título</th>
			  <th scope="col">Data</th>
			  <th scope="col">Satus</th>
			  <th scope="col">Ações</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <th scope="row">1</th>
			  <td>Mark</td>
			  <td>Otto</td>
			  <td><span class="badge badge-warning w-100">Pendente</span></td>
			  <td class="text-right">
				<a href="<?php echo base_url('chamados/responder/1')?>" class="btn btn-success">Responder</a>
				<a href="<?php echo base_url('chamados/excluir/1')?>" class="btn btn-danger">Excluir</a>
			  </td>
			</tr>
		  </tbody>
		</table>
      
    </div>
  </body>	

</html>