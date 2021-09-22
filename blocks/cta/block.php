<?php

function render_block_cta($attributes, $content)
{
    $interval = $attributes['interval'];

    if(empty($interval)) $interval = 3000;  
    
    if($interval == 0) $auto_slide = false;
    else $auto_slide = true;

    $block_id = 'gdiCTA' . rand(0, 100);

    ob_start(); // Start HTML buffering
?>

    <section class="gdi-cta carousel slide" 
        data-bs-ride="<?php echo ($auto_slide) ? "carousel" : "false" ?>" 
        data-bs-interval="<?php echo ($auto_slide) ? $interval : "" ?>" 
        id="<?php echo $block_id; ?>">

        <div class="carousel-inner">
            <?php echo $content ?>
        </div>
                    
        <div class="position-absolute bottom-0 w-100 d-flex">
            <div class="mx-auto d-flex mb-2">
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
