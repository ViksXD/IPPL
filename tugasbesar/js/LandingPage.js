
  const slider = document.getElementById("slider");
  const next = document.getElementById("next");
  const prev = document.getElementById("prev");
  const menuToggle = document.getElementById('menuToggle');
  const menuIcon = document.getElementById('menuIcon');
  const mobileMenu = document.getElementById('mobileMenu');

  let index = 0; // Current slide index
  const slideCount = slider.children.length;

  function updateSlider() {
    slider.style.transform = `translateX(-${index * 100}%)`;
  }

  next.addEventListener("click", () => {
    index = (index + 1) % slideCount; // Loop back to the first slide
    updateSlider();
  });

  prev.addEventListener("click", () => {
    index = (index - 1 + slideCount) % slideCount; // Loop to the last slide
    updateSlider();
  });

  menuToggle.addEventListener('click', () => {
    const isHidden = mobileMenu.classList.contains('hidden');
    if (isHidden) {
      mobileMenu.classList.remove('hidden');
      menuIcon.textContent = '✖'; // Change to close icon
    } else {
      mobileMenu.classList.add('hidden');
      menuIcon.textContent = '☰'; // Change back to menu icon
    }
  });

