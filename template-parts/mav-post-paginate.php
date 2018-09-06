<?php
/**
 * @package mavericktheme
 * Template part: Post paginate links
 */

echo '<div id="mavid-paginate-links" class="mav-paginate-links-wrapper">';
    echo '<div class="mav-paginate-links-ctn">';
            $mav_args = array(
                'prev_text'          => __( 'Trang trước', 'mavericktheme' ),
                'next_text'          => __( 'Trang sau', 'mavericktheme' ),
                'before_page_number' => '',
                'after_page_number'  => ''
            );
            echo paginate_links( $mav_args );
    echo '</div>';
echo '</div>';