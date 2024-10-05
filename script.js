
const hamburer = document.querySelector(".hamburger");
const navList = document.querySelector(".nav-list");
// Popup
const popup = document.querySelector(".popup");
const closePopup = document.querySelector(".popup-close");

if (popup) {
  closePopup.addEventListener("click", () => {
    popup.classList.add("hide-popup");
  });

  window.addEventListener("load", () => {
    setTimeout(() => {
      popup.classList.remove("hide-popup");
    }, 1000);
  });
}

// Hamburger Open close
// const bar = document.getElementById('bar');
// const close = document.getElementById('close');
// const nav = document.getElementById('navbar');

// if (bar) {
//     bar.addEventListener('click', () => {
//       nav.classList.add('active');
//     })
// }

// if (close) {
//   close.addEventListener('click', () =>{
//     nav.classList.remove('active');
//   })
// }

// dropdown

document.addEventListener("click", e => {
  const isDropdownButton = e.target.matches("[data-dropdown-button]")
  if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return

  let currentDropdown
  if (isDropdownButton) {
    currentDropdown = e.target.closest("[data-dropdown]")
    currentDropdown.classList.toggle("active")
  }

  document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
    if (dropdown === currentDropdown) return
    dropdown.classList.remove("active")
  })
})

// searchbar


// let searchbar = document.querySelector('#search-bar');
// let searchbox = document.querySelector('.search-box');

// searchbar.onclick = () =>{
//     searchbox.classList.toggle('active')
// }

// darkmode

const options = {
  bottom: '53px', // default: '32px'
  right: '15px', // default: '32px'
  left: 'unset', // default: 'unset'
  time: '0.3s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#fff',  // default: '#fff'
  buttonColorDark: '#100f2c',  // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: true, // default: true,
  label: '🌓', // default: ''
  autoMatchOsTheme: true // default: true
}

const darkmode = new Darkmode(options);
darkmode.showWidget();