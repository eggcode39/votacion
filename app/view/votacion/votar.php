<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 29/06/2020
 * Time: 12:07
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
                    <h4 class="header-title">¡Bienvenido <?= $votante->votante_nombre;?>! Por favor, escoja un candidato:</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-form-label">Escoger Candidato</label>
                            <select id="voto" class="form-control">
                                <option value="">Seleccionar</option>
                                <?php
                                foreach ($votantes as $v){
                                    ?>
                                    <option value="<?= $v->votante_nombre;?>"><?= $v->votante_nombre;?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" id="votar" onclick="votar('<?= $_GET['id']?>')"> Votar</button>
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