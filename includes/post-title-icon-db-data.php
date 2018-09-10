<?php



if ( ! defined( 'ABSPATH' ) ) { exit; }

class PostTitleIconDbData
{
    public static function save_title_icon($icon, $postlist, $float)
    {
        global $wpdb;

        foreach ($postlist as $value) {
            $result = $wpdb->insert($wpdb->prefix.'post_title_icons' ,array('icon_id' => $icon, 'post_id' => $value,
                                                                            'float' => $float));
        }
        return $result;
    }

    public static function update_title_icon($icon, $float, $post_id)
    {
        global $wpdb;

        $result = $wpdb->update($wpdb->prefix.'post_title_icons', array('icon_id' => $icon, 'float' => $float),
                                                                  array('post_id' => $post_id));
        return $result;
    }

    public static function get_single_icon($icon_id)
    {
        global $wpdb;

        $result = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}title_icons` WHERE `id`={$icon_id}");

        return $result;
    }

    public static function get_icons()
    {
        global $wpdb;

        $result = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}title_icons`");

        return $result;
    }

    public static function get_post_icon($id)
    {
        global $wpdb;

        $result = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}post_title_icons` WHERE `post_id` = {$id}");

        return $result;
    }
}
?>
