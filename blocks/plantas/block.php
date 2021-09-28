<?php

function render_block_plantas($attributes, $content)
{

    $title = 'Plantas';

    $plantas = explode('<!-- planta -->', $content);

    $block_id = 'gdiPlantas' . rand(0, 100);

    $slides_xl = 3;
    $slides_lg = 2;
    $slides_xs = 1;

    ob_start(); // Start HTML buffering

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
            
                
                <?php 
                    generate_plantas_inner($plantas, $slides_xl, ':xl');
                    generate_plantas_inner($plantas, $slides_lg, ':lg.xl');
                    generate_plantas_inner($plantas, $slides_xs, '.lg'); 
                ?>
                       
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

function generate_plantas_inner($plantas, $slide_count, $bp)
{
    $matches = []; 
    $start = '';
    preg_match('/:([a-z]{2})*/', $bp, $matches);
    $start = $matches[1];
    
    $matches = []; 
    $stop = '';
    preg_match('/\.([a-z]{2})*/', $bp, $matches);
    $stop = $matches[1];

    $display_class = '';

    if(trim($start) != '') {
        $display_class = "d-toggle";
        $display_class .= " d-none";
        $display_class .= " d-$start-block";

        if(trim($stop) != '') {
            $display_class .= " d-$stop-none";
        }
    }
    else if(trim($stop) != '') {
        $display_class = "d-toggle";
        $display_class .= " d-block";
        $display_class .= " d-$stop-none";
    }

    ?>
    <div class="carousel-inner <?php echo $display_class; ?>">
    <?php

    $each = 0;
    $i = 0;
    foreach($plantas as $planta) {

        if(empty(trim($planta))) continue;

        if($each == 0) {
            ?>
            <div class="carousel-item <?php if ($i == 0) echo "active"; ?>">
                <div class="m-0 row w-100 h-100 justify-content-center">
            <?php   
        }

        ?>
        <div class="item-inner col-lg-<?php echo round(12 / $slide_count); ?>">
            <?php echo $planta; ?>
        </div>
        <?php


        if($each == $slide_count - 1) {
            $each = 0;
            ?>
                </div>
            </div>
            <?php
        }
        else {                            
            $each++;
        }

        $i++;
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
    <?php
}