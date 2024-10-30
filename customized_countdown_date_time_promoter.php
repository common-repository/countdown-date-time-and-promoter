<?php

/*
Plugin Name: Countdown, Date, Time and Promoter
Plugin URI: http://alinursal.com/countdown_date_time_promoter.zip
Description: All in One! Easily create a countdown, a current time, a current date and promoter as a sidebar widget or in a post or page using a shortcode. You can customize text, color, background, label, size and font on your admin page.
Version: 1.0
Author: Ali Nursal
Author URI: http://alinursal.com
License: GPL v2+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


define('CFC_FILE', __FILE__);
define('CFC_PATH', plugin_dir_path(__FILE__));

require CFC_PATH.'include/countdown_date_time_promoter.php';

new countdown_date_time_promoter();



?>