//banner slider
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 0,
  slidesPerView: 3,
  freeMode: false,

  watchSlidesProgress: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

});
var swiper2 = new Swiper(".mySwiper2", {
  spaceBetween: 0,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  thumbs: {
    swiper: swiper,
  },
});
//banner slider
new Swiper(".swiper" + jQuery('.empa_slider_advanced_widget > li').attr('attr-id'), {
  spaceBetween: 30,
  slidesPerView: 2,
  freeMode: false,
	    scrollbar: {
      el: ".sc" + jQuery('.empa_slider_advanced_widget > li').attr('attr-id'),
    },
});
jQuery('.empa_slider_advanced_widget li').on('click', function () {
  jQuery('.empa_slider_advanced_widget_contents li').fadeOut();
  jQuery('.empa_slider_advanced_widget li').removeClass('active');
  jQuery(this).toggleClass('active');
  jQuery('.empa_slider_advanced_widget_contents li[attr-id=' + jQuery(this).attr('attr-id') + ']').fadeIn();
  new Swiper(".swiper" + jQuery(this).attr('attr-id'), {
    spaceBetween: 30,
    slidesPerView: 2,
    freeMode: false,
    scrollbar: {
      el: ".sc" + jQuery(this).attr('attr-id'),
//       hide: false,
    },
  });
});
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
