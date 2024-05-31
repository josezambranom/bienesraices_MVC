<main class="contenedor seccion contenido">

<h1><?php echo $propiedad->titulo ?></h1>

<img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen ?>" alt="imagen de la propiedad">

<div class="resumen-propiedad">
    <p class="precio">$ <?php echo $propiedad->precio ?></p>
    <ul class="iconos-caracteristicas">
        <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono_wc">
            <p><?php echo $propiedad->wc ?></p>
        </li>

        <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
            <p><?php echo $propiedad->estacionamiento ?></p>
        </li>

        <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
            <p><?php echo $propiedad->habitacion ?></p>
        </li>
    </ul><!-- .iconos-caracteristicas -->

    <p>
        <?php echo $propiedad->descripcion ?>
    </p>

</div>
</main>
