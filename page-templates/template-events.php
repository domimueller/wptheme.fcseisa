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
global $events;

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

						$today = date("Y-m-d");
						$args = array(
							'post_type' => 'domi_events_cpt',
							'posts_per_page' => -1,
							'meta_key' => 'events_startdate',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							    'meta_query' => array(
							        array(
							           'key' => 'events_startdate',
							           'value' => $today,
							           'compare' => '>=',
							           'type' => 'datetime'// you can change it to datetime also
							       )
							)
						);					

					?>
					
					<div class="row custom-events-row card-holder">
					<?php

					$events = get_posts( $args );
					

					if (empty($events)):
						 ?>
						 <div class="col-sm-12">
						 	<h5>Aktuell keine Veranstaltungen erfasst. </h5>
						 </div>	

						<?php 
					endif; 	

					foreach ($events as $event ):
						get_template_part( 'loop-templates/content', 'events' );	
					endforeach;
					?>
					</div> <!-- event row-->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
