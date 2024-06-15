<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Juice Center
 */

get_header(); ?>

<div id="content">
  <?php
    $classic_bakery_hidcatslide = get_theme_mod('classic_bakery_hide_categorysec', false);
    $classic_bakery_slidersection = get_theme_mod('classic_bakery_slidersection');

    if ($classic_bakery_hidcatslide && $classic_bakery_slidersection) { ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('classic_bakery_slidersection',false) ) { ?>
          <?php $classic_bakery_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('classic_bakery_slidersection',false)));
            while( $classic_bakery_queryvar->have_posts() ) : $classic_bakery_queryvar->the_post(); ?>
              <div class="slidesection">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');
                  } else{?>
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/images/slider.png" alt=""/>
                <?php } ?>
                <div class="slider-box text-center">
                  <h1><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h1>
                  <?php
                    $classic_bakery_trimexcerpt = get_the_excerpt();
                    $classic_bakery_shortexcerpt = wp_trim_words( $classic_bakery_trimexcerpt, $num_words = 15 );
                    echo '<p class="mt-4">' . esc_html( $classic_bakery_shortexcerpt ) . '</p>';
                  ?>
                  <div class="rsvp_button mt-0 mt-md-3">
                    <?php 
                    $classic_bakery_button_text = get_theme_mod('classic_bakery_button_text', '');
                    $classic_bakery_button_link_slider = get_theme_mod('classic_bakery_button_link_slider', ''); 
                    if (empty($classic_bakery_button_link_slider)) {
                        $classic_bakery_button_link_slider = get_permalink();
                    }
                    if ($classic_bakery_button_text || !empty($classic_bakery_button_link_slider)) { ?>
                      <?php if(get_theme_mod('classic_bakery_button_text','') != ''){ ?>
                        <a href="<?php echo esc_url($classic_bakery_button_link_slider); ?>">
                          <?php echo esc_html($classic_bakery_button_text); ?>
                          <span class="screen-reader-text"><?php echo esc_html($classic_bakery_button_text); ?></span>
                        </a>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php
  $juice_center_product_cat = get_theme_mod('juice_center_product_cat', false);
  $juice_center_hot_products_cat = get_theme_mod('juice_center_hot_products_cat');

  if ($juice_center_product_cat && $juice_center_hot_products_cat) { ?>
    <section id="product_cat_slider" class="my-5">
      <div class="container">
        <div class="product-head-box px-lg-5 px-md-2">
          <?php if ( get_theme_mod('juice_center_product_title') != "") { ?>
            <h2 class="text-center"><?php echo esc_html(get_theme_mod('juice_center_product_title','')); ?></h2>
          <?php }?>
          <?php if ( get_theme_mod('juice_center_product_text') != "") { ?>
            <p class="mb-4 text-center"><?php echo esc_html(get_theme_mod('juice_center_product_text','')); ?></p>
          <?php }?>
        </div>
        <div class="row">
          <?php if(class_exists('woocommerce')){
            $args = array(
              'post_type' => 'product',
              'posts_per_page' => 50,
              'product_cat' => get_theme_mod('juice_center_hot_products_cat'),
              'order' => 'ASC'
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
              <div class="page4box col-lg-4 col-md-4 mb-5">
                <div class="product-image">
                  <?php
                    if (has_post_thumbnail( $loop->post->ID )) {
                      echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                    } else {
                      echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" alt="" />';
                    }
                  ?>
                  <div class="box-content text-center mb-3">
                    <h3 class="product-text my-2">
                      <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                        <?php the_title(); ?>
                      </a>
                    </h3>
                    <span class="price"><?php echo $product->get_price_html(); ?></span>
                    <div class="pro-icons">
                      <div class="d-flex align-items-center justify-content-center">
                        <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                        <?php if(defined('YITH_WCWL')){ ?>
                        <a class="wishlist_view ms-2 d-flex" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>" title="<?php esc_attr_e('Wishlist','juice-center'); ?>"><i class="far fa-heart"></i>
                        </a>
                      <?php }?>  
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            <?php endwhile; 
            wp_reset_query();
          }?>
        </div>
      </div>
    </section>
  <?php } ?>
</div>

<?php get_footer(); ?>
