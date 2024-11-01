<?php
// Initialize Namespace
namespace Elementor;
class SK_Socialpopup extends Widget_Base {
    public function get_name() {
        return  'soc-social-popup';
    }

    public function get_title() {
        return esc_html__( 'Social Popup', 'social-kit' );
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
        return 'social-kit-icon eicon-testimonial';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'social bar', 'social Icons','media','popup','elementor','widget','air','widget' ];
    }
     public function get_help_url() {
        return 'https://dvizhenia.com/social-kit/widgets/' . $this->get_name();
    }

    public function get_custom_help_url() {
        return '';
    }
    public function _register_controls() {

    $this->start_controls_section(
        'general',
        [
          'label' => __( 'General', 'social-kit' ),
        ]
      );
    $this->add_control(
        'sk-editor-help-btn',[
           'raw' => '<a href="'. esc_url('https://www.dvizhenia.com/social-popup/').'" target="_blank">'. esc_html__( 'Widget Demo', 'social-kit' ) .'</a> <a href="'. esc_url('https://www.youtube.com/watch?v=-V9t5JWHwj4') .'" target="_blank">'. esc_html__( 'Widget Help', 'social-kit' ) .'</a>',
           'type' => \Elementor\Controls_Manager::RAW_HTML,
            ]
    );
      $this->add_control(
            'popup_ofset',
            [
                'label' => __( 'Offset', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 10000,
                'step' => 10,
                'default' => 500,
            ]
        );
    $this->add_control(
        'button_position_fixed_align',
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
            'prefix_class' => 'sok-popup-fixed-',
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
                '{{WRAPPER}}.sok-popup-fixed-right .sk-pp-main' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'button_position_fixed_align' => 'right',
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
                '{{WRAPPER}}.sok-popup-fixed-right .sk-pp-main' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'button_position_fixed_align' => 'right',
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
                '{{WRAPPER}}.sok-popup-fixed-left .sk-pp-main' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'button_position_fixed_align' => 'left',
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
                '{{WRAPPER}}.sok-popup-fixed-left .sk-pp-main' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [

                'button_position_fixed_align' => 'left',
            ],
        ]
    );

    $this->add_control(
        'show_popup_txt',
        [
            'label' => __( 'Popup Text', 'social-kit' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'social-kit' ),
            'label_off' => __( 'Hide', 'social-kit' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'separator' => 'before',
        ]
    );
    $this->add_control(
      'popup_txt', [
        'label' => __( 'Text', 'social-kit' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Follow Us on!' , 'social-kit' ),
        'label_block' => false,
        'condition' =>[
            'show_popup_txt' => 'yes',
        ],
      ]    
    );
     $this->add_control(
        'show_btn_txt',
        [
            'label' => __( 'Button Text', 'social-kit' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'social-kit' ),
            'label_off' => __( 'Hide', 'social-kit' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'separator' => 'before',
        ]
    );
    $this->add_control(
      'button_text',
       [
        'label' => __( 'Text', 'social-kit' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Socials' , 'social-kit' ),
        'label_block' => false,
        // 'separator' => 'before',
        'condition' =>[
            'show_btn_txt' => 'yes',
        ],
      ]    
    );
    $this->add_control(
        'sok_btn_select_icon',
        [
            'label' => esc_html__( 'Button Icon', 'social-kit' ),
            'type' => Controls_Manager::ICONS,
            'skin' => 'inline',
            'label_block' => false,
            'default' => [
                'value' => 'none',
            ],
            'separator' => 'before',
        ]
    );
     $repeater = new Repeater();
    $repeater->add_control(
            'social_icon',
            [
                'label' => __( 'Icon', 'social-kit' ),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'social',
                'default' => [
                    'value' => 'fab fa-wordpress',
                    'library' => 'fa-brands',
                ],
                'recommended' => [
                    'fa-brands' => [
                        'android',
                        'apple',
                        'behance',
                        'bitbucket',
                        'codepen',
                        'delicious',
                        'deviantart',
                        'digg',
                        'discord',
                        'dropbox',
                        'dribbble',
                        'elementor',
                        'facebook',
                        'flickr',
                        'foursquare',
                        'free-code-camp',
                        'github',
                        'gitlab',
                        'globe',
                        'houzz',
                        'instagram',
                        'jsfiddle',
                        'linkedin',
                        'medium',
                        'meetup',
                        'mix',
                        'facebook-messenger',
                        'behance',
                        'mixcloud',
                        'odnoklassniki',
                        'pinterest',
                        'product-hunt',
                        'reddit',
                        'shopping-cart',
                        'skype',
                        'slideshare',
                        'snapchat',
                        'soundcloud',
                        'spotify',
                        'stack-overflow',
                        'steam',
                        'telegram',
                        'thumb-tack',
                        'tripadvisor',
                        'tumblr',
                        'twitch',
                        'twitter',
                        'tiktok',
                        'viber',
                        'vimeo',
                        'vk',
                        'weibo',
                        'weixin',
                        'whatsapp',
                        'wordpress',
                        'xing',
                        'yelp',
                        'youtube',
                        '500px',
                    ],
                    'fa-solid' => [
                        'envelope',
                        'link',
                        'rss',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => __( 'Link', 'social-kit' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'is_external' => 'true',
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'https://your-link.com', 'social-kit' ),
            ]
        );

        $repeater->add_control(
            'item_icon_color',
            [
                'label' => __( 'Color', 'social-kit' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Official Color', 'social-kit' ),
                    'custom' => __( 'Custom', 'social-kit' ),
                ],
            ]
        );

        $repeater->add_control(
            'item_icon_primary_color',
            [
                'label' => __( 'Primary Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'item_icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.elementor-social-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'item_icon_secondary_color',
            [
                'label' => __( 'Secondary Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'item_icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.elementor-social-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} {{CURRENT_ITEM}}.elementor-social-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_list',
            [
                'label' => __( 'Social Icons', 'social-kit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_icon' => [
                            'value' => 'fab fa-facebook',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'fab fa-youtube',
                            'library' => 'fa-brands',
                        ],
                    ],
                ],
                'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
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


    $this->start_controls_tabs( 'tabs_sk_button_colors' );

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
                '{{WRAPPER}} .sk-pp-headline' => 'color: {{VALUE}}',
                '{{WRAPPER}} .sk-pp-headline' => 'color: {{VALUE}}',
                '{{WRAPPER}} .sk-pp-headline svg' => 'fill: {{VALUE}}',
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
                '{{WRAPPER}} .sk-pp-headline' => 'background-color: {{VALUE}}',
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
                '{{WRAPPER}} .sk-pp-headline' => 'border-color: {{VALUE}}',
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
            'selector' => '{{WRAPPER}} .sk-pp-headline',
        ]
    );

    $this->end_controls_tab();// normal tab end
    // Hover Tab -------------
    $this->start_controls_tab(
        'tab_button_hover_colors',
        [
            'label' => esc_html__( 'Hover', 'wpr-addons' ),
        ]
    );

    $this->add_control(
        'sk_button_text_color',
        [
            'label' => esc_html__( 'Color', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .sk-pp-headline:hover' => 'color: {{VALUE}}',
                '{{WRAPPER}} .sk-pp-headline:hover' => 'color: {{VALUE}}',
                '{{WRAPPER}} .sk-pp-headline svg:hover' => 'fill: {{VALUE}}',
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
                '{{WRAPPER}} .sk-pp-headline:hover' => 'background-color: {{VALUE}}',
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
                '{{WRAPPER}} .sk-pp-headline:hover' => 'border-color: {{VALUE}}',
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
            'selector' => '{{WRAPPER}} .sk-pp-headline',
        ]
        
    );
    $this->add_responsive_control(
        'sk_button_padding',
        [
            'label' => esc_html__( 'Padding', 'social-kit' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default' => [
                'top' => 15,
                'right' => 15,
                'bottom' => 15,
                'left' => 15,
            ],
            'selectors' => [
                '{{WRAPPER}} .sk-pp-headline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .sk-pp-headline' => 'border-style: {{VALUE}};',
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
                '{{WRAPPER}} .sk-pp-headline' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before',
            'condition' =>[
                    'border_switcher' => 'yes',
                    'button_border_type!' => 'none',
            ],
        ]
    );

    $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'social-kit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default' => [
                    'top' => 36,
                    'right' => 36,
                    'bottom' => 36,
                    'left' => 36,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sk-pp-headline' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
    );
    $this->end_controls_section();

      $this->start_controls_section(
        'section_style_popup',
        [
            'label' => esc_html__( 'Popup', 'social-kit' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
      $this->add_responsive_control(
            'popup_Width',
            [
                'label' => __( 'Width', 'social-kit' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 1000,
                'step' => 5,
                'default' => 230,
                'selectors' => [
                    '{{WRAPPER}} .miwa' => 'width: {{VALUE}}px',
                ],
            ]
        );
    $this->add_control(
        'popup_text_color',
        [
            'label' => esc_html__( 'Color', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .miwa' => 'color: {{VALUE}}',
                '{{WRAPPER}} .miwa' => 'color: {{VALUE}}',
                '{{WRAPPER}} .miwa svg' => 'fill: {{VALUE}}',
            ],
        ]
    );
    
    $this->add_control(
        'popup_bg_color',
        [
            'label' => esc_html__( 'Background', 'social-kit' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#1e1e27',
            'selectors' => [
                '{{WRAPPER}} .miwa' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'sk_popup_box_shadow',
            'label' => __( 'Box Shadow', 'wpr-addons' ),
            'selector' => '{{WRAPPER}} .miwa',
        ]
    );
     $this->add_group_control(
            Group_Control_Typography::get_type(),
        [
            'name' => 'popup_typography',
            'label' => __( 'Typography', 'social-kit' ),
            'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_2,
            'selector' => '{{WRAPPER}} .miwa div',
        ]
        
    );
    $this->end_controls_section();
       $this->start_controls_section(
        'section_style_icons',
        [
            'label' => esc_html__( 'Icons', 'social-kit' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
       $this->add_responsive_control(
        'icons_gutter',
        [
            'label' => esc_html__( 'Distance', 'social-kit' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default' => [
                'top' => 5,
                'right' => 5,
                'bottom' => 5,
                'left' => 5,
            ],
            'selectors' => [
                '{{WRAPPER}} .social-icon-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
        ]
    );
    $this->add_control(
            'ikon_shape',
            [
                'label' => __( 'Shape', 'social-kit' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'rounded',
                'options' => [
                    'rounded' => __( 'Rounded', 'social-kit' ),
                    'square' => __( 'Square', 'social-kit' ),
                    'circle' => __( 'Circle', 'social-kit' ),
                ],
                'prefix_class' => 'elementor-shape-',
            ]
        );
    $this->end_controls_section();
    }
    // Render the widget
    protected function render() {
        $settings = $this->get_settings_for_display();
        $fallback_defaults = [
            'fa fa-facebook',
            'fa fa-twitter',
            'fa fa-google-plus',
        ];
         $migration_allowed = Icons_Manager::is_migration_allowed();
        ?>
    <details class="sk-pp-main" data-offset='<?php echo esc_attr($settings['popup_ofset']);?>'>
        <summary class="sk-pp-headline"><?php echo esc_html($settings['button_text']);  \Elementor\Icons_Manager::render_icon( $settings['sok_btn_select_icon'] );?></summary>
         <div class="miwa">
             <div class="sk-pp-closebtn">Close </div>
            <?php
            if ($settings['show_popup_txt'] == 'yes') {
                echo '<div class="magi">'. esc_html($settings['popup_txt']) .'</div>';
            }?>
        <div class="sul-soc-wrapper">
        <?php
            foreach ( $settings['social_icon_list'] as $index => $item ) {
                $migrated = isset( $item['__fa4_migrated']['social_icon'] );
                $is_new = empty( $item['social'] ) && $migration_allowed;
                $social = '';

                // add old default
                if ( empty( $item['social'] ) && ! $migration_allowed ) {
                    $item['social'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-wordpress';
                }

                if ( ! empty( $item['social'] ) ) {
                    $social = str_replace( 'fa fa-', '', $item['social'] );
                }

                if ( ( $is_new || $migrated ) && 'svg' !== $item['social_icon']['library'] ) {
                    $social = explode( ' ', $item['social_icon']['value'], 2 );
                    if ( empty( $social[1] ) ) {
                        $social = '';
                    } else {
                        $social = str_replace( 'fa-', '', $social[1] );
                    }
                }
                if ( 'svg' === $item['social_icon']['library'] ) {
                    $social = get_post_meta( $item['social_icon']['value']['id'], '_wp_attachment_image_alt', true );
                }

                $link_key = 'link_' . $index;

                $this->add_render_attribute( $link_key, 'class', [
                    'elementor-icon',
                    'elementor-social-icon',
                    'elementor-social-icon-' . $social,
                    'elementor-repeater-item-' . $item['_id'],
                ] );

                $this->add_link_attributes( $link_key, $item['link'] );

                ?>  
            <span class="social-icon-item">
                    <a <?php echo $this->get_render_attribute_string( esc_attr($link_key) ); ?>>
                        <span class="elementor-screen-only"><?php echo ucwords( esc_html($social) ); ?></span>
                        <?php
                        if ( $is_new || $migrated ) {
                            Icons_Manager::render_icon( $item['social_icon'] );
                        } else { ?>
                            <i class="<?php echo esc_attr( $item['social'] ); ?>"></i>
                        <?php } ?>
                    </a>
                </span>
            <?php } ?>
            </div>
        </div>
    </details>

<?php
    }// End  Render

}// End Class

Plugin::instance()->widgets_manager->register_widget_type( new SK_Socialpopup() );