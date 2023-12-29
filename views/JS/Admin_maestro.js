const li1 = document.querySelector('.liInteractive');
const li3 = document.querySelector('.liInteractive3');

li1.addEventListener('mouseover', function() {
    li1.classList.add('paintInteractive');
    li2.classList.remove('paintInteractive');
    li3.classList.remove('paintInteractive');
})

li3.addEventListener('mouseover', function() {
    li1.classList.remove('paintInteractive');
    li2.classList.remove('paintInteractive');
    li3.classList.add('paintInteractive');
})

const interactiveName = document.querySelector('.user-info');
const interactive = document.querySelector('.opcion');
const desplegarMenu = document.querySelector('.interactiveMenu');

interactiveName.addEventListener('click', function() {
    desplegarMenu.classList.toggle('desplegar');
})

function mostrarFormulario() {
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'flex';
}
function mostrarEditor() {
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'flex';
}

function cerrarFormulario() {
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'none';
}