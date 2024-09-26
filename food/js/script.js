const navbar = document.querySelector('.header .flex .navbar');
const profile = document.querySelector('.header .flex .profile');

document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () => {
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () => {
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

function loader() {
   const loaderElement = document.querySelector('.loader');
   if (loaderElement) {
      loaderElement.style.display = 'none';
   }
}


function fadeOut() {
   setInterval(loader, 2000);
}

window.onload = fadeOut;

document.querySelectorAll('input[type="number"]').forEach(numberInput => {
   numberInput.oninput = () => {
      if (numberInput.value.length > numberInput.maxLength) 
         numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
   };
});
