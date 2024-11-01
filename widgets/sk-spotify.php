<?php
// Initialize Namespace
namespace Elementor;
class sk_spotify_widg extends Widget_Base {

    public function get_name() {
        return  'sk-spotify-widget';
    }

    public function get_title() {
        return esc_html__( 'Spotify Widget', 'social-kit' );
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
        return 'social-kit-icon fab fa-spotify';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'Spotify', 'Music','Liza' ];
    }
    public function _register_controls() {
        // Section Starts
        $this->start_controls_section(
			'liza_section_title',
			[
				'label' => __( 'General', 'social-kit' ),
			]
		);
    $this->add_control(
        'sk-editor-help-btn',[
           'raw' => '<a href="'.esc_url('https://www.dvizhenia.com/spotify-widget/').'" target="_blank">'. esc_html__( 'Widget Demo', 'social-kit' ) .'</a> <a href="'.esc_url('https://youtu.be/-RgbQk9zW6c').'"target="_blank">'. esc_html__( 'Widget Help', 'social-kit' ) .'</a>',
           'type' => \Elementor\Controls_Manager::RAW_HTML,
            ]
        );
        // TEXT
        $this->add_control(
			'sk_spotify_link',
			[
				'label' => __( 'Spotify <bold> Embed </bold> Link', 'social-kit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'https://open.spotify.com/embed/track/4xHWH1jwV5j4mBYRhxPbwZ', 'social-kit' ),
				'placeholder' => __( 'Link Here', 'liza-spotify' ),
			]
		);      
	$this->add_control(
      'social_spot_height',
      [
        'label' => __( 'Height', 'social-kit' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 80,
        'max' => 1400,
        'step' => 10,
        'default' => 380,
      ]
    );
        $this->end_controls_section();
    }
    // Render the widget
    protected function render() {
        $settings = $this->get_settings_for_display();
	    $she_height = $settings['social_spot_height'];
        ?>
 <iframe src="<?php echo esc_url($settings['sk_spotify_link']); ?>" width="100%" height="<?php echo esc_html__($she_height)?>" frameBorder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        <?php
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new sk_spotify_widg() );
