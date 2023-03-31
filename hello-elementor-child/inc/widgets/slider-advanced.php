<?php

// use Elementor\Widget_Base;

class empa_slider_advanced_widget extends \Elementor\Widget_Base
{

    public $domain = 'empa';


    public function get_name()
    {
        return 'empa_slider_advanced_widget';
    }

    public function get_title()
    {
        return __('empa_slider_advanced_widget', $this->domain);
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    protected function  register_controls()
    {

        $this->start_controls_section(
            'slide1',
            [
                'label' => __('item1', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );
        $this->add_control(
            'slide1_title',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Default description', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );
		$this->add_control(
			'auto_load',
			[
				'label' => esc_html__( 'Read From Posts', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
            'slide1_icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );
        $this->add_control(
            'list1',
            [
                'label' => esc_html__('Sliders List', 'textdomain'),
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
                        'name' => 'list_content',
                        'label' => esc_html__('Content', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__('List Content', 'textdomain'),
                        'show_label' => false,
                    ],
                    [
                        'name' => 'list_link_img',
                        'label' => esc_html__('link Img', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
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
        $this->start_controls_section(
            'slide2',
            [
                'label' => __('item2', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'slide2_title',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Default description', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );
        $this->add_control(
            'slide2_icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );
        $this->add_control(
            'list2',
            [
                'label' => esc_html__('Sliders List', 'textdomain'),
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
                        'name' => 'list_content',
                        'label' => esc_html__('Content', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__('List Content', 'textdomain'),
                        'show_label' => false,
                    ],
                    [
                        'name' => 'list_link_img',
                        'label' => esc_html__('link Img', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
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
        $this->start_controls_section(
            'slide3',
            [
                'label' => __('item3', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'slide3_title',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Default description', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );
        $this->add_control(
            'slide3_icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );
        $this->add_control(
            'list3',
            [
                'label' => esc_html__('Sliders List', 'textdomain'),
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
                        'name' => 'list_content',
                        'label' => esc_html__('Content', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__('List Content', 'textdomain'),
                        'show_label' => false,
                    ],
                    [
                        'name' => 'list_link_img',
                        'label' => esc_html__('link Img', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
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
        $this->start_controls_section(
            'slide4',
            [
                'label' => __('item4', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'slide4_title',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Default description', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );
        $this->add_control(
            'slide4_icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );
        $this->add_control(
            'list4',
            [
                'label' => esc_html__('Sliders List', 'textdomain'),
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
                        'name' => 'list_content',
                        'label' => esc_html__('Content', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__('List Content', 'textdomain'),
                        'show_label' => false,
                    ],
                    [
                        'name' => 'list_link_img',
                        'label' => esc_html__('link Img', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
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
        $this->start_controls_section(
            'slide5',
            [
                'label' => __('item5', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'slide5_title',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Default description', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );
        $this->add_control(
            'slide5_icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );
        $this->add_control(
            'list5',
            [
                'label' => esc_html__('Sliders List', 'textdomain'),
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
                        'name' => 'list_content',
                        'label' => esc_html__('Content', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__('List Content', 'textdomain'),
                        'show_label' => false,
                    ],
                    [
                        'name' => 'list_link_img',
                        'label' => esc_html__('link Img', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
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
        return ['emap-swiper-js'];
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $uniqID = $this->get_id();
        function slider_template($list, $uniqID,$number='',$settings,$id)
        {
		if ( 'yes' != $settings) {
            if ($list) {
?>
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper<?= $uniqID . $number ?>">
                    <div class="swiper-wrapper">
                <?php

                foreach ($list as $item) {
                    echo '<div class="swiper-slide " >';
                    echo '<div class="container px-0">
                    <div class="  text-left card px-0">
                    <img class="img-fluid" src='.$item['list_img']['url'].'>
                      ' . $item['list_content'] . '
                    </div>
                    <a class="w-100 icon-box" href="' . $item['list_LINK']['url'] . '">
                    <img src="'.$item['list_link_img']['url'].'"></a>
                 </div>
                 </div>';
                }
         
                echo '</div>';
                echo '<div class="scrollbar"><div class="swiper-scrollbar sc'.$uniqID . $number.'"></div></div>';
            }
		}else{
				
			$args = array(
				
				'post_type' => 'post',
				'post_status' => 'publish',
				 'posts_per_page' =>7,
				'tax_query' => array(
    array(
    'taxonomy' => 'category',
    'field' => 'term_id',
    'terms' => $id
     )
  )
			);
			$my_query = new WP_query($args);
	
			?>
			  <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper<?= $uniqID . $number ?>">
                    <div class="swiper-wrapper">
						<?php 
						if ($my_query->have_posts()) :
							while ($my_query->have_posts()) : $my_query->the_post();
			$term_id=get_post_meta(get_the_ID(),'wp_post_brand_cat_id',true);
			      		     echo '<div class="swiper-slide " >';
                 		      echo '<div class="container px-0">
                 			       <div class="  text-left card px-0">
                                   <img class="img-fluid" src='. get_the_post_thumbnail_url() . '>
                  		          <p> ' .  substr(get_the_excerpt(),0,90) . '...</p>
               					     </div>
              				      <a class="w-100 icon-box" href="' . get_the_permalink() . '">
              				      <img class="logo" src="'. get_term_meta($term_id, 'empat_producers_url', true).'"></a>
              				      </div>
                                  </div>';
			
							endwhile;
						endif;
						?>
					 </div>
               <div class="scrollbar"><div class="swiper-scrollbar sc<?= $uniqID . $number ?>"></div></div>
		    <?php
		
		 }
        }

                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="empa_slider_advanced_widget">
                                <li attr-id="<?= $uniqID ?>1" class="active">
                                    <p><img src="<?= $settings['slide1_icon']["value"]["url"]  ?>"></p><?= $settings['slide1_title'] ?>
                                </li>
                                <li attr-id="<?= $uniqID ?>2">
                                    <p><img src="<?= $settings['slide2_icon']["value"]["url"]  ?>"></p><?= $settings['slide2_title'] ?>
                                </li>
                                <li attr-id="<?= $uniqID ?>3">
                                    <p><img src="<?= $settings['slide3_icon']["value"]["url"]  ?>"></p><?= $settings['slide3_title'] ?>
                                </li>
                                <li attr-id="<?= $uniqID ?>4">
                                    <p><img src="<?= $settings['slide4_icon']["value"]["url"]  ?>"></p><?= $settings['slide4_title'] ?>
                                </li>
                                <li attr-id="<?= $uniqID ?>5">
                                    <p><img src="<?= $settings['slide5_icon']["value"]["url"]  ?>"></p><?= $settings['slide5_title'] ?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9 pl-5 pt-3">
                            <ul class="empa_slider_advanced_widget_contents">
                                <li attr-id="<?= $uniqID ?>1">
                                    <?php slider_template($settings['list1'], $uniqID,1,$settings['auto_load'],184) ?>
                                </li>
                                <li attr-id="<?= $uniqID ?>2">
                                    <?php slider_template($settings['list2'], $uniqID,2,$settings['auto_load'],186) ?>
                                </li>
                                <li attr-id="<?= $uniqID ?>3">
                                    <?php slider_template($settings['list3'], $uniqID,3,$settings['auto_load'],188) ?>
                                </li>
                                <li attr-id="<?= $uniqID ?>4">
                                    <?php slider_template($settings['list4'], $uniqID,4,$settings['auto_load'],190) ?>
                                </li>
                                <li attr-id="<?= $uniqID ?>5">
                                    <?php slider_template($settings['list5'], $uniqID,5,$settings['auto_load'],192) ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

        <?php
    }
}

?>