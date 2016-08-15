var $document = jQuery( document );

$document.ready(function($){

    $(".navbar-toggle").on("click", function () {

        $(this).toggleClass("active");

    });
    var option = {
        easing: "easeInBounce",
    };
    $('.navbar a, .team').on('click', function(e){
        $(this.hash).velocity('scroll', {duration: 1500,easing: "easeOutQuint" });
    });
    $("#navi").sticky({zIndex:9999});

    $('.member').on('click', function( e ){
        var s = $('body').scrollTop();
        var _this                   = $(this);
        var contentClone            = $(this).find('.extra').clone();
        var currentTar              = $(e.currentTarget).closest('.member-area').find('.extra-info-container');

        // console.log(s);
        // Highlight Selected Member
        $('.member-area .item').each(function(index, target){
            $(target).find('.member').removeClass('active');
        });
        $(this).addClass('active');

        // Close all info panels on click of member
        $('.member-area').each(function(ind, tar){
            $(tar).find('.extra-info-container').css({'height':'0'}).removeClass('open');
        });

        //Fill content into info panel and expand depending on contents
        $(currentTar).html( contentClone );

        var currentTarHeight = $(currentTar).find('.extra').innerHeight();
        $(currentTar).addClass('open').velocity({'height': currentTarHeight}).delay(400).velocity("scroll", { offset: - $(window).innerHeight() + currentTarHeight});


        // Close the panel and deselect
        $('.close-btn').on("click", function(){
            _this.removeClass('active');
            $(currentTar).css({'height':'0'});
            $('body').velocity("scroll",{ offset: s },{ duration: 1000 });
        });

    });

});
