var $document = jQuery( document );

$document.ready(function($){

    $(".navbar-toggle").on("click", function () {

        $(this).toggleClass("active");

    });

    $('.member').on('click', function( e ){

        var _this                   = $(this);
        var extraContent            = $(this).find('.extra').clone();
        var currentTar              = $(e.currentTarget).closest('.member-area').find('.extra-info');

        // $(e.currentTarget).closest('.member-area').addClass('open');

        $('.member-area .item').each(function(index, target){
            $(target).find('.member').removeClass('active');
        });

        $(this).addClass('active');

        // $(e.currentTarget).closest('.member-area').find('.extra-info').slideDown();
        $('.member-area').each(function(ind, tar){

            $(tar).find('.extra-info').css({'height':'0'});

        });

        // $("html, body").delay(2000).animate({
        //   scrollTop: $(currentTar).offset().top - 400,
        // }, 500);
        // $('html, body').scrollTop($(currentTar).scrollHeight);
        // $(currentTar).velocity("scroll",{offset: "0", mobileHA: false});

        $(currentTar).css({'height':'400px'}).html( extraContent );
        //.velocity("scroll", { offset: $(currentTar).innerHeight(), mobileHA: false });

        $('.close-btn').on("click", function(){
            _this.removeClass('active');
            $(currentTar).css({'height':'0'});
        });

        // $(currentTar);

    });

});
