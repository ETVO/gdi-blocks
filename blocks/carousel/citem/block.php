<?php

function render_block_citem($attributes)
{
    $image_url = $attributes['image'];
    $caption = $attributes['caption'];

    ob_start(); // Start HTML buffering
?>

    <?php if ($image_url) : ?>
        <div class="gdi-citem carousel-item">
            <img src="<?php echo $image_url; ?>" class="d-block w-100">
            <div class="carousel-caption px-2 px-sm-3 py-2">
                <?php echo $caption; ?>
            </div>
        </div>
    <?php endif; ?>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
