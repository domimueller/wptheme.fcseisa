<?php
/**
 * Template Name: Veranstaltungen Template
 *
 * Template für die Darstellung der Veranstaltungen
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
	    					'post_type'  => 'domi_events_cpt',
	    					'numberposts' => -1,
	    					'post_status' => 'publish', 
    						'orderby' => 'menu_order', 
    						'order' => 'ASC', 

						);

					?>
					
					<div class="row custom-events-row ">
					<?php

					$events = get_posts( $args );
					foreach ($events as $event ) {
						 
						$metafields = get_fields($event->ID);
						$events_location = $metafields['events_location'];
						$events_startdate = $metafields['events_startdate'];
						$events_enddate = $metafields['events_enddate'];
						$events_starttime = $metafields['events_starttime'];
						$events_endtime = $metafields['events_endtime'];


						?>
						 
							<div class="col-md-6 col-md-6 custom-events-col" >
								<div class="card">
									
									<h3><?php echo $event->post_title;?></h3>

									<div class="events-details-container">	
										<div class="row time-row">
											<?php if ( !empty($events_starttime) and isset($events_starttime)) : ?>						<div class="col-sm-12">
													<i class="far fa-clock"></i>
													<span><?php echo $events_starttime;?></span>

												</div>
											<?php endif;  ?>

											<?php if ( !empty($events_enddate) and isset($events_enddate)) : ?>								
											<?php endif;  ?>											
									
										</div>
										<div class="row date-row">

										</div>	
									</div>	


							 		<div class="image-container">							 			
							 			<img src="<?=get_the_post_thumbnail_url($event->ID, 'medium')?>" />
							 		</div>	
						 			
						 			<div class="text-container">
							 			<?php		
							 				$eventcontent = get_the_content(null, false, $event->ID);
							 				echo apply_filters('the_content', $eventcontent);						 				
							 			?>								 		
							 		</div>
							 				
								</div> <!-- card-->
							</div>	<!-- col-->

						
						<?php
					}
					?>
					</div> <!-- event row-->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
