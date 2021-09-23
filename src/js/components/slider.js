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
        var slideWidth = function() {
            return $('.slider').find('.item').width();
        }
        var slideHeight = function() {
            return $('.slider').find('.item').height();
        }

        
        /**
         * Invocate functions when document.body is ready 
         */
        $(window).on('load resize', function (){
            var w = this.width();

            if(w >= 1000) {
                itemsPerSlide = 4;
            }
            else if(w >= 700) {
                itemsPerSlide = 3;
            }
            else if(w >= 400) {
                itemsPerSlide = 2;
            }
            else {
                itemsPerSlide = 1;
            }
    
            if(itemsPerSlide > 1) {
                jumpPerClick = itemsPerSlide - 1;
            }
            else {
                jumpPerClick = 1;
            }

            sliderUlWidth = (optsPerSlide * slideWidth) + (optsPerSlide * margin)*2;

            $('.slider').each(function() {
                $(this).css({ height: slideHeight })
                $(this).find('ul')[0].css({ width: sliderUlWidth })
            })
        });
    }
)