<?php

function render_block_planta($attributes, $content)
{
    $image_url = $attributes['image'];
    $title = $attributes['title'];

    ob_start(); // Start HTML buffering
?>
<!-- planta --> 
    <div class="gdi-planta item">
        <div class="image">
            <img src="<?php echo $image_url; ?>">
        </div>
        <div class="caption">
            <div class="title">
                <h6><?php echo $title; ?></h6>
            </div>
            <div class="content">
                <?php echo $content; ?>
            </div>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
