# Documentazione Tecnica — Sito in3c

**Versione tema:** 1.0.0  
**Autore sviluppo:** GiuliaP.  
**Ultimo aggiornamento:** Aprile 2026  
**Stato progetto:** In sviluppo

---

## Indice

1. [Panoramica](#1-panoramica)
2. [Stack tecnologico](#2-stack-tecnologico)
3. [Struttura del tema](#3-struttura-del-tema)
4. [Sezioni della pagina](#4-sezioni-della-pagina)
5. [Asset e media](#5-asset-e-media)
6. [Form di contatto](#6-form-di-contatto)
7. [Social e contatti](#7-social-e-contatti)
8. [Deploy e CI/CD](#8-deploy-e-cicd)
9. [Checklist prima della consegna](#9-checklist-prima-della-consegna)

---

## 1. Panoramica

Sito one-page per **in3c** — brand di personal coaching incentrato su Coaching, Creatività e Crescita.  
Il sito è costruito su **WordPress** con un tema completamente custom (niente page builder). La pagina principale è una single-page con navigazione ad ancora, animazioni di entrata, sezioni video e un form di contatto AJAX.

**URL locale (sviluppo):** ambiente LocalWP  
**URL produzione:** da definire

---

## 2. Stack tecnologico

| Componente | Dettaglio |
|---|---|
| CMS | WordPress (ultima versione stabile) |
| Tema | Custom — `in3c-theme` |
| PHP | Compatibile con PHP 8.x |
| CSS | Vanilla CSS (no framework), file unico `main.css` |
| JavaScript | Vanilla JS (no jQuery), file unico `main.js` |
| Font | Google Fonts: Bebas Neue, Montserrat, Dancing Script |
| Email form | `wp_mail()` nativo WordPress |
| Deploy | GitHub Actions → FTP automatico su push a `main` |

---

## 3. Struttura del tema

```
wp-content/themes/in3c-theme/
├── style.css              # Dichiarazione tema (metadati)
├── functions.php          # Setup, assets, AJAX handler form
├── header.php             # Header sticky con logo, nav, social
├── front-page.php         # Pagina principale one-page (tutte le sezioni)
├── footer.php             # Footer con logo, nav, social, copyright
├── index.php              # Fallback WordPress obbligatorio
├── screenshot.png         # Preview tema nel pannello WP
└── assets/
    ├── css/
    │   └── main.css       # Tutti gli stili del sito
    ├── js/
    │   └── main.js        # Mobile menu, scroll reveal, form AJAX, hover cards
    └── images/
        └── logo.png       # Logo del brand (PNG)
```

**Media caricati separatamente (wp-content/uploads/):**
- `video_hero.mp4` — video della sezione Hero ✅

---

## 4. Sezioni della pagina

Le sezioni sono definite in `front-page.php` nell'ordine seguente. Ogni sezione ha un `id` usato come ancora dal menu.

### 4.1 Header (sticky)
- **File:** `header.php`
- Logo a sinistra → `assets/images/logo.png`
- Menu con 4 voci: Home `#home`, Percorsi `#percorsi`, Attività `#attivita`, Contatti `#contatti`
- Icone social a destra: Email, Instagram, LinkedIn, Facebook
- Burger menu per mobile (toggle via JS)
- Diventa sticky con classe `is-sticky` allo scroll

### 4.2 Hero — `#home`
- Split 50/50: sinistra video in loop, destra titolo
- Video caricato da `wp-content/uploads/video_hero.mp4`
- Titolo: "Coaching / **Creatività** (rosso) / Crescita"

### 4.3 About — `#chi-sono`
- Sinistra: foto coach in bianco e nero (`assets/images/foto-coach.jpg`) — **da aggiungere**
- Destra: 3 blocchi di testo con accent bar rossa
  - "Un po' di me" — testo da inserire
  - "Cosa faccio" — testo da inserire
  - "(A chi?)" — testo da inserire
- Animazione `reveal` allo scroll

### 4.4 Marquee banner
- Testo scorrevole in loop: COACHING · CREATIVITÀ · CRESCITA
- `aria-hidden="true"` (decorativo)

### 4.5 Video Banner — `#percorsi`
- Sfondo scuro
- Sinistra: citazione in rosso grande — **testo da inserire**
- Destra: placeholder per video o immagine — **media da inserire**

### 4.6 Manifesto — `#manifesto`
- 4 card con hover effect (click su mobile)
- Stato default: numero + titolo + intro
- Stato hover: foto + testo completo
- I 4 punti:
  1. **Chiarezza sulla visione** — definire dove vuoi portare il tuo business
  2. **Piano d'azione** — tradurre la strategia in azioni concrete
  3. **Monitoraggio e ottimizzazione** — analizzare i risultati
  4. **Espansione e crescita** — scalare il business al prossimo livello
- Le **foto hover** di ogni punto sono da inserire (attualmente placeholder)

### 4.7 Blog Video
- Sinistra: video dal blog + link alla pagina blog — **video da inserire**
- Destra: citazione + link "Scopri" — **testo da inserire**

### 4.8 Attività — `#attivita`
- 3 card affiancate con hover overlay
  - **Per Aziende** (sfondo scuro) — testo da inserire, immagine da inserire
  - **Self** (sfondo chiaro) — testo da inserire, immagine da inserire
  - **Gruppi** (sfondo scuro) — testo da inserire, immagine da inserire
- Hover: mostra overlay con testo completo + CTA → `#contatti`

### 4.9 CTA
- Testo: "Costruiamo il tuo percorso — *insieme* →"
- Pulsante "Iniziamo" → `#contatti`
- Nota: il sottotitolo `cta-section__note` è un promemoria di sviluppo, **da rimuovere prima della consegna**

### 4.10 Form contatti — `#contatti`
- Campi: Nome*, Email*, Telefono (opzionale), Messaggio*
- Invio via AJAX (senza reload pagina)
- Email recapitata all'indirizzo admin WordPress
- Vedi sezione 6 per dettagli tecnici

### Footer
- **File:** `footer.php`
- Logo + nav ancora + icone social (stesso set dell'header)
- Copyright dinamico (anno automatico)
- P.IVA: **da compilare**

---

## 5. Asset e media

### Logo
- **Percorso:** `assets/images/logo.png`
- **Stato:** presente ✅
- Usato in header e footer, larghezza display `120px`

### Foto coach
- **Percorso atteso:** `assets/images/foto-coach.jpg`
- **Stato:** mancante ⚠️
- Versione B&W consigliata
- Fallback attivo: se l'immagine non c'è, il riquadro si nasconde automaticamente

### Video hero
- **Percorso:** `wp-content/uploads/video_hero.mp4`
- **Stato:** presente ✅
- Autoplay, muted, loop, playsinline

### Media mancanti (da fornire)
| Posizione | Tipo | Note |
|---|---|---|
| Sezione About | Foto coach B&W | JPG, rapporto 3:4 consigliato |
| Video Banner | Video o immagine | Da decidere con cliente |
| Manifesto pt.1 | Foto | Hover card |
| Manifesto pt.2 | Foto | Hover card |
| Manifesto pt.3 | Foto | Hover card |
| Manifesto pt.4 | Foto | Hover card |
| Blog Video | Video | Iframe o `<video>` |
| Attività — Per Aziende | Immagine di sfondo | |
| Attività — Self | Immagine di sfondo | |
| Attività — Gruppi | Immagine di sfondo | |

---

## 6. Form di contatto

**Implementazione:** AJAX nativo WordPress, senza plugin.

**Flusso:**
1. L'utente compila e invia il form
2. JS serializza i dati e invia a `admin-ajax.php` con nonce di sicurezza
3. PHP in `functions.php` → `in3c_handle_contact()` sanifica i dati e chiama `wp_mail()`
4. L'email arriva all'indirizzo admin configurato in WordPress (`Impostazioni → Generali → Email`)
5. JS mostra il messaggio di risposta senza ricaricare la pagina

**Sicurezza:**
- Nonce verificato con `check_ajax_referer()`
- Tutti i campi sanificati (`sanitize_text_field`, `sanitize_email`, `sanitize_textarea_field`)
- Validazione email lato server

**Email di destinazione:** configurabile da `WordPress Admin → Impostazioni → Generali → Indirizzo email`.

---

## 7. Social e contatti

I link social sono presenti sia in `header.php` che in `footer.php`. Attualmente puntano ai placeholder delle homepage dei social. **Da aggiornare con gli URL reali del cliente.**

| Canale | URL attuale | Da aggiornare |
|---|---|---|
| Email | `mailto:info@in3c.it` | Verificare con cliente ⚠️ |
| Instagram | `https://www.instagram.com/` | Sì ⚠️ |
| LinkedIn | `https://www.linkedin.com/` | Sì ⚠️ |
| Facebook | `https://www.facebook.com/` | Sì ⚠️ |

**File da modificare:** `header.php` righe 41–71 e `footer.php` righe 24–49.

---

## 8. Deploy e CI/CD

Il deploy è automatizzato tramite **GitHub Actions**.

- **Trigger:** push al branch `main`
- **Azione:** upload via FTP al server di produzione
- **File di configurazione:** `.github/workflows/` (nella root del repo)
- **Credenziali FTP:** salvate come GitHub Secrets (non nel codice)

Per deployare: fare push o merge su `main`. Il deploy parte automaticamente.

---

## 9. Checklist prima della consegna

### Contenuti
- [ ] Testo "Un po' di me" (sezione About)
- [ ] Testo "Cosa faccio" (sezione About)
- [ ] Testo "(A chi?)" (sezione About)
- [ ] Citazione/testo Video Banner
- [ ] Testi completi hover card Manifesto (4 punti)
- [ ] Citazione sezione Blog Video
- [ ] Testi card Attività (Per Aziende, Self, Gruppi)

### Media
- [ ] Foto coach B&W → `assets/images/foto-coach.jpg`
- [ ] Video/immagine Video Banner
- [ ] 4 foto hover card Manifesto
- [ ] Video sezione Blog Video
- [ ] Immagini di sfondo card Attività (x3)

### Configurazione
- [ ] URL Instagram reale in `header.php` e `footer.php`
- [ ] URL LinkedIn reale in `header.php` e `footer.php`
- [ ] URL Facebook reale in `header.php` e `footer.php`
- [ ] Verifica email `info@in3c.it` e indirizzo admin WP
- [ ] P.IVA in `footer.php` (riga `footer-piva`)
- [ ] Rimuovere la nota di sviluppo nella sezione CTA (`cta-section__note`)
- [ ] Configurare URL produzione nel workflow GitHub Actions

### Verifica finale
- [ ] Test form di contatto in produzione
- [ ] Test responsive (mobile, tablet, desktop)
- [ ] Verifica video hero su mobile (autoplay bloccato in alcuni browser)
- [ ] Impostare pagina statica come Homepage in `WP Admin → Impostazioni → Lettura`
