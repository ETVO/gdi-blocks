<?php

function render_block_cards($attributes, $content)
{

    ob_start(); // Start HTML buffering
?>

    <section class="gdi-cards py-3">
        <div class="container py-5">
            <div class="d-flex flex-wrap justify-content-center">
                <?php echo $content; ?>
            </div>
        </div>

    </section>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
