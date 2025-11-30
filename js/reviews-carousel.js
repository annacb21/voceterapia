(function () {
  let resizeListenerAttached = false;
  let resizeTimeout;
  const slidesContainer = document.querySelector('.glide__slides');
  const bulletsContainer = document.querySelector('.glide__bullets');
  if (!slidesContainer || !bulletsContainer) {
    return;
  }

  getReviews()
    .then((reviews) => reviews.sort(orderByDateDesc))
    .then((sorted) => {
      slidesContainer.innerHTML = '';
      bulletsContainer.innerHTML = '';

      sorted.forEach((review, index) => {
        slidesContainer.appendChild(createSlide(review));
        bulletsContainer.appendChild(createBullet(index));
      });

      initCarousel();
      normalizeCardHeights();
    })
    .catch((error) => console.error('Errore nel caricamento delle recensioni', error));

  function orderByDateDesc(a, b) {
    return parseDate(b.dataCreazione) - parseDate(a.dataCreazione);
  }

  function createSlide(review) {
    const li = document.createElement('li');
    li.innerHTML = `
      <div class="card review-card mx-2">
                <div class="card-body">
                    <div class="row pb-3 align-items-center">
                        <div class="col-lg-2 col-md-1">
                            <img src="images/user-circle.svg" alt="">
                        </div>
                        <div class="col-lg-10 col-md-11">
                            <p class="card-subtitle text-muted">${review.autore}</p>
                        </div>
                    </div>
                    <p class="card-title">${review.titolo}</p>
                    <p class="card-text">${review.testo}</p>
                    <p class="text-muted">${formatDate(parseDate(review.dataCreazione))}</p>
                    ${renderStars(Number(review.punteggio) || 0)}
                </div>
            </div>`;
    return li;
  }

  function createBullet(index) {
    const button = document.createElement('button');
    button.className = 'glide__bullet';
    button.setAttribute('data-glide-dir', `=${index}`);
    return button;
  }

  function renderStars(score) {
    const stars = Array.from({ length: 5 }, (_, index) => {
      if (index < score) {
        return '<div class="d-inline"><i class="fas fa-star"></i></div>';
      }
      return '<div class="d-inline"><i class="far fa-star"></i></div>';
    });
    return `<div class="text-center">${stars.join('')}</div>`;
  }

  function parseDate(dateString) {
    const [day, month, year] = dateString.split('/').map(Number);
    return new Date(year, month - 1, day);
  }

  function formatDate(date) {
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = String(date.getFullYear()).slice(-2);
    return `${day}/${month}/${year}`;
  }

  function initCarousel() {
    if (typeof Glide === 'undefined') {
      console.warn('Glide.js non è disponibile');
      return;
    }
    const glideInstance = new Glide('.glide', {
      type: 'slider',
      startAt: 0,
      perView: 3,
      focusAt: 0,
      animationDuration: 1000,
      gap: 10,
      breakpoints: {
        1200: { perView: 2 },
        992: { perView: 1 }
      }
    });

    glideInstance.on('run.after', normalizeCardHeights);
    glideInstance.mount();
    enableWheelNavigation(glideInstance);
    attachResizeListener();
  }

  function getReviews() {
    if (Array.isArray(window.REVIEWS_DATA)) {
      return Promise.resolve(window.REVIEWS_DATA);
    }
    return fetch('data/reviews.json').then((response) => response.json());
  }

  function normalizeCardHeights() {
    const cards = document.querySelectorAll('.glide .review-card');
    if (!cards.length) {
      return;
    }
    let maxHeight = 0;
    cards.forEach((card) => {
      card.style.height = 'auto';
      maxHeight = Math.max(maxHeight, card.offsetHeight);
    });
    cards.forEach((card) => {
      card.style.height = `${maxHeight}px`;
    });
  }

  function handleResize() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(normalizeCardHeights, 150);
  }

  function attachResizeListener() {
    if (resizeListenerAttached) {
      return;
    }
    window.addEventListener('resize', handleResize);
    resizeListenerAttached = true;
  }

  function enableWheelNavigation(glideInstance) {
    const glideElement = document.querySelector('.glide');
    if (!glideElement) {
      return;
    }
    glideElement.addEventListener('wheel', (event) => {
      event.preventDefault();
      if (event.deltaY > 0) {
        glideInstance.go('>');
      } else if (event.deltaY < 0) {
        glideInstance.go('<');
      }
    }, { passive: false });
  }
})();
