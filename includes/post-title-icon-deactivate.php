<?php


if ( ! defined( 'ABSPATH' ) ) { exit; }

class PostTitleIconDeactivate
{
    public static function deactivate()
    {
        global $wpdb;

        $wpdb -> query("DROP TABLE `{$wpdb->prefix}title_icons`");
        $wpdb -> query("DROP TABLE `{$wpdb->prefix}post_title_icons`");
    }
}
?>
