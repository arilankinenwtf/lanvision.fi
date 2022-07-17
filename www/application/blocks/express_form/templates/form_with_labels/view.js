$('.form-without-labels .mb-3').each(function(){
    var label = $(this).find('.form-label').text();
    $(this).find('.form-control').attr('placeholder',label);
    $(this).find('option[value=""]').text(label);
  });