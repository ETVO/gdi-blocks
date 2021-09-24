<?php

function render_block_local($attributes)
{
    $name = $attributes['name'];
    $distance = $attributes['distance'];

    ob_start(); // Start HTML buffering
?>

    <div class="gdi-local my-2">
        <div class="d-flex">
            <span class="bi bi-geo-alt-fill me-2"></span>
            <span class="info">
                <?php echo $name; ?>
                <b><?php echo $distance; ?></b>
            </span>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
