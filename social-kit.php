<?php

/**
 * Social Kit For Elementor
 *
 * @author            Dvizhenia
 * @copyright         2021 Dvizhenia
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Social Kit For Elementor
 * Plugin URI:        https://dvizhenia.com/social-kit
 * Description:       Social Kit For Elementor
 * Version:           1.0.1
 * tested up to:      5.8
 * Requires at least: 5.2
 * Requires PHP:      6.0
 * Author:            Dvizhenia
 * Author URI:        https://dvizhenia.com
 * Text Domain:       social-kit
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

 if( ! defined( 'ABSPATH' ) ) exit();
if ( ! function_exists( 'sk_fs' ) ) {
    // Create a helper function for easy SDK access.
    function sk_fs() {
        global $sk_fs;

        if ( ! isset( $sk_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $sk_fs = fs_dynamic_init( array(
                'id'                  => '8774',
                'slug'                => 'social-kit',
                'type'                => 'plugin',
                'public_key'          => 'pk_ef93be9659ae78ce4c5ae4ce8028e',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'social-kit',
                    'account'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $sk_fs;
    }

    // Init Freemius.
    sk_fs();
    // Signal that SDK was initiated.
    do_action( 'sk_fs_loaded' );
}
 function sk_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __( 'Hey %1$s' ) . ',<br>' .
            __( 'Please help us improve %2$s! If you are kind , please share some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'social-kit' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    sk_fs()->add_filter('connect_message_on_update', 'sk_fs_custom_connect_message_on_update', 10, 6);
    if ( function_exists( 'fs_override_i18n' ) ) {
    fs_override_i18n( array(
        'opt-in-connect' => __( 'Sure,why not?', 'social-kit' ),
        'skip'           => __( 'No..thank you', 'social-kit' ),
    ), 'social-kit' );
}
 /**
 * Elementor Extension main CLass
 * @since 1.0.0
 */
/* Enqueue Admin Style */

function sk_admin_styles() {
    wp_enqueue_style( 'sk-admin-style', Socialkit_URL . 'admin/admin.min.css', [], rand(), 'all' );
    wp_enqueue_script( 'sk-admin-script', Socialkit_URL . 'admin/admin.min.js', [ 'jquery' ], rand(), true );
}
add_action('admin_enqueue_scripts','sk_admin_styles');

final class Social_Kit{
    // Plugin version
    const VERSION = '1.0.1';

    // Minimum Elementor Version
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    // Minimum PHP Version
    const MINIMUM_PHP_VERSION = '6.0';

    // Instance
    private static $_instance = null;

    /**
    * SIngletone Instance Method
    * @since 1.1.0
    */
    public static function instance() {
        if( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /**
    * Construct Method
    * @since 1.1.0
    */
    public function __construct() {
        // Call Constants Method
        $this->define_constants();
        add_action( 'wp_enqueue_scripts', [ $this, 'scripts_styles' ]);
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }
    /**
    * Define Plugin Constants
    * @since 1.1.0
    */
    public function define_constants() {
        define( 'Socialkit_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
        define( 'Socialkit_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
    }
    /**
    * Load Scripts & Styles
    * @since 1.0.0
    */
    public function scripts_styles() {
        wp_register_style( 'sc-style', Socialkit_URL . '/assets/style.min.css', [], rand(), 'all' );
        wp_register_script( 'sc-script', Socialkit_URL . '/assets/public.min.js', [ 'jquery' ], rand(), true );   
        wp_register_script( 'sc-sdk', Socialkit_URL . '/widgets/fb-sdk/sdk.min.js', [ 'jquery' ], rand(), true );
        wp_enqueue_script( 'twitch-API', 'https://player.twitch.tv/js/embed/v1.js', array( 'jquery' ), '', false );
        wp_enqueue_script( 'pinterest-API', 'https://assets.pinterest.com/js/pinit.js', array( 'jquery' ), '', false );
        wp_enqueue_script( 'linkedin-API', 'https://platform.linkedin.com/badges/js/profile.js', array( 'jquery' ), '', false );

    }  
    public function enqueue_panel_styles() {
        wp_enqueue_style('social-kit-editor-css', Socialkit_URL . 'assets/editor.min.css',[],'1.0.0');
    }
    /**
    * Initialize the plugin
    * @since 1.0.0
    */
   /**
    * Initialize the plugin
    * @since 1.0.0
    */
    public function init() {
        // Check if the ELementor installed and activated
        if( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'sk_missing_main_plugin' ] );
            return;
        }
        if( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }
        if( ! version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'enqueue_panel_styles' ], 989 );
          if ( is_admin() ) {
            // Plugin Options
            require Socialkit_PATH . 'admin/social-kit-options.php';
        }
    }
    /**
    * Init Widgets
    * @since 1.0.1
    */
    public function init_widgets() {
        require_once Socialkit_PATH . '/widgets/social-icons.php';
        require_once Socialkit_PATH . '/widgets/social-popup.php';
        require_once Socialkit_PATH . '/widgets/twitch-live.php';
        require_once Socialkit_PATH . '/widgets/linkedin.php';
        require_once Socialkit_PATH . '/widgets/social-bar.php';
        require_once Socialkit_PATH . '/widgets/call-button.php';
        require_once Socialkit_PATH . '/widgets/sk-spotify.php';
    }
    /*
    * Admin Notice
    * Warning when the site doesn't have Elementor installed or activated
    * @since 1.0.0
    * 
    */
  public function sk_missing_main_plugin() {
        $elementorPath = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '%1$s requires %2$s to be installed and activated %3$s', 'social-kit' ),
            '<strong>'.esc_html__( 'Social Kit', 'social-kit' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'social-kit' ).'</strong>',
            '<strong>'.__(' <br><a href="'. $elementorPath .'" class="notais"> install Elementor</a>'). '</strong>'
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }
        

    /**
        * Admin Notice
        * Warning when the site doesn't have a minimum required Elementor version.
        * @since 1.0.0
        */
        public function admin_notice_minimum_elementor_version() {
            if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
            $message = sprintf(
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'social-kit' ),
                '<strong>'.esc_html__( 'Social Kit', 'social-kit' ).'</strong>',
                '<strong>'.esc_html__( 'Elementor', 'social-kit' ).'</strong>',
                self::MINIMUM_ELEMENTOR_VERSION
            );
    
            printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
        }
    
        /**
        * Admin Notice
        * Warning when the site doesn't have a minimum required PHP version.
        * @since 1.0.0
        */
        public function admin_notice_minimum_php_version() {
            if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
            $message = sprintf(
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'social-kit' ),
                '<strong>'.esc_html__( 'Social Kit', 'social-kit' ).'</strong>',
                '<strong>'.esc_html__( 'PHP', 'social-kit' ).'</strong>',
                self::MINIMUM_PHP_VERSION
            );
    
            printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
        }
}// end class
Social_Kit::instance();