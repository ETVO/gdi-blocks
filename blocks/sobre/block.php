<?php

function render_block_sobre($attributes, $content)
{
    $text = $attributes['text'];
    $image_url = $attributes['image'];

    ob_start(); // Start HTML buffering
    ?>

        <section class="gdi-sobre">
            <div class="row w-100 m-0">
                <div class="text col-12 col-sm-6 d-flex order-last order-sm-first">
                    <p class="my-auto">
                        <?php echo $text; ?>
                    </p>
                </div>
                <div class="image col-12 col-sm-6 p-0">
                    <img src="<?php echo $image_url; ?>">
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
