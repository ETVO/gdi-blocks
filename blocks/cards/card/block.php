<?php

function render_block_card($attributes)
{
    $icon = $attributes['icon'];
    $title = $attributes['title'];
    $description = $attributes['description'];

    ob_start(); // Start HTML buffering
if($icon):
?>
    <div class="gdi-card px-2 my-2">
        <div class="card-inner">
            <div class="front d-flex flex-column text-center">
                <div class="icon m-auto">
                    <?php echo $icon; ?>
                </div>
                <div class="title m-auto">
                    <h6>
                        <?php echo $title; ?>
                    </h6>
                </div>
            </div>
            <div class="back d-flex flex-column text-left">
                <div class="icon">
                    <?php echo $icon; ?>
                </div>
                <div class="content">
                    <div class="title">
                        <h6>
                            <?php echo $title; ?>
                        </h6>
                    </div>
                    <div class="description">
                        <?php echo $description ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endif;

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
