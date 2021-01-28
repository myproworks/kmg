<?php
/**
 * Template Name: Maim page
 */
get_header();
?>

<!-- Hero Slider -->
<section class="hero-slider style1">
<div class="home-slider">
<!-- Single Slider -->
<?php
    $mSlider = new WP_Query( array ( 'post_type' => 'mainSlider' ) );

    if( $mSlider->have_posts() ):
        while( $mSlider->have_posts() ): $mSlider->the_post();

?>
<div class="single-slider" style="background-image:url( <?php echo get_the_post_thumbnail_url( $post->ID, 'full' );?>
        )">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-8 col-12">
				<div class="welcome-text"> 
					<div class="hero-text"> 
						<h4><?php echo get_the_excerpt(); ?></h4>
						<h1><?php the_title();?></h1>
						<div class="p-text">
							<?php the_content();?>
						</div>
						<div class="button">
<!--                            <a href="--><?php //echo get_site_url();?><!--/%d0%bf%d1%80%d0%be-%d0%bd%d0%b0%d1%81/" class="center_btn">Про-->
<!--                                компанію</a>-->
							<a href="contact.html" class="bizwheel-btn theme-1 effect">Work with us</a>
							<a href="portfolio.html" class="bizwheel-btn theme-2 effect">View Our Portfolio</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; endif; wp_reset_query();?>
<!--/ End Single Slider -->
</div>
</section>
<!--/ End Hero Slider -->
<!-- Features Area -->
<section class="features-area section-bg">
    <div class="container">
        <div class="row">
            <?php get_template_part( 'template-parts/content', 'features' )?>
        </div>
    </div>
</section>
		<!--/ End Features Area -->
<?php get_footer();?>