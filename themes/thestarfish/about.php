<?php
/**
 * Template Name: About Page
 * 
 * @package starfish_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php /* Start the Loop */ ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" >
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>

                </header><!-- .entry-header -->

                <div class="entry-content">
					<?php the_content(); ?>
					<?php
						/**
						* Set the Custom Field Suite Loops Working
						*/

						$carousels = CFS()->get( 'about_carousel' );

						foreach ( $carousels as $carousel ) {
							echo '<div class="carousel-container">';
								//wrap in whole carousel
								echo '<h2>' . $carousel['about_carousel_title'] . '</h2>';
								$carousel_cells = $carousel['about_carousel_cell'];
								foreach($carousel_cells as $carousel_cell){
									echo '<div class="carousel-cell-container">';
									// wrap in carousel cell
										echo '<img src="' . $carousel_cell['about_carousel_cell_image_primary'] . '" class="carousel-cell-image-primary"/>';
										echo '<img src="' . $carousel_cell['about_carousel_cell_image_secondary'] . '" class="carousel-cell-image-secondary"/>';
										echo '<div class="carousel-cell-content">';
											echo $carousel_cell['about_carousel_cell_content'];
										echo '</div>';
									echo '</div>';
								}
							echo '</div>';
						}
					?>

					<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
						<header class="content-box-header">
							<h2>Meet The Team</h2>
						</header><!-- .content-box-header -->

						<div class="content-box-content">
							<a class="content-box-button" href="<?php echo esc_url(get_permalink(get_page_by_path( 'team' ) ) ); ?>">Meet the team
								<span class="screen-reader-text"><?php echo esc_html( 'Meet The Team' ); ?></span>
							</a><!-- .content-box-button -->
						</div><!-- .content-box-content -->
					</section><!-- #post-## -->
					
                </div><!-- .entry-content -->
            </article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_template_part( 'template-parts/content', 'donation' ); ?>
<?php get_footer(); ?>
