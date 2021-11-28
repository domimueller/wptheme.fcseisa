<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $team;

?>


<article class= "card-holder  col-md-12" >

	<div class="entry-content">
		<div class="card">

			<header class="entry-header">
				<h2><?php echo $team->post_title;?></h2>
			</header><!-- .entry-header -->	
			
	 		<div class="image-container"> 			

	 			<a href="<?=get_the_post_thumbnail_url($team->ID, 'large')?>" data-rel="lightbox-image-0" data-rl_title="" data-rl_caption="" title="">
	 				<img class="" src="<?=get_the_post_thumbnail_url($team->ID, 'teampicture')?>" />
	 			</a>	
	 		</div>	
		</div>
	</div>	

</article>

