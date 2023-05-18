const homeSection = document.querySelector('#Home');
const sectionAnimationClass = 'section p';

window.addEventListener('scroll', () => {
  const distanceToHome = homeSection.getBoundingClientRect().top;

  if (distanceToHome <= window.innerHeight / 2) {
    homeSection.classList.add(sectionAnimationClass);
  } else {
    homeSection.classList.remove(sectionAnimationClass);
  }
});

const aboutBox = document.querySelector('.aboutBox');

window.addEventListener('scroll', () => {
  const distanceToAbout = document.querySelector('#About').getBoundingClientRect().top;

  if (distanceToAbout <= window.innerHeight / 2) {
    aboutBox.classList.add('transitionIn');
  } else {
    aboutBox.classList.remove('transitionIn');
  }
});

const newsItems = document.querySelectorAll('.news-item, .news-item2');

window.addEventListener('scroll', () => {
  const distanceToAbout = document.querySelector('#News').getBoundingClientRect().top;

  if (distanceToAbout <= window.innerHeight / 2) {
    newsItems.forEach(item => item.classList.add('transitionIn'));
  } else {
    newsItems.forEach(item => item.classList.remove('transitionIn'));
  }
});

