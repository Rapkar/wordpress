<?php

use Elementor\Widget_Base;

class empa_slider_banner_widget extends Widget_Base
{

    public $domain = 'empa';


    public function get_name()
    {
        return 'empa_widget';
    }

    public function get_title()
    {
        return __('empa_slider_banner_widget', $this->domain);
    }

    public function get_icon()
    {
        return 'eicon-post-slider';
    }

    protected function  register_controls()
    {

        $this->start_controls_section(
            'slide1',
            [
                'label' => __('slide1', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name' => 'list_img',
                        'label' => esc_html__('Img', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'list_title',
                        'label' => esc_html__('Title', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Her inovasyonun <span>içinde</span> biz de<br> varız', 'textdomain'),

                        'label_block' => true,
                    ],
                    [
                        'name' => 'list_content',
                        'label' => esc_html__('Content', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__('List Content', 'textdomain'),
                        'show_label' => false,
                    ],
                    [
                        'name' => 'list_LINK_TEXT',
                        'label' => esc_html__('url label', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('DAHA FAzla', 'textdomain'),
                        'show_label' => TRUE,
                    ],
                    [
                        'name' => 'list_LINK',
                        'label' => esc_html__('Url', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::URL,
                    ]
                ],
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'textdomain'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'textdomain'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );
        $this->end_controls_section();
    }
    public function get_script_depends()
    {
        return ['swiper-custom'];
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>
        <style>
            .swiper {
                width: 100%;
                height: 100%;
            }

            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .swiper {
                width: 100%;
                height: 300px;
                margin-left: auto;
                margin-right: auto;
            }

            .swiper-slide {
                background-size: cover;
                background-position: center;
            }

            .mySwiper2 {
                height: 750px;
                width: 100%;
            }

            .mySwiper {
                height: 20%;
                box-sizing: border-box;
                padding: 10px 0;
            }

            .mySwiper .swiper-slide {
                width: 25%;
                height: 100%;
                opacity: 0.4;
            }

            .mySwiper .swiper-slide-thumb-active {
                opacity: 1;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .swiper-slide h2 {
                color: #FFFFFF;
                font-size: 48px;
                font-family: "Montserrat", Sans-serif;
            }

            .swiper-slide h2 span {
                color: #01d900;
            }

            .swiper-slide p {
                color: #FFFFFF;
                font-family: "Montserrat", Sans-serif;
            }

            .swiper-slide a {
                color: #FFFFFF;
                font-family: "Montserrat", Sans-serif;
                text-decoration: none;
                border: 1px solid #0a9209;
                width: 200px;
                height: 50px;
                margin-top: 3rem;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 10rem;
            }

            .swipthumb {
                width: 635px;
                position: absolute;
                bottom: 90px;
                height: 140px;
                left: 0;
				margin-left:0 !important
            }

            .swiper-pagination {
                width: 300px !important;
                left: 0 !important;
                bottom: 25px !important;
            }

            .swiper-pagination .swiper-pagination-bullet {
                border-radius: 0;
                width: 15px;
                height: 15px;
                background-color: transparent;
                border: 1px solid #01D900;
            }

            .swiper-pagination .swiper-pagination-bullet-active {
                background-color: #01D900;
            }
        </style>

        <?php
        if ($settings['list']) {
        ?>

            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                <div class="swiper-wrapper">
                <?php

                foreach ($settings['list'] as $item) {
                    echo '<div class="swiper-slide" style="background-image: url(' . $item['list_img']['url'] . ');">';
                    echo '<div class="container">
                <div class="col-lg-7 mr-lg-auto text-left px-3">
                    <h2 class="col-lg-10 px-0">' . $item['list_title'] . '</h2>
                    <p>' . $item['list_content'] . '</p>
                    <a href="' . $item['list_LINK']['url'] . '">' . $item['list_LINK_TEXT'] . '</a>
                </div>
            </div>
            </div>';
                }
            }
                ?>
                </div>
                <div class="container position-relative ">
                    <div class="swiper-pagination text-left ml-4"></div>
                </div>
                <?php
                if ($settings['list']) {

                ?>
                    <div class="container position-relative pl-5">

                        <div thumbsSlider="" class="swiper mySwiper swipthumb ml-4">
                            <div class="swiper-wrapper">
                                <?php foreach ($settings['list'] as $item) { ?>
                                    <div class="swiper-slide">
                                        <img src=" <?= $item['list_img']['url'] ?>" />
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        }

        ?>