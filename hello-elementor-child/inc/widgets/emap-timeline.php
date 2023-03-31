<?php

// use Elementor\Widget_Base;

class empa_timeline_widget extends \Elementor\Widget_Base
{

    public $domain = 'empa';

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);


        wp_register_script('empa-timeline', get_stylesheet_directory_uri() . '/inc/widgets/assets/js/timeline.js');
  }

    public function get_name()
    {
        return 'empa_timeline_widget';
    }

    public function get_title()
    {
        return __('empa_timeline_widget', $this->domain);
    }

    public function get_icon()
    {
        return  'eicon-filter';
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
            'list1',
            [
                'label' => esc_html__('Sliders List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name' => 'list_title',
                        'label' => esc_html__('title', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Content', 'textdomain'),
                        'show_label' => true,
                    ],
                    [
                        'name' => 'list_id',
                        'label' => esc_html__('id', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'show_label' => true,
                    ],
                ],
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'textdomain'),
                        'list_id' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'textdomain'),
                        'list_id' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
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
?>
        <div class="empa_timeline_widget">
            <ul class="d-flex flex-column">
                <?php foreach( $settings['list1']  as $item) :  ?>
                <li attr-id='<?= $item['list_id'] ?>'>
                <a  href="#"><?= $item['list_title'] ?></a>
                    <span></span>
                    <span></span>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>
<?php

    }
}

?>