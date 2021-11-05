<?php
/**
 * Template Name: Home Template
 *
 * Template für die Darstellung der Startseite
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
					
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

					<?php

					
						$args = array(
	    					'post_type'  => 'post',
	    					'numberposts' => -1,
	    					'post_status' => 'publish', 
    						'orderby' => 'menu_order', 
    						'order' => 'ASC', 

						);

					?>
					
					<div class="row custom-postentry-row ">
					<?php

					$postlist = get_posts( $args );
					foreach ($postlist as $postentry ) {
						 

						?>
						 
							<div class="col-md-6 col-md-6 custom-postentry-col" >
								<div class="card">
									<h3><?php echo $postentry->post_title;?></h3>
							 		
							 		<?php 
										if ( has_post_thumbnail($postentry->ID) == true):
								 		?>
									 		<div class="image-container">							 			
									 			<a href="<?=$customPostentryLink?>" target="_blank">
									 				<img src="<?=get_the_post_thumbnail_url($postentry->ID, 'medium')?>" />
									 			</a>								 			
									 		</div>	
								 	<?php		
										endif; 
							 		?>
						 					
					 				<div class="text-container">
						 				<?php		
						 					$postentrycontent = get_the_content(null, false, $postentry->ID);
						 					echo apply_filters('the_content', $postentrycontent);						 				
						 				?>								 		
						 			</div>
							 				
								</div>
							</div>	

						
						<?php
					}
					?>
					</div> <!-- postentry row-->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
