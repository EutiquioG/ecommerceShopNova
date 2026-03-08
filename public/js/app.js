function openLogin() {
    document.getElementById("loginModal").style.display = "flex";
}

function closeLogin() {
    document.getElementById("loginModal").style.display = "none";
}

function openRegister() {
    document.getElementById("registerModal").style.display = "flex";
}

function closeRegister() {
    document.getElementById("registerModal").style.display = "none";
}

/* cerrar modal haciendo click afuera */

window.onclick = function (event) {

    let login = document.getElementById("loginModal");
    let register = document.getElementById("registerModal");

    if (event.target == login) {
        login.style.display = "none";
    }

    if (event.target == register) {
        register.style.display = "none";
    }
}
function openCart() {
    document.getElementById("cartModal").style.display = "flex";
}

function closeCart() {
    document.getElementById("cartModal").style.display = "none";
}