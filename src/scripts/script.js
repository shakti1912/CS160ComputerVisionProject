$(document).ready(function() {
  $('form > input.userField').keyup(function() {
    var empty = false;

    $('form > input.userField').each(function() {
      if($(this).val() == '') {
        empty = true;
      }
    });

    if(empty) {
      $('button.btn.btn-lg.btn-primary.btn-block').attr('disabled', 'disabled');
    } else {
      $('button.btn.btn-lg.btn-primary.btn-block').removeAttr('disabled');
    }

  });

});
