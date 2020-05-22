<html>

<head>
    <meta charset="utf-8" />
    <title>Cadastre-se!</title>
    <?php echo view('template/header') ?>

</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-6 m-auto">


                <div class="row">
                    <div class="col mb-3 mt-5">
                        <h1 class="display-4 text-center">Cadastre-se!</h1><br>
                    </div>
                </div>

                <form action="" method="POST">

                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="" class="">Nome</label>
                            <input type="text" name="txtNome" class="form-control form-control-lg" placeholder="Email" value="" />
                        </div>
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
                            <button class="btn btn-dark w-100">Cadastrar</button>
                            <a href="<?php echo base_url('login/index') ?>" class="btn w-100">Login</a>
                        </div>
                    </div>

                </form>


            </div><!-- end col-6 -->
        </div>

    </div>
</body>

</html>