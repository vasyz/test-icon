<?php
/*
Plugin Name: post-icon-dim
Description: test.
Version: 0.0.3
Author: Bartosh Dmitriy
*/

class PostTitleIcon
{	  public function enqueue()
    {
        wp_enqueue_style('wp_pti_styles', plugins_url('/assets/style.css', __FILE__));
        wp_enqueue_script('wp_pti_scripts', plugins_url('/assets/script.js', __FILE__));
    }
	private function includes()
    {
        require_once 'includes/post-title-icon-activate.php';
        require_once 'includes/post-title-icon-deactivate.php';
        require_once 'includes/post-title-icon-admin.php';
        require_once 'includes/post-title-icon-db-data.php';
        require_once 'includes/post-title-icon-show-icon.php';
        require_once 'includes/post-title-icon-ajax.php';
    }
    public function __construct()
    {
        global $wpdb;

        $this->includes();

        register_activation_hook(__FILE__, array('PostTitleIconActivate', 'activate'));
        register_deactivation_hook(__FILE__, array('PostTitleIconDeactivate', 'deactivate'));
        add_action('admin_menu', array('PostTitleIconAdmin', 'adminMenu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));

        add_action('wp_ajax_get_posts', array('PostTitleIconAjax', 'get_posts' ));
        add_action('wp_ajax_nopriv_get_posts', array('PostTitleIconAjax', 'get_posts' ));

        add_filter('the_title', array('PostTitleIconShowIcon', 'get_icon_after_title'), 10, 2);
    }



  
}

$postTitleIcon = new PostTitleIcon();
?>
