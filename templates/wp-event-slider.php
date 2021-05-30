<div class="wpem-prime-event-slider-wrapper wpem-main">
  <?php while ( $events->have_posts() ) : $events->the_post(); ?>
	<div class="wpem-prime-event-slider-item">
  		<div class="wpem-prime-event-slider-content">
  			<div class="wpem-prime-event-slider-image">
  				<a href="<?php the_permalink(); ?>">
  					<?php display_event_banner(); ?>
  				</a>
  			</div>
  			<div class="wpem-prime-event-slider-description">
  				<div class="wpem-event-details">
	                <div class="wpem-event-title">
	                	<h3 class="wpem-heading-text"><a href="<?php the_permalink(); ?>"><?php echo substr(the_title(),0,32); ?></a></h3>
	                </div>
	                <div class="wpem-event-organizer">
	                	<div class="wpem-event-organizer-name">
	                		<a href="#wpem_organizer_profile">by <?php display_organizer_name(); ?></a>
	                	</div>
	                </div>

	                <div class="wpem-event-date-time" >
                        <span class="wpem-event-date-time-text"><?php display_event_start_date(); ?> <?php
                            if (get_event_start_time())
                            {
                                display_date_time_separator();
                                ?> <?php
                                display_event_start_time();
                            }
                            ?></span>
                        <?php
                        if (get_event_end_date() != '' || get_event_end_time())
                        {
                            _e(' to', 'wp-event-manager-sliders');
                        }
                        ?>
                        <span class="wpem-event-date-time-text">
                            <?php
                            if (get_event_start_date() != get_event_end_date())
                            {
                                display_event_end_date();
                            }
                            ?> <?php
                            if (get_event_end_date() != '' && get_event_end_time())
                            {
                                display_date_time_separator();
                            }
                            ?> <?php
                            if (get_event_end_time())
                            {
                                display_event_end_time();
                            }
                            ?>
                        </span>
                    </div>
		            <?php if(get_event_ticket_option()){  ?>
	                <div class="wpem-event-ticket-type" class="wpem-event-ticket-type-text"><span class="wpem-event-ticket-type-text"><?php echo '#'.get_event_ticket_option(); ?></span></div>
	                <?php } ?>
	            </div>
	            <div class="wpem-event-description">
	            	<div class="wpem-event-description-content">
		            	<?php
						       $organizerDescription= str_replace( '[nl]', "\n", sanitize_text_field( str_replace( "\n", '[nl]', strip_tags( stripslashes(get_event_description() ) ) ) ) );
						       echo substr($organizerDescription,0,50);
						 ?>
					</div>

                    <?php if ($showtickets): ?>
                        <div class="slider-ticket">
                            <?php
                            $tickettype = get_event_ticket_option();
                            if ($tickettype == 'Free'): ?>
                                <?php if (count(get_post_meta(get_the_ID(),'_free_tickets')[0]) > 0): ?>
                                    <?php $tickets = get_post_meta(get_the_ID(), '_free_tickets')[0] ?>
                                    <div class="ticket">
                                        <h3 class="ticket-name"><?php echo $tickets[0]['ticket_name'] ?></h3>
                                        <p>Free</p>
                                    </div>
                                    <p class="more-text">
                                        <?php if (count($tickets) > 1): ?>
                                            'More Tickets Available'
                                        <?php endif; ?>
                                    </p>
                                    <a class="btn btn-primary btn-block" href="<?php the_permalink(); ?>">
                                        <?php
                                            count($tickets) > 1 ? _e( 'Get Tickets', 'wp-event-manage-sliders' ):_e( 'Get Ticket', 'wp-event-manage-sliders' );
                                        ?>
                                    </a>
                                <?php else: ?>
                                    <?php if (count(get_post_meta(get_the_ID(),'_donation_tickets')[0]) > 0):?>
                                        <?php $tickets = get_post_meta(get_the_ID(), '_donation_tickets')[0] ?>
                                        <div class="ticket">
                                            <h3 class="ticket-name"><?php echo $tickets[0]['ticket_name'] ?></h3>
                                            <p>
                                                <?php if(!empty($tickets[0]['ticket_price'])):?>
                                                    <?php echo get_woocommerce_currency_symbol().$tickets[0]['ticket_price'] ?>
                                                <?php else: ?>
                                                    Donate as you wish
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <p class="more-text">
                                            <?php if (count($tickets) > 1): ?>
                                                'More Tickets Available'
                                            <?php endif; ?>
                                        </p>
                                        <a class="btn btn-primary btn-block" href="<?php the_permalink(); ?>">
                                            <?php
                                            count($tickets) > 1 ? _e( 'Get Tickets', 'wp-event-manage-sliders' ):_e( 'Get Ticket', 'wp-event-manage-sliders' );
                                            ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php elseif ($tickettype == 'Paid/Free' || $tickettype === 'Paid'): ?>
                                <?php $tickets = get_post_meta(get_the_ID(), '_paid_tickets')[0] ?>
                                <div class="ticket">
                                    <h3 class="ticket-name"><?php echo $tickets[0]['ticket_name'] ?></h3>
                                    <p><?php echo get_woocommerce_currency_symbol().$tickets[0]['ticket_price'] ?></p>
                                </div>
                                <p class="more-text">
                                    <?php if (count($tickets) > 1): ?>
                                        'More Tickets Available'
                                    <?php endif; ?>
                                </p>
                                <a class="btn btn-primary btn-block" href="<?php the_permalink(); ?>">
                                    <?php
                                        count($tickets) > 1 ? _e( 'Get Tickets', 'wp-event-manage-sliders' ):_e( 'Get Ticket', 'wp-event-manage-sliders' );
                                    ?>
                                </a>
                            <?php else: ?>
                                <div class="wpem-event-description-url">
                                    <a class="smartex" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'wp-event-manage-sliders' ); ?> </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <a class="smartex" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'wp-event-manage-sliders' ); ?> </a>
                    <?php endif; ?>
	            </div>
  			</div>
  		</div>
  	</div>
	<?php endwhile; ?>
</div>

<?php
$dots = $dots ? 'true' : 'false';
$infinite = $infinite ? 'true' : 'false';
$adaptiveheight = $adaptiveheight ? 'true' : 'false';
$autoplay = $autoplay ? 'true' : 'false';
$autoplay_speed = $autoplay_speed ? $autoplay_speed : '3000';
$prevArrow = ($navigation) ? '<div class="slick-prev"><i class="wpem-icon-arrow-left2"></i></div>' : '';
$nextArrow = ($navigation) ? '<div class="slick-next"><i class="wpem-icon-arrow-right2"></i></div>' : '';
$variablewidth = $variablewidth ? 'true' : 'false';
$centermode = $centermode ? 'true' : 'false';
?>

<script>
jQuery(document).ready(function(){
	jQuery('.wpem-prime-event-slider-wrapper').slick({
        navigation	: '<?php echo $navigation;?>',
        dots        : <?php echo $dots;?>,
        infinite	: <?php echo $infinite;?>,
        adaptiveHeight: <?php echo $adaptiveheight;?>,
        autoplay	: <?php echo $autoplay;?>,
        autoplaySpeed  : <?php echo $autoplay_speed;?>,
        prevArrow   : '<?php echo $prevArrow;?>',
        nextArrow   : '<?php echo $nextArrow;?>',
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: <?php echo $centermode; ?>,
        variableWidth: <?php echo $variablewidth; ?>
	});
});
</script>
