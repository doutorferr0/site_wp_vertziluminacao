/**
 * vertz.js — Vertz Iluminação
 */

(function () {
  'use strict';

  function qsa(selector, scope) {
    return Array.from((scope || document).querySelectorAll(selector));
  }

  function qs(selector, scope) {
    return (scope || document).querySelector(selector);
  }

  /* SITE LOADER */
  function initLoader() {
    var loader = qs('[data-site-loader]');
    if (!loader) return;
    function hideLoader() {
      loader.classList.add('is-hidden');
      loader.addEventListener('transitionend', function () { loader.remove(); }, { once: true });
    }
    if (document.readyState === 'complete') { hideLoader(); }
    else { window.addEventListener('load', hideLoader); }
  }

  /* HEADER STICKY */
  function initStickyHeader() {
    var header = qs('.site-header');
    if (!header) return;

    /* ── elementos ─────────────────────────────────── */
    var logo        = header.querySelector('.site-header__logo');
    var iluminacao  = header.querySelector('.site-header__iluminacao');
    var ctaHero     = header.querySelector('.site-header__cta-hero');
    var ctaNormal   = header.querySelector('.site-header__cta-normal');
    if (!logo) return;

    /* ── configuração ───────────────────────────────── */
    var isHome        = document.body.classList.contains('home');
    var HIDE_DELAY    = 14;        // px de diff para esconder
    var HERO_EXIT_PCT = 0.55;      // % da viewport para sair do hero
    var LERP_FACTOR   = 0.042;     // menor = mais devagar/suave
    var SCALE_HERO    = 6.0;       // cap máximo de escala (dinâmico por viewport)

    /* ── estado de interpolação ─────────────────────── */
    var cur = { x: 0, y: 0, scale: 1, opacity: 0 };   // valores atuais
    var tgt = { x: 0, y: 0, scale: 1, opacity: 0 };   // valores alvo

    /* ── estado do scroll ───────────────────────────── */
    var lastScrollY  = window.scrollY;
    var inHero       = false;
    var rafId        = null;

    /* ── utilidade lerp ─────────────────────────────── */
    function lerp(a, b, t) { return a + (b - a) * t; }
    function nearlyEqual(a, b) { return Math.abs(a - b) < 0.01; }

    /* ── calcula offset centro da viewport ──────────── */
    function calcHeroTarget() {
      var rect = logo.getBoundingClientRect();
      var vpW  = window.innerWidth;
      var vpH  = window.innerHeight;
      var W    = rect.width;
      var H    = rect.height;
      // Scale dinâmico: logo ocupa ~38% da largura da viewport
      // Limitado por SCALE_HERO como máximo para telas muito pequenas
      var targetW = vpW * 0.38;
      var S = Math.min(targetW / W, SCALE_HERO);
      // transform-origin: left top
      // centro visual após scale: cx = rect.left + X + W*S/2
      // destino: cx = vpW/2 (centro H), cy = vpH*0.44 (levemente abaixo do meio)
      var destX = vpW / 2    - rect.left - (W * S) / 2;
      var destY = vpH * 0.44 - rect.top  - (H * S) / 2;
      return { x: destX, y: destY, scale: S };
    }

    /* ── loop RAF ───────────────────────────────────── */
    function tick() {
      cur.x     = lerp(cur.x,     tgt.x,     LERP_FACTOR);
      cur.y     = lerp(cur.y,     tgt.y,     LERP_FACTOR);
      cur.scale = lerp(cur.scale, tgt.scale, LERP_FACTOR);
      cur.opacity = lerp(cur.opacity, tgt.opacity, LERP_FACTOR * 1.4);

      logo.style.transform = 'translate(' + cur.x.toFixed(3) + 'px,' +
                                            cur.y.toFixed(3) + 'px) ' +
                             'scale(' + cur.scale.toFixed(4) + ')';

      if (iluminacao) {
        iluminacao.style.opacity  = cur.opacity.toFixed(3);
        iluminacao.style.transform = 'translateY(' + ((1 - cur.opacity) * 8).toFixed(2) + 'px)';
      }

      // Drop-shadow proporcional ao scale
      var shadowBlur = (cur.scale - 1) * 20;
      logo.style.filter = 'drop-shadow(0 2px ' + shadowBlur.toFixed(1) + 'px rgba(0,0,0,0.55))';

      var allSame = nearlyEqual(cur.x, tgt.x) &&
                    nearlyEqual(cur.y, tgt.y) &&
                    nearlyEqual(cur.scale, tgt.scale) &&
                    nearlyEqual(cur.opacity, tgt.opacity);
      if (!allSame) {
        rafId = requestAnimationFrame(tick);
      } else {
        rafId = null;
        // snap final
        cur.x = tgt.x; cur.y = tgt.y; cur.scale = tgt.scale; cur.opacity = tgt.opacity;
        logo.style.transform = 'translate(' + cur.x + 'px,' + cur.y + 'px) scale(' + cur.scale + ')';
        if (iluminacao) { iluminacao.style.opacity = cur.opacity; }
      }
    }

    function startRaf() {
      if (!rafId) rafId = requestAnimationFrame(tick);
    }

    /* ── entrar no estado hero ───────────────────────── */
    function enterHero() {
      if (inHero) return;
      inHero = true;
      var t = calcHeroTarget();
      tgt.x = t.x; tgt.y = t.y; tgt.scale = t.scale; tgt.opacity = 1;
      header.classList.add('is-hero');
      if (ctaHero)   { ctaHero.removeAttribute('aria-hidden');   ctaHero.querySelector('a').removeAttribute('tabindex'); }
      if (ctaNormal) { ctaNormal.setAttribute('aria-hidden','true'); }
      startRaf();
    }

    /* ── sair do estado hero ─────────────────────────── */
    function leaveHero() {
      if (!inHero) return;
      inHero = false;
      tgt.x = 0; tgt.y = 0; tgt.scale = 1; tgt.opacity = 0;
      header.classList.remove('is-hero');
      if (ctaHero)   { ctaHero.setAttribute('aria-hidden','true'); ctaHero.querySelector('a').setAttribute('tabindex','-1'); }
      if (ctaNormal) { ctaNormal.removeAttribute('aria-hidden'); }
      startRaf();
    }

    /* ── recalcular ao redimensionar ─────────────────── */
    window.addEventListener('resize', function () {
      if (inHero) {
        var t = calcHeroTarget();
        tgt.x = t.x; tgt.y = t.y; tgt.scale = t.scale;
        // snap sem lerp ao resize (evita salto visual)
        cur.x = tgt.x; cur.y = tgt.y; cur.scale = tgt.scale;
        logo.style.transform = 'translate(' + cur.x + 'px,' + cur.y + 'px) scale(' + cur.scale + ')';
      }
    }, { passive: true });

    /* ── scroll handler ──────────────────────────────── */
    var lastY = window.scrollY, ticking = false;

    function updateHeader() {
      var y       = window.scrollY;
      var diff    = y - lastY;
      var heroExit = window.innerHeight * HERO_EXIT_PCT;
      var isAtTop  = y <= 10;

      if (isHome) {
        if (y < heroExit) {
          enterHero();
        } else {
          leaveHero();
        }
      }

      if (isAtTop) {
        header.classList.add('is-top');
        header.classList.remove('is-scrolled', 'is-hidden');
        header.classList.add('is-visible');
      } else if (diff > HIDE_DELAY && !inHero) {
        header.classList.remove('is-top', 'is-visible');
        header.classList.add('is-scrolled', 'is-hidden');
      } else if (diff < -HIDE_DELAY) {
        header.classList.remove('is-top', 'is-hidden');
        header.classList.add('is-scrolled', 'is-visible');
      }

      lastY = y <= 0 ? 0 : y;
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) { requestAnimationFrame(updateHeader); ticking = true; }
    }, { passive: true });

    // Estado inicial
    updateHeader();
    if (isHome && window.scrollY < window.innerHeight * HERO_EXIT_PCT) {
      // Pequeno delay para o layout estar calculado
      setTimeout(function () { enterHero(); }, 120);
    }
  }

  /* BURGER MENU */
  function initBurgerMenu() {
    var burger = qs('.site-header__burger');
    var siteNav = qs('#site-nav');
    var backdrop = qs('.site-nav__backdrop');
    if (!burger || !siteNav) return;
    function openNav() {
      siteNav.classList.add('is-open'); siteNav.removeAttribute('aria-hidden');
      burger.classList.add('is-active'); burger.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }
    function closeNav() {
      siteNav.classList.remove('is-open'); siteNav.setAttribute('aria-hidden', 'true');
      burger.classList.remove('is-active'); burger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }
    burger.addEventListener('click', function () {
      burger.getAttribute('aria-expanded') === 'true' ? closeNav() : openNav();
    });
    if (backdrop) backdrop.addEventListener('click', closeNav);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeNav(); });
    var mq = window.matchMedia('(min-width: 768px)');
    mq.addEventListener('change', function (e) { if (e.matches) closeNav(); });
  }

  /* FAQ ACCORDION */
  function initFaqAccordion() {
    var accordions = qsa('.pb-row-faqs__accordion');
    if (!accordions.length) return;
    accordions.forEach(function (accordion) {
      var btn = qs('.pb-row-faqs__accordionBtn', accordion);
      var content = qs('.pb-row-faqs__accordionContent', accordion);
      if (!btn || !content) return;
      btn.addEventListener('click', function () {
        var isExpanded = btn.getAttribute('aria-expanded') === 'true';
        accordions.forEach(function (other) {
          if (other === accordion) return;
          var ob = qs('.pb-row-faqs__accordionBtn', other);
          var oc = qs('.pb-row-faqs__accordionContent', other);
          if (ob) ob.setAttribute('aria-expanded', 'false');
          if (oc) oc.setAttribute('hidden', '');
        });
        if (isExpanded) {
          btn.setAttribute('aria-expanded', 'false'); content.setAttribute('hidden', '');
        } else {
          btn.setAttribute('aria-expanded', 'true'); content.removeAttribute('hidden');
        }
      });
    });
  }

  /* SCROLL ANIMATIONS */
  function initScrollAnimations() {
    if (!('IntersectionObserver' in window)) {
      qsa('[data-scroll]').forEach(function (el) { el.classList.add('is-visible'); });
      return;
    }
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          var siblings = el.parentElement ? qsa('[data-scroll]', el.parentElement) : [];
          var idx = siblings.indexOf(el);
          var increment = parseInt(el.getAttribute('data-module-delay-increment') || '0', 10);
          if (increment && idx >= 0) { el.style.transitionDelay = (idx * increment / 1000) + 's'; }
          el.classList.add('is-visible');
          observer.unobserve(el);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });
    qsa('[data-scroll]').forEach(function (el) {
      if (el.closest('.pb-row-hero') || el.closest('.site-header')) {
        el.classList.add('is-visible'); return;
      }
      observer.observe(el);
    });
  }

  /* HERO VIDEO */
  function initHeroVideo() {
    var videoWrap = qs('.pb-row-hero__video');
    if (!videoWrap) return;
    var video = qs('video[data-src]', videoWrap);
    if (!video) return;
    function loadVideo() {
      var src = video.getAttribute('data-src');
      if (src) { video.src = src; video.removeAttribute('data-src'); video.load(); video.play().catch(function(){}); }
    }
    if ('requestIdleCallback' in window) { window.requestIdleCallback(loadVideo); }
    else { window.addEventListener('load', loadVideo); }
  }

  /* GALERIA SWIPER */
  function initGallerySwiper() {
    if (typeof Swiper === 'undefined') return;
    var galleryEls = qsa('.pb-row-medias-gallery__medias.swiper');
    if (!galleryEls.length) return;
    galleryEls.forEach(function (el) {
      var galleryWrap = el.closest('.pb-row-medias-gallery__clip');
      var tags = galleryWrap ? qsa('.pb-row-medias-gallery__tag', galleryWrap) : [];
      var bullets = galleryWrap ? qsa('.pb-row-medias-gallery__bullet', galleryWrap) : [];
      var counter = galleryWrap ? qs('.pb-row-medias-gallery__counter', galleryWrap) : null;
      var total = qsa('.swiper-slide', el).length;
      var swiper = new Swiper(el, {
        loop: false, slidesPerView: 1, speed: 600,
        on: {
          slideChange: function () {
            var idx = swiper.activeIndex;
            bullets.forEach(function (b, i) { b.classList.toggle('swiper-pagination-bullet-active', i === idx); });
            if (counter) counter.textContent = (idx + 1) + '/' + total;
          }
        }
      });
      tags.forEach(function (tag, i) {
        tag.addEventListener('click', function () {
          swiper.slideTo(i);
          tags.forEach(function (t) { t.setAttribute('aria-current', 'false'); });
          tag.setAttribute('aria-current', 'true');
        });
      });
      bullets.forEach(function (bullet, i) {
        bullet.addEventListener('click', function () { swiper.slideTo(i); });
      });
    });
  }

  /* CARDS SLIDER */
  function initCardsSlider() {
    if (typeof Swiper === 'undefined') return;
    var cardsSliders = qsa('.pb-row-cards-slider__slider');
    if (!cardsSliders.length) return;
    cardsSliders.forEach(function (sliderEl) {
      if (!sliderEl.classList.contains('swiper')) { sliderEl.classList.add('swiper'); }
      if (sliderEl.swiper) { sliderEl.swiper.destroy(true, true); }
      new Swiper(sliderEl, {
        slidesPerView: 1.2,
        spaceBetween: 16,
        loop: true,
        speed: 600,
        grabCursor: true,
        autoplay: { delay: 4000, disableOnInteraction: false, pauseOnMouseEnter: true },
        breakpoints: {
          768:  { slidesPerView: 2.2, spaceBetween: 16 },
          1024: { slidesPerView: 3,   spaceBetween: 20 },
          1280: { slidesPerView: 4,   spaceBetween: 20 }
        }
      });
    });
  }

  /* TICKER PARCEIROS */
  function initPartnersTicker() {
    var ticker = qs('.pb-row-partners__ticker');
    if (!ticker) return;
    Array.from(ticker.children).forEach(function (child) {
      var clone = child.cloneNode(true);
      clone.setAttribute('aria-hidden', 'true');
      ticker.appendChild(clone);
    });
  }

  /* COOKIE BANNER — LGPD */
  function initCookieBanner() {
    var banner = qs('#site-cookies');
    if (!banner) return;
    var STORAGE_KEY = 'vertz_cookie_consent';
    if (localStorage.getItem(STORAGE_KEY)) return;
    setTimeout(function () {
      banner.removeAttribute('hidden');
      requestAnimationFrame(function () { banner.classList.add('is-visible'); });
    }, 1200);
    function setConsent(value) {
      localStorage.setItem(STORAGE_KEY, value);
      banner.classList.remove('is-visible');
      banner.addEventListener('transitionend', function () { banner.setAttribute('hidden', ''); }, { once: true });
    }
    var btnAccept = qs('[data-cookie-accept]', banner);
    var btnReject = qs('[data-cookie-reject]', banner);
    if (btnAccept) btnAccept.addEventListener('click', function () { setConsent('accepted'); });
    if (btnReject) btnReject.addEventListener('click', function () { setConsent('rejected'); });
  }

  /* LEAD CAPTURE */
  function initLeadCapture() {
    var panel = qs('#site-lead');
    if (!panel) return;
    var SESSION_KEY = 'vertz_lead_shown';
    if (sessionStorage.getItem(SESSION_KEY)) return;
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
      panel.addEventListener('transitionend', function () { panel.setAttribute('hidden', ''); }, { once: true });
    }
    var scrollTriggered = false;
    window.addEventListener('scroll', function () {
      if (scrollTriggered) return;
      if ((window.scrollY + window.innerHeight) / document.documentElement.scrollHeight >= 0.60) {
        scrollTriggered = true;
        setTimeout(showPanel, 600);
      }
    }, { passive: true });
    document.addEventListener('mouseleave', function (e) { if (e.clientY <= 0) showPanel(); });
    var btnClose = qs('[data-lead-close]', panel);
    if (btnClose) btnClose.addEventListener('click', hidePanel);
    document.addEventListener('click', function (e) {
      if (shown && panel.classList.contains('is-visible') &&
          !panel.contains(e.target) && !e.target.closest('.site-fab')) { hidePanel(); }
    });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') hidePanel(); });
  }

  /* FAB */
  function initFab() {
    var fab = qs('.site-fab');
    if (!fab) return;
    fab.style.opacity = '0';
    fab.style.transform = 'translateY(20px)';
    fab.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    setTimeout(function () {
      fab.style.opacity = '1';
      fab.style.transform = 'translateY(0)';
    }, 2000);
  }

  /* INIT */

  /* ============================================================
     10 RAZÕES PARA VERTZ — Slider
     ============================================================ */
  function initRazoesSlider() {
    if (typeof Swiper === 'undefined') return;
    var sliders = qsa('.pb-row-razoes__slider.swiper');
    if (!sliders.length) return;
    sliders.forEach(function (el) {
      new Swiper(el, {
        slidesPerView: 'auto',  /* respeita width do CSS */
        spaceBetween: 0,        /* espaço via padding-right no CSS */
        loop: true,
        speed: 700,
        loopAdditionalSlides: 3,
      });
    });
  }

  




  /* ============================================================
     COUNTER ANIMADO — números que contam ao entrar no viewport
     ============================================================ */
  function initCounters() {
    var counters = qsa('[data-count]');
    if (!counters.length || !('IntersectionObserver' in window)) return;

    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el     = entry.target;
        var target = parseFloat(el.getAttribute('data-count'));
        var prefix = el.getAttribute('data-count-prefix') || '';
        var suffix = el.getAttribute('data-count-suffix') || '';
        var dur    = 1800;
        var start  = null;
        var isFloat = String(target).includes('.');

        function step(ts) {
          if (!start) start = ts;
          var prog = Math.min((ts - start) / dur, 1);
          var ease = 1 - Math.pow(1 - prog, 4); // easeOutQuart
          var val  = target * ease;
          el.textContent = prefix + (isFloat ? val.toFixed(1) : Math.round(val)) + suffix;
          if (prog < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
        obs.unobserve(el);
      });
    }, { threshold: 0.5 });

    counters.forEach(function (el) { obs.observe(el); });
  }


  /* ============================================================
     PARALLAX LEVE EM IMAGENS — hero e seções de destaque
     ============================================================ */
  function initParallax() {
    var els = qsa('[data-parallax]');
    if (!els.length) return;

    var ticking = false;

    function update() {
      var scrollY = window.scrollY;
      els.forEach(function (el) {
        var speed  = parseFloat(el.getAttribute('data-parallax') || '0.15');
        var rect   = el.parentElement.getBoundingClientRect();
        var center = rect.top + rect.height / 2;
        var offset = (window.innerHeight / 2 - center) * speed;
        el.style.transform = 'translateY(' + offset + 'px)';
      });
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) {
        requestAnimationFrame(update);
        ticking = true;
      }
    }, { passive: true });

    update();
  }


  /* ============================================================
     HOVER TILT SUAVE EM CARDS
     ============================================================ */
  function initCardTilt() {
    // Removido — efeito 3D desativado
  }






  /* ============================================================
     COUNTER ANIMADO — números que contam ao entrar no viewport
     ============================================================ */
  function initCounters() {
    var counters = qsa('[data-count]');
    if (!counters.length || !('IntersectionObserver' in window)) return;

    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el     = entry.target;
        var target = parseFloat(el.getAttribute('data-count'));
        var prefix = el.getAttribute('data-count-prefix') || '';
        var suffix = el.getAttribute('data-count-suffix') || '';
        var dur    = 1800;
        var start  = null;
        var isFloat = String(target).includes('.');

        function step(ts) {
          if (!start) start = ts;
          var prog = Math.min((ts - start) / dur, 1);
          var ease = 1 - Math.pow(1 - prog, 4); // easeOutQuart
          var val  = target * ease;
          el.textContent = prefix + (isFloat ? val.toFixed(1) : Math.round(val)) + suffix;
          if (prog < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
        obs.unobserve(el);
      });
    }, { threshold: 0.5 });

    counters.forEach(function (el) { obs.observe(el); });
  }


  /* ============================================================
     PARALLAX LEVE EM IMAGENS — hero e seções de destaque
     ============================================================ */
  function initParallax() {
    var els = qsa('[data-parallax]');
    if (!els.length) return;

    var ticking = false;

    function update() {
      var scrollY = window.scrollY;
      els.forEach(function (el) {
        var speed  = parseFloat(el.getAttribute('data-parallax') || '0.15');
        var rect   = el.parentElement.getBoundingClientRect();
        var center = rect.top + rect.height / 2;
        var offset = (window.innerHeight / 2 - center) * speed;
        el.style.transform = 'translateY(' + offset + 'px)';
      });
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) {
        requestAnimationFrame(update);
        ticking = true;
      }
    }, { passive: true });

    update();
  }


  /* ============================================================
     HOVER TILT SUAVE EM CARDS
     ============================================================ */
  function initCardTilt() {
    // Removido — efeito 3D desativado
  }


  /* ============================================================
     TEXTO REVEAL — words slide up ao entrar no viewport
     ============================================================ */




  /* ============================================================
     RELÓGIO EM TEMPO REAL — atualiza o círculo do hero
     ============================================================ */
  function initClock() {
    var clockEl = qs('#vertz-clock');
    var dateEl  = qs('#vertz-date-text textPath');
    if (!clockEl && !dateEl) return;

    function pad(n) { return String(n).padStart(2, '0'); }

    function update() {
      var now = new Date();
      var h   = pad(now.getHours());
      var m   = pad(now.getMinutes());
      var d   = pad(now.getDate());
      var mo  = pad(now.getMonth() + 1);
      var yr  = now.getFullYear();

      if (clockEl) {
        clockEl.textContent = h + ':' + m;
      }

      if (dateEl) {
        dateEl.textContent = h + ':' + m + '  ✦  ' + d + '/' + mo + '/' + yr;
      }
    }

    update();
    setInterval(update, 30000);
  }



  /* ============================================================
     GALERIA COM BOTÕES — troca imagens por clique, sem swipe
     ============================================================ */
  function initGalleryButtons() {
    var pills = qsa('[data-gallery-target]');
    if (!pills.length) return;

    pills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        var target = pill.getAttribute('data-gallery-target');

        // Atualiza slides
        qsa('.pb-row-gallery-btn__slide').forEach(function (slide, i) {
          var active = String(i) === target;
          slide.setAttribute('aria-hidden', active ? 'false' : 'true');
          // Re-trigger zoom animation
          if (active) {
            var img = slide.querySelector('img');
            if (img) {
              img.style.animation = 'none';
              img.offsetHeight; // reflow
              img.style.animation = '';
            }
          }
        });

        // Atualiza botões
        pills.forEach(function (p) {
          var isThis = p === pill;
          p.classList.toggle('is-active', isThis);
          p.setAttribute('aria-pressed', isThis ? 'true' : 'false');
        });
      });
    });
  }


  function init() {
    initLoader();
    initStickyHeader();
    initBurgerMenu();
    initFaqAccordion();
    initScrollAnimations();
    initHeroVideo();
    initPartnersTicker();
    initRazoesSlider();
    initGalleryButtons();
    initClock();
    initCounters();
    initParallax();
    initCardTilt();
    initRazoesSlider();
    initCookieBanner();
    initLeadCapture();
    initFab();

    if (typeof Swiper !== 'undefined') {
      initGallerySwiper();
      initCardsSlider();
    } else {
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