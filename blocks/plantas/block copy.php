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

    $slideCount = 2;
        
    $auto_slide = false;
    $block_id = 'gdiSlider' . rand(0, 100);

    ob_start(); // Start HTML buffering
    ?>

        <section class="gdi-slider container col-md-9 col-lg-10 col-xl-8 px-2 py-5 mt-4">

            <div class="<?php echo $title_class ?> text-center mb-4">
                <h2>
                    <?php echo $title; ?>
                </h2>
            </div>

            <div class="carousel slide" 
                data-bs-interval="false" 
                id="<?php echo $block_id; ?>">
            
                <div class="carousel-inner">
                    <?php 
                        $each = 0;
                        for($i = 0; $i < count($images); $i++) {
                            if($each == 0) {
                                ?>
                                <div class="carousel-item">
                                    <div class="m-0 row w-100 h-100 justify-content-center">
                                <?php
                                
                            }

                            $image = get_image_props($images, $i);

                            ?>
                            <div class="item-inner col-lg-<?php echo round(12 / $slideCount); ?>">
                                <img src="<?php echo $image['url'] ?>" alt="">
                            </div>
                            <?php


                            if($each == $slideCount - 1) {
                                $each = 0;
                                ?>
                                    </div>
                                </div>
                                <?php
                            }
                            else {                            
                                $each++;
                            }
                        } 
                    ?>
                </div>
                       
                <div class="controls">
                    <button class="carousel-control-prev me-1" type="button"
                    data-bs-target="#<?php echo $block_id; ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"><?php echo __("Anterior"); ?></span>
                    </button>
                    <button class="carousel-control-next ms-1" type="button"
                    data-bs-target="#<?php echo $block_id; ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"><?php echo __("Próximo"); ?></span>
                    </button>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
