let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(slideIndex) {
    slides.forEach((slide, index) => {
        if (index === slideIndex) {
            slide.style.transform = 'translateX(0)';
        } else {
            slide.style.transform = 'translateX(100%)';
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function previousSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

// Afficher la première diapositive
showSlide(currentSlide);

// Ajouter des événements pour les boutons suivant et précédent
document.querySelector('.next-btn').addEventListener('click', nextSlide);
document.querySelector('.prev-btn').addEventListener('click', previousSlide);
