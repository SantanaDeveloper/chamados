
<html>
	<head>
    <meta charset="utf-8" />
		<title><?= $titulo ?></title>
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

      <?php my_custom_errors() ?>

      <form action="chamados" method="GET">
        
        <div class="form-row">
          <div class="col-12 col-md-6 mb-2">
            <label for="" class="">Título</label>
            <input type="text" name="txtTitulo" class="form-control form-control-lg" placeholder="Título" value="" />
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label for="" class="">Status</label>
            <select name="txtStatus" class="form-control form-control-lg">
              <option value=""></option>
              <option value="Pending">Pendente</option>
              <option value="Waiting">Aguardando</option>
              <option value="Solved">Resolvido</option>
              <option value="Canceled">Cancelado</option>
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
			  <th scope="col">Status</th>
			  <th scope="col" class="text-center">Ações</th>
			</tr>
		  </thead>
		  <tbody>
        <?php foreach($chamados as $chamado): ?>
			<tr>
			  <th scope="row"><?= $chamado->id ?></th>
			  <td><?= $chamado->title ?></td>
			  <td><?= date('d/m/Y H:i:s', strtotime($chamado->created)) ?></td>
			  <td><?= labelStatus($chamado->status) ?></td>
			  <td class="text-right">
				<a href="<?php echo base_url('chamados/responder/'.$chamado->id)?>" class="btn btn-success">Responder</a>
				<a href="<?php echo base_url('chamados/excluir/'.$chamado->id)?>" class="btn btn-danger">Excluir</a>
			  </td>
      </tr>
        <?php endforeach; ?>
		  </tbody>
		</table>
      
    </div>
  </body>	

</html>