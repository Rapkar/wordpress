document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  var emap_events = JSON.parse(my_ajax_object.emap_events);
  console.log(emap_events);
  let date1 = [];
  emap_events.forEach(element => {
    date1.push({ title: element.title, start: element.date, url: element.id });
  });
  // console.log(date1);
  date2 = JSON.stringify(date1);
  console.log(emap_events, date2);
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    locale: 'tr',
    // initialDate: '2023-01-12',
    initialDate: new Date(),
    navLinks: false, // can click day/week names to navigate views
    selectable: true,
    selectMirror: false,
    select: function (arg) {


    },

    eventClick: function (arg) {

    },
    dateClick: function (info) {
      // change the day's background color just for fun
      jQuery('.fc-day').removeClass('active');
      jQuery(info.dayEl).addClass('active');
      jQuery('#calendar-content').slideUp();
      jQuery.ajax({
        url: my_ajax_object.ajax_url,
        type: "POST",
        data: {
          'action': 'load_events',
          'event_id': jQuery(info.dayEl).find('.fc-daygrid-event-harness').find('a').attr('href'),
        }
      }).done(function (response) {
        jQuery('#calendar-content').empty();
        jQuery('#calendar-content').append(response);
        jQuery('#calendar-content').slideDown();
      });
    },
    editable: false,
    dayMaxEvents: true, // allow "more" link when too many events
    events:

      // {
      //   groupId: 999,
      //   title: 'Repeating Event',
      //   start: '2023-01-09T16:00:00'
      // },
      // {
      //   groupId: 999,
      //   title: 'Repeating Event',
      //   start: '2023-01-16T16:00:00'
      // },
      // {
      //   title: 'Conference',
      //   start: '2023-01-11',
      //   end: '2023-01-13'
      // },

      // {
      //   title: 'Birthday Party',
      //   start: '2023-01-13T07:00:00'
      // },
      // {
      //   title: 'Click for Google',
      //   url: 'http://google.com/',
      //   start: '2023-01-28'
      // },
      date1

  });



  calendar.render();
});

document.addEventListener('DOMContentLoaded', function () {

  var node = document.querySelectorAll('#calendar .fc-daygrid-event-harness');
  node.forEach(element => {
    console.log(jQuery(element).parent().append('<span class="squre"></span>'));
  });
});