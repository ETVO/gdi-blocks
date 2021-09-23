<?php

function render_block_progress($attributes, $content)
{

    $image_url = $attributes['image'];

    ob_start(); // Start HTML buffering
?>

    <section class="gdi-progress py-3">
        <div class="container ps-0 py-5">
            <div class="thin-title text-center mb-5">
                <h2>Andamento da Construção</h2>
            </div>
            <div class="row ms-0 ps-0">
                <div class="col-6 ms-0 ps-0">
                    <img class="w-100" src="<?php echo $image_url; ?>">
                </div>
                <div class="col-6 px-5 my-auto">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

    </section>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
