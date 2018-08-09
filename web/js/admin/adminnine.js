$(document).ready(function(){

    /* url  navigation active */
    var url = window.location;
    var element = $('.sidebar ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent().addClass('in').parent().parent().addClass('active');

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }



    /* Side menu drop down code */
    $(".menudropdown").on('click',function(){
        if( $(this).parent().hasClass("active")==true){
            $(this).next("ul.nav").slideUp();
            $("ul.nav").parent().removeClass("active");
        }else{
            $(".sidebar-nav ul.nav ul.nav").slideUp();
            $("ul.nav").parent().removeClass("active");
            $(this).next("ul.nav").slideToggle();
            $(this).parent().toggleClass("active");
        }
    });
    $(".menudropdown2").on('click',function(){
        if( $(this).parent().hasClass("active")==true){
            $(this).next("ul.nav").slideUp();
            $(this).parent().removeClass("active");
        }else{
            $(this).next("ul.nav").slideDown();
            $(this).parent().addClass("active");
        }
    });

    /* Chat icon click show chat window*/
    $(".chatbtn").on('click',function(event){
        $(this).toggleClass("active");
        $(".chat-panel").toggleClass("active");

    });




    /* Search width increase decrease */
    $(".searchglobal .form-control").focusin(function(){
        $(this).parent().addClass("active");
    });
    $(".searchglobal .form-control").focusout(function(){
        $(this).parent().removeClass("active");
    });



    /* Hide count on click top navigation*/
    /*$(".navbar-top-links li a").on('click',function(){
        $(this).find(".count").fadeOut();

    });*/


    /* Hide sidebar on click square icon */
    $(".menubtn").on('click',function(){
        $(this).toggleClass("active");
        $("body").toggleClass("menuclose");

    });

    /* small sidebar on click top menu icons*/
    $(".navbar-toggle").on('click',function(){
        $(this).toggleClass("active");
        $("body").toggleClass("menusmall");

    });

    /* small sidebar on click top menu icons*/
    $(".mailclose").on('click',function(){
        $('.mailcompose').removeClass("active");

    });


    /* Create mail popup */
    $(".mailbtn, .compose").on('click',function(){
        $('.mailcompose').addClass("active");

    });

    /* Fedback popover */
    $(".feedbackbtn").on('click',function(){
        $(this).parent().toggleClass("active");

    });


    /* Tool tip execution*/
    $('[data-toggle="tooltip"]').tooltip();


    /* Toast message appends here at bosy tag */
    /*setTimeout(function(){
        $('body').append('<div class="alert alert-info toastupdates alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <strong>Updates</strong><p>Check it out with our classic designed about page. <a href="aboutus.html">Click here!</a></p></div>');

        setTimeout(function(){
            $('.toastupdates').addClass("active");
        },1000);
    },5000);*/


    /* Small menu on load while screen size is smaller tahn 1180*/
    if( $(window).width() <= 1180){
        $("body").addClass("menusmall");

    }else {
        $("body").removeClass("menusmall");
    }


    $(window).on("load resize", function(){
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }

        if( $(window).width() <= 1180){
            $("body").addClass("menusmall");
        }else {

        }
        /* loading screen */
        $(".loader").fadeOut("slow");
    });

    $(document).on('scroll', function() {
        /* on scroll change about us page header background color */
        if ($(document).scrollTop() >= 100) {
            $('.aboutheader').addClass("active");
        } else {
            $('.aboutheader').removeClass("active");
        }
    });



    

    //$('#mapwrap').vectorMap({map: 'world_mill'});


    $('.module_setting').change(function(e) {
        var id = $(this).attr('data-id');
        var val = $(this).val();
        if (val == '1') $(this).val('0');
        else $(this).val('1');
        val = $(this).val();
        $.ajax({
            url: '/admin/settings/change',
            data: {'id': id, 'val': val},
            method: 'POST',
            success: function(response) {

            }
        });
    });


    $('body').on('click', 'button.delete_char_slide', function(e) {
        e.preventDefault();
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('#delete_char_slide_modal .modal-body').html(name);
        $('#delete_char_slide_modal #delete_char_slide_button').attr('data-id', id);
        $('#delete_char_slide_modal').modal('show');
    });

    $('#delete_char_slide_modal #delete_char_slide_button').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/characters/delete-slide',
            data: {'id': id},
            method: 'POST',
            success: function(response) {
                location.reload();
            }
        });
    });

    $('body').on('click', 'button.delete_us_slide', function(e) {
        e.preventDefault();
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('#delete_us_slide_modal .modal-body').html(name);
        $('#delete_us_slide_modal #delete_us_slide_button').attr('data-id', id);
        $('#delete_us_slide_modal').modal('show');
    });

    $('#delete_us_slide_modal #delete_us_slide_button').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/usage/delete-slide',
            data: {'id': id},
            method: 'POST',
            success: function(response) {
                location.reload();
            }
        });
    });
});

$('.img_preview').change(function () {

    var input = $(this)[0];
    var id = $(this).attr('id');
    if (input.files && input.files[0]) {
        if (input.files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('div[data-input='+id+']').find('div').attr('style', 'background-image: url("'+e.target.result+'");');
                $('div[data-input='+id+']').find('div').addClass('member');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            console.log('ошибка, не изображение');
        }
    } else {
        console.log('хьюстон у нас проблема');
    }
});

$('.delete_img_preview').click(function(e) {
    e.preventDefault();
    $(this).parent().removeClass('member');
    $(this).parent().removeAttr('style');
    $('#'+$(this).attr('data-input')).val('');
});

/*Morris.Donut({
    element: 'morris-donut-chart',
    data: $.parseJSON($('#morris-donut-chart').attr('data-content')),
    resize: true,
    colors: ["#03A9F4","#FFC107", "#F44336"]
});*/





 