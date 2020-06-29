<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 29/06/2020
 * Time: 14:38
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
            <br>
            <h5 class="header-title">Listado de Personas Sin Emitir Voto</h5>
            <h6>Total: <?= (isset($faltan->total)) ? $faltan->total : 0;?></h6>
        </div>
    </div>
    <br>
    <!-- /.row (main row) -->
    <div class="row">
        <div class="col-lg-12">
            <table id="example2" class="table table-bordered table-hover">
                <thead class="text-capitalize">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($votantes as $v){
                    ?>
                    <tr>
                        <td><?= $id;?></td>
                        <td><?= $v->votante_nombre;?></td>
                    </tr>
                    <?php
                    $id++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script src="<?php echo _SERVER_;?>js/jquery.3.2.1.min.js" ></script>
<script src="<?php echo _SERVER_;?>js/domain.js" ></script>
<script src="<?php echo _SERVER_;?>js/votacion.js" ></script>
</html>