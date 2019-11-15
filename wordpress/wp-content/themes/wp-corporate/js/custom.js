jQuery('document').ready(function($){
    $('.header.menu-section').show();
    // header search option
    $('.search-icon .fa-search').click(function(){
        $('.ed-search ').addClass('search-active');
    });
    $('.search-icon .ed-search .search-close .fa-close ').on('click', function(){
      $('.ed-search').removeClass('search-active');
    });   

    var rtoleft = false;
    if($('body').hasClass('rtl')){
        var rtoleft = true;
    }
    // homepage client slider
	$('.client-slider').owlCarousel({
		autoplay: true,
        rtl: rtoleft,
        nav: true,
        navText : ["prev","next"],
        navElement: 'div',
        dots: false,
		slideSpeed: 500,
		items:3,
        autoplayHoverPause: true,
        center:true,				
		loop: true, 
        responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1,
            },
            // breakpoint from 480 up
            540 : {
                items: 3,
            },
            // breakpoint from 768 up
            768 : {
                items: 3,
            },
        },
	});
	
    //back to top button
    var rtlpos = 'right';
    if(rtoleft) {
        rtlpos = 'left';
        $('#back-to-top').css(rtlpos,-100);
    }
    else {        
        rtlpos = 'right';
        $('#back-to-top').css(rtlpos,-100);
    }
    $(window).scroll(function(){
      if($(this).scrollTop() > 300){
        $('#back-to-top').css(rtlpos,0);
      }else{
        $('#back-to-top').css(rtlpos,-100);
      }
    });

    $("#back-to-top").click(function(){
      $('html,body').animate({scrollTop:0},600);
    });
	$('.testimonial-slider').owlCarousel({
        // stagePadding: 50,
        loop: true,
        autoplay: true,
        rtl: rtoleft,
        nav: true,
        navText : ["prev","next"],
        navElement: 'div',
        dots: false,
        autoplayHoverPause: true,
        smartSpeed: 1500,
        items:3,
        center:true,
        responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1,
                center:false,
            },
            // breakpoint from 480 up
            540 : {
                items: 2,
            },
            // breakpoint from 768 up
            980 : {
                items: 3,
            },
        },     
    }); 

    $('button.menu-toggle').click(function(){
        $('body').toggleClass('menu-on');
    });

    //isotope data filter
    
    $('.portfolio-wrap .ed-sortable-grid').imagesLoaded( function() {
            var $grid = $('.ed-sortable-grid').isotope({
            itemSelector: '.element-item'
        });
           

        // bind filter button click

        $('.filters-button-group').on('click', 'li', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({filter: filterValue});
        });

        // change is-checked class on buttons
        $('.button-group').each(function (i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'li', function () {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });

    });

// counter section
$('.counter').counterUp({
  delay: 10,
  time: 1000
});

// classyloader function
    $('.skill-loader').each(function () {
        var that = $(this);
        var percent = that.attr("data-percentage");
        that.waypoint({
            handler: function (direction) {
                that.ClassyLoader({
                    width: 120,
                    height: 120,
                    percentage: percent,
                    diameter: 70,
                    lineWidth: 10,
                    fontFamily: 'lato',
                    fontSize: '20px',
                    speed: 30,
                    diameter: 50,
                    lineColor: 'rgba(255, 255, 255, 1)',
                    remainingLineColor: 'rgba(255, 255, 255, 0.5)',
                    fontColor: 'rgba(255, 255, 255, 1)', 
                    start: 'top'                   
                });
            },
            offset: '95%'
        });
    });
});
