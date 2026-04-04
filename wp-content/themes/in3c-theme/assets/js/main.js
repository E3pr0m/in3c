/**
 * in3c Theme — Main JavaScript
 * Vanilla JS, no dependencies.
 * Funzionalità: mobile menu · header scroll · scroll reveal ·
 *               active nav link · form AJAX · touch attività card
 */
(function () {
  'use strict';

  /* ───────────────────────────────────────────────────────
     Init on DOM ready
  ─────────────────────────────────────────────────────── */
  document.addEventListener('DOMContentLoaded', function () {
    initMobileMenu();
    initHeaderScroll();
    initReveal();
    initActiveNav();
    initContactForm();
    initCardTouch();
  });

  /* ───────────────────────────────────────────────────────
     Mobile menu (burger toggle)
  ─────────────────────────────────────────────────────── */
  function initMobileMenu() {
    var burger = document.getElementById('header-burger');
    var nav    = document.getElementById('header-nav');
    if (!burger || !nav) return;

    burger.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      burger.classList.toggle('is-active', open);
      burger.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });

    // Close on link click
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('is-open');
        burger.classList.remove('is-active');
        burger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });

    // Close on ESC
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        nav.classList.remove('is-open');
        burger.classList.remove('is-active');
        burger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        burger.focus();
      }
    });
  }

  /* ───────────────────────────────────────────────────────
     Header: aggiunge classe .scrolled quando si scrolla
  ─────────────────────────────────────────────────────── */
  function initHeaderScroll() {
    var header = document.getElementById('site-header');
    if (!header) return;

    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });
  }

  /* ───────────────────────────────────────────────────────
     Scroll reveal — IntersectionObserver su .reveal
  ─────────────────────────────────────────────────────── */
  function initReveal() {
    var elements = document.querySelectorAll('.reveal');
    if (!elements.length) return;

    // Fallback per browser senza IntersectionObserver
    if (!('IntersectionObserver' in window)) {
      elements.forEach(function (el) { el.classList.add('is-visible'); });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px',
    });

    elements.forEach(function (el) { observer.observe(el); });
  }

  /* ───────────────────────────────────────────────────────
     Active nav link — evidenzia il link della sezione visibile
  ─────────────────────────────────────────────────────── */
  function initActiveNav() {
    var sections = document.querySelectorAll('section[id]');
    var links    = document.querySelectorAll('.header-nav__list a[href^="#"]');
    if (!sections.length || !links.length) return;

    if (!('IntersectionObserver' in window)) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var id = '#' + entry.target.getAttribute('id');
          links.forEach(function (link) {
            link.classList.toggle('is-active', link.getAttribute('href') === id);
          });
        }
      });
    }, { threshold: 0.35 });

    sections.forEach(function (s) { observer.observe(s); });
  }

  /* ───────────────────────────────────────────────────────
     Touch support per le card attività (mobile)
     Su touch si toglie la classe is-hover al tap successivo
  ─────────────────────────────────────────────────────── */
  function initCardTouch() {
    var cards = document.querySelectorAll('.attivita__card');
    if (!cards.length) return;

    cards.forEach(function (card) {
      card.addEventListener('touchstart', function (e) {
        var isOpen = card.classList.contains('is-touch-open');
        // Chiudi tutte
        cards.forEach(function (c) { c.classList.remove('is-touch-open'); });
        if (!isOpen) {
          card.classList.add('is-touch-open');
          e.preventDefault(); // evita il click passthrough sul link dentro
        }
      }, { passive: false });
    });

    // CSS hook: .attivita__card.is-touch-open .attivita__card-overlay { opacity:1; transform:none }
    // (gestito tramite JS che aggiunge la classe, CSS già coperto dall'hover selector o
    //  aggiungiamo inline — vedi sotto)
    injectTouchCardCSS();
  }

  function injectTouchCardCSS() {
    var style = document.createElement('style');
    style.textContent = [
      '.attivita__card.is-touch-open .attivita__card-overlay{opacity:1!important;transform:translateY(0)!important;}',
      '.attivita__card.is-touch-open .attivita__card-label{opacity:0!important;}',
    ].join('');
    document.head.appendChild(style);
  }

  /* ───────────────────────────────────────────────────────
     Contact Form — invio AJAX
  ─────────────────────────────────────────────────────── */
  function initContactForm() {
    var form = document.getElementById('in3c-contact-form');
    if (!form) return;

    var submitBtn = form.querySelector('.contact-form__submit');
    var feedback  = form.querySelector('.contact-form__feedback');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var nome      = trim(form.querySelector('[name="nome"]').value);
      var email     = trim(form.querySelector('[name="email"]').value);
      var telefono  = trim(form.querySelector('[name="telefono"]').value);
      var messaggio = trim(form.querySelector('[name="messaggio"]').value);

      // Validazione client-side
      if (!nome) {
        showFeedback(feedback, 'Inserisci il tuo nome.', false);
        form.querySelector('[name="nome"]').focus();
        return;
      }
      if (!email || !isEmail(email)) {
        showFeedback(feedback, 'Inserisci un indirizzo email valido.', false);
        form.querySelector('[name="email"]').focus();
        return;
      }
      if (!messaggio) {
        showFeedback(feedback, 'Scrivi un messaggio prima di inviare.', false);
        form.querySelector('[name="messaggio"]').focus();
        return;
      }

      // Stato loading
      setLoading(submitBtn, true);
      feedback.textContent = '';
      feedback.className   = 'contact-form__feedback';

      // Payload
      var data = new FormData();
      data.append('action',    'in3c_contact');
      data.append('nonce',     in3cAjax.nonce);
      data.append('nome',      nome);
      data.append('email',     email);
      data.append('telefono',  telefono);
      data.append('messaggio', messaggio);

      fetch(in3cAjax.url, { method: 'POST', body: data })
        .then(function (res) {
          if (!res.ok) throw new Error('HTTP ' + res.status);
          return res.json();
        })
        .then(function (json) {
          if (json.success) {
            showFeedback(feedback, json.data.msg, true);
            form.reset();
          } else {
            showFeedback(feedback, json.data.msg, false);
          }
        })
        .catch(function () {
          showFeedback(feedback, 'Errore di connessione. Riprova più tardi.', false);
        })
        .finally(function () {
          setLoading(submitBtn, false);
        });
    });
  }

  /* ───────────────────────────────────────────────────────
     Helpers
  ─────────────────────────────────────────────────────── */
  function trim(v) { return (v || '').trim(); }

  function isEmail(v) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v);
  }

  function setLoading(btn, on) {
    btn.classList.toggle('is-loading', on);
    btn.disabled = on;
  }

  function showFeedback(el, msg, success) {
    el.textContent = msg;
    el.className   = 'contact-form__feedback ' + (success ? 'is-success' : 'is-error');
  }

})();
