<?php
/**
 * bit2ai Theme — page-impressum.php
 * Template Name: Impressum
 *
 * Shows WP editor content if set, otherwise falls back to hardcoded default.
 */

get_header();

$custom_content = '';
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        $custom_content = get_the_content();
    }
}
?>

<main id="main-content">

    <section class="page-hero page-hero--small section--dark-dot">
        <div class="container">
            <h1>Impressum</h1>
        </div>
    </section>

    <section class="section section--light legal-page">
        <div class="container legal-page__content">
            <?php if ( ! empty( trim( $custom_content ) ) ) : ?>
                <?php echo apply_filters( 'the_content', $custom_content ); ?>
            <?php else : ?>
                <h2>Angaben gemäß § 5 TMG</h2>
                <p>
                    Sajib Chaudhury<br>
                    [STRASSE UND HAUSNUMMER EINTRAGEN]<br>
                    [PLZ ORT EINTRAGEN]<br>
                    Deutschland
                </p>

                <h2>Kontakt</h2>
                <p>
                    E-Mail: <a href="mailto:info@bit2ai.de">info@bit2ai.de</a><br>
                    Website: <a href="https://bit2ai.de">bit2ai.de</a>
                </p>

                <h2>Umsatzsteuer</h2>
                <p>Kleinunternehmer gemäß § 19 UStG. Gemäß § 19 Abs. 1 UStG wird keine Umsatzsteuer berechnet.</p>

                <h2>Berufsbezeichnung und berufsrechtliche Regelungen</h2>
                <p>Digital Consultant<br>Bundesrepublik Deutschland</p>

                <h2>Verantwortlich für den Inhalt nach § 18 Abs. 2 MStV</h2>
                <p>Sajib Chaudhury<br>[ADRESSE EINTRAGEN]</p>

                <h2>Streitschlichtung</h2>
                <p>
                    Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung bereit:
                    <a href="https://ec.europa.eu/consumers/odr/" rel="noopener noreferrer" target="_blank">https://ec.europa.eu/consumers/odr/</a>
                </p>
                <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>

                <h2>Haftung für Inhalte</h2>
                <p>Als Diensteanbieter sind wir gemäß § 7 Abs. 1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich.</p>

                <h2>Haftung für Links</h2>
                <p>Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben.</p>

                <h2>Urheberrecht</h2>
                <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht.</p>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
