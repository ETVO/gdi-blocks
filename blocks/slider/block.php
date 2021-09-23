<?php

function render_block_slider($attributes)
{
    $images = $attributes['images'];
    $title = $attributes['title'];

    $title_class = 'thin-title';
    if($title != '') {
        $title_class = 'title';
    }
    else {
        $title = 'Fotos do Empreendimento';
    }

    $sliderId = 'gdiSlider' . rand(0, 100);

    ob_start(); // Start HTML buffering

    if($images):
    ?>

        <section class="gdi-slider py-4">

            <div class="container pt-4">

                <div class="<?php echo $title_class ?> text-center mb-4">
                    <h2>
                        <?php echo $title; ?>
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

                                        <div class="item" 
                                        data-gdi-parent="#<?php echo $sliderId; ?>">
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
    endif;

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}