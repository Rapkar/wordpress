<?php

// use Elementor\Widget_Base;

class empa_user_account extends \Elementor\Widget_Base
{

    public $domain = 'empa';

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);


        wp_register_script('empa-timeline', get_stylesheet_directory_uri() . '/inc/widgets/assets/js/timeline.js');
    }

    public function get_name()
    {
        return 'empa_user_account';
    }

    public function get_title()
    {
        return __('empa_user_account', $this->domain);
    }

    public function get_icon()
    {
        return  'eicon-person';
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
        return ['empa-timeline'];
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (!is_user_logged_in()) {

            $address = get_home_url('') . '/Login';
            $status = 'GİRİŞ YAP';
        } else if (get_user_meta(get_current_user_id(), 'show_admin_bar_front', true) == true) {
            $address = get_dashboard_url();
            $status = 'GİRİŞ YAP';
        } else if (get_user_meta(get_current_user_id(), 'show_admin_bar_front', true) == false) {
            $address = get_home_url('');
            $status = 'GİRİŞ YAP';
        }
?>
        <div class="account-menu">
            <div class="d-flex align-items-center ">
                <a href="#" class="mr-3 d-flex align-items-center account-menu-item toggle-account" href="<?= $address  ?>">
<!--                     <i aria-hidden="true" class="fas fa-user-circle"></i> -->
					<img src="/wp-content/uploads/2023/03/Group-9178.svg">
                    <h2 class="sm-text pl-3 m-0">
                        <?= $status ?>
                    </h2>
                  
                </a>
                <?php
                wp_nav_menu(['theme_location' => 'account'])
                ?>

            </div>


        </div>
<?php

    }
}

?>