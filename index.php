<?php
/**
 * bit2ai Theme — index.php
 * Fallback template. WordPress requires this file.
 */

get_header();
?>

<main class="main-content">
    <section class="section section--dark-dot">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="entry-content" style="margin-top: 2rem;">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
