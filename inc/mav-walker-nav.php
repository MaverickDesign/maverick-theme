<?php
/**
 * @package mavericktheme
 */

class Mav_Walker_Nav_Primary extends Walker_Nav_Menu
{
    /**
     * Start ul element
     */
    function start_lvl( &$output, $depth = 0, $args = Array() )
    {

        $indent = str_repeat( "\t", $depth );
        $submenu = ( $depth > 0 ) ? ' sub-menu' : '';
        $depth_number = (int) $depth + 1;
        $mav_unique = rand();
        $output .= "\n$indent<ul id=\"mavid-sub-menu-$mav_unique\" class=\"mav-sub-menu$submenu\" data-unique=\"$mav_unique\" data-lvl=\"$depth_number\" data-state=\"close\">\n";

    }

    /**
     * Start li,a,span element
     *
     * @param [type] $output
     * @param [type] $item
     * @param integer $depth
     * @param [type] $args
     * @param integer $id
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 )
    {

        $indent = str_repeat( "\t", $depth );
        $li_attributes = '';
        $class_names = $value = '';
        $depth_number = (int) $depth + 1;

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = ( $args->walker->has_children ) ? 'dropdown' : '';
        $classes[] = ( $item->current || $item->current_item_ancestor ) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if ( $depth && $args->walker->has_children ) {
            $classes[] = 'mav-dropdown-submenu mav-dropdown__submenu';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="'.esc_attr( $class_names ).'"';

        $id = apply_filters( 'nav_menu_item_id', 'mavid-menu-item-'.$item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="'.esc_attr( $id ).'"' : '';

        // Start li element
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . ' data-lvl="'.$depth_number.'"'.'>';

        $attributes  = !empty( $item->attr_title )    ? ' title="'.esc_attr( $item->attr_title ).'"'    : ' title="'.__( 'Đến trang ', 'mavericktheme').apply_filters( 'the_title', $item->title, $item->ID ).'"';
        $attributes .= !empty( $item->target )        ? ' target="'.esc_attr( $item->target ).'"'       : '';
        $attributes .= !empty( $item->xfn )           ? ' rel="'.esc_attr( $item->xfn ).'"'             : '';
        $attributes .= !empty( $item->url )           ? ' href="'.esc_attr( $item->url ).'"'            : '';

        $attributes .= ( $args->walker->has_children ) ? ' class="mav-submenu-link" data-state="close"' : '';

        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= ( $depth >= 0 && $args->walker->has_children ) ? '<span class="mav-submenu-icon mav-submenu__icon" data-state="close" data-lvl="'.$depth_number.'"></span></a>' : '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output , $item, $depth, $args );
    }
}