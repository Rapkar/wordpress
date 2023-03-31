<?php

use Elementor\Widget_Base;
use Elementor\Core\Schemes\Typography as Scheme_Typography;

class quize extends \Elementor\Widget_Base
{

    public $domain = 'quize';


    public function get_name()
    {
        return 'quize';
    }

    public function get_title()
    {
        return __(' quize', $this->domain);
    }

    public function get_icon()
    {
        return 'fa fa-heading';
    }
    private function uniqId()
    {
        return uniqid('prefix-');

        // close class
    }
    protected function  register_controls()
    {
        $id = $this->uniqId();
        global $wpdb;
        $category = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}term_taxonomy WHERE `taxonomy` LIKE 'qsm_category'");
        $tem_ids = [];
        foreach ($category as $item) {
            $tem_ids[] = $item->term_taxonomy_id;
        }

        foreach ($tem_ids as $term) {
            $tems[$term] = get_term($term)->name;
        }

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('شرط نمایش', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('اگرجمع امتیازات دسته  بندی', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => $tems,
            ]
        );
        $this->add_control(
            'value',
            [
                'label' => esc_html__('بیشتر از', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '0',
            ]
        );
        $this->add_control(
            'value_2',
            [
                'label' => esc_html__('و اگر کمتر از', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '0',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'content_section_2',
            [
                'label' => __('محتوا متنی', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );
        $this->add_control(
            'content',
            [
                'label' => esc_html__('محتوا خود را وارد کنید', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'متن خود را وارد کنید ',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'content_section_3',
            [
                'label' => __('استایل دهی', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('استایل محتوا', '$this->domain'),
                'name' => 'content_typography',
                'selector' => "{{WRAPPER}} .content",
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('رنگ محتوا', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} .content" => "color: {{VALUE}}",
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => __('استایل عدد', '$this->domain'),
                'name' => 'number_typography',
                'selector' => "{{WRAPPER}} .counter",
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('رنگ عدد', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} .counter" => "color: {{VALUE}}",
                ],
            ]
        );

        $this->add_control(
            'progress_color_1',
            [
                'label' => esc_html__('رنگ پس زمینه نوار پیشرفت', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} .progressbar" => "background: {{VALUE}}",
                ],
            ]
        );
        $this->add_control(
            'progress_color_2',
            [
                'label' => esc_html__('رنگ نوار پیشرفت', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} .progress" => "background: {{VALUE}}",
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php


        $value2 = $settings['value_2'];
        $value = $settings['value'];
        $content = $settings['content'];
        global $wpdb;
        global $post;
        $id = get_the_ID();
        $val = get_post_meta(get_the_ID(), 'mlw_results_page_quiz_id', true);
        $taxonomies = get_taxonomies('', 'names');
        wp_get_post_terms($val, $taxonomies,  array("fields" => "names"));
        $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}mlw_results WHERE quiz_id =" . $val . " AND user = " . get_current_user_id() . " ORDER BY unique_id DESC");

        $cats = maybe_unserialize($results[0]->quiz_results);
        $question = [];
        $cat_point_total_conut = 0;
        $cat_point_total = [];

        foreach ($cats[1] as $key => $items) {
            foreach ($items["multicategories"] as $item) {
                $cat_point_total[$item] += 1;
            }
            if (is_array($items["multicategories"])) {
                foreach ($items["multicategories"] as $item) {
                    if(is_integer($item)){
                    $question[$item] +=  $items["points"];
                    }
                }
            };
        }
        $point =   intval($question[$settings['category']]);
        $point_total = $results[0]->point_score;
        $point_new = $cat_point_total[$settings['category']];
        $progress = ($point * 10) /  $point_new;
        $progress=round($progress) ;
        $uniqID = $this->uniqId();
        ?>
        <div class="nehsidget">
            <?php

            if ($point > $value  &&  $point < $value2) {
                echo '
            
                <div class="progressbar">
          
                  <span id="hen' . $uniqID . '" class="progress"></span>
               
                  <div id="hencunt' . $uniqID . '" class="hencunt' . $uniqID . ' counter">0</div>
                </div>
                
                <script>
                jQuery(document).ready(function($) {
                    var progress = $(".progressbar  #hen' . $uniqID . '");
                    function counterInit( fValue, lValue ) {
                      var counter_value = parseInt( $("#hencunt' . $uniqID . '").text() );
                      counter_value++;
                    
                      if( counter_value >= fValue && counter_value <= lValue ) {
                    
                        $("#hencunt' . $uniqID . '").text( counter_value + "%" );
                        progress.css({ "width": counter_value + "%" });
                    
                        setTimeout( function() {
                          counterInit( fValue, lValue );
                        }, 50 );
                    
                    
                      }
                    
                    }
                    
                    counterInit(  0, ' . round($progress) . ');
                    });
                </script> ';
            ?>
                <div class="content">
                    <?php

                    echo $content;
                    ?>
                </div>
            <?php
            } else {
            }

            ?>
        </div>
<?php

    }
}
