<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <?php echo view('template/header') ?>

</head>

<body>
<?php echo view('template/menu') ?>
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto">

                <div class="row">
                    <div class="col mb-3">
                        <h1 class="display-4 text-center">Cadastrar novo Chamado</h1><br>
                        <div class="alert alert-success d-none mb-0" role="alert">0</div>
                    </div>
                </div>

                <?php my_custom_errors() ?>

                <form action="<?php echo base_url('home/cadastroAcao') ?>" method="POST">

                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="" class="">Título</label>
                            <input type="text" name="txtTitulo" class="form-control form-control-lg" placeholder="Descrição" value="" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="" class="">Descrição</label>
                            <textarea name="txtDescricao" class="form-control form-control-lg" style="min-height: 300px;" placeholder="Descrição"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-md-4 mx-auto text-center mt-3">
                            <button class="btn btn-dark w-100" id="btnInsert">Cadastrar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</body>

</html>