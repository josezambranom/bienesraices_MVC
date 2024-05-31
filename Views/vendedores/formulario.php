<fieldset>
    <legend>Información Vendedor</legend>

    <label for="nombre">Nombre</label>
    <input type="text" name="vendedores[nombre]" id="nombre" placeholder="Nombre del vendedor" 
        value = "<?php echo s($vendedores->nombre) ?>" maxlength="45">

    <label for="apellido">Apellido</label>
    <input type="text" name="vendedores[apellido]" id="apellido" placeholder="Apellido del vendedor"
        value = "<?php echo s($vendedores->apellido) ?>" maxlength="45">
    
    <label for="telefono">Teléfono</label>
    <input type="text" name="vendedores[telefono]" id="telefono" placeholder="Teléfono del vendedor (10 dígitos)"
        value = "<?php echo s($vendedores->telefono) ?>" maxlength="10">
        
</fieldset>