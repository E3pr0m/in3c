# in3c — Coaching · Creatività · Crescita

Sito WordPress one-page per **in3c**, brand di personal coaching.

---

## Struttura del repository

Il repository contiene **solo il tema custom** e i plugin necessari al progetto. Il core di WordPress e i temi default sono esclusi tramite `.gitignore`.

```
wp-content/
└── themes/
    └── in3c-theme/          ← tema custom
        ├── style.css
        ├── functions.php
        ├── header.php
        ├── front-page.php
        ├── footer.php
        ├── index.php
        └── assets/
            ├── css/main.css
            └── js/main.js
```

---

## Tecnologie

- **WordPress** (CMS)
- **Tema custom** — PHP vanilla, nessun page builder
- **Font** — Bebas Neue · Montserrat · Dancing Script (Google Fonts)
- **JS** — Vanilla JS (no jQuery): mobile menu, scroll reveal, form AJAX, hover cards
- **Form contatti** — AJAX custom con nonce WordPress (no plugin)

---

## Deploy automatico

Il repository usa una **GitHub Action FTP** per sincronizzare automaticamente le modifiche sull'hosting.

Il workflow si trova in `.github/workflows/ftp-deploy.yml` (da configurare).

### Secrets necessari in GitHub:

| Secret | Descrizione |
|--------|-------------|
| `FTP_SERVER` | Hostname FTP del server |
| `FTP_USERNAME` | Utente FTP |
| `FTP_PASSWORD` | Password FTP |
| `FTP_SERVER_DIR` | Cartella remota (es. `/public_html/wp-content/`) |

---

## Asset da aggiungere (non in repo)

I seguenti file vanno caricati manualmente sul server (sono esclusi da `.gitignore`):

- `wp-content/uploads/video_hero.mp4` — video hero homepage
- `wp-content/themes/in3c-theme/assets/images/logo.png` — logo brand
- `wp-content/themes/in3c-theme/assets/images/foto-coach.jpg` — foto coach

---

## Setup locale (Local by WP Engine)

1. Clona il repo nella cartella `public` del sito Local
2. Attiva il tema **in3c Theme** da WP Admin → Aspetto → Temi
3. Imposta la homepage statica: WP Admin → Impostazioni → Lettura → Pagina statica → "Home"

---

© in3c — Tutti i diritti riservati
