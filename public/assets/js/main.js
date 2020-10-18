(function($) {
            var $main_window=$(window);
            $main_window.on("load", function() {
                $("#preloader").fadeOut("slow");
            }
            );
            $main_window.on("scroll", function() {
                if($(this).scrollTop()>250) {
                    $(".back-to-top").fadeIn(200);
                }
                else {
                    $(".back-to-top").fadeOut(200);
                }
            }
            );
            $(".back-to-top").on("click", function() {
                $("html, body").animate( {
                    scrollTop: 0
                }
                , "slow");
                return false;
            }
            );
            var logo_path=$('.mobile-menu').data('logo');
            $('#main-navbar').slicknav( {
                appendTo: '.mobile-menu', removeClasses: false, label: '', closedSymbol: '<i class="lni-chevron-right"><i/>', openedSymbol: '<i class="lni-chevron-right"><i/>', brand: '<a href="index.html"><img src="'+logo_path+'" class="img-responsive" alt="logo"></a>'
            }
            );
            $main_window.on('scroll', function() {
                var scroll=$(window).scrollTop();
                if(scroll>=10) {
                    $(".scrolling-navbar").addClass("top-nav-collapse");
                }
                else {
                    $(".scrolling-navbar").removeClass("top-nav-collapse");
                }
            }
            );
            if($(".counter").length>0) {
                $(".counterUp").counterUp( {
                    delay: 10, time: 2000
                }
                );
            }
            var wow=new WOW( {
                mobile: false
            }
            );
            wow.init();
        }

        )(jQuery);