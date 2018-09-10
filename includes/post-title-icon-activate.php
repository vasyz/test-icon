<?php



if ( ! defined( 'ABSPATH' ) ) { exit; }

class PostTitleIconActivate
{
    public static function activate()
    {
        global $wpdb;

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        dbDelta("CREATE TABLE `{$wpdb->prefix}title_icons` (
               `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
               `icon` VARCHAR(255) NOT NULL,
                PRIMARY KEY(`id`))");

        dbDelta("CREATE TABLE `{$wpdb->prefix}post_title_icons` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `icon_id` INT(11) NOT NULL,
                `post_id` INT(11) NOT NULL,
                `float` VARCHAR(255) NOT NULL,
                PRIMARY KEY(`id`))");

        dbDelta("INSERT INTO `{$wpdb->prefix}title_icons` (`id`, `icon`)
                VALUES ('1', 'dashicons dashicons-tablet'),
                       ('2', 'dashicons dashicons-admin-page'),
                       ('3', 'dashicons dashicons-admin-media'),
                       ('4', 'dashicons dashicons-admin-site'),
                       ('5', 'dashicons dashicons-admin-generic'),
                       ('6', 'dashicons dashicons-admin-home'),
                       ('7', 'dashicons dashicons-admin-appearance'),
                       ('8', 'dashicons dashicons-media-default'),
                       ('9', 'dashicons dashicons-format-video'),
                       ('10', 'dashicons dashicons-admin-multisite'),
                       ('11', 'dashicons dashicons-controls-volumeon'),
                       ('12', 'dashicons dashicons-editor-paste-word'),
                       ('13', 'dashicons dashicons-lock'),
                       ('14', 'dashicons dashicons-analytics'),
                       ('15', 'dashicons dashicons-cloud');");
    }
}
?>
