// jQuery(document).ready(function ($) {

//     jQuery('.empa_slider_advanced_widget li').on('click',function(){
//         jQuery('.empa_slider_advanced_widget_contents li').fadeOut();
//         jQuery('.empa_slider_advanced_widget_contents li[attr-id='+jQuery(this).attr('attr-id') +']').fadeIn();
//     });
// });

jQuery('#empa_faqs_tag_option').on('change', function (e) {
  var optionSelected = jQuery("option:selected", this);
  var valueSelected = this.value;
  jQuery.ajax({
    url: my_ajax_object.ajax_url,
    type: "POST",
    data: {
      'action': 'empa_faqs_load',
      'tag_id': valueSelected,
    }
  }).done(function (response) {
    jQuery('#accordion').empty();
    jQuery('#accordion').append(response);
    jQuery('#accordion').slideDown();
  });
})
jQuery('#empa_faqs_tag_option_serachbar').submit(function (e) {
  e.preventDefault();
  jQuery.ajax({
    url: my_ajax_object.ajax_url,
    type: "POST",
    data: {
      'action': 'empa_faqs_load_serachbar',
      'slug': jQuery('#empa_faqs_tag_option_serachbar input[name="search-input"]').val(),
    }
  }).done(function (response) {
    jQuery('#accordion').empty();
    jQuery('#accordion').append(response);
    jQuery('#accordion').slideDown();
  });
})

jQuery('.account-menu a').hover(function () {
  jQuery('.account-menu ul').fadeIn();
  jQuery('.account-menu .menu ').addClass('test');
})

jQuery('.searchbar a').on('click', function (e) {
  e.preventDefault();
  jQuery('.searchbar_box').slideDown('slow');
  jQuery('.searchbar_box').css('pointer-events', 'all');
  jQuery('.searchbar_box').addClass('d-flex')

})
jQuery('.searchbar a.close-btn').on('click', function (e) {
	 jQuery('.searchbar_box').slideUp('slow');
  jQuery('.searchbar_box').removeClass('d-flex')
  jQuery('.searchbar_box').css('pointer-events', 'none');
});
jQuery('.mySwiper2').on('click', function (e) {

  jQuery('.searchbar_box').slideUp('slow');
  jQuery('.searchbar_box').removeClass('d-flex')
  jQuery('.searchbar_box').css('pointer-events', 'none');
})
jQuery(window).on("scroll", function() {
   
  jQuery('.searchbar_box').slideUp('slow');
  jQuery('.searchbar_box').removeClass('d-flex')
  jQuery('.searchbar_box').css('pointer-events', 'none');

});
jQuery('.producer-cat-list li a').on('click', function (e) {
  e.preventDefault();
  jQuery('.producer-list').empty();
  // jQuery('.producer-list').fadeOut();
  jQuery.ajax({
    url: my_ajax_object.ajax_url,
    type: "POST",
    data: {
      'action': 'empa_load_producer_cat_list',
      'id': jQuery(this).attr('attr-id'),
    }
  }).done(function (response) {
    jQuery('.producer-list').empty();
    jQuery('.producer-list').append(response.data.html);
    jQuery('.producer-list').fadeIn('slow');
  });
})
function openinsidebox(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontentinside");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tabinside");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}