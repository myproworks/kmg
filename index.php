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
<!-- Portfolio -->
<section class="portfolio section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="section-title default text-center">
                    <div class="section-top">
                        <h1>portfolio Name</h1>
                    </div>
                    <div class="section-bottom">
                        <div class="text">portfolio Name</div>
                    </div>
                </div>
                portfolio
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="portfolio-menu">
                    <!-- Portfolio Nav -->
                    <ul id="portfolio-nav" class="portfolio-nav tr-list list-inline cbp-l-filters-work">
                        <li data-filter="*" class="cbp-filter-item active">All</li>
	                    <?php
	                    $args = ['taxonomy' => 'portfolio' ];
	                    $terms = get_terms( $args );
	                    foreach( $terms as $term ):
	                    ?>
                            <li data-filter=".<?php echo $term->slug?>" class="cbp-filter-item">
                                <?php echo $term->name; ?>
                            </li>
                        <?php endforeach;?>
                    </ul>
	                <!--/ End Portfolio Nav -->
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="portfolio-main">
                    <div id="portfolio-item" class="portfolio-item-active">
	                    <?php
                        $args = ['taxonomy' => 'portfolio' ];
                        $terms = get_terms( $args );
                        foreach( $terms as $term ):
                            $data = array ( 'post_type'=> 'our_work',
                                             'tax_query' => array(
	                                             array(
		                                             'taxonomy' => 'portfolio',
		                                             'field' => 'slug',
		                                             'terms' => $term->slug
	                                             )
                                             ),
                                             'posts_per_page'    => 10,);
	                    $ourWorks = new WP_Query( $data);
	                    if( $ourWorks->have_posts() ):
                            while( $ourWorks->have_posts() ): $ourWorks->the_post();
	                    ?>
                        <div class="cbp-item <?php echo $term->slug?> animation">
                            <!-- Single Portfolio -->
                            <div class="single-portfolio">
                                <div class="portfolio-head overlay">
                                    <?php the_post_thumbnail();?>
                                    <a class="more" href="<?php the_permalink();?>">
                                        <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                                <div class="portfolio-content">
                                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                    <p><?php echo $term->name?></p>
                                </div>
                            </div>
                            <!--/ End Single Portfolio -->
                        </div>
                        <?php endwhile; endif; endforeach; wp_reset_query();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Portfolio -->
<?php get_footer();?>