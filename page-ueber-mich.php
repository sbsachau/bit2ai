<?php
/**
 * bit2ai Theme — page-ueber-mich.php
 * Template Name: Über mich
 */

get_header();
?>

<main id="main-content">

    <!-- Hero -->
    <section class="page-hero page-hero--medium section--dark-dot">
        <div class="container text-center">
            <span class="overline">From bit to AI</span>
            <h1>Über bit2ai</h1>
        </div>
    </section>

    <!-- Section 1 — Wer steckt dahinter (light) -->
    <section class="section section--light about-person">
        <div class="container">
            <div class="about-person__grid">
                <div class="about-person__avatar" aria-hidden="true">
                    <div class="about-person__avatar-placeholder">
                        <span>SC</span>
                    </div>
                </div>
                <div class="about-person__content">
                    <span class="overline" style="color: var(--color-blue);">Wer steckt dahinter</span>
                    <h2>Sajib Chaudhury</h2>
                    <p class="about-person__title">Founder &amp; Digital Consultant</p>
                    <p>
                        Mit langjähriger Erfahrung in Webentwicklung, digitaler Strategie
                        und der Anwendung von Künstlicher Intelligenz begleite ich
                        Unternehmen auf ihrem Weg in die digitale Zukunft.
                    </p>
                    <p>
                        Meine Überzeugung: Digitalisierung muss nicht kompliziert sein.
                        Mit den richtigen Werkzeugen, einem klaren Plan und dem Fokus
                        auf den echten Mehrwert lässt sich jedes Unternehmen erfolgreich
                        transformieren.
                    </p>
                    <p>
                        Als unabhängiger Digital Consultant arbeite ich direkt mit Gründern,
                        Geschäftsführern und Teams — ohne Agentur-Overhead, aber mit
                        dem Know-how einer erfahrenen digitalen Einheit.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2 — Die Philosophie (dark) -->
    <section class="section section--dark-dot about-philosophy">
        <div class="container">
            <div class="about-philosophy__inner">
                <span class="overline">Die Philosophie</span>
                <h2>
                    "From bit to AI" —<br>
                    was das bedeutet
                </h2>
                <div class="about-philosophy__content">
                    <p>
                        Der Name bit2ai beschreibt mehr als eine Dienstleistung —
                        er beschreibt eine Reise. Das "bit" steht für den Anfang:
                        die erste digitale Präsenz, die erste Website, das erste
                        digitale Werkzeug. Das "AI" steht für das Ziel: intelligent
                        automatisierte Prozesse, die Ihr Unternehmen effizienter,
                        schneller und wettbewerbsfähiger machen.
                    </p>
                    <p>
                        Dazwischen liegt alles: Web-Entwicklung, Apps, Automatisierung,
                        Digitalisierung. Dieser gesamte Weg ist unsere Kernkompetenz.
                    </p>
                    <p>
                        Gerade für kleine und mittelständische Unternehmen ist dieser
                        ganzheitliche Ansatz entscheidend. Wer nur eine Teilstrecke
                        kennt, rät falsch. Wer den ganzen Weg kennt, berät richtig —
                        und genau das ist der bit2ai-Unterschied.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3 — Warum bit2ai (light) -->
    <section class="section section--light about-values">
        <div class="container">
            <div class="section-header text-center" style="margin-bottom: 3rem;">
                <span class="overline" style="color: var(--color-blue);">Unsere Stärken</span>
                <h2>Warum bit2ai</h2>
            </div>
            <div class="values-grid">

                <div class="value-card">
                    <div class="value-card__number" aria-hidden="true">01</div>
                    <h3>Ganzheitlich denken</h3>
                    <p>
                        Wir betrachten Ihr Unternehmen als Ganzes — nicht nur einen
                        einzelnen Aspekt. Unsere Empfehlungen passen zur Gesamtstrategie,
                        nicht nur zur nächsten Aufgabe.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-card__number" aria-hidden="true">02</div>
                    <h3>Direkt und transparent</h3>
                    <p>
                        Keine langen Agentur-Hierarchien, keine versteckten Kosten.
                        Sie arbeiten direkt mit dem Experten zusammen — ehrlich,
                        pragmatisch und zielorientiert.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-card__number" aria-hidden="true">03</div>
                    <h3>Praxis statt Theorie</h3>
                    <p>
                        Wir entwickeln, implementieren und begleiten — nicht nur beraten.
                        Am Ende steht eine funktionierende Lösung, nicht eine Präsentation.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section section--gradient cta-banner text-center">
        <div class="container">
            <h2>Lernen Sie uns kennen</h2>
            <p class="cta-banner__text">
                Schreiben Sie uns — wir freuen uns auf das Gespräch.
            </p>
            <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn--primary">
                Kontakt aufnehmen
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
