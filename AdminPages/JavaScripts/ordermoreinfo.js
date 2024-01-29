const button1 = document.getElementById('button1');

const popup1 = document.getElementById('popup1');

const close1 = document.querySelector('#popup1 .close-button');

const overlay = document.getElementById('overlay');



button1.addEventListener('click', () => {
  popup1.style.display = 'block';
  overlay.style.display = 'block';
});


close1.addEventListener('click', () => {
  popup1.style.display = 'none';
  overlay.style.display = 'none'; 
});


