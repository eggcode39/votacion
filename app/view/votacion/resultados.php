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
            <h4 class="header-title">Resultados de Votación para Presidente Rotaract Isaac Lindley Periodo 2020 - 2021</h4>
            <br>
            <h6>Votaron: <?= (isset($votaron->total)) ? $votaron->total : 0;?></h6>
            <h6>Faltar Votar: <?= (isset($faltan->total)) ? $faltan->total : 0;?></h6>
            <h6>Total Habilitados: <?= (isset($total_votantes->total)) ? $total_votantes->total : 0;?></h6>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <table id="example2" class="table table-bordered table-hover">
                <thead class="text-capitalize">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Votos</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $data = [];
                foreach ($votaciones as $v){
                    $data[] = array("votacion_nombre" => $v->votacion_nombre, "total" => $v->total);
                }
                $orden1 = [];
                foreach ($data as $v => $fila){
                    $orden1[$v] = $fila['total'];
                }
                array_multisort($orden1,SORT_DESC, $data);
                ?>
                <?php
                $id = 1;
                foreach ($data as $v => $fila){
                    ?>
                    <tr <?php if($id == 1) { echo "style=\"background-color: #a01a1a; color: white;\"";}?>>
                        <td><?= $id;?></td>
                        <td><?= $fila['votacion_nombre'];?></td>
                        <td><?= $fila['total'];?></td>
                    </tr>
                    <?php
                    $id++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
</div>
</body>
<script src="<?php echo _SERVER_;?>js/jquery.3.2.1.min.js" ></script>
<script src="<?php echo _SERVER_;?>js/domain.js" ></script>
<script src="<?php echo _SERVER_;?>js/votacion.js" ></script>
</html>



<?php
/*$data = [];
foreach ($votaciones as $v){
    $data[] = array("votacion_nombre" => $v->votacion_nombre, "total" => $v->total);
}
$orden1 = [];
foreach ($data as $v => $fila){
    $orden1[$v] = $fila['total'];
}
array_multisort($orden1,SORT_DESC, $data);
*/?><!--
<?php
/*$id = 1;
foreach ($data as $v => $fila){
    */?>
    <tr>
        <td><?/*= $id;*/?></td>
        <td><?/*= $fila['votacion_nombre'];*/?></td>
        <td><?/*= $fila['total'];*/?></td>
    </tr>
    --><?php
/*    $id++;
}
*/?>