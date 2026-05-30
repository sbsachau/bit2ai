# bit2ai Theme

Custom WordPress theme for **bit2ai.de** — Web · Apps · AI · Automatisierung

---

## 1. Local Development Setup (Local WP)

### Step 1 — Install Local WP
Download and install [Local](https://localwp.com/) if not already done.

### Step 2 — Create the local site
1. Open Local → click **+** (New Site)
2. Site name: `bit2ai`
3. Choose **Preferred** environment (or PHP 8.x / MySQL)
4. Set admin credentials (note them down)
5. Click **Add Site** — Local creates `~/Local Sites/bit2ai/app/public/`

### Step 3 — Clone this repo into the themes folder
```bash
# Navigate to the WordPress themes directory
cd ~/Local\ Sites/bit2ai/app/public/wp-content/themes/

# Clone (or copy) this repo as the theme folder
git clone https://github.com/YOUR-USERNAME/bit2ai-theme.git bit2ai-theme
# OR copy files manually:
# cp -r /path/to/this/repo bit2ai-theme
```

### Step 4 — Activate the theme
With Local running, open the **Shell** tab in Local (or use WP-CLI):
```bash
wp theme activate bit2ai-theme
```

Or via WordPress Admin:
1. Open `http://bit2ai.local/wp-admin`
2. Appearance → Themes → Activate **bit2ai Theme**

---

## 2. Creating Pages in WordPress Admin

Go to **Pages → Add New** for each page below and assign the correct template:

| Page Title      | Slug          | Template              |
|-----------------|---------------|-----------------------|
| Startseite      | *(front page)*| *(set as front page)* |
| Leistungen      | leistungen    | Leistungen            |
| Über mich       | ueber-mich    | Über mich             |
| Kontakt         | kontakt       | Kontakt               |
| Impressum       | impressum     | Impressum             |
| Datenschutz     | datenschutz   | Datenschutz           |

### Set Homepage
1. Settings → Reading
2. Set **A static page** → Homepage: **Startseite**

### Create Menus
1. Appearance → Menus → Create New Menu
2. **Primary Menu**: Leistungen, Über mich, Kontakt
3. Assign to **Hauptnavigation** location
4. **Footer Menu**: Leistungen, Über mich, Kontakt, Impressum, Datenschutz
5. Assign to **Footer Navigation** location

---

## 3. Contact Form Setup

The contact form is built in pure PHP — no plugin required.

**For email delivery to work locally**, configure WP mail:
- Install the plugin **WP Mail SMTP** or use Local's Mailpit (built-in mail catcher)
- In Local, go to **Mailpit** tab to see captured emails

**On production** (all-inkl.com): configure SMTP via WP Mail SMTP with your hosting credentials for reliable delivery.

---

## 4. FTP Deployment to all-inkl.com

### Step 1 — Export local database
```bash
wp db export backup.sql
```

### Step 2 — Upload files via FTP
Use FileZilla or similar:
- **FTP Host**: your all-inkl.com FTP host (e.g., `ssh.username.all-inkl.com`)
- **Upload theme** to: `/html/wp-content/themes/bit2ai-theme/`
- Upload all theme files from this repo

### Step 3 — Import database
1. Create new database in all-inkl.com KAS panel
2. Import `backup.sql` via phpMyAdmin
3. Update `wp-config.php` with production DB credentials
4. Update `siteurl` and `home` in wp_options (or use WP CLI):
   ```bash
   wp search-replace 'http://bit2ai.local' 'https://bit2ai.de'
   ```

### Step 4 — Upload wp-config.php
Configure with production database credentials. **Do not commit this file.**

### Step 5 — Activate SSL
In all-inkl.com KAS → Domain → SSL/TLS → Let's Encrypt activate.

---

## 5. Post-Launch Checklist

- [ ] All pages render without PHP errors
- [ ] Theme activated and pages assigned correct templates
- [ ] Homepage set as static front page
- [ ] Menus created and assigned (Primary + Footer)
- [ ] Contact form sends email (test with real address)
- [ ] SSL certificate active (https://bit2ai.de)
- [ ] wp-config.php has production credentials
- [ ] WordPress address and site address updated to production URL
- [ ] `WP_DEBUG` set to `false` in production
- [ ] Permalink structure set (Settings → Permalinks → Post name)
- [ ] Mobile menu works on 375px width
- [ ] No default WordPress styles visible
- [ ] All German text correct and proofread
- [ ] Impressum — address filled in (`[ADRESSE EINTRAGEN]`)
- [ ] Datenschutz — reviewed by lawyer
- [ ] Google Search Console verified
- [ ] Favicon added (upload to Media, set in Customizer or theme)
- [ ] Backup solution configured (e.g., UpdraftPlus)
- [ ] Unused default themes removed

---

## File Structure

```
bit2ai-theme/
├── style.css              # Theme declaration + CSS reset + variables
├── functions.php          # Theme setup, enqueue, contact form handler
├── header.php             # Site header with sticky nav + mobile menu
├── footer.php             # Site footer
├── index.php              # Fallback template
├── front-page.php         # Homepage
├── page-leistungen.php    # Services page
├── page-ueber-mich.php    # About page
├── page-kontakt.php       # Contact page
├── page-impressum.php     # Legal notice
├── page-datenschutz.php   # Privacy policy
├── assets/
│   ├── css/main.css       # Full responsive stylesheet
│   └── js/main.js         # Vanilla JS: menu, scroll, form
└── README.md
```

---

## Tech Stack

- **PHP** 8.x (WordPress)
- **CSS** custom properties, mobile-first, no framework
- **JS** vanilla ES5+ (no jQuery, no build step)
- **Fonts** IBM Plex Sans + IBM Plex Mono via Google Fonts
- **Hosting** all-inkl.com (production)
- **Local dev** Local WP
