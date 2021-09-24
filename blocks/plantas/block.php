<?php

function render_block_plantas($attributes, $content)
{

    $title = 'Plantas';

    $plantas = explode('<!-- planta -->', $content);

    $slideCount = 3;
        
    $auto_slide = false;
    $block_id = 'gdiPlantas' . rand(0, 100);

    // exit;

    ob_start(); // Start HTML buffering

    echo count($plantas)

    ?>

        <section class="gdi-plantas gdi-slider mt-4">

        <div class="container col-md-9 col-lg-10 col-xl-8 px-2 py-5 ">
            <div class="thin-title text-center mb-4">
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
                        foreach($plantas as $planta) {

                            if(empty(trim($planta))) continue;
                            if($each == 0) {
                                ?>
                                <div class="carousel-item">
                                    <div class="m-0 row w-100 h-100 justify-content-center">
                                <?php
                                
                            }

                            ?>
                            <div class="item-inner col-lg-<?php echo round(12 / $slideCount); ?>">
                                <?php echo $planta; ?>
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
                        
                        if($each > 0) {
                            $each = 0;
                            ?>
                                </div>
                            </div>
                            <?php
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
        </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
