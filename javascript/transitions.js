function animateBoxes() {
  const boxes = document.querySelectorAll('.box');
  const windowHeight = window.innerHeight;
  boxes.forEach(box => {
    const boxTop = box.getBoundingClientRect().top;
    if (boxTop < windowHeight) {
      box.classList.add('animate');
    }
  });
}
animateBoxes();
window.addEventListener('scroll', animateBoxes);
