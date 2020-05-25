<html>

<head>
    <meta charset="utf-8" />
    <title><?= $titulo ?></title>
    <?php echo view('template/header') ?>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-6 m-auto">


                <div class="row">
                    <div class="col mb-3 mt-5">
                        <h1 class="display-4 text-center">Login</h1><br>
                    </div>
                </div>

                <?php my_custom_errors() ?>

                <form action="<?php echo base_url('login/loginAcao') ?>" method="POST">

                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="" class="">Email</label>
                            <input type="text" name="txtEmail" class="form-control form-control-lg" placeholder="Email" value="" />
                        </div>
                        <div class="col-12 mb-2">
                            <label for="" class="">Senha</label>
                            <input type="password" name="txtSenha" class="form-control form-control-lg" placeholder="Senha" value="" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-md-6 mx-auto text-center mt-3">
                            <button class="btn btn-dark w-100">Login</button>
                            <a href="<?php echo base_url('login/cadastro') ?>" class="btn w-100">Cadastre-se</a>
                        </div>
                    </div>

                </form>


            </div><!-- end col-6 -->
        </div>

    </div>
</body>

</html>