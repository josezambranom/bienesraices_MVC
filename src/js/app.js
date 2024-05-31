document.addEventListener('DOMContentLoaded', function(){

    eventListener();
    darkMode();
});

function darkMode(){
    const prefiereDarMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarMode.matches);

    if (prefiereDarMode.matches){
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarMode.addEventListener('change', function(){
        if (prefiereDarMode.matches){
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode')
    });
}

function eventListener(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    // Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodos));
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    // if(navegacion.classList.contains('mostrar')){
    //     navegacion.classList.remove('mostrar');
    // } else {
    //     navegacion.classList.add('mostrar')
    // } con togle se hace lo mismo

    navegacion.classList.toggle('mostrar');
}

function mostrarMetodos (e) {
    const contactoDIv = document.querySelector('#contacto');
    if(e.target.value === 'telefono') {
        contactoDIv.innerHTML = `
            <label for="telefono">Número de Teléfono</label>
            <input id="telefono" type="tel" placeholder="Tu teléfono" name="contacto[telefono]">
            
            <p>Elija la fecha y hora para la llamada</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        contactoDIv.innerHTML = ` 
            <label for="email">E-mail</label>
            <input id="email" type="email" placeholder="Tu email" name="contacto[email]">`;
    }
}