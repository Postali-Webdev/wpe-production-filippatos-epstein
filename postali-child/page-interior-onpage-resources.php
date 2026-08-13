<?php
/**
 * Interior with sidebar
 * Template Name: Interior - Resources 
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<script src="/wp-content/themes/postali-child/assets/js/src/smooth-scroll-custom.js"></script>

<div class="body-container">


    <section id="hero" class="default dk-teal-bg">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-50 intro-container">
                    <p class="subheading-small"><?php the_field('banner_eyebrow'); ?></p>
                    <h1><?php the_title(); ?></h1>
                    <div class="cta-block">
                        <p><?php the_field('banner_cta_copy'); ?></p>
                        <a aria-label="call our office at <?php the_field('actual_phone_number','options'); ?>" title="call our office at <?php the_field('actual_phone_number','options'); ?>" href="tel:<?php the_field('actual_phone_number','options'); ?>" class="btn"><?php the_field('actual_phone_number','options'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content-container">
        <span id="main-content"></span>
    	<div class="container">
            <div class="columns">
                <div class="column-50 sticky">
                    <?php the_field('left_column_content'); ?>

                    <div class="resource-links">
                
                        <?php if( have_rows('content_block') ): ?>
                        <? $i=1; ?>
                        <div class="subheading-small">On This Page:</div>
                        <div class="spacer-15"></div>
                        <ul>
                        <?php while( have_rows('content_block') ): the_row(); ?>  
                            <?php 
                            $title = get_sub_field('on_page_nav_title') ? get_sub_field('on_page_nav_title') : get_sub_field('block_title');
                            if ($title) { ?>
                                <li><a href="#panel_<?php echo $i; ?>"><?php echo $title; ?></a></li>
                            <?php } ?>
                        <?php $i++; ?>
                        <?php endwhile; ?>
                        </ul>
                        <?php endif; ?> 
                    </div>
                </div>
                <div class="column-50 block">
                <?php if( have_rows('content_block') ): ?>
                <?php $n=1; ?>
                <?php while( have_rows('content_block') ): the_row(); ?>  
                    <div class="content-block" id="panel_<?php echo $n; ?>">
                        <h2><?php the_sub_field('block_title'); ?></h2> 

                        <?php if (get_sub_field('content_type') == 'link_boxes') { ?>

                        <?php if( have_rows('link_boxes') ): ?>
                        <?php while( have_rows('link_boxes') ): the_row(); ?>  
                    
                        <div class="link-box">
                        <?php if(!get_sub_field('title')) { ?>

                            <?php $content = get_sub_field('content'); ?>

                            <?php if( have_rows('links') ): ?>
                            <ul>
                            <?php while( have_rows('links') ): the_row(); ?>  
                                
                            <?php if(get_sub_field('link_type') == 'web') { ?>
                                <li class="notitle"><a href="<?php the_sub_field('link'); ?>" target="blank" class="web"><?php echo $content; ?></a><span><img src="/wp-content/uploads/2023/01/drw-chevron-right.svg" alt=""></span></li>
                            <?php } elseif(get_sub_field('link_type') == 'phone') { ?>
                                <li class="notitle"><a href="tel:<?php the_sub_field('link'); ?>" target="blank" class="phone"><?php echo $content; ?></a><span><img src="/wp-content/uploads/2023/01/drw-chevron-right.svg" alt=""></span></li>
                            <?php } ?>
                                
                            <?php endwhile; ?>
                            </ul>
                            <?php endif; ?> 
                    
                        <?php } else { ?>

                            <p><strong><?php the_sub_field('title'); ?></strong></p>
                            <p><?php the_sub_field('content'); ?></p>

                            <?php if( have_rows('links') ): ?>
                            <ul>
                            <?php while( have_rows('links') ): the_row(); ?>  
                                
                            <?php if(get_sub_field('link_type') == 'web') { ?>
                                <li><img src="/wp-content/uploads/2026/04/link-Icon.svg" alt=""><a href="<?php the_sub_field('link'); ?>" target="blank" class="web"><?php the_sub_field('link'); ?></a></li>
                            <?php } elseif(get_sub_field('link_type') == 'phone') { ?>
                                <li><img src="/wp-content/uploads/2026/04/phone-Icon.svg" alt=""><a href="tel:<?php the_sub_field('link'); ?>" target="blank" class="phone"><?php the_sub_field('link'); ?></a></li>
                            <?php } ?>
                                
                            <?php endwhile; ?>
                            </ul>
                            <?php endif; ?> 

                        <?php } ?>


                            
                        </div>

                        <?php endwhile; ?>
                        <?php endif; ?> 

                        <?php } elseif (get_sub_field('content_type') == 'content') { ?>

                            <?php the_sub_field('main_content'); ?>

                        <?php } ?>

                    </div>
                <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
			</div>
		</div>
    </section>

</div>
		
<?php get_footer(); ?>