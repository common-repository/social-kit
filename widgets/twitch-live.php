<?php
// Initialize Namespace
namespace Elementor;
class SK_Twitch_Live extends Widget_Base {

    public function get_name() {
        return  'soc-twitch-widget';
    }
    public function get_title() {
        return esc_html__( 'Twitch Live', 'social-kit' );
    }

    public function get_script_depends() {
        return [
            'sc-script',
        ];
    }
    public function get_style_depends() {
        return [
            'sc-style'
        ];
    }
    public function get_icon() {
        return 'social-kit-icon fab fa-twitch';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'twitch', 'livestreem','video','kit','socialkit','social'];
    }
     public function get_help_url() {
        return 'https://dvizhenia.com/' . $this->get_name();
    }

    public function get_custom_help_url() {
        return '';
    }
    protected function register_controls() {

        $this->start_controls_section(
            'section_twitch',
            [
                'label' => __( 'Twitch', 'social-kit' ),
            ]
        );
         $this->add_control(
            'sk-editor-help-btn',[
               'raw' => '<a href="'.esc_url('https://www.dvizhenia.com/twitch/').'" target="_blank">'. esc_html__( 'Widget Demo', 'social-kit' ) .'</a> <a href="'.esc_url('https://www.youtube.com/watch?v=_eMoAz6-XQY').'" target="_blank">'. esc_html__( 'Widget Help', 'social-kit' ) .'</a>',
               'type' => \Elementor\Controls_Manager::RAW_HTML,
                ]
        );
        $this->add_control(
            'username_inpt',
            [
                'label' => __( 'Enter Twitch Username/Channel', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'nyc_timescape', 'social-kit' ),
                'placeholder' => __( 'username', 'social-kit' ),
                'label_block' => true,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'str_height',
            [
                'label' => __( 'Height', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 10000,
                'step' => 5,
                'default' => 480,
            ]
        );
         $this->add_control(
            'str_width',
            [
                'label' => __( 'Width', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 10000,
                'step' => 5,
                'default' => 854,
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $twtch = [
            'username' => $settings['username_inpt'],
            'height' => $settings['str_height'],
            'width' => $settings['str_width'],
        ];
        ?>
       <div id="twitch-embed" data-settings='<?php echo wp_json_encode($twtch);?>'></div>

<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new SK_Twitch_Live() );