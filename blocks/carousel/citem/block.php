<?php

function render_block_citem($attributes)
{
    $image_url = $attributes['image'];
    $caption = $attributes['caption'];

    ob_start(); // Start HTML buffering
?>

    <?php if ($image_url) : ?>
        <div class="gdi-slide carousel-item">
            <img src="<?php echo $image_url; ?>" class="d-block w-100">
            <div class="carousel-caption">
                <p>
                    Constituição sólida através de regime especial de tributação, patrimônio de afetação e Sociedade de Propósito Específico (SPE). Uso de fornecedores, materiais, e acabamentos consagrados.  
                </p>
            </div>
        </div>
    <?php endif; ?>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
