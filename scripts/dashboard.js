let open = document.getElementById('open');
let close = document.getElementById('close');
let sidenav = document.getElementById('menu');
let section = document.getElementById('content');
let notice = document.getElementById("myForm");

open.addEventListener('click', () => {
    if (sidenav.style.width = '0') {
        sidenav.style.width = '250px';
        section.style.marginLeft = '250px'; 
        close.style.display = 'inline';
        open.style.display = 'none';
        document.getElementById('header').style.width = 'calc(100% - 290px)';
        document.getElementById('main').style.width = 'calc(100% - 290px)';
    } 
})

close.addEventListener('click', () => {
    if (sidenav.style.width = '250px') {
        sidenav.style.width = '0';
        section.style.marginLeft = '0'; 
        close.style.display = 'none';
        open.style.display = 'inline';
        document.getElementById('header').style.width = '95%';
        document.getElementById('main').style.width = '95%';
    } 
})

function closeNotice() {
    notice.style.display = "none";
}

function openNotice() {
    notice.style.display = "block";

}