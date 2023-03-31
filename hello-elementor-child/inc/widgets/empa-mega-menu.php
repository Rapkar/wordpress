<?php

// use Elementor\Widget_Base;
require __DIR__ . '/menu/custom-menu.php';
class empa_mega_menu extends \Elementor\Widget_Base
{

    public $domain = 'empa';


    public function get_name()
    {
        return 'empa_mega_menu';
    }

    public function get_title()
    {
        return __('empa_mega_menu', $this->domain);
    }

    public function get_icon()
    {
        return 'eicon-table-of-contents';
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
        <div class="empa-sidebar-widget">
            <?php wp_nav_menu(array('theme_location' => 'Header', 'container' => false, 'menu_class' => 'empa-cs-menu', 'walker' => new Empa_Nav_Walker())); ?>
        </div>
<?php

    }
}

?>