<?php


if ( ! defined( 'ABSPATH' ) ) { exit; }

class PostTitleIconShowIcon
{
    public static function get_icon_after_title($title, $id)
    {
        global $wpdb;
        $post_icon = PostTitleIconDbData::get_post_icon($id);
        if($post_icon) {
            $icon_id = $post_icon[0]->icon_id;
            $float = $post_icon[0]->float;
            $icon = PostTitleIconDbData::get_single_icon($icon_id);
            if(in_the_loop()) {
               $title .= '<span style="float:'.$float.'" class="'.$icon[0]->icon.'"></span>';
            }
        }
        return $title;
    }
}

?>
