<?php

function render_block_ctafixed($attributes)
{
    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];
    $image_url = $attributes['bgImage'];
    $link = $attributes['link'];

    ob_start(); // Start HTML buffering
    
    ?>
        <section class="gdi-ctafixed">
            <div class="inner d-flex">
                <img src="<?php echo $image_url; ?>">
                <div class="content text-center m-auto">
                    <div class="title">
                        <h1>
                            <?php echo $title; ?>
                        </h1>
                    </div>
                    <div class="subtitle">
                        <h6>
                            <?php echo $subtitle; ?>
                        </h6>    
                    </div>
                    <div class="action mt-5">
                        <a href="<?php echo $link; ?>">
                            Entrar em contato
                        </a>
                    </div>
                </div>  
            </div>
        </section>
    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}