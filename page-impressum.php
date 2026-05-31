<?php
/**
 * bit2ai Theme — page-impressum.php
 * Template Name: Impressum
 *
 * Content is editable via WP Admin → Pages → Impressum.
 * The hero title is always "Impressum"; everything below comes from the_content().
 */

get_header();
?>

<main id="main-content">

    <section class="page-hero page-hero--small section--dark-dot">
        <div class="container">
            <h1>Impressum</h1>
        </div>
    </section>

    <section class="section section--light legal-page">
        <div class="container legal-page__content">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
