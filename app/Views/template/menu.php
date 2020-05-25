<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <div class="container">
    <a class="navbar-brand" href="#">
      Chamados
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url() ?>">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('chamados') ?>">Consultar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('login/sair') ?>">Sair</a>
        </li>
      </ul>
      <span class="navbar-text">
        Olá <strong><?= \Config\Services::session()->get('nome') ?></strong>
      </span>

    </div>
  </div>
</nav>