<?php
// Initialize Namespace
namespace Elementor;
class SK_Call_Now extends Widget_Base {

    public function get_name() {
        return  'soc-call-now';
    }
    public function get_title() {
        return esc_html__( 'Call Button', 'social-kit' );
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
        return 'social-kit-icon fas fa-phone-volume';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'telephone', 'phone','call','now','socialkit','kit' ];
    }
     public function get_help_url() {
        return 'https://dvizhenia.com' . $this->get_name();
    }

    public function get_custom_help_url() {
        return '';
    }
    protected function register_controls() {

        $this->start_controls_section(
            'section_general',
            [
                'label' => __( 'General', 'social-kit' ),
            ]
        );
        $this->add_control(
        'sk-editor-help-btn',[
           'raw' => '<a href="'.esc_url('https://www.dvizhenia.com/call-now/').'" target="_blank">'. esc_html__( 'Widget Demo', 'social-kit' ) .'</a> <a href="'.esc_url('https://www.youtube.com/watch?v=rPPg7rRNe9I').'"target="_blank">'. esc_html__( 'Widget Help', 'social-kit' ) .'</a>',
           'type' => \Elementor\Controls_Manager::RAW_HTML,
            ]
        );

        $this->add_control(
            'pick',
            [
                'label' => __( 'Call Type', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'tel:',
                'options' => [
                    'https://wa.me/'  => __( 'WhatsApp', 'social-kit' ),
                    'tel:' => __( 'Telephone', 'social-kit' ),
                    'https://t.me/' => __( 'Telegram', 'social-kit' ),
                    'none' => __( 'None', 'social-kit' ),
                ],
            ]
        );
     $this->add_control(
            'phone_number',
            [
                'label' => __( 'Phone Number', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+123456789',
                'placeholder' => '+123456789',
            ]
        ); 
    $this->add_control(
        'button_position_fixed_aligna',
        [
            'label' => esc_html__( 'Fixed Position', 'social-kit' ),
            'type' => Controls_Manager::CHOOSE,
            'default' => 'right',
            'label_block' => false,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', 'social-kit' ),
                    'icon' => 'eicon-h-align-left',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', 'social-kit' ),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'separator' => 'before',
            'prefix_class' => 'sok-cl-btn-',
        ]
    ); 
    $this->add_responsive_control(
        'distance_x_right',
        [
            'label' => esc_html__( 'Distance Right', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 30,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-cl-btn-right .sok-cl' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'button_position_fixed_aligna' => 'right',
            ],
        ]
    );
    $this->add_responsive_control(
        'distance_y_right',
        [
            'label' => esc_html__( 'Distance Bottom', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 30,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-cl-btn-right .sok-cl' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'button_position_fixed_aligna' => 'right',
            ],
        ]
    );

    $this->add_responsive_control(
        'distance_x_left',
        [
            'label' => esc_html__( 'Distance Left', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 30,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-cl-btn-left .sok-cl' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'button_position_fixed_aligna' => 'left',
            ],
        ]
    );

    $this->add_responsive_control(
        'distance_y_left',
        [
            'label' => esc_html__( 'Distance Bottom', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 30,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-cl-btn-right .sok-cl' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [

                'button_position_fixed_aligna' => 'left',
            ],
        ]
    );

    $this->add_control(
        'sok_cl_select_icon',
        [
            'label' => esc_html__( 'Select Icon', 'social-kit' ),
            'type' => Controls_Manager::ICONS,
            'skin' => 'inline',
            'label_block' => false,
            'default' => [
                'value' => 'fas fa-phone',
                'library' => 'fa-solid',
            ],
            'separator' => 'before',
            'recommended' => [
                    'fa-solid' => [
                        'phone',
                        'phone-volume',
                    ],
                    'fa-brands' =>[
                        'whatsapp',
                        'telegram',
                    ],
                ],
            ]
    );
    $this->add_control(
        'button_txt_show',
        [
            'label' => __( 'Button Text', 'social-kit' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'social-kit' ),
            'label_off' => __( 'Hide', 'social-kit' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );   
    $this->add_control(
        'button_text',
        [
            'label' => esc_html__( 'Text', 'social-kit' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'Call Now',
            'condition' => [
            'button_txt_show' => 'yes',
            ],
        ]
    );
        $this->end_controls_section();
         // Section Button ------------
    $this->start_controls_section(
        'section_style_button',
        [
            'label' => esc_html__( 'Button', 'social-kit' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );


    $this->start_controls_tabs( 'tabs_sk_cl_colors' );

    // Normal Tab ------------
    $this->start_controls_tab(
        'tab_sk_button_normal_colors',
        [
            'label' => esc_html__( 'Normal', 'social-kit' ),
        ]
    );

    $this->add_control(
        'button_text_color',
        [
            'label' => esc_html__( 'Color', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sok-cl' => 'color: {{VALUE}}',
                '{{WRAPPER}} .sok-cl' => 'color: {{VALUE}}',
                '{{WRAPPER}} .sok-cl svg' => 'fill: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_control(
        'button_bg_color',
        [
            'label' => esc_html__( 'Background', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#F32C52',
            'selectors' => [
                '{{WRAPPER}} .sok-cl' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'button_border_color',
        [
            'label' => esc_html__( 'Border Color', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#E8E8E8',
            'selectors' => [
                '{{WRAPPER}} .sok-cl' => 'border-color: {{VALUE}}',
            ],
            'condition' =>[
                'border_switcher' => 'yes',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'sk_button_box_shadow',
            'label' => __( 'Box Shadow', 'social-kit' ),
            'selector' => '{{WRAPPER}} .sok-cl',
        ]
    );

    $this->end_controls_tab();// normal tab end
    // Hover Tab -------------
    $this->start_controls_tab(
        'tab_cl_hover_colors',
        [
            'label' => esc_html__( 'Hover', 'social-kit' ),
        ]
    );

    $this->add_control(
        'sk_button_text_color',
        [
            'label' => esc_html__( 'Color', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sk-cl:hover' => 'color: {{VALUE}}',
                '{{WRAPPER}} .sok-cl svg:hover' => 'fill: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_control(
        'button_bg_color_hv',
        [
            'label' => esc_html__( 'Background', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#1348af',
            'selectors' => [
                '{{WRAPPER}} .sok-cl:hover' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'sk_button_border_color',
        [
            'label' => esc_html__( 'Border Color', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#E8E8E8',
            'selectors' => [
                '{{WRAPPER}} .sok-cl:hover' => 'border-color: {{VALUE}}',
            ],
            'condition' =>[
                 'border_switcher' => 'yes',
            ],
        ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();// End tabs

     $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'buton_typography',
            'label' => __( 'Typography', 'social-kit' ),
            'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .sok-cl',
        ]
        
    );
 $this->add_control(
        'icon_size',
        [
            'label' => esc_html__( 'Icon Size', 'wpr-addons' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 14,
            ],
            'selectors' => [
                '{{WRAPPER}} .sok-cl i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .sok-cl svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'before',
            'condition' => [
                'select_icon[value]!' => '',
            ],
        ]
    );
    $this->add_control(
        'icon_distanz',
        [
            'label' => esc_html__( 'Icon Distance', 'wpr-addons' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 25,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 18,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-icon-align-top .sok-cl' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sok-icon-align-left .sok-cl' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sok-icon-align-right .sok-cl' => 'margin-left: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}}.sok-icon-align-bottom .sok-cl' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'before',
            'condition' => [
                'select_icon[value]!' => '',
                'button_txt_show' => 'yes',
            ],
        ]
    );
    $this->add_responsive_control(
        'button_padding',
        [
            'label' => esc_html__( 'Padding', 'wpr-addons' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default' => [
                'top' => 22,
                'right' => 22,
                'bottom' => 22,
                'left' => 22,
            ],
            'selectors' => [
                '{{WRAPPER}} .sok-cl' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before',
        ]
    );
    $this->add_control(
            'border_switcher',
            [
                'label' => esc_html__( 'Border', 'social-kit' ),
                'type' => Controls_Manager::SWITCHER,
                'separator' => 'before',
                'return_value' => 'yes',
                'label_block' => false,

            ]
        );

    $this->add_control(
        'button_border_type',
        [
            'label' => esc_html__( 'Border Type', 'social-kit' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'none' => esc_html__( 'None', 'social-kit' ),
                'solid' => esc_html__( 'Solid', 'social-kit' ),
                'double' => esc_html__( 'Double', 'social-kit' ),
                'dotted' => esc_html__( 'Dotted', 'social-kit' ),
                'dashed' => esc_html__( 'Dashed', 'social-kit' ),
                'groove' => esc_html__( 'Groove', 'social-kit' ),
            ],
            'default' => 'solid',
            'selectors' => [
                '{{WRAPPER}} .sok-cl' => 'border-style: {{VALUE}};',
            ],
            'condition' =>[
                'border_switcher' => 'yes',
            ],
        ]
    );

    $this->add_responsive_control(
        'border_width',
        [
            'label' => esc_html__( 'Border Width', 'social-kit' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default' => [
                'top' => 1,
                'right' => 1,
                'bottom' => 1,
                'left' => 1,
            ],
            'selectors' => [
                '{{WRAPPER}} .sok-cl' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before',
            'condition' =>[
                    'border_switcher' => 'yes',
                    'button_border_type!' => 'none',
            ],
        ]
    );
     $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'social-kit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .sok-cl' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
       echo '<div class="sok-cl-wrap">';
        echo '<a href="'. esc_attr($settings['pick']), esc_attr($settings['phone_number']).'" class="sok-cl">';
         \Elementor\Icons_Manager::render_icon( $settings['sok_cl_select_icon'] );
         if ($settings['button_txt_show'] === 'yes' ) {
             echo esc_html($settings['button_text']);
         }
        echo '</a>';
       echo '</div>';
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Sk_Call_Now() );