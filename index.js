document.addEventListener('DOMContentLoaded', function() {
    let searchform = document.querySelector('.search-form');
    let navbar = document.querySelector('.navbar');
    let slides = document.querySelectorAll('.home .slides-container .slide');
    let index = 0;

    document.querySelector('#search-btn').onclick = () =>{
        searchform.classList.toggle('active');
        navbar.classList.remove('active');
    }

    document.querySelector('#menu-btn').onclick = () =>{
        navbar.classList.toggle('active');
        searchform.classList.remove('active');
    }

    function nextSlide() {
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }

    function prevSlide() {
        slides[index].classList.remove('active');
        index = (index - 1 + slides.length) % slides.length;
        slides[index].classList.add('active');
    }

    document.getElementById('slide-next').addEventListener('click', nextSlide);
    document.getElementById('slide-prev').addEventListener('click', prevSlide);

    window.onscroll = () =>{
        searchform.classList.remove('active');
        navbar.classList.remove('active');

        if(window.scrollY > 30){
            document.querySelector('header').classList.add('header-active');
        }
        else{
            document.querySelector('header').classList.remove('header-active');
        }
    };

    var swiper = new Swiper(".featured-slider", {
        loop: true,
        centeredSlides: true,
        spaceBetween: 20,
        autoplay:{
            delay: 9500,
            disableOnInteraction:false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints:{
            0:{
                slidesPerView: 1,
            },
            450:{
                slidesPerView: 2,
            },
            768:{
                slidesPerView: 3,
            },
            1200:{
                slidesPerView: 4,
            },
        },
    });
    
    // Image slider functionality
    const imageSlides = document.querySelectorAll('.single-image');
    const totalImageSlides = imageSlides.length;
    let imageIndex = 0;

    function showImageSlide() {
        imageSlides.forEach(slide => {
            slide.style.display = 'none';
        });

        imageSlides[imageIndex].style.display = 'block';
    }

    function prevImageSlide() {
        imageIndex = (imageIndex - 1 + totalImageSlides) % totalImageSlides;
        showImageSlide();
    }

    function nextImageSlide() {
        imageIndex = (imageIndex + 1) % totalImageSlides;
        showImageSlide();
    }

    showImageSlide();
});
