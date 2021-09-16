<?php
class SliderSection { 
    
    public static function frontpageSlider() { ?>
<!-- Slider main container Start -->

<div class="section section-fluid bg-white">
    <div class="container-fluid" style="padding: 0;">
        <div class="home3-slider swiper-container">
            <div class="swiper-wrapper">
                <?php 
                 $args = array(
                    'post_type' => 'fp_images',
                    'posts_per_page' => 10,
                    'orderby'   => 'date',
                    'order' => 'ASC',
                );
   
 
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
                ?>
                
                <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="<?php echo the_post_thumbnail_url($loop->ID,'full'); ?>" >
                    <div class="container">
                        <div class="slider_p1"><?php echo esc_attr( get_post_meta( get_the_ID(), 'slider_fp', true ) ); ?></div>
                        <div class="slider_p2"><?php echo esc_attr( get_post_meta( get_the_ID(), 'slider_fp2', true ) ); ?></div>

                        <?php 
                        $cat_boxes = null;
                        $cat_links = null; 
                        esc_attr( get_post_meta( get_the_ID(), 'category1', true ) ) ? $cat_boxes[] = esc_attr( get_post_meta( get_the_ID(), 'category1', true ) ) :"";
                        esc_attr( get_post_meta( get_the_ID(), 'category2', true ) ) ? $cat_boxes[] = esc_attr( get_post_meta( get_the_ID(), 'category2', true ) ) :"";
                        esc_attr( get_post_meta( get_the_ID(), 'category3', true ) ) ? $cat_boxes[] = esc_attr( get_post_meta( get_the_ID(), 'category3', true ) ) :"";
                        esc_attr( get_post_meta( get_the_ID(), 'category4', true ) ) ? $cat_boxes[] = esc_attr( get_post_meta( get_the_ID(), 'category4', true ) ) :"";
                        
                        esc_attr( get_post_meta( get_the_ID(), 'category1_link', true ) ) ? $cat_links[] = esc_attr( get_post_meta( get_the_ID(), 'category1_link', true ) ) :"";
                        esc_attr( get_post_meta( get_the_ID(), 'category2_link', true ) ) ? $cat_links[] = esc_attr( get_post_meta( get_the_ID(), 'category2_link', true ) ) :"";
                        esc_attr( get_post_meta( get_the_ID(), 'category3_link', true ) ) ? $cat_links[] = esc_attr( get_post_meta( get_the_ID(), 'category3_link', true ) ) :"";
                        esc_attr( get_post_meta( get_the_ID(), 'category4_link', true ) ) ? $cat_links[] = esc_attr( get_post_meta( get_the_ID(), 'category4_link', true ) ) :"";
                        $count_cat = count($cat_boxes); 
                        // var_dump($cat_boxes);
                        // echo  $count_cat; 
                        
                        ?>
                        <div class="row slide_cat"> 
                            <?php for ($x = 0; $x <= $count_cat-1; $x++) { ?>
                            <div class="d-flex justify-content-around"><a href="<?php echo $cat_links[$x]; ?>"><?php echo $cat_boxes[$x]; ?></a></div>
                        <?php }
                        ?>
                        </div>
                    </div>
                </div>
                <   
    <?php }?>
             

<!--                <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="https://eishesstyle.brainstorm.rs/wp-content/uploads/2020/10/irina-banner-2.jpg">-->
<!--                    <div class="container">-->
<!--                        <div class="home3-slide-content">-->
<!--                            <h5 class="sub-title">Handicraft shop</h5>-->
<!--                            <h2 class="title">Decorative Box <br>for New Aspiration</h2>-->
<!--                            <div class="link"><a href="shop.html" class="btn btn-black btn-hover-primary">shop now</a></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <div class="home3-slider-prev swiper-button-prev"><i class="ti-angle-left"></i></div>
            <div class="home3-slider-next swiper-button-next"><i class="ti-angle-right"></i></div>
        </div>
    </div>
</div>
<!-- Slider main container End -->

<?php 
//end of frontpage slider
    }
       public static function bannerSlider() { ?>
 <!-- Page Title/Header Start -->
    <div class="home3-slider swiper-container" style="height:100%;">
     <div class="swiper-wrapper">
                <?php 
                 $args = array(
                    'post_type' => 'fp_images',
                    'posts_per_page' => 10,
                    'orderby'   => 'date',
                    'order' => 'ASC',
                );
   
 
    //the loop
                 $page_name= ( is_shop() || is_product_category() || is_product_tag() || is_product_brand() )  ? "Trgovina" : get_the_title();
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
                ?>
                <div class="page-title-section section swiper-slide" data-swiper-autoplay="5000" data-bg-image="<?php echo the_post_thumbnail_url('shopbanner'); ?>" style="height:100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col">

                                <div class="page-title">
                                    <h1 class="title">Pozovite nas</h1>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active"><?php echo $page_name;?></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
         
          <?php }?>
           </div>
         </div>
    <!-- Page Title/Header End -->
<?php 
//end of banner slider
    }
//end of class
                            }
add_shortcode( 'headerSlider', array( 'SliderSection', 'frontpageSlider' ) );
add_shortcode( 'bannerSliders', array( 'SliderSection', 'bannerSlider' ) );