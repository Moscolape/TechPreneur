let show = document.getElementById('menu');
let side = document.getElementById('sidebar');
let main = document.getElementById('maintain');

show.addEventListener('click', () => {
  document.getElementById('sidebar').style.marginRight = 0;
  document.getElementById('menu').style.display = 'none';
  document.getElementById('sidebar').style.boxShadow = '0 0 10px lightslategray';
})

let hide = document.getElementById('no2');

hide.addEventListener('click', () => {
  document.getElementById('sidebar').style.marginRight = '-70%';
  document.getElementById('menu').style.display = 'flex';
  document.getElementById('sidebar').style.boxShadow = 'none';
})

main.addEventListener('click', () => {
  document.getElementById('sidebar').style.marginRight = '-70%';
  document.getElementById('menu').style.display = 'flex';
  document.getElementById('sidebar').style.boxShadow = 'none';
})