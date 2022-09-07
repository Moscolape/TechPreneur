const bar = document.getElementById('bar');
const bars = document.getElementById('bars');


bar.addEventListener('click', () => {
    document.getElementById('sidebar').style.marginLeft = '-210px';
    document.getElementById('main').style.width = '100%';
    bar.style.display = 'none';
    bars.style.display = 'inline';
});

bars.addEventListener('click', () => {
    document.getElementById('sidebar').style.marginLeft = '0px';
    if (screen.width > 319 && screen.width < 577) {
        document.getElementById('main').style.width = '100%';
    } else {
        document.getElementById('main').style.width = '80%';
    }
    bars.style.display = 'none';
    bar.style.display = 'inline';
});
