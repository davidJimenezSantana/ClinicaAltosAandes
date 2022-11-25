<?php
include("vista/admin/menuAdmin.php");
$u = new usuario();
$usuarios = $u->verUsuarios();
?>
<div class="contenedor-gestion">
    <div class="container">
        <div class="row titulo-gestion">
            <div class="col-4">

            </div>
            <div class="col-4">
                <h1>GESTIÓN DE USUARIO</h1>
            </div>
            <div class="col-4">

            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="tabla-gestion">
                    <table class="table-light">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($usuarios as $usuarioActual) {
                            }
                            ?>
                            <tr>
                                <th scope="row"><?php echo $usuarioActual->getIdusuario() ?></th>
                                <td><?php echo $usuarioActual->getNombre() ?></td>
                                <td><?php echo $usuarioActual->getApellido() ?></td>
                                <td><?php echo $usuarioActual->getCorreo() ?></td>
                                <td><?php echo $usuarioActual->getRol()->getNombre() ?></td>
                                <td><?php echo $usuarioActual->getIdespecialidad() ?></td>
                                <td><?php echo $usuarioActual->getTelefono() ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>