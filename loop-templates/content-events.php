<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $event;

	$metafields = get_fields($event->ID);
	if (isset($metafields) && !empty($metafields)):
		$events_location = $metafields['events_location'];
		$events_startdate = $metafields['events_startdate'];
		$events_enddate = $metafields['events_enddate'];
		$events_starttime = $metafields['events_starttime'];
		$events_endtime = $metafields['events_endtime'];

		$text_starttime = get_field('text_starttime', 'options');
		$text_endtime = get_field('text_endtime', 'options');
		$text_startdate = get_field('text_startdate', 'options');
		$text_enddate = get_field('text_enddate', 'options');
		$text_location = get_field('text_location', 'options');
		$timeUnit = get_field('timeUnit', 'options');
	endif;
						
?>
									
							


	<article class= "card-holder custom-events-col col-md-6" >

	<div class="entry-content">
		<div class="card">

			<header class="entry-header">
				<h3><?php echo $event->post_title;?></h3>
			</header><!-- .entry-header -->	
			
			<div class="events-details-container">	
				<div class="row eventdetails-row card-wrapper">

					<!-- Events Startdate-->
					<?php if ( !empty($events_startdate) and isset($events_startdate)) : ?>						
						<div class="col-sm-12">
						
							<i class="far fa-calendar-alt"></i>
						
							<?php if ( !empty($text_startdate) and isset($text_startdate)) : ?>						
								<span class="details-title"><?=$text_startdate;?></span>
							<?php endif;?>		
							
							<?php 
								// convert 20211101 to 01.11.2021
								$displayDate = date("d.m.Y", strtotime($events_startdate));
							?>
							<span><?php echo $displayDate;?></span> 
			

						</div>

					<?php endif;  ?>	

					<!-- Events Enddate-->
					<?php if ( !empty($events_enddate) and isset($events_enddate)) : ?>						
						<div class="col-sm-12">
						
							<i class="far fa-calendar-alt"></i>
						
							<?php if ( !empty($text_enddate) and isset($text_enddate)) : ?>						
								<span class="details-title"><?=$text_enddate;?></span>
							<?php endif;?>		
							
							<?php 
								// convert 20211101 to 01.11.2021
								$displayDate = date("d.m.Y", strtotime($events_startdate));
							?>	
							<span><?php echo $displayDate;?></span>

						</div>

					<?php endif;  ?>	


					<!-- Events Starttime-->

					<?php 
						//also check if time is not midnight -> default value when no event time is being selected
					if ( !empty($events_starttime) and isset($events_starttime)) : ?>						
						<div class="col-sm-12">
						
							<i class="far fa-clock"></i>
						
							<?php if ( !empty($text_starttime) and isset($text_starttime)) : ?>						
								<span class="details-title"><?=$text_starttime;?></span>
							<?php endif;?>		
							
							<span><?php echo $events_starttime;?></span>
							
							<?php if ( !empty($timeUnit) and isset($timeUnit)) : ?>						
								<span class="timeUnit"><?php echo $timeUnit;?></span>
							<?php endif;?>		
						</div>

					<?php endif;  ?>

				
					<!-- Events Endtime-->
					<?php 
					
					//also check if time is not midnight -> default value when no event time is being selected
					if ( !empty($events_endtime) and isset($events_endtime)) : ?>						
						<div class="col-sm-12">
						
							<i class="far fa-clock"></i>

						
							<?php if ( !empty($text_endtime) and isset($text_endtime)) : ?>						
								<span class="details-title"><?=$text_endtime;?></span>
							<?php endif;?>		
							
							<span><?php echo $events_endtime;?></span>

							<?php if ( !empty($timeUnit) and isset($timeUnit)) : ?>						
								<span class="timeUnit"><?php echo $timeUnit;?></span>
							<?php endif;?>													

						</div>

					<?php endif;  ?>	


					<!-- Events Location-->
					<?php if ( !empty($events_location) and isset($events_location)) : ?>						
						<div class="col-sm-12">
						
							<i class="fas fa-map-marker-alt"></i>
						
							<?php if ( !empty($text_location) and isset($text_location)) : ?>						
								<span class="details-title"><?=$text_location;?></span>
							<?php endif;?>		
							
							<span><?php echo $events_location;?></span>
							
							

						</div>

					<?php endif;  ?>												






				</div> <!--eventdetails-row -->
			</div>	
				
				<div class="text-container">
	 			<?php		
	 				$eventcontent = get_the_content(null, false, $event->ID);
	 				echo apply_filters('the_content', $eventcontent);						 				
	 			?>								 		
	 		</div>

	 		<div class="image-container">							 			
	 			<img src="<?=get_the_post_thumbnail_url($event->ID, 'medium')?>" />
	 		</div>	


		</div>
	</div>	

</article>

