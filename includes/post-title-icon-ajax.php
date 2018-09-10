<?php



if ( ! defined( 'ABSPATH' ) ) { exit; }

class PostTitleIconAjax
{
    public function get_posts()
    {
        $type = $_POST['type_post'];

        $post_list = get_posts(array('post_type' => $type));

        if($post_list){
            wp_send_json_success($post_list);
        }else{
            $message ='Posts not found';
            wp_send_json_error($message);
        }
    }
}
