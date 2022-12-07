const hamburger = document.querySelector('.hamburger');
const navLink = document.querySelector('.nav__link');

hamburger.addEventListener('click', () => {
  navLink.classList.toggle('hide');
});

// CAROUSEL
// const track = document.querySelector('.carousel__track');
// const slides = Array.from(track.children);
// // console.log(slides)
// const dotsNav = document.querySelector('.carousel__nav');
// const dots = Array.from(dotsNav.children);

// const slideWidth = slides[0].getBoundingClientRect().width;

// const setSlidePosition = (slide, index) => { 
//   slide.style.left = slideWidth * index + 'px';

//   // console.log(index);
//   // console.log(slideWidth);
//   // console.log(slide.style.left );
// }
// slides.forEach(setSlidePosition);
// console.log(slides);

// const moveToSlide = (track, currentSlide, targetSlide) => {
//   track.style.trasform = 'translateX(-' + targetSlide.style.left + ')';
//   console.log('la transformation', track.style.trasform);
//   currentSlide.classList.remove('current-slide');
//   targetSlide.classList.add('current-slide');
// }

// const updateDots = (currentDot, targetDot) => {
//   currentDot.classList.remove('current-slide');
//   targetDot.classList.add('current-slide');
// }

// dotsNav.addEventListener('click', e => {
//   const targetDot = e.target.closest('button');

//   if (!targetDot) return;

//   const currentSlide = track.querySelector('.current-slide');
//   const currentDot = dotsNav.querySelector('.current-slide');
//   const targetIndex = dots.findIndex(dot => dot === targetDot);
//   const targetSlide = slides[targetIndex];

//   moveToSlide(track, currentSlide, targetSlide);
//   updateDots(currentDot, targetDot);
 
// })













 
