<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $sponsor;




// different layout for home and "sponsoren"
$columnwidth = 'sponsor-col '. (is_front_page() ? 'col-sm-3' : 'col-sm-6');
$sponsortype =  (is_front_page() ? 'smallSponsorLayout' : 'bigSponsorLayout');

?>


<article class= " <?=$columnwidth . ' ' . $sponsortype?>" >

	<div class="entry-content">
		<div class="card">

			<header class="entry-header">
				<h2><?php echo $sponsor->post_title;?></h2>
			</header><!-- .entry-header -->	
			
	 		<div class="image-container">
	 			
	 			<?php $sponsorlink = get_field('sponsor_url', $sponsor->ID); ?>
	 			<a href="<?=$sponsorlink?>" target="_blank">
	 				<img src="<?=get_the_post_thumbnail_url($sponsor->ID, 'medium')?>" />
	 			</a>	
	 		</div>	

		</div>
	</div>	

</article>

