<?php
/**
 * bit2ai Theme — page-kontakt.php
 * Template Name: Kontakt
 */

get_header();

$success = isset( $_GET['kontakt'] ) && $_GET['kontakt'] === 'success';
$error   = isset( $_GET['kontakt'] ) && $_GET['kontakt'] === 'fehler';
?>

<main id="main-content">

    <!-- Hero -->
    <section class="page-hero page-hero--small section--dark-dot">
        <div class="container text-center">
            <span class="overline">Melden Sie sich</span>
            <h1>Kontakt</h1>
            <p class="page-hero__sub">Wir freuen uns auf Ihre Nachricht</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section section--light contact-section">
        <div class="container">
            <div class="contact-grid">

                <!-- Left column — contact info -->
                <div class="contact-info">
                    <h2>Schreiben Sie uns</h2>
                    <p>
                        Haben Sie ein Projekt in mind oder eine Frage?
                        Senden Sie uns eine Nachricht — wir antworten
                        innerhalb von 24 Stunden.
                    </p>
                    <div class="contact-info__item">
                        <span class="contact-info__label">E-Mail</span>
                        <a href="mailto:info@bit2ai.de" class="contact-info__value">
                            info@bit2ai.de
                        </a>
                    </div>
                    <div class="contact-info__item">
                        <span class="contact-info__label">Antwortzeit</span>
                        <span class="contact-info__value">Innerhalb von 24 Stunden</span>
                    </div>
                    <div class="contact-info__item">
                        <span class="contact-info__label">Sprachen</span>
                        <span class="contact-info__value">Deutsch &amp; Englisch</span>
                    </div>
                </div>

                <!-- Right column — form -->
                <div class="contact-form-wrap">

                    <?php if ( $success ) : ?>
                        <div class="form-message form-message--success" role="alert">
                            <strong>Vielen Dank!</strong> Ihre Nachricht wurde gesendet.
                            Wir melden uns innerhalb von 24 Stunden bei Ihnen.
                        </div>
                    <?php elseif ( $error ) : ?>
                        <div class="form-message form-message--error" role="alert">
                            <strong>Fehler:</strong> Bitte füllen Sie alle Pflichtfelder
                            korrekt aus und versuchen Sie es erneut.
                        </div>
                    <?php endif; ?>

                    <form
                        class="contact-form"
                        method="POST"
                        action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
                        novalidate
                    >
                        <?php wp_nonce_field( 'bit2ai_contact', 'bit2ai_contact_nonce' ); ?>
                        <input type="hidden" name="action" value="bit2ai_contact">

                        <!-- Honeypot -->
                        <div class="contact-form__honeypot" aria-hidden="true">
                            <label for="website">Website (nicht ausfüllen)</label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="form-row form-row--split">
                            <div class="form-group">
                                <label for="vorname" class="form-label">
                                    Vorname <span class="required" aria-label="Pflichtfeld">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="vorname"
                                    name="vorname"
                                    class="form-input"
                                    required
                                    autocomplete="given-name"
                                    value="<?php echo isset( $_GET['kontakt'] ) ? '' : ( isset( $_POST['vorname'] ) ? esc_attr( sanitize_text_field( $_POST['vorname'] ) ) : '' ); ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label for="nachname" class="form-label">
                                    Nachname
                                </label>
                                <input
                                    type="text"
                                    id="nachname"
                                    name="nachname"
                                    class="form-input"
                                    autocomplete="family-name"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                E-Mail-Adresse <span class="required" aria-label="Pflichtfeld">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input"
                                required
                                autocomplete="email"
                            >
                        </div>

                        <div class="form-group">
                            <label for="nachricht" class="form-label">
                                Ihre Nachricht <span class="required" aria-label="Pflichtfeld">*</span>
                            </label>
                            <textarea
                                id="nachricht"
                                name="nachricht"
                                class="form-input form-textarea"
                                rows="6"
                                required
                                placeholder="Wie können wir Ihnen helfen?"
                            ></textarea>
                        </div>

                        <div class="form-group">
                            <p class="form-privacy-note">
                                Mit dem Absenden stimmen Sie der Verarbeitung Ihrer Daten
                                gemäß unserer
                                <a href="<?php echo esc_url( home_url( '/datenschutz' ) ); ?>">Datenschutzerklärung</a>
                                zu.
                            </p>
                        </div>

                        <button type="submit" class="btn btn--primary btn--full">
                            Nachricht senden
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
