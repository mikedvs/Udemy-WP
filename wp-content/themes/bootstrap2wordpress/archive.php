<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstrap_to_WordPress
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="row">
		<main id="main" class="col-sm-8">

		<?php
		if ( have_posts() ) : ?>

		<section class="feature-image feature-image-default-alt" data-type="background" data-speed="2">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
		</section>


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
		<aside class="col-sm-4">
			<?php get_sidebar(); ?>
		</aside>
	</div><!-- #primary -->
</div>
<?php
get_footer();
