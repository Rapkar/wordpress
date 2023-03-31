<?php

// use Elementor\Widget_Base;

class empa_breadcrumb_widget extends \Elementor\Widget_Base
{

    public $domain = 'empa';


    public function get_name()
    {
        return 'empa_breadcrumb_widget';
    }

    public function get_title()
    {
        return __('empa_breadcrumb_widget', $this->domain);
    }

    public function get_icon()
    {
        return 'eicon-form-vertical';
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
        <div class="container mb-5">
            <div class="empa-breadcrumb mt-3">

                <?php

                echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
                echo "&nbsp;,&nbsp;";
                echo '<a href="' . get_permalink(wp_get_post_parent_id(get_queried_object_id())) . '" rel="nofollow">' . get_the_title(wp_get_post_parent_id(get_queried_object_id())) . '</a>';
                echo "&nbsp;,&nbsp;";
                echo  get_the_title(get_queried_object_id());

                ?>
            </div>

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

        <div id="sec2" class="tabcontent calendar px-0">
            <div id='calendar' class="px-0"></div>
            <div id="calendar-content">
                <div class="row px-4 mt-4 px-0">
                    <div class="col-lg-4 px-0">
                        <img class="img-fluid" src="http://127.0.0.1/empa/empa/wp-content/uploads/2023/03/wer.jpg">
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