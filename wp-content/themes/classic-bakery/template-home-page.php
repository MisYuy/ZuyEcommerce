<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Bakery
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
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt=""/>
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
  $classic_bakery_procat_show = get_theme_mod('classic_bakery_procat_show', false);

  if ($classic_bakery_procat_show != "") { ?>
    <section id="product_cat_slider">
      <div class="container">
        <div class="owl-carousel">
          <?php if(class_exists('woocommerce')){ ?>
            <?php
              $classic_bakery_prod_categories = get_terms( 'product_cat', array(
                'number'     => get_theme_mod('classic_bakery_product_category_number'),
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => 0
              ));
              foreach( $classic_bakery_prod_categories as $classic_bakery_prod_cat ) :
                $classic_bakery_cat_thumb_id = get_term_meta( $classic_bakery_prod_cat->term_id, 'thumbnail_id', true );
                $classic_bakery_cat_thumb_url = wp_get_attachment_thumb_url( $classic_bakery_cat_thumb_id );
                $classic_bakery_term_link = get_term_link( $classic_bakery_prod_cat, 'product_cat' );
              ?>
              <div class="product_cat_box text-center py-5 px-3">
                <a href="<?php echo esc_url($classic_bakery_term_link); ?>"><img src="<?php echo esc_url($classic_bakery_cat_thumb_url); ?>" alt="<?php echo esc_html($classic_bakery_prod_cat->name); ?>" /></a>
                <a href="<?php echo esc_url($classic_bakery_term_link); ?>"><h2 class="pt-3"><?php echo esc_html($classic_bakery_prod_cat->name); ?></h2></a>
              </div>
            <?php endforeach; wp_reset_query(); ?>
          <?php }?>
        </div>
      </div>
    </section>
  <?php } ?>

  <section class="py-4">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  <section>
</div>

<?php get_footer(); ?>
