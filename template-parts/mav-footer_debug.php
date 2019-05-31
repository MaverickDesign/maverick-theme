<?php
/**
 * @package mavericktheme
 */

/**
 * For Debug Only
 */
printf(
    '<section id="mavid-session-info" data-id="%1$s" data-start="%2$s">',
    $_SESSION['mavs_id'], $_SESSION['mavs_start']
    );
    printf('<div>');
        printf('<ul>');
            printf('<li>Session ID: %1$s</li>', $_SESSION['mavs_id']);
            printf('<li>Session start: %1$s</li>', date('Y/m/d H:i:s',$_SESSION['mavs_start']));
            echo '<li>Now is: '.date('Y/m/d H:i:s',$_SERVER['REQUEST_TIME']).'</li>';
            $mavDuration = $_SERVER['REQUEST_TIME'] - $_SESSION['mavs_start'];
            echo '<li>Session last: '.date('H:i:s',$mavDuration).'</li>';
        echo '</ul>';
    echo '</div>';
echo '</section>';