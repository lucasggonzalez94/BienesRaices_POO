<?php
    require "includes/app.php";
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="imagen contacto" loading="lazy">
        </picture>

        <h2>Llene el Formulario de Contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Tu Email">

                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Tu Telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" name="presupuesto" id="presupuesto" placeholder="Tu Precio o Presupuesto">
            </fieldset>

            <fieldset>
                <legend>Información de Contacto</legend>

                <p>Como desea ser contactado?</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" id="contactar-email" value="email">
                </div>

                <p>Si eligió teléfono, indique la hora para ser contactado.</p>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" min="09:00" max="21:00">
            </fieldset>

            <input type="submit" value="Enviar" class="btn-verde">
        </form>
    </main>

<?php incluirTemplate('footer'); ?>