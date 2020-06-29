<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 29/06/2020
 * Time: 12:13
 */
?>
<body>
<div class="container">
    <!-- /.row -->
    <!-- Main row -->
    <br>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="header-title">Lista de Personas</h4>
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
                    <th>Apellido</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="header-title">Agregar Otra Persona</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-form-label">Nombre</label>
                            <input class="form-control" type="text" id="person_name" placeholder="Ingresar Nombre">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Apellido</label>
                            <input class="form-control" type="text" id="person_surname" placeholder="Ingresar Apellido">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success"> Agregar Persona</button>
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