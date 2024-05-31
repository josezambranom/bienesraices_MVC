<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php 
        if ($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>
    
    <form class="formulario" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" placeholder="Tu nombre" name="contacto[nombre]" required>
            
            <label for="msg">Mensaje</label>
            <textarea id="msg" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o compra</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input name="contacto[precio]" type="number" id="presupuesto" placeholder="Tu precio o presupuesto" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>¿Cómo desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" id="contactar-telefono" value="telefono" name="contacto[contacto]"
                required>

                <label for="contactar-email">E-mail</label>
                <input type="radio" id="contactar-email" value="email" name="contacto[contacto]"
                require>
            </div>

            <div id="contacto"></div>

            
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>

</main>