<?php
/**
 * bit2ai Theme — page-leistungen.php
 * Template Name: Leistungen
 */

get_header();
?>

<main id="main-content">

    <!-- Hero -->
    <section class="page-hero page-hero--medium section--dark-dot">
        <div class="container text-center">
            <span class="overline">Was wir tun</span>
            <h1>Unsere Leistungen</h1>
            <p class="page-hero__sub">Web &middot; Apps &middot; AI &middot; Automatisierung</p>
        </div>
    </section>

    <!-- Service 1 — Web & App Entwicklung (light) -->
    <section class="section section--light service-detail" id="web-app">
        <div class="container">
            <div class="service-detail__grid">
                <div class="service-detail__icon-col" aria-hidden="true">
                    <span class="service-detail__big-icon">&lt;/&gt;</span>
                </div>
                <div class="service-detail__content">
                    <span class="overline" style="color: var(--color-blue);">Leistung 01</span>
                    <h2>Web &amp; App Entwicklung</h2>
                    <p>
                        Wir entwickeln moderne, performante Websites und Web-Applikationen,
                        die nicht nur technisch überzeugen, sondern auch echte Ergebnisse
                        liefern. Jedes Projekt wird individuell konzipiert — keine Templates,
                        keine Kompromisse.
                    </p>
                    <p>
                        Ob WordPress-Website, Custom Web-App oder Progressive Web App:
                        Wir bauen digitale Produkte, die skalieren und konvertieren.
                    </p>
                    <ul class="service-detail__bullets">
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Individuelle WordPress-Themes und -Plugins nach Maß
                        </li>
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Responsive Design für alle Endgeräte — Mobile First
                        </li>
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Performance-Optimierung, SEO-Grundlagen und Barrierefreiheit
                        </li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn--primary" style="margin-top: 1.5rem;">
                        Projekt besprechen
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 2 — AI Solutions (dark) -->
    <section class="section section--dark-dot service-detail" id="ai-solutions">
        <div class="container">
            <div class="service-detail__grid service-detail__grid--reverse">
                <div class="service-detail__content">
                    <span class="overline">Leistung 02</span>
                    <h2>AI Solutions</h2>
                    <p>
                        Künstliche Intelligenz ist kein Zukunftsthema mehr — sie ist
                        heute verfügbar und praktisch einsetzbar. Wir helfen Ihnen dabei,
                        die richtigen KI-Werkzeuge für Ihr Unternehmen zu identifizieren
                        und produktiv einzusetzen.
                    </p>
                    <p>
                        Von der Auswahl geeigneter KI-Modelle über die Integration in
                        bestehende Workflows bis hin zur Entwicklung eigener KI-gestützter
                        Anwendungen — bit2ai begleitet Sie durch die gesamte KI-Reise.
                    </p>
                    <ul class="service-detail__bullets service-detail__bullets--light">
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            KI-Beratung &amp; Strategie: Wo lohnt sich KI in Ihrem Betrieb?
                        </li>
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Integration von LLMs (ChatGPT, Claude, Gemini) in Ihre Systeme
                        </li>
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Custom AI-Agenten und automatisierte Entscheidungssysteme
                        </li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn--primary" style="margin-top: 1.5rem;">
                        KI-Potenzial besprechen
                    </a>
                </div>
                <div class="service-detail__icon-col" aria-hidden="true">
                    <span class="service-detail__big-icon">&#10697;</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 3 — Automatisierung (light) -->
    <section class="section section--light service-detail" id="automatisierung">
        <div class="container">
            <div class="service-detail__grid">
                <div class="service-detail__icon-col" aria-hidden="true">
                    <span class="service-detail__big-icon">&#8635;</span>
                </div>
                <div class="service-detail__content">
                    <span class="overline" style="color: var(--color-blue);">Leistung 03</span>
                    <h2>Automatisierung</h2>
                    <p>
                        Wiederkehrende, zeitraubende Aufgaben gehören automatisiert.
                        Wir analysieren Ihre Prozesse und identifizieren das größte
                        Automatisierungspotenzial — damit Ihr Team sich auf das
                        Wesentliche konzentrieren kann.
                    </p>
                    <p>
                        Mit modernen Tools wie n8n, Make (Integromat), Zapier oder
                        Custom-Lösungen verbinden wir Ihre Software-Landschaft und
                        lassen Daten fließen, ohne manuellen Aufwand.
                    </p>
                    <ul class="service-detail__bullets">
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Prozessanalyse und Automatisierungspotenzial-Workshop
                        </li>
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            No-Code/Low-Code Workflows mit n8n, Make, Zapier
                        </li>
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            API-Integrationen und Custom-Automatisierungen
                        </li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn--primary" style="margin-top: 1.5rem;">
                        Automatisierung starten
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service 4 — Digitalisierung (dark) -->
    <section class="section section--dark-dot service-detail" id="digitalisierung">
        <div class="container">
            <div class="service-detail__grid service-detail__grid--reverse">
                <div class="service-detail__content">
                    <span class="overline">Leistung 04</span>
                    <h2>Digitalisierung</h2>
                    <p>
                        Viele Unternehmen wissen, dass sie digitaler werden müssen —
                        aber wo anfangen? bit2ai begleitet Sie Schritt für Schritt
                        auf dem Weg von analog zu digital, strukturiert und ohne
                        unnötige Komplexität.
                    </p>
                    <p>
                        Wir schauen uns Ihre bestehenden Prozesse, Tools und Systeme an
                        und entwickeln gemeinsam eine realistische Digitalisierungsstrategie,
                        die zu Ihrem Unternehmen passt.
                    </p>
                    <ul class="service-detail__bullets service-detail__bullets--light">
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Digitalisierungs-Audit: Ist-Analyse Ihrer aktuellen Prozesse
                        </li>
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Roadmap-Entwicklung mit klaren Prioritäten und Meilensteinen
                        </li>
                        <li>
                            <span class="bullet-icon" aria-hidden="true">&#10003;</span>
                            Begleitung der Umsetzung — von der Beratung bis zum Go-Live
                        </li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn--primary" style="margin-top: 1.5rem;">
                        Digitalisierung besprechen
                    </a>
                </div>
                <div class="service-detail__icon-col" aria-hidden="true">
                    <span class="service-detail__big-icon">&#9638;</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section section--gradient cta-banner text-center">
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
