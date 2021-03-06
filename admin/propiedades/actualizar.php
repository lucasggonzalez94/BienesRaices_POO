<?php
    require "../../includes/funciones.php";
    $auth = estaAutenticado();

    if (!$auth) {
        header('location: /');
    }

    // echo '<pre>';
    // var_dump($_GET);
    // echo '</pre>';

    // Validar que en la url exista un id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }

    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Obtener los datos de la propiedad seleccionada
    $consulta = "SELECT * FROM propiedades WHERE id='$id'";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $imagen = $propiedad['imagen'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];

    // Ejecutar el codigo despues de que el usuario envia el formulario

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        // exit;

        // echo '<pre>';
        // var_dump($_FILES);
        // echo '</pre>';

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = mysqli_real_escape_string($db, date('Y/m/d'));

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if (!$titulo) {
            $errores[] = 'Debes a??adir un titulo';
        }

        if (!$precio) {
            $errores[] = 'El precio es obligatorio';
        }

        if (!$descripcion || strlen($descripcion) < 40) {
            $errores[] = 'La descripci??n es obligatoria y debe tener al menos 40 caracteres';
        }

        if (!$habitaciones) {
            $errores[] = 'El n??mero de habitaciones es obligatorio';
        }

        if (!$wc) {
            $errores[] = 'El n??mero de ba??os es obligatorio';
        }

        if (!$estacionamiento) {
            $errores[] = 'El n??mero de lugares de estacionamiento es obligatorio';
        }

        if (!$vendedorId) {
            $errores[] = 'Elige un vendedor';
        }

        // Validar imagen por peso
        $medida = 1000 * 4000;

        if ($imagen['size'] > $medida) {
            $errores[] = 'La im??gen es muy pesada';
        }

        // echo '<pre>';
        // var_dump($errores);
        // echo '</pre>';

        // Revisar que el arreglo de errores este vacio
        if (empty($errores)) {

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            // Subida de archivos
            if ($imagen['name']) {
                // Eliminar imagen previa en el caso de que haya una nueva imagen
                unlink($carpetaImagenes . $propiedad['imagen']);

                // Generar un nombre unico
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

                // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else {
                $nombreImagen = $propiedad['imagen'];
            }

            // Insertar en la Base de datos
            $query = "UPDATE propiedades SET titulo='${titulo}', precio=${precio}, imagen = '${nombreImagen}', descripcion='$descripcion', habitaciones=${habitaciones}, wc=${wc}, estacionamiento=${estacionamiento}, vendedorId=${vendedorId} WHERE id=${id}";
            
            // var_dump($query);

            // exit;

            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                // Redireccionar al usuario
                header('Location: /admin?resultado=2');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="btn btn-verde">Volver</a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <!-- Quito el action para que se envien los datos al mismo archivo sin cambiar la url -->
        <form method="POST" class="formulario" enctype="multipart/form-data">
            <fieldset>
                <legend>Informaci??n General</legend>

                <label for="titulo">T??tulo:</label>
                <input type="text" name="titulo" id="titulo" placeholder="T??tulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Im??gen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

                <img src="/imagenes/<?php echo $imagen ?>" alt="imagen propiedad" class="imagen-small">

                <label for="descripcion">Descripci??n:</label>
                <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informaci??n Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Ba??os:</label>
                <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <!-- <label for="si">Si</label>
                <input type="radio" name="estacionamiento" id="si" value="si">
                <label for="no">No</label>
                <input type="radio" name="estacionamiento" id="no" value="no"> -->
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="vendedor">
                    <option value="" disabled selected>-- Seleccionar --</option>
                    <?php while ($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id'] ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="btn btn-verde">
        </form>
    </main>

<?php incluirTemplate('footer'); ?>