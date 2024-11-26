document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const showLogin = document.getElementById('showLogin');
    const showRegister = document.getElementById('showRegister');

    // Hiển thị form đăng nhập
    showLogin.addEventListener('click', (e) => {
        e.preventDefault();
        loginForm.classList.remove('d-none');
        registerForm.classList.add('d-none');
    });

    // Hiển thị form đăng ký
    showRegister.addEventListener('click', (e) => {
        e.preventDefault();
        registerForm.classList.remove('d-none');
        loginForm.classList.add('d-none');
    });
    console.log("JavaScript Loaded");

});
console.log("JavaScript Loaded");

