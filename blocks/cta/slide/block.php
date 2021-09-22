<?php

function render_block_slide($attributes)
{
    $image_url = $attributes['bgImage'];
    $title = $attributes['title'];
    $link = $attributes['link'];

    ob_start(); // Start HTML buffering
?>

    <?php if ($image_url) : ?>
        <div class="gdi-slide carousel-item" style="background-image: url('<?php echo $image_url; ?>');">
        <!-- <div class="gdi-slide carousel-item"> -->
            <!-- <img src="<?php echo $image_url; ?>" class="d-block w-100"> -->
            <div class="position-absolute top-0 w-100 h-100 d-flex overlay">
                <div class="m-auto text-center">
                    <div class="title">
                        <h1><?php echo $title; ?></h2>
                    </div>
                    <div class="action mt-4">
                        <a href="<?php echo $link; ?>">Saiba Mais <span class="bi bi-chevron-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
