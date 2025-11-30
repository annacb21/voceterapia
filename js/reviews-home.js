(function () {
  const deck = document.getElementById('CardDeck');
  if (!deck) {
    return;
  }

  const wantedAuthors = ['Andrea Rizzi', 'Marianna Castiglioni', 'Ivan'];

  getReviews()
    .then((reviews) => {
      const filtered = reviews
        .filter((review) => wantedAuthors.includes(review.autore))
        .sort(orderByDateDesc)
        .map(mapToCardData);

      deck.innerHTML = '';
      filtered.forEach((review) => {
        deck.appendChild(createReviewCard(review));
      });
    })
    .catch((error) => console.error('Errore nel caricamento delle recensioni', error));

  function getReviews() {
    if (Array.isArray(window.REVIEWS_DATA)) {
      return Promise.resolve(window.REVIEWS_DATA);
    }
    return fetch('data/reviews.json').then((response) => response.json());
  }

  function orderByDateDesc(a, b) {
    return parseDate(b.dataCreazione) - parseDate(a.dataCreazione);
  }

  function mapToCardData(review) {
    return {
      autore: review.autore,
      titolo: review.titolo,
      testo: review.testo,
      punteggio: Number(review.punteggio) || 0,
      data: formatDate(parseDate(review.dataCreazione))
    };
  }

  function createReviewCard(review) {
    const col = document.createElement('div');
    col.className = 'col-xxl-4 col-xl-6 col-lg-6';

    col.innerHTML = `
      <div class="card review-card mx-2 my-3">
                <div class="card-body">
                    <div class="row pb-3 align-items-center">
                        <div class="col-lg-2 col-md-1">
                            <img src="images/user-circle.svg" alt="">
                        </div>
                        <div class="col-lg-10 col-md-11">
                            <p class="card-subtitle text-muted">${review.autore}</p>
                        </div>
                    </div>
                    <p class="card-title pb-2">${review.titolo}</p>
                    <p class="card-text">${review.testo}</p>
                    <p class="text-muted">${review.data}</p>
                    ${renderStars(review.punteggio)}
                </div>
            </div>`;

    return col;
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
})();
