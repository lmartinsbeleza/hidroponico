/*Exibi o card de notificação para o caso de erro*/
function set_error_message(message) {
    $("#toast-body")[0].innerHTML = message
    const toast = document.getElementById('toast_error')
    if(toast){
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
        toastBootstrap.show()
    }
}