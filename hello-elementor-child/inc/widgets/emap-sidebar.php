<?php

// use Elementor\Widget_Base;

class empa_sidebar_widget extends \Elementor\Widget_Base
{

    public $domain = 'empa';


    public function get_name()
    {
        return 'empa_sidebar_widget';
    }

    public function get_title()
    {
        return __('empa_sidebar_widget', $this->domain);
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

        </div>
<?php

    }
}

?>