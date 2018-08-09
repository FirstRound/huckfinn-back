$(document).ready(function () {

	$('.slider-init').slick({
		centerMode: true,
		centerPadding: '0',
		slidesToShow: 3,
	    dots: true,
         responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 1,
                centerMode: false
                
              }
            }
         ]
	});
    
  $('.attraction__slider-for').slick({
    	slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    asNavFor: '.attraction__slider-nav',
    infinite: false
  });

  $('.attraction__slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.attraction__slider-for',
      infinite: false,
      dots: false,
      centerMode: false,
      focusOnSelect: true,
  });

  $('#phone').mask('(000) 000-0000');

  $('.line-up-wrap div').click(function(e) {
    var id = $(this).attr('data-id');
    $.post({
        url: '/site/get-lineup-item',
        data: {'id': id, '_csrf': $('meta[name=csrf-token]').attr('content')},
        success: function(response) {
            var res = $.parseJSON(response);
            $('#line_up_modal h3').html(res['title']);
            $('#line_up_modal .img').html('<img src="'+res['img']+'" class="img-responsive">');
            $('#line_up_modal .text').html(res['text']);
            $('#line_up_modal').modal('show');
        }
    });
  });

  $('#form-subscribe').on('submit', function(e) {
    e.preventDefault();
    var $form = $('#form-subscribe');
    var $email = $('#email');
    var $phone = $('#phone');
    var strEmail = $email.val();
    var strPhone = $phone.val();

    var r = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    if(!r.test(strEmail)) {
        $email.parent().addClass('has-error');
        return false;
    } else {
      $email.parent().removeClass('has-error');
    }

    if(strPhone.length < 14 || strPhone.indexOf('_') != -1) {
      $phone.parent().addClass('has-error');
      return false;
    } else {
      $phone.parent().removeClass('has-error');
    }

    $.ajax({
      type: "POST",
      async: false,
      url: "https://huckfinnsub.herokuapp.com/subscribers",
      data: 'email='+strEmail+'&phone='+strPhone,
      dataType: "html",
      success: function(data) {
        $form.trigger( 'reset');
        $('#thx').modal('show');
      }
    });
  });

  $('#form-subscribe input').focusin(function(){
    $(this).parent().removeClass('has-error');
  });

  $('#volonter').on('submit', function(e) {
    e.preventDefault();
    var $form = $(this);
    var $name = $('#name');
    var $email = $('#email');
    var $subject = $('#subject');
    var $message = $('#message');


    if($name.val() == '') {
      $name.parent().addClass('has-error');
      return false;
    } else {
       $name.parent().removeClass('has-error');
    }

    var r = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    if(!r.test($email.val())) {
        $email.parent().addClass('has-error');
        return false;
    } else {
      $email.parent().removeClass('has-error');
    }

    if($subject.val() == '') {
      $subject.parent().addClass('has-error');
      return false;
    } else {
      $subject.parent().removeClass('has-error');
    }

    if($message.val() == '') {
      $message.parent().addClass('has-error');
      return false;
    } else {
      $message.parent().removeClass('has-error');
    }

    $.ajax({
      type: "POST",
      async: false,
      url: "https://huckfinnsub.herokuapp.com/subscribers/message",
      data: 'email='+$email.val()+'&name='+$name.val()+'&subject='+$subject.val()+'&message='+$message.val(),
      dataType: "html",
      success: function(data) {
        $form.trigger( 'reset');
        $('#thx').modal('show');
      }
    });
  });

   $('#volonter input, #message').focusin(function(){
    $(this).parent().removeClass('has-error');
  });
});

