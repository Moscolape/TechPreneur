let check = document.getElementById('hide');
let checked = document.getElementById('see');
let password = document.getElementById('passInput');

check.addEventListener('click', () => {

    if (password.value !== "") {
        document.getElementById('see').style.display = 'block';
        document.getElementById('hide').style.display = 'none';
    
        password.type = 'text';
    }
})

checked.addEventListener('click', () => {
        document.getElementById('hide').style.display = 'block';
        document.getElementById('see').style.display = 'none';

        password.type = 'password';
})