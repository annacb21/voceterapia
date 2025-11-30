(function () {
  const targets = document.querySelectorAll('[data-partial]');
  if (!targets.length) {
    return;
  }

  targets.forEach((target) => {
    const name = target.getAttribute('data-partial');
    fetch(`partials/${name}.html`)
      .then((response) => {
        if (!response.ok) {
          throw new Error(`Impossibile caricare il partial ${name}`);
        }
        return response.text();
      })
      .then((html) => {
        target.innerHTML = html;
        if (name === 'navbar') {
          evidenziaLinkAttivo(target);
        }
      })
      .catch((error) => {
        console.error(error);
      });
  });

  function evidenziaLinkAttivo(navContainer) {
    const pageFromBody = document.body.dataset.page;
    const currentPage = pageFromBody || determinaPaginaDaPath();
    navContainer.querySelectorAll('[data-page]').forEach((link) => {
      if (link.dataset.page === currentPage) {
        link.classList.add('active');
        link.setAttribute('aria-current', 'page');
      }
    });
  }

  function determinaPaginaDaPath() {
    const path = window.location.pathname.split('/').pop();
    if (!path || path === 'index.html') {
      return 'home';
    }
    return path.replace('.html', '');
  }
})();
