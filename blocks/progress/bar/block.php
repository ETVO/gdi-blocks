<?php

function render_block_bar($attributes)
{
    $name = $attributes['name'];
    $prog = $attributes['progress'];

    ob_start(); // Start HTML buffering
    if ($prog || $prog == 0) :
?>
        <div class="gdi-bar px-2 my-4">

            <div class="caption">
                <?php echo "$name $prog%"; ?>
            </div>
            <div class="progbar w-100 d-block">
                <div class="prog h-100 me-auto" style="width: <?php echo $prog; ?>%;">
                    <div class="prog-color">
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
