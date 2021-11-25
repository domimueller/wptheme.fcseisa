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
	 			
	 			<?php $teamlink = get_field('team_url', $team->ID); ?>
	 			<a href="<?=$teamlink?>" target="_blank">
	 				<img src="<?=get_the_post_thumbnail_url($team->ID, 'teampicture')?>" />
	 			</a>	
	 		</div>	

		</div>
	</div>	

</article>

