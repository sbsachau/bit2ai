<?php
/**
 * bit2ai Theme — page-datenschutz.php
 * Template Name: Datenschutz
 */

get_header();
?>

<main id="main-content">

    <section class="page-hero page-hero--small section--dark-dot">
        <div class="container">
            <h1>Datenschutzerklärung</h1>
        </div>
    </section>

    <section class="section section--light legal-page">
        <div class="container legal-page__content">

            <div class="legal-page__notice">
                <strong>Hinweis:</strong> [VOR LIVEGANG VON ANWALT PRÜFEN LASSEN]<br>
                Diese Datenschutzerklärung ist ein Entwurf und muss vor Veröffentlichung
                rechtlich geprüft werden.
            </div>

            <h2>1. Verantwortlicher</h2>
            <p>
                Verantwortlicher im Sinne der Datenschutz-Grundverordnung (DSGVO) ist:<br><br>
                Sajib Chaudhury<br>
                [ADRESSE EINTRAGEN]<br>
                E-Mail: <a href="mailto:info@bit2ai.de">info@bit2ai.de</a>
            </p>

            <h2>2. Datenerhebung auf dieser Website</h2>

            <h3>Kontaktformular</h3>
            <p>
                Wenn Sie uns per Kontaktformular eine Anfrage zukommen lassen, werden Ihre
                Angaben aus dem Anfrageformular inklusive der von Ihnen dort angegebenen
                Kontaktdaten zwecks Bearbeitung der Anfrage und für den Fall von Anschlussfragen
                bei uns gespeichert. Diese Daten geben wir nicht ohne Ihre Einwilligung weiter.
            </p>
            <p>
                Rechtsgrundlage: Art. 6 Abs. 1 lit. b DSGVO (Vertragserfüllung /
                vorvertragliche Maßnahmen) sowie Art. 6 Abs. 1 lit. f DSGVO
                (berechtigtes Interesse).
            </p>

            <h3>Server-Log-Dateien</h3>
            <p>
                Der Provider dieser Website erhebt und speichert automatisch Informationen
                in sogenannten Server-Log-Dateien, die Ihr Browser automatisch übermittelt.
                Dies sind: Browsertyp/-version, verwendetes Betriebssystem, Referrer-URL,
                Hostname des zugreifenden Rechners, Uhrzeit der Serveranfrage, IP-Adresse.
            </p>
            <p>
                Eine Zusammenführung dieser Daten mit anderen Datenquellen wird nicht vorgenommen.
                Rechtsgrundlage: Art. 6 Abs. 1 lit. f DSGVO.
            </p>

            <h2>3. Cookies</h2>
            <p>
                Diese Website verwendet ausschließlich technisch notwendige Cookies, die für
                den Betrieb der Website erforderlich sind. Sie dienen nicht der Nachverfolgung
                oder Analyse des Nutzerverhaltens. Für technisch notwendige Cookies ist keine
                Einwilligung erforderlich (§ 25 Abs. 2 TTDSG).
            </p>
            <p>
                [HINWEIS: Sofern Tracking-Tools, Analytics oder externe Dienste eingebunden
                werden, ist ein Cookie-Consent-Banner erforderlich.]
            </p>

            <h2>4. Ihre Rechte</h2>
            <p>
                Sie haben jederzeit das Recht auf Auskunft über die bei uns gespeicherten
                personenbezogenen Daten (Art. 15 DSGVO), Berichtigung (Art. 16 DSGVO),
                Löschung (Art. 17 DSGVO), Einschränkung der Verarbeitung (Art. 18 DSGVO)
                sowie Datenübertragbarkeit (Art. 20 DSGVO).
            </p>
            <p>
                Sie haben das Recht, der Verarbeitung Ihrer personenbezogenen Daten zu
                widersprechen (Art. 21 DSGVO).
            </p>
            <p>
                Zur Ausübung Ihrer Rechte wenden Sie sich bitte an:
                <a href="mailto:info@bit2ai.de">info@bit2ai.de</a>
            </p>

            <h2>5. Beschwerderecht</h2>
            <p>
                Sie haben das Recht, sich bei einer Datenschutz-Aufsichtsbehörde
                zu beschweren. Die zuständige Aufsichtsbehörde richtet sich nach
                Ihrem Wohnort bzw. dem Sitz des Unternehmens.
            </p>

            <h2>6. Hosting</h2>
            <p>
                Diese Website wird bei all-inkl.com (ALL-INKL.COM – Neue Medien Münnich)
                gehostet. Der Server befindet sich in Deutschland.
                Informationen zum Datenschutz bei all-inkl.com finden Sie unter:
                <a href="https://all-inkl.com/datenschutzinformationen/" rel="noopener noreferrer" target="_blank">https://all-inkl.com/datenschutzinformationen/</a>
            </p>
            <p>
                Rechtsgrundlage: Art. 6 Abs. 1 lit. f DSGVO, Art. 28 DSGVO
                (Auftragsverarbeitung).
            </p>

            <p style="margin-top: 3rem; color: var(--color-gray-600); font-size: 0.875rem;">
                Stand: <?php echo esc_html( date( 'F Y' ) ); ?>
            </p>

        </div>
    </section>

</main>

<?php get_footer(); ?>
