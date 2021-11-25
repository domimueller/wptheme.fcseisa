<?php
/**
 * Template Name: Team Template
 *
 * Template für die Darstellung der Teams
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $teams;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	//get_template_part( 'global-templates/hero' );
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

					
						$args = array(
	    					'post_type'  => 'domi_teams_cpt',
	    					'numberposts' => -1,
	    					'post_status' => 'publish', 
    						'orderby' => 'menu_order', 
    						'order' => 'ASC', 

						);

					?>
					
					<div class="row team-row card-holder">
					<?php

					$teams = get_posts( $args );
					foreach ($teams as $team ) {
						get_template_part( 'loop-templates/content', 'teams' );	
					}
					?>
					</div> <!-- team row-->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
