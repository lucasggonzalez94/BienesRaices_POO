document.addEventListener('DOMContentLoaded', () => {
    eventListeners()

    limpiarFormulario()

    darkMode()
})

function limpiarFormulario() {
    const formulario = document.querySelector('.formulario')

    if (formulario) {
        formulario.reset()
    }
}

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)')

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode')
    }else {
        document.body.classList.remove('dark-mode')
    }

    prefiereDarkMode.addEventListener('change', () => {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode')
        }else {
            document.body.classList.remove('dark-mode')
        }
    })

    const btnDarkMode = document.querySelector('.dark-mode-btn')
    btnDarkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode')
    })
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu')
    mobileMenu.addEventListener('click', navegacionResponsive)
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion')
    
    navegacion.classList.toggle('mostrar')
}