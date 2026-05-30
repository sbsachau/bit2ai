<?php
/**
 * bit2ai Theme — front-page.php
 * Homepage template
 */

get_header();
?>

<main id="main-content">

    <!-- ========================================================
         Section 1 — Hero
         ======================================================== -->
    <section class="hero section--dark-dot" aria-label="Hero">
        <div class="hero__inner container">
            <div class="hero__content">
                <span class="overline">From bit to AI</span>
                <h1 class="hero__headline">
                    Ihr Partner für die komplette<br>
                    digitale Transformation
                </h1>
                <p class="hero__subtext">
                    Von der ersten Website bis zur intelligenten KI-Lösung —
                    bit2ai begleitet Ihr Unternehmen auf jedem Schritt.
                </p>
                <div class="hero__actions">
                    <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn--primary">
                        Jetzt Kontakt aufnehmen
                    </a>
                    <a href="<?php echo esc_url( home_url( '/leistungen' ) ); ?>" class="btn btn--outline">
                        Unsere Leistungen
                    </a>
                </div>
            </div>
        </div>
        <div class="hero__scroll-indicator" aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </section>

    <!-- ========================================================
         Section 2 — Services Grid
         ======================================================== -->
    <section class="section section--light services-section" id="leistungen-teaser">
        <div class="container">
            <div class="section-header text-center">
                <span class="overline" style="color: var(--color-blue);">Was wir anbieten</span>
                <h2>Was wir für Sie tun</h2>
            </div>

            <div class="services-grid">

                <article class="service-card">
                    <div class="service-card__icon" aria-hidden="true">
                        <span class="service-card__icon-symbol">&lt;/&gt;</span>
                    </div>
                    <h3>Web &amp; App Entwicklung</h3>
                    <p>Moderne Websites und Apps, die überzeugen und konvertieren.</p>
                </article>

                <article class="service-card">
                    <div class="service-card__icon" aria-hidden="true">
                        <span class="service-card__icon-symbol">&#10697;</span>
                    </div>
                    <h3>AI Solutions</h3>
                    <p>Intelligente Lösungen, die Ihre Prozesse smarter machen.</p>
                </article>

                <article class="service-card">
                    <div class="service-card__icon" aria-hidden="true">
                        <span class="service-card__icon-symbol">&#8635;</span>
                    </div>
                    <h3>Automatisierung</h3>
                    <p>Wiederkehrende Aufgaben automatisieren — mehr Zeit für das Wesentliche.</p>
                </article>

                <article class="service-card">
                    <div class="service-card__icon" aria-hidden="true">
                        <span class="service-card__icon-symbol">&#9638;</span>
                    </div>
                    <h3>Digitalisierung</h3>
                    <p>Von analog zu digital — strukturiert und nachhaltig.</p>
                </article>

            </div>
        </div>
    </section>

    <!-- ========================================================
         Section 3 — About Teaser
         ======================================================== -->
    <section class="section section--dark-dot about-teaser" id="ueber-teaser">
        <div class="container">
            <div class="about-teaser__grid">

                <div class="about-teaser__text">
                    <span class="overline">Wer wir sind</span>
                    <h2>
                        From bit to AI —<br>
                        der komplette Weg
                    </h2>
                    <p>
                        bit2ai steht für den kompletten digitalen Transformationsweg.
                        Nicht nur eine Lösung. Sondern der gesamte Weg von der kleinsten
                        digitalen Einheit bis zur intelligenten Automatisierung.
                    </p>
                    <p>
                        Wir denken Digitalisierung ganzheitlich — von der strategischen
                        Beratung über moderne Entwicklung bis zur KI-gestützten Automatisierung.
                    </p>
                    <a href="<?php echo esc_url( home_url( '/ueber-mich' ) ); ?>" class="btn btn--outline" style="margin-top: 1.5rem;">
                        Mehr über uns
                    </a>
                </div>

                <div class="about-teaser__wordmark" aria-hidden="true">
                    <span class="wordmark-bit">bit</span><span class="wordmark-2">2</span><span class="wordmark-ai">ai</span>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         Section 4 — CTA Banner
         ======================================================== -->
    <section class="section section--gradient cta-banner text-center" id="cta-banner">
        <div class="container">
            <h2>Bereit für den nächsten Schritt?</h2>
            <p class="cta-banner__text">
                Lassen Sie uns gemeinsam herausfinden, wie bit2ai
                Ihr Unternehmen voranbringen kann.
            </p>
            <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn--primary">
                Jetzt Gespräch vereinbaren
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
