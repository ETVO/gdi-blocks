<?php

function render_block_slider($attributes)
{
    $title = $attributes['title'];
    $images = $attributes['images'];

    $sliderId = 'gdiSlider' . rand(0, 100);

    ob_start(); // Start HTML buffering
    ?>

        <section class="gdi-slider py-3">

            <div class="container py-5">

                <div class="thin-title text-center mb-3">
                    <h2>
                        Características do<br>Empreendimento
                    </h2>
                </div>

                <div class="slider-wrap">
                    <div class="control-button prev">
                        <button class="control-prev"
                        data-gdi-slide="next"
                        data-gdi-controls="#<?php echo $sliderId; ?>"> 
                            <span class="bi bi-chevron-left"></span> 
                        </button>
                    </div>
                    <div class="slider" id="<?php echo $sliderId; ?>">
                        <ul class="slider-list">
                            <?php 
                                for ($i = 0; $i < count($images); $i++):
                            
                                    $image = get_image_props($images, $i);
                                    
                                    ?>

                                        <div class="item">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['caption']; ?>"/>
                                        </div>

                                    <?php
                                
                                endfor;
                            ?>
                        </ul> 
                    </div> 
                    <div class="control-button next">
                        <button class="control-next" 
                        data-gdi-slide="next"
                        data-gdi-controls="#<?php echo $sliderId; ?>"> 
                            <span class="bi bi-chevron-right"></span> 
                        </button>
                    </div>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}