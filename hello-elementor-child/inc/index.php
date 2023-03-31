<?php

add_action('elementor/widgets/register', function ($widgets_manager) {
  if (!defined('ABSPATH')) exit;
  require(__DIR__  . "/widgets/slider-banner.php");
  require(__DIR__  . "/widgets/slider-advanced.php");
  require(__DIR__  . "/widgets/event-advanced.php");
  require(__DIR__  . "/widgets/emap-sidebar.php");
  require(__DIR__  . "/widgets/emap-timeline.php");
  require(__DIR__  . "/widgets/empa-faqs.php");
  require(__DIR__  . "/widgets/empa-user-account.php");
  require(__DIR__  . "/widgets/empa-user-searchbar.php");
  require(__DIR__  . "/widgets/empa-mega-menu.php");
  require(__DIR__  . "/widgets/empa-breadcrumb.php");


  // Let Elementor know about our widget
  $widgets_manager->register(new \empa_slider_banner_widget);
  $widgets_manager->register(new \empa_slider_advanced_widget);
  $widgets_manager->register(new \empa_event_advanced_widget);
  $widgets_manager->register(new \empa_sidebar_widget);
  $widgets_manager->register(new \empa_timeline_widget);
  $widgets_manager->register(new \empa_faqs_widget);
  $widgets_manager->register(new \empa_user_account);
  $widgets_manager->register(new \empa_user_searchbar);
  $widgets_manager->register(new \empa_mega_menu);
  $widgets_manager->register(new \empa_breadcrumb_widget);
});
