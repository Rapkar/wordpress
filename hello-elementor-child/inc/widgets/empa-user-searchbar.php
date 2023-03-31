<?php

// use Elementor\Widget_Base;

class empa_user_searchbar extends \Elementor\Widget_Base
{

    public $domain = 'empa';



    public function get_name()
    {
        return 'empa_user_searchbar';
    }

    public function get_title()
    {
        return __('empa_user_searchbar', $this->domain);
    }

    public function get_icon()
    {
        return  'eicon-search';
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



    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>
        <div class="account-menu searchbar">
            <div class="d-flex align-items-center ">
                <a class="mr-3 d-flex align-items-center account-menu-item " href="#">
                   <img src="https://empa.utechia.co/wp-content/uploads/2023/03/Componendcsdt-47-–-120-1.svg">
                    <h2 class="sm-text pl-3 m-0">
                        ARAMA
                    </h2>

                </a>
                <div style="display:none; z-index:999;" class="container-fluid left-0 top-0 position-fixed blue-bg h-125p align-items-center z-2  searchbar_box">
                    <div class="container">
                        <form class="d-flex align-items-center h-100" >
                            <div class="d-flex align-items-center w-100 mt-2 ">
                                <label class="mb-4 pt-2">ARAMA KATEGORİSİ
                                    <select class="mt-2">
                                        <option>TÜM SİTEDE ARA</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </label>
                                <input type="text">
                                <button> <i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
				 <a href="#" class="close-btn">
                        KAPAT
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>

            </div>


        </div>
<?php

    }
}

?>