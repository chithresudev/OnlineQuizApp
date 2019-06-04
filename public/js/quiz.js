$(document).ready(function(){
   // Quiz Timer 60 seconds with timeout

    var timesec = $('#timer').data('timer');
    var interval = setInterval(function() {

    var timer = timesec.split(':');
    var minutes = parseInt(timer[0], 10);
    var seconds = parseInt(timer[1], 10);
    --seconds;
    minutes = (seconds < 0) ? --minutes : minutes;
    if (minutes < 0) clearInterval(interval);
    seconds = (seconds < 0) ? 60 : seconds;
    seconds = (seconds < 10) ? '0' + seconds : seconds;
    $('#timer').html('00' + ':' + seconds);
    timesec = minutes + ':' + seconds;
    if(timesec == '0:00') {
      $('#quiz_app').submit();
    }
  }, 1000);



// Each Question One by one View
  var question = 1;
  $('[data-question]').hide();
  $('[type=submit]').hide();
  $('[type=radio]').css({'cursor' : 'hover'});
  $('[data-question='+ question + ']').show();

  $('[type=radio]').change(function(){

      if(question === 5) {
          $('[type=submit]').show();
      } else {
          $('[data-question='+ question + ']').hide();
          question ++;
          $('[data-question='+ question + ']').show();
      }

  });
});
