<?php
/*
    Plugin Name: DesVert Core
    Plugin URI: https://redoyit.com/
    Description: <code>DesVert Core</code> by <code>Md. Redoy Islam</code> is a powerful WordPress plugin designed to extend the platform’s functionality with advanced content management features. With this plugin, you can create and manage <code>Custom Post Types</code> tailored to your needs, enhancing content organization through <code>Custom Taxonomies</code>. The Custom Post Column feature allows you to add and display additional data in the admin panel for better post management. Display posts seamlessly on your site with customizable templates using the Display Post feature. Additionally, <code>Custom Post Meta Fields</code> enable you to store and manage extra information for your posts, providing a comprehensive solution for advanced WordPress content management.
    Version: 1.2
    Requires at least: 5.8
    Requires PHP: 5.6.20
    Author: Md. Redoy Islam
    Author URI: https://redoyit.com/wordpress-plugins/
    License: GPLv2 or later
    Text Domain: desvertcore
    Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define('DVCORE_DIR', plugin_dir_url(__FILE__));
define('DVCORE_ASSETS_PUBLIC_JS_DIR', DVCORE_DIR.'js/');
define('DVCORE_ASSETS_PUBLIC_CSS_DIR', DVCORE_DIR.'css/');
define('DVCORE_VERSION', time());

class DesVertCore{
    private $version;
    function __construct(){
        $this->version = time();
        add_action('plugin_loaded', array($this, 'desvertcore_load_textdomain'));
        add_action('wp_enqueue_scripts', array($this, 'load_front_assets'));
    }
    function load_front_assets(){
        wp_enqueue_script('icons', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js', null, $this->version, true);
    }
    function desvertcore_load_textdomain(){ 
        load_plugin_textdomain('desvertcore', false, dirname(__FILE__) . '/languages');
    }
}
new DesVertCore();

require_once plugin_dir_path(__FILE__)."tgm/class-tgm-plugin-activation.php";
require_once plugin_dir_path(__FILE__)."tgm/config-tgm.php";

require_once plugin_dir_path(__FILE__)."widgets/widgets.php";

require_once plugin_dir_path(__FILE__)."inc/education.php";
require_once plugin_dir_path(__FILE__)."inc/experience.php";
require_once plugin_dir_path(__FILE__)."inc/projects.php";
require_once plugin_dir_path(__FILE__)."inc/service.php";
require_once plugin_dir_path(__FILE__)."inc/shortcode.php";
require_once plugin_dir_path(__FILE__)."post-type/post-type.php";
require_once plugin_dir_path(__FILE__)."post-type/taxonomies.php";
