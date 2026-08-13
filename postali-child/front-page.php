<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/

// ACF Fields
$banner_img_arr = get_field('hero_banner_image');
$count_banner = count($banner_img_arr);
$banner_img = $banner_img_arr[rand(0, $count_banner - 1)]['image'];

$p1_about_btn = get_field('about_cta');
$p1_video_btn_group = get_field('watch_video_button');
$p3_left_featured_review = get_field('p3_left_featured_testimonial');
$p3_right_featured_review = get_field('p3_right_featured_testimonial');
$p4_banner = get_field('p4_section_banner');

$left_review_description = get_field('testimonial_short_description', $p3_left_featured_review->ID) ? get_field('testimonial_short_description', $p3_left_featured_review->ID) : get_field('testimonial_description', $p3_left_featured_review->ID);
$right_review_description = get_field('testimonial_short_description', $p3_right_featured_review->ID) ? get_field('testimonial_short_description', $p3_right_featured_review->ID) : get_field('testimonial_description', $p3_right_featured_review->ID);

get_header();

?>

<main id="front-page">

    <section id="hero" class="dk-teal-bg">
        <div class="container">
            <div class="columns">
                <div class="column-75 direction-col">
                    <div class="hero-wrapper">
                        <h1><?php the_field('hero_title'); ?></h1>
                        <h4><?php the_field('hero_sub_title'); ?></h4>
                        <div class="cta-wrapper">
                            <a aria-label="call our office at <?php _e( $vanity_phone_number ); ?>" title="call our office at <?php _e( $vanity_phone_number ); ?>"  href="tel:<?php _e( $actual_phone_number ); ?>" class="btn"><?php _e( $vanity_phone_number ); ?></a>
                            <span class="divide"></span>
                            <p><?php the_field('hero_cta_text'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="spacer-30"></div>
                    <div class="column-50">
                        <p><?php the_field('hero_form_cta_text'); ?></p>
                        <div class="form-box">
                            <?php echo do_shortcode(' [gravityform id="3" title="false"] '); ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <img class="banner-img" src="<? _e( $banner_img['url'] ); ?>" alt="<? _e( $banner_img['alt'] ); ?>" title="<? _e( $banner_img['title'] ); ?>" />
    </section>

    <section id="panel-1">
        <div class="tan-bg" id="main-content">
            <div class="container">
                <div class="columns intro-firm-values">
                    <div class="column-50 direction-col">
                        <h2><?php the_field('p1_title'); ?></h2>
                        <h4><?php the_field('p1_sub_title'); ?></h4>
                        <div class="tout-box alt"> 
                        <a href="<?php the_field('when_to_contact_link'); ?>" target="_blank">
                            <p><?php the_field('when_to_contact_copy'); ?></p><img src="/wp-content/uploads/2022/12/bubble-arrow-right.svg" alt="" class="tout-arrow">
                        </a>
                    </div>
                    </div>
                    <div class="column-50 direction-col">
                        <?php the_field('p1_copy'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-2" class="dk-teal-bg">
        <div class="container">
            <div class="columns">
                <div class="column-50 direction-col">
                    <h2><?php the_field('p2_title'); ?></h2>
                </div>
                <div class="column-50 direction-col">
                    <p><?php the_field('p2_copy'); ?></p>
                </div>
                <div class="spacer-30"></div>
                <?php if( have_rows('p2_touts') ): ?>
                <div class="touts-grid">
                <?php while( have_rows('p2_touts') ): the_row(); 
                    $image = get_sub_field('image');
                    ?>
                    <div class="tout">
                        <p class="lrg"><?php the_sub_field('headline'); ?></p>
                        <?php the_sub_field('copy'); ?>
                    </div>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>      
                <div class="column-33 centered center">
                    <div class="spacer-15"></div>
                    <a href="/contact/" class="btn">Contact an Attorney Today</a>
                </div>         
            </div>
        </div>
    </section>

    <section id="panel-3" class="tan-bg">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2><?php the_field('p3_title'); ?></h2>
                    <p><?php the_field('p3_copy'); ?></p>
                </div>
                <div class="column-50">
                    <h4><?php the_field('p3_callout_title'); ?></h4>
                    <?php if( have_rows('p3_callouts') ): ?>
                    <div class="callouts-grid">
                    <?php while( have_rows('p3_callouts') ): the_row(); 
                        $image = get_sub_field('image');
                        ?>
                        <div class="callout">
                            <p><?php the_sub_field('callout'); ?></p>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?>  
                </div>
            </div>
        </div>
    </section>

    <section id="panel-1-1">
        <div class="tan-bg" id="main-content">
            <div class="container">
                <div class="columns intro-firm-values">
                    <div class="column-50 direction-col">
                        <h2><?php the_field('p_11_title'); ?></h2>
                        <h4><?php the_field('p_11_sub_title'); ?></h4>
                        <div class="tout-box alt"> 
                        <a href="<?php the_field('p_11_when_to_contact_link'); ?>" target="_blank">
                            <p><?php the_field('p_11_when_to_contact_copy'); ?></p><img src="/wp-content/uploads/2022/12/bubble-arrow-right.svg" alt="" class="tout-arrow">
                        </a>
                    </div>
                    </div>
                    <div class="column-50 direction-col">
                        <?php the_field('p11_copy'); ?>
                    </div>
                </div>
                <div class="spacer-60"></div>
                <?php if( have_rows('p11_firm_values') ) : $count = 0;?>
                <div class="columns firm-values">
                    <?php while( have_rows('p11_firm_values') ) : the_row(); $count++;
                    $icon = get_sub_field('icon'); ?>
                    <div class="value column-33 direction-col">
                        <img src="<?php _e( $icon['url'] ); ?>" title="<?php _e( $icon['title'] ); ?>" alt="<?php _e( $icon['alt'] ); ?>" />
                        <h4 class="title"><?php the_sub_field('title'); ?></h4>
                        <p class="intro-text"><?php the_sub_field('intro_text'); ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <div class="columns">
                    <h2>Recent News for Survivors</h2>

                    <?php if( have_rows('news_recent_news') ): ?>
                    <div class="featured-posts-container grid">
                    <?php while( have_rows('news_recent_news') ): the_row(); ?>

                        <article class="featured-post link-finder">
                            <?php 
                            $image = get_sub_field('image');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                            <div class="copy">
                                <h3 class="blog-title"><a href="<?php the_sub_field('link'); ?>" title="learn more about <?php the_sub_field('title'); ?>" target="_blank"><?php the_sub_field('title'); ?></a></h3>
                            </div>
                        </article>
                    
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>  
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-4" class="dk-teal-bg">
        <div class="container">
            <div class="columns">
                <div class="column-100 center awards-copy">
                    <div class="columns">
                        <div class="column-50">
                            <h2><?php the_field('awards_title', 'options'); ?></h2>
                        </div>
                        <div class="column-50">
                            <p> <?php the_field('awards_copy', 'options'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part('block', 'awards-slider'); ?>
    </section>

</main>

<?php get_footer();?>