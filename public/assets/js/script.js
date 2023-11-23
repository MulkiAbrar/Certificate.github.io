const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('nav ul');

menuToggle.addEventListener('click', function(){
    nav.classList.toggle('slide');
});


const scrollButton = document.getElementById("scrollButton");

scrollButton.addEventListener("click", function() {
  window.scrollBy({
    top: window.innerHeight, // Ganti nilai ini sesuai dengan seberapa jauh Anda ingin menggulir
    behavior: "smooth", // Ini akan memberikan efek pengguliran yang halus
  });
});

// Tampilkan tombol ketika halaman digulir
window.addEventListener("scroll", function() {
  if (window.scrollY > 100) {
    scrollButton.style.display = "block";
  } else {
    scrollButton.style.display = "none";
  }
});
