<?php


if ( ! defined( 'ABSPATH' ) ) { exit; }

class PostTitleIconAdmin
{
    public static function adminMenu()
    {
        add_options_page('Post icon', 'Post icon', 'manage_options', 'Post icon', array('PostTitleIconAdmin', 'admin'));
    }

    public static function admin()
    {
        global $wpdb;

        $icons = PostTitleIconDbData::get_icons();

        $post_types = get_post_types();

        if(isset($_POST['save'])){
            $icon = isset($_POST['icon']) ? $_POST['icon'] : null;
            $titles_ids = isset($_POST['postID']) ? $_POST['postID'] : null;
            $float = isset($_POST['float']) ? $_POST['float'] : null;

            if(empty($icon)) {
                echo '<div id="message" class="error"><p>Error! Select the icon.</p></div>';
            }
            if(empty($float)){
                echo '<div id="message" class="error"><p>Error! Сhoose the position of the icons.</p></div>';
            }
            if(!empty($titles_ids)) {
                foreach ($titles_ids as $value) {
                    $post_icon = PostTitleIconDbData::get_post_icon($value);
                    if($post_icon) {
                        $update = PostTitleIconDbData::update_title_icon($icon, $float, $value);
                        if($update) {
                            echo '<div id="message" class="updated fade"><p>Success! One Post title icon update.</p></div>';
                            unset($titles_ids[array_search($value,$titles_ids)]);
                        }
                    }
                }
            }else {
                echo '<div id="message" class="error"><p>Error! Select the posts.</p></div>';
            }
            if(!empty($icon) && !empty($titles_ids) && !empty($float)) {
                $result = PostTitleIconDbData::save_title_icon($icon, $titles_ids, $float);
            }

            if(!empty($result)){
              echo '<div id="message" class="updated fade"><p>Success! Сhanges saved.</p></div>';
            }
        }
        include plugin_dir_path(__FILE__).'../templates/admin.php';
    }

}
?>
