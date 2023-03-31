<?php

// use Elementor\Widget_Base;

class empa_faqs_widget extends \Elementor\Widget_Base
{

  public $domain = 'empa';

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);


    wp_register_script('empa-timeline', get_stylesheet_directory_uri() . '/inc/widgets/assets/js/timeline.js');
  }

  public function get_name()
  {
    return 'empa_faqs_widget';
  }

  public function get_title()
  {
    return __('empa_faqs_widget', $this->domain);
  }

  public function get_icon()
  {
    return  'eicon-toggle';
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
    <div class="container empa_faqs_widget px-0">
      <div class="my-5">
        <?php
        $tags = get_terms([
          'taxonomy'  => 'empa_faqs_tag',
          'hide_empty'    => true
        ]);
        ?>
<div class="empa_faqs_tag_option_serachbar">
  <form role="search" id="empa_faqs_tag_option_serachbar" method="post">
<input type="text" name="search-input" placeholder="ARAMA YAPMAK İÇİN BİR KELİME GİRİN"  >
<button type="submit">
  <img src="<?= get_stylesheet_directory_uri().'/img/zoom-ico.svg' ?>">
</button>
  </form>

</div>
<div class="empa_faqs_tag_option">
        <select id="empa_faqs_tag_option">
			<option value="all">TÜM KATEGORİLER</option>
          <?php foreach ($tags as $tag) { ?>
            <option value="<?= $tag->term_id ?>"><?= $tag->name ?></option>
          <?php } ?>

        </select>
        </div>
      </div>

      <div id="accordion">
        <?php
	  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'empa-faqs',
          'post_status' => 'publish',
		 'posts_per_page' => 10,
   		 'paged' => $paged,

        );
        $my_query = new WP_query($args);
        if ($my_query->have_posts()) :
          while ($my_query->have_posts()) : $my_query->the_post();
        ?>
            <div class="card  ">
              <div class="col-1 toggle" data-toggle="collapse" href="#collapse<?= get_the_ID() ?>"><span>+</span></div>
              <div class="card-header col-11 ">

                <a class="card-link" data-toggle="collapse" href="#collapse<?= get_the_ID() ?>">
                  <?= get_the_title() ?>
                </a>
              </div>

              <div id="collapse<?= get_the_ID() ?>" class="collapse " data-parent="#accordion">
                <div class="card-body">
                  <?php

                  echo  get_post_meta(get_the_ID(), 'empa_answer_title', true);
                  ?>
                </div>
              </div>
            </div>
        <?php endwhile;
	  
	          echo '<div class="float-right d-flex mr-3 mt-5">';   
	  $total_pages = $my_query->max_num_pages;

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('ÖNCEKİ'),
            'next_text'    => __('SONRAKİ'),
        ));
    }   
  echo '<div>';
        endif; ?>


      </div>
    </div>

<?php

  }
}

?>