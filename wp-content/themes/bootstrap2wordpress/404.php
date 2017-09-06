<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bootstrap_to_WordPress
 */

get_header(); ?>

	<section class="feature-image feature-image-default" data-type="background" data-speed="2">
            <h1>Bummer! That Page Can't Be Found</h1>
    </section>
	<div class="container">
		<div id="primary" class="row">
			<main id="main" class="col-sm-8">
				<div class="error-505 not-found">
					<div class="page-content">
						<h2>Don't fret..Let's get you back on track</h2>
						<!-- Resources 
						================== -->
						<h3>Resources</h3>
						<p>Perhaps you were looking for some resources</p>

						<div class="resource-row clearfix">

						<?php 
						// set new variable to CPT - resource post
						$loop = new WP_Query( array(
							'post_type' => 'resource',
							'orderby' => 'post_id',
							'order' => 'ASC' )
							); 
						?>

						<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php
							//resources
							$resource_image = get_field('resource_image');
							$resource_url = get_field('resource_url');
							$add_button = get_field('add_button');
							$button_text = get_field('button_text');

						?>
							<div class="resource">
								<img src="<?php echo $resource_image[url]; ?>" alt="<?php echo $resource_image[alt]; ?>" />
								<h3><a href="<?php echo $resource_url; ?>"><?php the_title() ?></a></h3>
								<?php the_excerpt(); ?>
								<?php if(!empty($button_text)) : ?>
									<a href="<?php echo $resource_url; ?>" class="btn btn-success"><?php echo $button_text; ?></a>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					</div><!-- end resources -->
					<!-- start categores -->
					<h3>Categories</h3>
					<p>....or maybe a popular category</p>
					<div class="widget widget_categories">
						<h4 class="widget-title">Most Used Categories</h4>
						<ul>
							<?php 
								wp_list_categories(
									array(
										'orderby' => 'count',
										'order' => 'DESC',
										'show_count' => 1,
										'title_li' => '',
										'number' => 10

									)
								);
							?>
						</ul>
					</div>
					<!-- end categories -->
					<!-- ARCHIVES START -->
					<h3>Archives</h3>
					<p>You can always sort through our archives</p>
					<?php the_widget('WP_Widget_Archives', 
									'title=Our Archives');?>
					<!-- ARCHIVES END -->
					<p>...or, just head back to the <a href="<?php echo esc_url( home_url( '/' )) ?>">home page </a></p>
					</div>
				</div>
			</main><!-- #main -->
			<aside class="col-sm-4">	
				<?php get_sidebar() ?>
			</aside>
		</div><!-- #primary -->
	</div>

<?php
get_footer();
