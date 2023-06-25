<?php
get_header(); 
?>

<section id="slider" class="container-fluid">
  <div class="row">
      <div class="col-12 px-0">
          <div id="slider-carousel">
          <?php
              // Arguments
              $args = array(
                  'posts_per_page' => -1,
                  'post_type' => 'slider',
                  'order' => "ASC"
              );

              // The Query
              $the_query = new WP_Query( $args );

              // The Loop
              if ( $the_query->have_posts() ) {

                  while ( $the_query->have_posts() ) {
                      $the_query->the_post(); ?>
                          <div class="slider-carousel-item">
                            <?php // eather link or url for inserting further  
                            $link_or_url = (get_field('link')) ? esc_url(get_field('link')) : ( get_field('url') ? esc_url(get_field('url')) : '' ) ; ?>

                            <?php if ( get_field('video_file') ) { ?>
                              <?php echo ($link_or_url) ? '<a href="' . esc_url($link_or_url) . '">' : '' ; ?>
                                <video autoplay muted>
                                  <source src="<?php echo esc_url( get_field('video_file') ); ?>" type="video/mp4">
                                  Your browser does not support the video tag.
                                </video>
                              <?php echo ($link_or_url) ? '</a>' : '' ; ?>
                            <?php } else if ( has_post_thumbnail() ) { 
                                  $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
                                  <?php echo ($link_or_url) ? '<a href="' . esc_url($link_or_url) . '">' : '' ; ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php echo esc_html($alt); ?>" loading="lazy" />
                                  <?php echo ($link_or_url) ? '</a>' : '' ; ?>
                              <?php } else { ?>
                                <?php echo ($link_or_url) ? '<a href="' . esc_url($link_or_url) . '">' : '' ; ?>
                                  <img  src="<?php echo get_template_directory_uri() . "/assets/images/placeholder.jpg"?>" alt="placeholder" loading="lazy" />
                                <?php echo ($link_or_url) ? '</a>' : '' ; ?>
                              <?php } ?> 
                              <div class="slider-carousel-item--content">
                                <?php if ( get_field('show_title') == true ) { ?>
                                <h1><?php the_title(); ?></h1>
                                <?php } ?>
                                <?php the_content(); ?>
                              </div>
                          </div>
                      <?php
                  }
              } 
              /* Restore original Post Data */
              wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>   

<section class="container-fluid items">
    <div class="row gx-4">
        <div class="col-12">
            <h2 class="items--header">Lorem ipsum dolor sit amet.</h2>
        </div>
        <?php
            // Arguments
            $args = array(
                'posts_per_page' => 3,
                'post_type' => 'post'
            );

            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {

                while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>
                        <div class="col-12 col-xl-4">
                            <div class="items--item">
                                <?php if ( has_post_thumbnail() ) { 
                                    $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
                                        <img class="items--item--image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php echo esc_html($alt); ?>" loading="lazy" />
                                <?php } else { ?>
                                    <img class="items--item--image" src="<?php echo get_template_directory_uri() . "/assets/images/placeholder.jpg"?>" alt="placeholder" loading="lazy" />
                                <?php } ?>

                                <h3 class="items--item--title"><?php the_title(); ?></h3>

                                <?php if ( get_field('subtitle') ) { ?>
                                    <p class="items--item--subtitle"><?php echo esc_html( get_field('subtitle') ); ?></p>
                                <?php } ?>

                                <div class="items--item--content">
                                    <?php echo esc_html( wp_trim_words( get_the_content(), 25 ) ); ?>
                                    <a class="items--item--content--link" href="<?php the_permalink(); ?>">Link</a>
                                </div>
                                

                                
                            </div>


                        </div>
                    <?php
                }
            } 
            /* Restore original Post Data */
            wp_reset_postdata(); ?>
    </div>
</section>

<section class="gallery">

        <?php
            // Arguments
            $args = array(
                'posts_per_page' => 5,
                'post_type' => 'gallery_image',
                'order' => 'ASC'
            );

            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {

                while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>

                        <div class="gallery--item">
                            <?php if ( has_post_thumbnail() ) { 
                                $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
                                    <a class="fancybox-image" href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" data-fancybox="gallery" data-caption="<?php echo esc_html($alt); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php echo esc_html($alt); ?>" loading="lazy" />
                                    </a>
                            <?php } else { ?>
                                <a class="fancybox-image" href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" data-fancybox data-caption="<?php echo esc_html($alt); ?>">
                                    <img src="<?php echo get_template_directory_uri() . "/assets/images/placeholder.jpg"?>" alt="placeholder" loading="lazy" />
                                </a>
                            <?php } ?>

                        </div>
                    <?php
                }
            } 
            /* Restore original Post Data */
            wp_reset_postdata(); ?>
    <div class="gallery--content container-fluid">
        <h2 class="gallery--content--title">Fancybox images</h2>
        <p class="gallery--content--text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <strong>Excepteur sint occaecat cupidatat non proident,</strong> sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</section>

<?php
get_footer(); 
?>