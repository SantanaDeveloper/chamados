<html>

<head>
  <meta charset="utf-8" />
  <title>Chamados</title>
  <?php echo view('template/header') ?>

</head>

<body>
  <?php echo view('template/menu') ?>

  <?php foreach ($chamado as $ch) :  ?>

    <div class="container">
      <div class="row">
        <div class="col-8 m-auto">

          <div class="row">
            <div class="col mb-3">
              <h1 class="display-4 text-center">Chamado #<?= $ch->id ?></h1><br>
              <div class="alert alert-success d-none mb-0" role="alert">0</div>
            </div>
          </div>
          <?php my_custom_errors() ?>
          <div class="row">

            <div class="col-12 col-md-4 mt-3">
              <div class="card">
                <div class="card-header">
                  <strong>Usuário</strong>
                </div>
                <div class="card-body">
                  <?= $ch->name ?>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4 mt-3">
              <div class="card">
                <div class="card-header">
                  <strong>Status</strong>
                </div>
                <div class="card-body">
                  <?= labelStatus($ch->status) ?>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4 mt-3">
              <div class="card">
                <div class="card-header">
                  <strong>Data</strong>
                </div>
                <div class="card-body">
                  <?= date('d/m/Y H:i:s', strtotime($ch->created)) ?>
                </div>
              </div>
            </div>

          </div><!-- .row -->

          <div class="card mt-3">
            <div class="card-header">
              <strong>Título</strong>
            </div>
            <div class="card-body">
              <?= $ch->title ?>
            </div>
          </div>

          <div class="card mt-3">
            <div class="card-header">
              <strong>Descrição</strong>
            </div>
            <div class="card-body">
              <?= $ch->description ?>
            </div>

          </div><!-- .row -->

          <div class="text-center mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success m-auto btn-lg" data-toggle="modal" data-target="#exampleModal">
              Responder e atualizar Chamado
            </button>
          </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Responder e atualizar Chamado</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form action="<?php echo base_url('chamados/responderAcao/'.$ch->id) ?>" method="POST">

                    <div class="form-row">
                      <div class="col-12 mb-2">
                        <label for="" class="">Resposta</label>
                        <textarea name="txtResposta" class="form-control form-control-lg" style="min-height: 250px;" placeholder="Resposta"></textarea>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-12 mb-2">
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
                      <div class="col-12 col-md-8">
                        <button class="btn btn-dark w-100 mt-3" id="btnInsert">Atualizar</button>
                      </div>

                      <div class="col-12 col-md-4">
                        <button type="button" class="btn btn-danger w-100 mt-3" data-dismiss="modal">Cancelar</button>
                      </div>
                    </div>

                  </form>

                </div><!-- .modal-body -->
              </div>
            </div>
          </div>


        <?php endforeach; ?>

        <hr>

        <h3 class="mb-3">Histórico</h3>

        <?php foreach ($historico as $hist) : ?>

          <!-- inicio repetição -->

          <div class="row">

            <div class="col-12 col-md-4 mt-3">
              <div class="card">
                <div class="card-header">
                  <strong>Usuário Resposta</strong>
                </div>
                <div class="card-body">
                  <?= $hist->name ?>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4 mt-3">
              <div class="card">
                <div class="card-header">
                  <strong>Status</strong>
                </div>
                <div class="card-body">
                  <?= labelStatus($hist->status) ?>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4 mt-3">
              <div class="card">
                <div class="card-header">
                  <strong>Data</strong>
                </div>
                <div class="card-body">
                  <?= date('d/m/Y H:i:s', strtotime($hist->updated)) ?>
                </div>
              </div>
            </div>

          </div><!-- .row historico chamados -->

          <div class="card mt-3 mb-3">
            <div class="card-header">
              <strong>Resposta</strong>
            </div>
            <div class="card-body">
              <?= $hist->answer ?>
            </div>
          </div>

          <!-- fim repetição -->

        <?php endforeach; ?>

        </div>
      </div><!-- .row -->
    </div><!-- .container -->
</body>

</html>