<?php
/*
Plugin Name: Календарь экзаменов
Description: Календарь экзаменов для сайта цок
Author: Stone
Text Domain: calendar
Version: 0.1
*/
/** Step 2 (from text above). */
/** Step 1. */
define("CALENDAR_DIR", plugin_dir_path(__FILE__));
include CALENDAR_DIR.'controller/CalendarController.php';
include CALENDAR_DIR.'Controller/AdminController.php';
include CALENDAR_DIR.'Controller/ShortCodeController.php';
class Route
{
    protected $smarty;
    function __construct()
    {
        add_action( 'admin_menu', [$this,'addMenu']);
        add_shortcode( 'calendar', [$this,'ShortCode'] );
    }
    function addMenu() {
        // создаем пункт меню и ссылаемся на метод
            add_menu_page( 'Календарь экзаменов',
            'Экзамены',
            'manage_options',
            'calendar.php',
             [$this,'menu'],
            'dashicons-calendar-alt',
            30 );
    }
    /** Step 3. */
    function Menu() {
             $cont = new AdminController();
             if(!empty($_GET['dateSet']))
             {
                 $cont->store($_GET['dateSet']);
             }
                $this->adminStyle();
                $this->adminJs();
                $cont->index();
    }
    function ShortCode()
    {
        global $post;
        if(has_shortcode($post->post_content, 'calendar'))
        {
            $cont = new ShortCodeController();
            $this->adminStyle();
            $this->clientJs();
            return $cont->index();
        }
    }
    function adminStyle()
    {
        wp_enqueue_style( 'calendar-font', plugins_url('views/public/css/font-awesome.css', __FILE__));
        wp_enqueue_style( 'calendar', plugins_url('views/public/css/fullcalendar.css', __FILE__));
        wp_enqueue_style( 'calendar-theme', plugins_url('views/public/css/calendar.css', __FILE__));
        wp_enqueue_style( 'calendar-default', plugins_url('views/public/css/default.css', __FILE__));
        wp_enqueue_style( 'calendar-bootstrap', plugins_url('views/public/css/bootstrap.css', __FILE__));
    }
    function adminJs()
    {
        wp_register_script( 'calendar_jquery',plugins_url('views/public/js/jquery-3.2.1.min.js', __FILE__),array(), null, false);
        wp_register_script( 'calendar_admin',plugins_url('views/public/js/admin.js', __FILE__),array(), null, false);
        wp_enqueue_script('calendar_jquery');
        wp_enqueue_script('calendar_admin');
    }
    function clientJs()
    {
       //wp_register_script( 'calendar_clientJquery',plugins_url('views/public/js/jquery-3.2.1.min.js', __FILE__),array(), null, false);
        wp_register_script( 'calendar_client',plugins_url('views/public/js/client.js', __FILE__),array(), null, false);
        wp_enqueue_script('calendar_clientJquery');
        wp_enqueue_script('calendar_client');
    }
}
$start = new Route();
