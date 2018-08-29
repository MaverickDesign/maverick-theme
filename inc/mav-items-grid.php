<?php
/**
 * @package maverick-theme
 */

function mavf_items_grid($mav_args)
{
    // ul css class
    $mavUlClass = isset($mav_args['ul_class'])   ? $mav_args['ul_class']  : 'mav-items-grid-ctn';
    // li css class
    $mavLiClass = isset($mav_args['li_class'])   ? $mav_args['li_class']  : 'mav-items-grid-item-ctn';

    $mavColumns = isset($mav_args['columns'])     ? $mav_args['columns']    : 3;

    // Get content from JSON data
    $mavItems = json_decode($mav_args['items'], true);

    // Get total items
    $mavTotalItems = count($mavItems['items']);
    // Calculate number of rows
    $mavNumberOfRow = ceil($mavTotalItems / $mavColumns);
    // Calculate last row items
    $mavLastRowItems = $mavTotalItems - (($mavNumberOfRow-1)*$mavColumns);

    $mavRow = 'top-single';

    // Start ul element
    printf(
        '<ul class="%1$s mav-mobile-ctn" style="grid-template-columns: repeat(%2$s,1fr);">',
        $mavUlClass, $mavColumns
    );

    for ($i = 0; $i < $mavTotalItems; $i++) {
        if ($mavTotalItems > $mavColumns) {
            switch ($mavRow) {
            case ($i+1) <= $mavColumns:
                $mavRow = 'top';
                break;

            case $mavTotalItems - ($i) <= $mavLastRowItems:
                $mavRow = 'bottom';
                break;

            default:
                $mavRow = 'middle';
                break;
            }
        }

        $mavLastTopRow = ($i+1 == $mavColumns) ? ' data-position="top-right"' : '';
        $mavFirstLastRowItem = ($mavTotalItems - ($i) == $mavLastRowItems) ? ' data-position="bottom-left"' : '';

        if ($i % $mavColumns == 0) {
            $mavLeftCol = 'data-column="left"';
        } else {
            $mavLeftCol = '';
        };

        // Start li element
        printf(
            '<li class="%1$s %2$s" data-row="%2$s"%3$s%4$s%5$s>',
            $mavLiClass, $mavRow, $mavLastTopRow, $mavFirstLastRowItem, $mavLeftCol
        );
        foreach ($mavItems['items'][$i] as $key => $value) {
            printf(
                '<div data-type="%1$s" class="mav-text-center">%2$s</div>',
                $key, $value
            );
        }
        echo '</li>';
    }
    echo '</ul>';
}