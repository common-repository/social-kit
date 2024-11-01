<?php
// Initialize Namespace
namespace Elementor;
class SK_Social_Bar extends Widget_Base {

    public function get_name() {
        return  'soc-social-bar';
    }
    public function get_title() {
        return esc_html__( 'Social Bar', 'social-kit' );
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
        return 'social-kit-icon fas fa-ellipsis-v';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'tiktok', 'videos','clock','embed','socialkit','kit' ];
    }
     public function get_help_url() {
        return 'https://dvizhenia.com' . $this->get_name();
    }

    public function get_custom_help_url() {
        return '';
    }
    protected function register_controls() {

        $this->start_controls_section(
            'section_socialbar',
            [
                'label' => __( 'Social Bar', 'social-kit' ),
            ]
        );
        $this->add_control(
        'sk-editor-help-btn',[
           'raw' => '<a href="'.esc_url('https://www.dvizhenia.com/social-bar/').'" target="_blank">'. esc_html__( 'Widget Demo', 'social-kit' ) .'</a> <a href="'.esc_url('https://www.youtube.com/watch?v=u8de3EjrAsY').'"target="_blank">'. esc_html__( 'Widget Help', 'social-kit' ) .'</a>',
           'type' => \Elementor\Controls_Manager::RAW_HTML,
            ]
        );
    $this->add_control(
        'bar_position_fixed_align',
        [
            'label' => esc_html__( 'Fixed Position', 'social-kit' ),
            'type' => Controls_Manager::CHOOSE,
            'default' => 'right',
            'label_block' => false,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', 'social-kit' ),
                    'icon' => 'eicon-arrow-left',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', 'social-kit' ),
                    'icon' => 'eicon-arrow-right',
                ],
                // 'bottom' => [
                //     'title' => esc_html__( 'Bottom', 'social-kit' ),
                //     'icon' => 'eicon-arrow-down',
                // ],
                // 'top' => [
                //     'title' => esc_html__( 'Top', 'social-kit' ),
                //     'icon' => 'eicon-arrow-up',
                // ],
            ],
            'separator' => 'before',
            'prefix_class' => 'sok-bar-fixed-',
        ]
    );
    // Right
     $this->add_responsive_control(
        'distance_x_right',
        [
            'label' => esc_html__( 'Distance Right', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-bar-fixed-right .social-bar' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'bar_position_fixed_align' => 'right',
            ],
        ]
    );
    $this->add_responsive_control(
        'distance_y_tp',
        [
            'label' => esc_html__( 'Distance Top', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 300,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-bar-fixed-right .social-bar' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'bar_position_fixed_align' => 'right',
            ],
        ]
    );
    // Left
     $this->add_responsive_control(
        'distance_x_left_fixd',
        [
            'label' => esc_html__( 'Distance Left', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-bar-fixed-left .social-bar' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'bar_position_fixed_align' => 'left',
            ],
        ]
    );
    $this->add_responsive_control(
        'distance_y_left_fixd_tp',
        [
            'label' => esc_html__( 'Distance Top', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 300,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-bar-fixed-left .social-bar' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'bar_position_fixed_align' => 'left',
            ],
        ]
    );
     $this->add_responsive_control(
        'distance_x_top_fixd_toop',
        [
            'label' => esc_html__( 'Distance Top', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 10,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-bar-fixed-top .social-bar' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'bar_position_fixed_align' => 'top',
            ],
        ]
    );
    $this->add_responsive_control(
        'distance_y_bottom_fixd_botom',
        [
            'label' => esc_html__( 'Distance Bottom', 'social-kit' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 40,
            ],
            'selectors' => [
                '{{WRAPPER}}.sok-bar-fixed-bottom .social-bar' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'bar_position_fixed_align' => 'bottom',
            ],
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
        $start = is_rtl() ? 'end' : 'start';
        $end = is_rtl() ? 'start' : 'end';
        $this->end_controls_section();

        $this->start_controls_section(
            'section_social_style',
            [
                'label' => __( 'Icon', 'social-kit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
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
            $this->add_control(
            'tooltip_color',
            [
                'label' => __( 'Tooltip Color', 'social-kit' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Official Color', 'social-kit' ),
                    'custom' => __( 'Custom', 'social-kit' ),
                ],
            ]
        );


        $this->add_control(
            'icon_primary_color',
            [
                'label' => __( 'Primary Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

          $this->add_control(
            'tooltip_primary_color',
            [
                'label' => __( 'Primary Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'tooltip_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-grid-item .tooltip ' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-grid-item .tooltip::before ' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tooltip_secondary_color',
            [
                'label' => __( 'Secondary Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'tooltip_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-grid-item .tooltip ' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_secondary_color',
            [
                'label' => __( 'Secondary Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-social-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => __( 'Padding', 'social-kit' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon' => '--icon-padding: {{SIZE}}{{UNIT}}',
                ],
                'default' => [
                    'unit' => 'em',
                ],
                'tablet_default' => [
                    'unit' => 'em',
                ],
                'mobile_default' => [
                    'unit' => 'em',
                ],
                'range' => [
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                    ],
                ],
            ]
        );
           $this->add_responsive_control(
            'icon_gutter',
            [
                'label' => __( 'Gutter', 'social-kit' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon' => 'margin: {{SIZE}}{{UNIT}}',
                ],
                'default' => [
                    'unit' => 'em',
                ],
                'tablet_default' => [
                    'unit' => 'em',
                ],
                'mobile_default' => [
                    'unit' => 'em',
                ],
                'range' => [
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border', // We know this mistake - TODO: 'icon_border' (for hover control condition also)
                'selector' => '{{WRAPPER}} .elementor-social-icon',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'social-kit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_social_hover',
            [
                'label' => __( 'Icons Hover', 'social-kit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hover_primary_color',
            [
                'label' => __( 'Primary Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_secondary_color',
            [
                'label' => __( 'Secondary Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-social-icon:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_border_color',
            [
                'label' => __( 'Border Color', 'social-kit' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => __( 'Hover Animation', 'social-kit' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render social icons widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $fallback_defaults = [
            'fa fa-facebook',
            'fa fa-twitter',
            'fa fa-google-plus',
        ];

        $class_animation = '';

        if ( ! empty( $settings['hover_animation'] ) ) {
            $class_animation = ' elementor-animation-' . $settings['hover_animation'];
        }

        $migration_allowed = Icons_Manager::is_migration_allowed();

        ?>
        <div class="social-bar">
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
                    'elementor-social-icon-' . $social . $class_animation,
                    'elementor-repeater-item-' . $item['_id'],
                ] );

                $this->add_link_attributes( $link_key, $item['link'] );

                ?>
                <span class="social-bar__item">
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
        <?php
        }
    }
Plugin::instance()->widgets_manager->register_widget_type( new SK_Social_Bar() );