<?php 

require_once 'conexion.php';

$select = "SELECT * FROM tareas;";

// 2- Preparación
$preparacion = $conn -> prepare($select);

// 3- Ejecución
$preparacion -> execute();

// 4- Obtención de valores seleccionados y transformacion en un array asociativo
$arrayFilas = $preparacion -> fetchAll();

$conn = null;




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/gestor.css">
</head>
<body>
<main>
    <section class="formu">
        <?php if ($_GET) : ?>

            <h2>Modificar la tarea</h2>
            <form action="update.php" method="post">
                <fieldset>

                    <input type="text" name="id" id="id" value="<?=$_GET['id']?>" hidden>
                    <div>
                        <label for="titulo">Titulo:</label>
                        <input type="text" name="titulo" id="titulo" value="<?=$_GET['titulo']?>">
                    </div>
                    <div>
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" name="descripcion" id="descripcion" value="<?=$_GET['descripcion']?>">
                    </div>
                    <div>
                        <label for="estado">Estado de la tarea:</label>
                        <select name="estado" id="estado" value="<?=$_GET['estado']?>">
                        <option value="urgente" style="color: coral; font-weight: 900;">urgente</option>
                        <option value="pendiente" style="color: blue; font-weight: 900;">pendiente</option>   
                        <option value="ejecucion" style="color: green; font-weight: 900;">en ejecucion</option>
                        <option value="finalizada" style="color: gray; font-weight: 900;">finalizada</option>
                        </select>
                    </div>
                    <div class="botoncitos">
                        <button type="submit" class="enviar">ENVIAR</button>
                        <button type="reset" class="reset">RESET</button>
                    </div>

                </fieldset>
            </form>

        <?php else : ?>

                <h2>Crea una tarea</h2>
            <form action="insert.php" method="post">
                <fieldset>
                    <div>
                    <label for="titulo">Titulo:</label>
                    <input type="text" name="titulo" id="titulo">
                    </div>
                    <div>
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" name="descripcion" id="descripcion">
                    </div>
                    <div>
                        <label for="estado">Estado de la tarea:</label>
                        <select name="estado" id="estado">
                        <option value="urgente" style="color: coral;">urgente</option>
                        <option value="pendiente" style="color: blue;">pendiente</option>   
                        <option value="ejecucion" style="color: green;">en ejecucion</option>
                        <option value="finalizada" style="color: gray;">finalizada</option>
                        </select>
                    </div>
                    <div class="botoncitos">
                        <button type="submit" class="enviar">ENVIAR</button>
                        <button type="reset" class="reset">RESET</button>
                    </div>

                </fieldset>
            </form>

        <?php  endif; ?>
    </section>
    <section class="estadosTareas">
        <div>
            <h3>Urgentes</h3>
            <?php foreach ($arrayFilas as $fila): ?>
                <?php if ($fila['estado'] === 'urgente'): ?>
                    <div class="tarea urgente">
                        <p class="titulo"><?= $fila['titulo'] ?></p>
                        <p class="descripcion"><?= $fila['descripcion'] ?></p>
                        <p class="fecha"><?= $fila['fecha'] ?></p>
                        <span>
                            <a href="delete.php?id=<?=$fila['idTarea']?>">
                            <i class="fa-solid fa-trash" ></i>
                            </a>
                            <a href="index.php?id=<?=$fila['idTarea']?>&titulo=<?= str_replace(" ", "%20", $fila['titulo'])?>&descripcion=<?= str_replace(" ", "%20", $fila['descripcion'])?>&estado=<?=$fila['estado']?>">
                            <i class="fa-solid fa-pen" ></i>
                            </a>
                        </span>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div>
            <h3>Pendientes</h3>
            <?php foreach ($arrayFilas as $fila): ?>
                <?php if ($fila['estado'] === 'pendiente'): ?>
                    <div class="tarea pendiente">
                        <p class="titulo"><?= $fila['titulo'] ?></p>
                        <p class="descripcion"><?= $fila['descripcion'] ?></p>
                        <p class="fecha"><?= $fila['fecha'] ?></p>
                        <span>
                            <a href="delete.php?id=<?=$fila['idTarea']?>">
                            <i class="fa-solid fa-trash" ></i>
                            </a>
                            <a href="index.php?id=<?=$fila['idTarea']?>&titulo=<?= str_replace(" ", "%20", $fila['titulo'])?>&descripcion=<?= str_replace(" ", "%20", $fila['descripcion'])?>&estado=<?=$fila['estado']?>">
                            <i class="fa-solid fa-pen" ></i>
                            </a>
                        </span>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div>
            <h3>En ejecución</h3>
            <?php foreach ($arrayFilas as $fila): ?>
                <?php if ($fila['estado'] === 'ejecucion'): ?>
                    <div class="tarea ejecucion">
                        <p class="titulo"><?= $fila['titulo'] ?></p>
                        <p class="descripcion"><?= $fila['descripcion'] ?></p>
                        <p class="fecha"><?= $fila['fecha'] ?></p>
                        <span>
                            <a href="delete.php?id=<?=$fila['idTarea']?>">
                            <i class="fa-solid fa-trash" ></i>
                            </a>
                            <a href="index.php?id=<?=$fila['idTarea']?>&titulo=<?= str_replace(" ", "%20", $fila['titulo'])?>&descripcion=<?= str_replace(" ", "%20", $fila['descripcion'])?>&estado=<?=$fila['estado']?>">
                            <i class="fa-solid fa-pen" ></i>
                            </a>
                        </span>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div>
            <h3>Finalizadas</h3>
            <?php foreach ($arrayFilas as $fila): ?>
                <?php if ($fila['estado'] === 'finalizada'): ?>
                    <div class="tarea finalizada">
                        <p class="titulo"><?= $fila['titulo'] ?></p>
                        <p class="descripcion"><?= $fila['descripcion'] ?></p>
                        <p class="fecha"><?= $fila['fecha'] ?></p>
                        <span>
                            <a href="delete.php?id=<?=$fila['idTarea']?>">
                            <i class="fa-solid fa-trash" ></i>
                            </a>
                            <a href="index.php?id=<?=$fila['idTarea']?>&titulo=<?= str_replace(" ", "%20", $fila['titulo'])?>&descripcion=<?= str_replace(" ", "%20", $fila['descripcion'])?>&estado=<?=$fila['estado']?>">
                            <i class="fa-solid fa-pen" ></i>
                            </a>
                        </span>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

</main>
</body>
</html>