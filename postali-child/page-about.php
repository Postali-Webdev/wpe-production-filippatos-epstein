<?php
/**
 * Template Name: About Us
 * @package Postali Child
 * @author Postali LLC
**/

// ACF Fields
$p1_image = get_field('p1_team_photo');
$cases_group = get_field('p1_cases_won');

get_header();?>

<main id="page">

<section id="hero" class="default dk-teal-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full direction-col">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                <h4><?php the_field('hero_sub_title'); ?></h4>
                <h1><?php the_field('hero_title'); ?></h1>
            </div>
        </div>
    </div>
</section>

<section id="panel-1">
    <div class="container attorney-slide-wrapper">
        <div class="columns">
            <div class="column-full">
                
                <?php /* Block: Attorney Slider */

                $args = [
                    'post_type' => 'attorneys',
                    'post_status' => 'publish',
                    'posts_per_page'     => -1
                ];

                $attorney_query = new WP_Query($args);

                if( $attorney_query->have_posts() ) : ?>

                <a href="https://www.filippatoslaw.com/about/" target="blank" class="single-attorney careers-link">
                    <span class="career-title">Meet The Team</span>
                    <span class="btn">All Attorneys</span>
                </a>

                <div id="attorney-slider">
                    <?php while( $attorney_query->have_posts() ) : $attorney_query->the_post(); 
                        // ACF Fields
                        $attorney_img = get_field('attorney_image');
                        $middle_initial = get_field('middle_initial') ? " " . get_field('middle_initial') . " " : " ";
                        $attorney_name = get_field('first_name') . $middle_initial . get_field('last_name');
                        $attorney_id = strtolower(str_replace([' ', '.'], ['-', ''], $attorney_name));
                    ?>
                    <a class="single-attorney" id="single-attorney-<?php esc_html_e($attorney_id); ?>" href="<?php _e( get_the_permalink() ); ?>" >
                            <div class="attorney-wrap">
                                <img class="attorney-img" src="<?php _e( $attorney_img['url'] ); ?>" title="<?php _e( $attorney_img['title'] ); ?>" alt="<?php _e( $attorney_img['alt'] ); ?>" />
                                <p class="name"><?php _e( $attorney_name ); ?></p>
                                <p class="title"><?php the_field('job_title'); ?></p>
                            </div>
                    </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
</section>

<section id="panel-2" class="tan-bg">
    <span id="main-content"></span>
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <?php the_field('p1_copy'); ?>
            </div>
            <div class="column-50">
                <img src="<?php _e($p1_image['url']); ?>" alt="<?php _e($p1_image['alt']); ?>" title="<?php _e($p1_image['title']); ?>">
            </div>
        </div>
        <?php get_template_part('block', 'cases-won', [ 'data' => ['copy' => $cases_group['copy']] ]); ?>
    </div>
</section>

<section id="panel-3" class="dk-teal-bg">
    <div class="container">
        <div class="columns">
            <div class="column-75 center">
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