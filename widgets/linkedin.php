<?php
// Initialize Namespace
namespace Elementor;
class SK_Linkedin extends Widget_Base {

    public function get_name() {
        return  'soc-linkedin';
    }
    public function get_title() {
        return esc_html__( 'Linkedin', 'social-kit' );
    }

    public function get_script_depends() {
        return [
            'sc-script'
        ];
    }
    public function get_style_depends() {
        return [
            'sc-style'
        ];
    }
    public function get_icon() {
        return 'social-kit-icon fab fa-linkedin';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'linkedin', 'posts','profiles','embed','socialkit','kit' ];
    }
     public function get_help_url() {
        return 'https://dvizhenia.com' . $this->get_name();
    }

    public function get_custom_help_url() {
        return '';
    }
    protected function register_controls() {

        $this->start_controls_section(
            'section_linkedin',
            [
                'label' => __( 'Linkedin', 'social-kit' ),
            ]
        );
        $this->add_control(
        'sk-editor-help-btn',[
           'raw' => '<a href="'. esc_url('https://www.dvizhenia.com/linkedin/').'" target="_blank">'. esc_html__( 'Widget Demo', 'social-kit' ) .'</a> <a href="#">'. esc_html__( 'Widget Help', 'social-kit' ) .'</a>',
           'type' => \Elementor\Controls_Manager::RAW_HTML,
            ]
        );
         $this->add_control(
            'linkedin_url',
            [
                'label' => __( 'URL', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'https://www.linkedin.com/embed/feed/update/urn:li:share:6820715918956601345', 'social-kit' ),
                'placeholder' => __( 'URL', 'social-kit' ),
            ]
        );
        $this->add_control(
            'linkedin_height',
            [
                'label' => __( 'Height', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 10000,
                'step' => 5,
                'default' => 300,
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <iframe src="<?php echo esc_url($settings['linkedin_url'])?>" height="<?php echo esc_html($settings['linkedin_height'])?>px" width="100" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
              
    <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new SK_Linkedin() );