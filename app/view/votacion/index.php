<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 29/06/2020
 * Time: 11:42
 */
?>
<body>
    <div class="container">
        <!-- /.row -->
        <!-- Main row -->
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="header-title">Sistema de Votación para Nuevo Presidente 2020 - 2021 RTC Isaac Lindley</h4>
            </div>
        </div>
        <br>

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="header-title">Verificar Votante</h4>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-form-label">DNI</label>
                                <input class="form-control" type="text" id="dni" maxlength="8" onkeyup="return validar_numeros(this.id)" placeholder="Ingresar DNI">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" onclick="verificar_votante()" id="verificar"> Verificar</button>
                            </div>
                        </div>
                        <!-- /.box-body -->

                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</body>
<script src="<?php echo _SERVER_;?>js/jquery.3.2.1.min.js" ></script>
<script src="<?php echo _SERVER_;?>js/domain.js" ></script>
<script src="<?php echo _SERVER_;?>js/votacion.js" ></script>
</html>