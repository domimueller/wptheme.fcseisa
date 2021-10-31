<?php
/**
 * Template Name: Sponsor Template
 *
 * Template für die Darstellung der Sponsoren
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
	    					'post_type'  => 'domi_sponsors_cpt',
	    					'numberposts' => -1,
	    					'post_status' => 'publish', 
    						'orderby' => 'menu_order', 
    						'order' => 'ASC', 

						);

					?>
					
					<div class="row sponsor-row ">
					<?php

					$sponsors = get_posts( $args );
					foreach ($sponsors as $sponsor ) {

						?>
							<div class="col-md-6 col-md-6 sponsor-col" >
								<div class="card">
									<h3><?php echo $sponsor->post_title;?></h3>
							 		<div class="image-container">
							 			
							 			<?php $sponsorlink = get_field('sponsor_url', $sponsor->ID); ?>
							 			<a href="<?=$sponsorlink?>" target="_blank">
							 				<img src="<?=get_the_post_thumbnail_url($sponsor->ID, 'medium')?>" />
							 			</a>	
							 		</div>	

								</div>
							</div>	

						
						<?php
					}
					?>
					</div> <!-- sponsor row-->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
