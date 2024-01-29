const button1_1 = document.getElementById('button1_1');
const button1_2 = document.getElementById('button1_2');
const button1_3 = document.getElementById('button1_3');

const popup1_1 = document.getElementById('popup1_1');
const popup1_2 = document.getElementById('popup1_2');
const popup1_3 = document.getElementById('popup1_3');

const close1_1 = document.querySelector('#popup1_1 .close-button');
const close1_2 = document.querySelector('#popup1_2 .close-button');
const close1_3 = document.querySelector('#popup1_3 .close-button');

const overlay = document.getElementById('overlay');



button1_1.addEventListener('click', () => {
  popup1_1.style.display = 'block';
  overlay.style.display = 'block';
});

button1_2.addEventListener('click', () => {
  popup1_2.style.display = 'block';
  overlay.style.display = 'block';
});

button1_3.addEventListener('click', () => {
  popup1_3.style.display = 'block';
  overlay.style.display = 'block';
});



close1_1.addEventListener('click', () => {
  popup1_1.style.display = 'none';
  overlay.style.display = 'none'; 
});

close1_2.addEventListener('click', () => {
  popup1_2.style.display = 'none';
  overlay.style.display = 'none'; 
});

close1_3.addEventListener('click', () => {
  popup1_3.style.display = 'none';
  overlay.style.display = 'none'; 
});