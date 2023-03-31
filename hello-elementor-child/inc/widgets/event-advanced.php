<?php

// use Elementor\Widget_Base;

class empa_event_advanced_widget extends \Elementor\Widget_Base
{

    public $domain = 'empa';

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);


        wp_register_script('calender-core', get_stylesheet_directory_uri() . '/inc/widgets/assets/js/index.global.min.js');
        wp_register_script('calender-custom', get_stylesheet_directory_uri() . '/inc/widgets/assets/js/calender.js', ['calender-core']);

        $args = array(
            'post_type' => 'empa-events',
            'post_status' => ['future'],
        );
        $dates=[];
        $my_query = new WP_query($args);
        if ($my_query->have_posts()) :
            while ($my_query->have_posts()) : $my_query->the_post();
            $dates[]=['date'=>get_the_date('Y-m-d'),'title'=>get_post_meta(get_the_ID(),'calender_title_event',true),'id'=>get_the_ID()];
            endwhile;
        endif;
        $dates= json_encode( $dates);
        wp_localize_script('calender-custom', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php'),'emap_events'=>$dates));
    }

    public function get_name()
    {
        return 'empa_event_advanced_widget';
    }

    public function get_title()
    {
        return __('empa_event_advanced_widget', $this->domain);
    }

    public function get_icon()
    {
        return 'eicon-table';
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
			'btn_url',
			[
				'type' => \Elementor\Controls_Manager::URL,
				'label' => esc_html__( 'url', 'textdomain' ),
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);
        $this->add_control(
			'btn_text',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'textdomain' ),
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
			]
		);
        // $this->add_control(
        //     'btn_text',
        //     [
        //         'label' => esc_html__('Description', 'textdomain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'rows' => 10,
        //         'default' => esc_html__('Default description', 'textdomain'),
        //         'placeholder' => esc_html__('Type your description here', 'textdomain'),
        //     ]
        // );

        $this->end_controls_section();
    }
    public function get_script_depends()
    {
        return ['calender-custom'];
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <!-- Tab links -->
        <div class="tab px-4 ml-2 mb-4">
            <button class="tablinks active" onclick="openCity(event, 'sec1')">GELECEK ETKINLIKLER</button>
            <button class="tablinks" onclick="openCity(event, 'sec2')">TAKVIMLE BAK</button>
            <button class="tablinks" onclick="openCity(event, 'sec3')">ETKINLINK ARSIVI</button>
        </div>

        <!-- Tab content -->
        <div id="sec1" class="tabcontent px-0 " style="display: block;">
            <ul class="event-loop">
                <?php
                $args = array(
                    'post_type' => 'empa-events',
                    'post_status' => 'future',
                );
                $my_query = new WP_query($args);
                if ($my_query->have_posts()) :
                    while ($my_query->have_posts()) : $my_query->the_post();
                ?>

                        <li class="row">

                            <div class="col-lg-4 pl-2">
                                <img src="<?= get_the_post_thumbnail_url() ?>">
                            </div>
                            <div class="col-lg-8 d-flex flex-column">

                                <h2><?= get_the_title() ?></h2>
                                <date class="mb-1"><?= get_the_date('d M Y') ?></date>

                                <author> <?= get_post_meta(get_the_ID(), 'status_event', true) ?></author>
                                <span> <?php # echo  get_post_meta(get_the_ID(), 'Organizer_event', true) ?> Katılımcılar ST</span>
                                <p class="mt-1"> <?= get_the_excerpt() ?><a href="#">..&nbsp;DEVAMINI OKU</a></p>
                                   <a href="<?= get_post_meta(get_the_ID(),'calender_link_event',true) ?>"> AYRINTILI BiLGi VE KATILIM</a>
                            </div>

                        </li>
                <?php
                    endwhile;
                endif;
                ?>

            </ul>
        </div>

        <div id="sec2" class="tabcontent calendar px-0">
            <div id='calendar' class="px-0"></div>
            <div id="calendar-content">
                <div class="row pl-4 mt-4 px-0 pr-0">
                    <div class="col-lg-4 px-0">
                        <img class="img-fluid" src="/wp-content/uploads/2023/03/wer.jpg">
                    </div>
                    <div class="col-lg-8 d-flex flex-column pl-4">
                        <h2>Etlink Adi</h2>
                        <date>5 Etlink Adi ayo</date>
                        <locate>Lorem ipsum dolor sit amet, consectetur</locate>
                        <span>Bil gates</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mattis convallis nisi rhoncus pulvinar. Donec nec vehicula est. Morbi dictum purus arcu, ac luctus tortor bibendum id. Donec non condimentum sem. Morbi diam elit, tempor nec bibendum eget, sagittis at est. Vestibulum et tortor varius, vehicula ex id, malesuada arcu. Nam vitae accumsan nibh. Duis congue lectus nec orci tincidunt ultricies. Cras magna dolor. Condimentum et venenatis vitae, egestas vel libero. Mauris viverra enim libero, vel commodo tellus tristique sed. Fusce molestie eget nunc sed placerat. Phasellus dignissim faucibus nisi, quis congue magna vestibulum a. Donec ornare consequat neque, in aliquet leo pretium eget. Integer consequat sapien ac eros posuere porta. Sed placerat sed mauris sed efficitur. Mauris porttitor, ipsum sed vulputate fringilla, ipsum ligula ultrices sapien, sit amet eleifend diam eros non felis. Aenean fermentum placerat libero ut venenatis. Sed laoreet est non ante placerat ullamcorper. Sed eleifend tortor et mi consequat vestibulum. Maecenas auctor facilisis consequat. Ut semper semper scelerisque. Duis vitae malesuada ipsum. Aenean volutpat, ligula nec vehicula efficitur, odio mauris dictum justo, ut tincidunt tortor magna sit amet ipsum. Sed ullamcorper ante sed est fringilla ornare. Donec maximus ante egestas placerat luctus. Morbi sed ipsum at nulla accumsan finibus id tempor metus.
                        </p>
                    </div>
                </div>
            </div>
            <a class="calendar-large-btn" href="<?=  $settings['btn_url']['url'] ?>"><?=  $settings['btn_text'] ?></a>
        </div>

        <div id="sec3" class="tabcontent">
            <ul class="event-loop">
                <?php
                $args = array(
                    'post_type' => 'empa-events',
                    'post_status' => 'publish',
                );
                $my_query = new WP_query($args);
                if ($my_query->have_posts()) :
                    while ($my_query->have_posts()) : $my_query->the_post();
 
                ?>

                        <li class="row">

                            <div class="col-lg-4 pl-2">
                                <img src="<?= get_the_post_thumbnail_url() ?>">
                            </div>
                            <div class="col-lg-8 d-flex flex-column">

                                <h2><?= get_the_title() ?></h2>
                                <date class="mb-1"><?= get_the_date('d M Y') ?></date>
                                <author> <?= get_post_meta(get_the_ID(), 'status_event', true) ?></author>
                                <span> <?= get_post_meta(get_the_ID(), 'Organizer_event', true) ?></span>
                                <p class="mt-1"> <?= get_the_excerpt() ?></p>
                                <a href="<?= get_the_permalink() ?>"> AYRINTILI BiLGi VE KATILIM</a>
                            </div>

                        </li>
                <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </div>
<?php
    }
}

?>