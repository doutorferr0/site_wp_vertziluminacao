/**
 * vertz.js — Vertz Iluminação
 * JS modular próprio: header sticky, burger menu, FAQ accordion,
 * scroll animations (IntersectionObserver), site loader, Swiper gallery.
 * Sem dependências externas, exceto Swiper (MIT, via CDN).
 */

(function () {
  'use strict';

  /* ============================================================
     UTILITÁRIOS
     ============================================================ */

  /**
   * Busca elementos no DOM com suporte a múltiplos seletores.
   * @param {string} selector
   * @param {Document|Element} [scope=document]
   * @returns {Element[]}
   */
  function qsa(selector, scope) {
    return Array.from((scope || document).querySelectorAll(selector));
  }

  /**
   * Busca um único elemento.
   * @param {string} selector
   * @param {Document|Element} [scope=document]
   * @returns {Element|null}
   */
  function qs(selector, scope) {
    return (scope || document).querySelector(selector);
  }


  /* ============================================================
     SITE LOADER
     Esconde o overlay de carregamento após o DOM estar pronto.
     ============================================================ */
  function initLoader() {
    var loader = qs('[data-site-loader]');
    if (!loader) return;

    // Remove o loader após o carregamento completo
    function hideLoader() {
      loader.classList.add('is-hidden');
      // Remove do DOM após a transição
      loader.addEventListener('transitionend', function () {
        loader.remove();
      }, { once: true });
    }

    if (document.readyState === 'complete') {
      hideLoader();
    } else {
      window.addEventListener('load', hideLoader);
    }
  }


  /* ============================================================
     HEADER STICKY
     Adiciona classe .is-scrolled quando o usuário rola a página.
     ============================================================ */
  function initStickyHeader() {
    var header = qs('.site-header');
    if (!header) return;

    var lastScrollY   = window.scrollY;
    var ticking       = false;
    var TOP_THRESHOLD = 60;   // px — abaixo disso considera "no topo"
    var HIDE_DELAY    = 8;    // px mínimos de scroll para baixo antes de esconder

    function updateHeader() {
      var currentY = window.scrollY;
      var diff     = currentY - lastScrollY;

      // No topo da página
      if (currentY <= TOP_THRESHOLD) {
        header.classList.add('is-top');
        header.classList.remove('is-scrolled', 'is-hidden');
        header.classList.add('is-visible');

      // Scrollou para baixo além do threshold → esconde
      } else if (diff > HIDE_DELAY) {
        header.classList.remove('is-top', 'is-visible');
        header.classList.add('is-scrolled', 'is-hidden');

      // Scrollou para cima → aparece
      } else if (diff < -HIDE_DELAY) {
        header.classList.remove('is-top', 'is-hidden');
        header.classList.add('is-scrolled', 'is-visible');
      }

      lastScrollY = currentY <= 0 ? 0 : currentY;
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(updateHeader);
        ticking = true;
      }
    }, { passive: true });

    // Estado inicial
    updateHeader();
  }


  /* ============================================================
     BURGER MENU (mobile)
     Abre e fecha o menu de navegação mobile (#site-nav).
     ============================================================ */
  function initBurgerMenu() {
    var burger   = qs('.site-header__burger');
    var siteNav  = qs('#site-nav');
    var backdrop = qs('.site-nav__backdrop');

    if (!burger || !siteNav) return;

    function openNav() {
      siteNav.classList.add('is-open');
      siteNav.removeAttribute('aria-hidden');
      burger.classList.add('is-active');
      burger.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden'; // evita scroll do body
    }

    function closeNav() {
      siteNav.classList.remove('is-open');
      siteNav.setAttribute('aria-hidden', 'true');
      burger.classList.remove('is-active');
      burger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }

    burger.addEventListener('click', function () {
      var isOpen = burger.getAttribute('aria-expanded') === 'true';
      if (isOpen) {
        closeNav();
      } else {
        openNav();
      }
    });

    // Fecha ao clicar no backdrop
    if (backdrop) {
      backdrop.addEventListener('click', closeNav);
    }

    // Fecha ao pressionar Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeNav();
    });

    // Fecha ao redimensionar para desktop
    var mq = window.matchMedia('(min-width: 768px)');
    mq.addEventListener('change', function (e) {
      if (e.matches) closeNav();
    });
  }


  /* ============================================================
     FAQ ACCORDION
     Abre/fecha itens de acordo. Apenas um aberto por vez.
     ============================================================ */
  function initFaqAccordion() {
    var accordions = qsa('.pb-row-faqs__accordion');
    if (!accordions.length) return;

    accordions.forEach(function (accordion) {
      var btn     = qs('.pb-row-faqs__accordionBtn', accordion);
      var content = qs('.pb-row-faqs__accordionContent', accordion);
      if (!btn || !content) return;

      btn.addEventListener('click', function () {
        var isExpanded = btn.getAttribute('aria-expanded') === 'true';

        // Fecha todos os outros
        accordions.forEach(function (other) {
          if (other === accordion) return;
          var otherBtn     = qs('.pb-row-faqs__accordionBtn', other);
          var otherContent = qs('.pb-row-faqs__accordionContent', other);
          if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
          if (otherContent) otherContent.setAttribute('hidden', '');
        });

        // Alterna o atual
        if (isExpanded) {
          btn.setAttribute('aria-expanded', 'false');
          content.setAttribute('hidden', '');
        } else {
          btn.setAttribute('aria-expanded', 'true');
          content.removeAttribute('hidden');
        }
      });
    });
  }


  /* ============================================================
     SCROLL ANIMATIONS (IntersectionObserver)
     Adiciona .is-visible aos elementos com [data-scroll]
     quando entram no viewport.
     ============================================================ */
  function initScrollAnimations() {
    // Verifica suporte
    if (!('IntersectionObserver' in window)) {
      // Fallback: mostra tudo imediatamente
      qsa('[data-scroll]').forEach(function (el) {
        el.classList.add('is-visible');
      });
      return;
    }

    var observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -60px 0px'
    };

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          // Aplica delay incremental se definido via data-module-delay-increment
          var el        = entry.target;
          var siblings  = el.parentElement
            ? qsa('[data-scroll]', el.parentElement)
            : [];
          var idx       = siblings.indexOf(el);
          var increment = parseInt(el.getAttribute('data-module-delay-increment') || '0', 10);

          if (increment && idx >= 0) {
            el.style.transitionDelay = (idx * increment / 1000) + 's';
          }

          el.classList.add('is-visible');
          observer.unobserve(el); // anima só uma vez
        }
      });
    }, observerOptions);

    qsa('[data-scroll]').forEach(function (el) {
      // Não observa elementos dentro do hero (já visíveis)
      if (el.closest('.pb-row-hero') || el.closest('.site-header')) {
        el.classList.add('is-visible');
        return;
      }
      observer.observe(el);
    });
  }


  /* ============================================================
     HERO VIDEO — LAZY LOAD
     Carrega o vídeo do hero apenas quando o DOM está pronto,
     evitando que bloqueie o carregamento inicial da página.
     ============================================================ */
  function initHeroVideo() {
    var videoWrap = qs('.pb-row-hero__video');
    if (!videoWrap) return;

    // Se já contém um <video> com data-src, faz o lazy load
    var video = qs('video[data-src]', videoWrap);
    if (!video) return;

    function loadVideo() {
      var src = video.getAttribute('data-src');
      if (src) {
        video.src = src;
        video.removeAttribute('data-src');
        video.load();
        video.play().catch(function () {
          // Autoplay bloqueado pelo browser — sem ação necessária
        });
      }
    }

    if ('requestIdleCallback' in window) {
      window.requestIdleCallback(loadVideo);
    } else {
      window.addEventListener('load', loadVideo);
    }
  }


  /* ============================================================
     GALERIA SWIPER
     Inicializa o Swiper nas galerias de mídia.
     Swiper é carregado via CDN (MIT) no functions.php.
     ============================================================ */
  function initGallerySwiper() {
    // Aguarda o Swiper estar disponível (carregado via CDN)
    if (typeof Swiper === 'undefined') return;

    var galleryEls = qsa('.pb-row-medias-gallery__medias.swiper');
    if (!galleryEls.length) return;

    galleryEls.forEach(function (el) {
      var galleryWrap = el.closest('.pb-row-medias-gallery__clip');
      var tags        = galleryWrap
        ? qsa('.pb-row-medias-gallery__tag', galleryWrap)
        : [];
      var bullets     = galleryWrap
        ? qsa('.pb-row-medias-gallery__bullet', galleryWrap)
        : [];
      var counter     = galleryWrap
        ? qs('.pb-row-medias-gallery__counter', galleryWrap)
        : null;

      var totalSlides = qsa('.swiper-slide', el).length;

      var swiper = new Swiper(el, {
        loop: false,
        slidesPerView: 1,
        speed: 600,
        on: {
          slideChange: function () {
            var idx = swiper.activeIndex;

            // Atualiza bullets
            bullets.forEach(function (b, i) {
              b.classList.toggle('swiper-pagination-bullet-active', i === idx);
            });

            // Atualiza contador
            if (counter) {
              counter.textContent = (idx + 1) + '/' + totalSlides;
            }
          }
        }
      });

      // Navegação pelos tags filtrantes
      tags.forEach(function (tag, i) {
        tag.addEventListener('click', function () {
          swiper.slideTo(i);
          tags.forEach(function (t) { t.setAttribute('aria-current', 'false'); });
          tag.setAttribute('aria-current', 'true');
        });
      });

      // Navegação pelos bullets
      bullets.forEach(function (bullet, i) {
        bullet.addEventListener('click', function () {
          swiper.slideTo(i);
        });
      });
    });
  }


  /* ============================================================
     CARDS SLIDER (Otimizado)
     Inicializa Swiper para slider de cards - 15 cards.
     Cards menores e mais eficientes.
  ============================================================ */
  function initCardsSlider() {
    if (typeof Swiper === 'undefined') return;

    var cardsSliders = qsa('.pb-row-cards-slider__slider');
    if (!cardsSliders.length) return;

    cardsSliders.forEach(function (sliderEl) {
      // Garantir que o elemento tem a classe .swiper antes de inicializar
      if (!sliderEl.classList.contains('swiper')) {
        sliderEl.classList.add('swiper');
      }

      // Destruir instância anterior se existir
      if (sliderEl.swiper) {
        sliderEl.swiper.destroy(true, true);
      }

      new Swiper(sliderEl, {
        slidesPerView: 1.2,
        spaceBetween: 16,
        loop: true,
        speed: 600,
        grabCursor: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true
        },
        breakpoints: {
          768: {
            slidesPerView: 2.2,
            spaceBetween: 16
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 20
          },
          1280: {
            slidesPerView: 4,
            spaceBetween: 20
          }
        }
      });
    });
  }


  /* ============================================================
     TICKER DOS PARCEIROS
     Duplica os itens do ticker para criar loop contínuo via CSS.
     ============================================================ */
  function initPartnersTicker() {
    var ticker = qs('.pb-row-partners__ticker');
    if (!ticker) return;

    // Clona os filhos para criar efeito de loop contínuo
    var children = Array.from(ticker.children);
    children.forEach(function (child) {
      var clone = child.cloneNode(true);
      clone.setAttribute('aria-hidden', 'true');
      ticker.appendChild(clone);
    });
  }


  /* ============================================================
     INICIALIZAÇÃO
     ============================================================ */
  function init() {
    initLoader();
    initStickyHeader();
    initBurgerMenu();
    initFaqAccordion();
    initScrollAnimations();
    initHeroVideo();
    initPartnersTicker();
    initCookieBanner();
    initLeadCapture();
    initFab();

    // Swiper pode não estar disponível no DOMContentLoaded se carregado async
    if (typeof Swiper !== 'undefined') {
      initGallerySwiper();
      initCardsSlider();
    } else {
      // Tenta novamente após o carregamento completo
      window.addEventListener('load', function () {
        initGallerySwiper();
        initCardsSlider();
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();


  /* ============================================================
     COOKIE BANNER — LGPD
     Mostra banner se consentimento ainda não foi dado.
     Armazena escolha em localStorage por 365 dias.
     ============================================================ */
  function initCookieBanner() {
    var banner = qs('#site-cookies');
    if (!banner) return;

    var STORAGE_KEY = 'vertz_cookie_consent';
    var consent = localStorage.getItem(STORAGE_KEY);

    if (consent) return; // já decidiu

    // Mostra o banner com pequeno delay (não bloqueia render)
    setTimeout(function () {
      banner.removeAttribute('hidden');
      requestAnimationFrame(function () {
        banner.classList.add('is-visible');
      });
    }, 1200);

    function setConsent(value) {
      localStorage.setItem(STORAGE_KEY, value);
      banner.classList.remove('is-visible');
      banner.addEventListener('transitionend', function () {
        banner.setAttribute('hidden', '');
      }, { once: true });
    }

    var btnAccept = qs('[data-cookie-accept]', banner);
    var btnReject = qs('[data-cookie-reject]', banner);

    if (btnAccept) btnAccept.addEventListener('click', function () { setConsent('accepted'); });
    if (btnReject) btnReject.addEventListener('click', function () { setConsent('rejected'); });
  }


  /* ============================================================
     LEAD CAPTURE — Slide-in panel
     Dispara em duas situações:
       1. Usuário scrollou 60% da página
       2. Exit intent (mouse saiu pelo topo — desktop)
     Não mostra novamente na mesma sessão.
     Não mostra na página de contato.
     ============================================================ */
  function initLeadCapture() {
    var panel = qs('#site-lead');
    if (!panel) return;

    var SESSION_KEY = 'vertz_lead_shown';
    if (sessionStorage.getItem(SESSION_KEY)) return;

    // Não mostra na página de contato
    if (document.body.classList.contains('page-contato') ||
        window.location.pathname.indexOf('/contato') !== -1) return;

    var shown = false;

    function showPanel() {
      if (shown) return;
      shown = true;
      sessionStorage.setItem(SESSION_KEY, '1');
      panel.removeAttribute('hidden');
      requestAnimationFrame(function () {
        panel.classList.add('is-visible');
        panel.setAttribute('aria-hidden', 'false');
      });
    }

    function hidePanel() {
      panel.classList.remove('is-visible');
      panel.setAttribute('aria-hidden', 'true');
      panel.addEventListener('transitionend', function () {
        panel.setAttribute('hidden', '');
      }, { once: true });
    }

    // Trigger 1: scroll 60%
    var scrollTriggered = false;
    window.addEventListener('scroll', function () {
      if (scrollTriggered) return;
      var scrolled = window.scrollY + window.innerHeight;
      var total    = document.documentElement.scrollHeight;
      if (scrolled / total >= 0.60) {
        scrollTriggered = true;
        setTimeout(showPanel, 600);
      }
    }, { passive: true });

    // Trigger 2: exit intent (desktop)
    document.addEventListener('mouseleave', function (e) {
      if (e.clientY <= 0) showPanel();
    });

    // Fechar
    var btnClose = qs('[data-lead-close]', panel);
    if (btnClose) btnClose.addEventListener('click', hidePanel);

    // Fechar ao clicar fora do painel (backdrop)
    document.addEventListener('click', function (e) {
      if (shown && panel.classList.contains('is-visible') &&
          !panel.contains(e.target) && !e.target.closest('.site-fab')) {
        hidePanel();
      }
    });

    // Fechar com Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') hidePanel();
    });
  }


  /* ============================================================
     FAB — anima entrada após 2s
     ============================================================ */
  function initFab() {
    var fab = qs('.site-fab');
    if (!fab) return;
    // Começa invisível via opacity, entra suave
    fab.style.opacity = '0';
    fab.style.transform = 'translateY(20px)';
    fab.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    setTimeout(function () {
      fab.style.opacity = '1';
      fab.style.transform = 'translateY(0)';
    }, 2000);
  }
