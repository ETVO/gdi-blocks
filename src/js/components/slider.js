/** 
 * Slider component front-end
 * 
 * @package WordPress
 * @subpackage GDI-Blocks
 */

 (jQuery)(
    function($) {

        var itemsPerSlide = 2;
        var jumpPerClick = 1;

        const margin = 10;

        var sliderUlWidth = (itemsPerSlide * slideWidth) + (itemsPerSlide + margin)*2;

        var slideWidth = 400;
        var slideHeight = 400;

        
        /**
         * Invocate functions when document.body is ready 
         */
        $(window).on('load resize', function (){

            var w = $(this).width();

            // if(w >= 1000) {
            //     itemsPerSlide = 4;
            // }
            // else if(w >= 700) {
            //     itemsPerSlide = 3;
            // }
            // else if(w >= 400) {
            //     itemsPerSlide = 2;
            // }
            // else {
            //     itemsPerSlide = 1;
            // } 

            itemsPerSlide = 2;
    
            if(itemsPerSlide > 1) {
                jumpPerClick = itemsPerSlide - 1;
            }
            else {
                jumpPerClick = 1;
            }

            sliderUlWidth = (itemsPerSlide * slideWidth) + (itemsPerSlide * margin)*2;

            $('.slider').each(function(index, elem) {
                elem.style = "max-height: " + slideHeight + "px;";
                $(elem).find('ul').style = "max-width: " + sliderUlWidth + "px;";
            })
        });


        function moveLeft(sliderId) {
            $(sliderId + ' ul').animate({
                left: jumpPerClick * slideWidth
            }, 200, 
            function() {
                for(var i = 0; i < jumpPerClick; i++) {
                    $(sliderId + ' .item:last-child').prependTo(sliderId + ' ul');
                    $(sliderId + ' ul').css('left', '');
                    console.log("hello");
                }
            });
        }

        function moveRight(sliderId) {
            $(sliderId + ' ul').animate({
                left: -1 * jumpPerClick * slideWidth
            }, 200, 
            function() {
                for(var i = 0; i < jumpPerClick; i++) {
                    $(sliderId + ' .item:first-child').appendTo(sliderId + ' ul');
                    $(sliderId + ' ul').css('left', '');
                }
            });
        }


        $('.control-button .control-prev').click(function () {
            var sliderId = $(this).attr("data-gdi-controls");
            moveLeft(sliderId);
        });

        $('.control-button .control-next').click(function () {
            var sliderId = $(this).attr("data-gdi-controls");
            moveRight(sliderId);
        });

        $('.slider .item').on("swipeleft", function () {
            var sliderId = $(this).attr("data-gdi-parent");
            moveLeft(sliderId);
        }); 

        $('.slider .item').on("swiperight", function () {
            var sliderId = $(this).attr("data-gdi-parent");
            moveRight(sliderId);
        });
    }
)