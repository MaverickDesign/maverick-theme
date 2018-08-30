<?php
/**
 * @package mavericktheme
 */
?>

<!-- Header Site Search -->
<section id="mavid-sec-site-search" class="mav-site-search-wrapper">
    <div class="mav-site-search-ctn">
        <form id="mavid-site-search" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( __( 'Nhập từ khóa cần tìm...' , 'mavericktheme' ), 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( __( 'Tìm theo từ khóa' , 'mavericktheme' ) , 'label' ) ?>" class="mav-search-input"/>
            <button type="submit" title="<?php _e( 'Tìm kiếm' , 'mavericktheme' ); ?>" class="mav-btn-secondary"><i class="fas fa-search"></i></button>
        </form>
    </div>
</section>