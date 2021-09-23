<?php

function render_block_gallery($attributes, $content)
{
    $images = $attributes['images'];

    ob_start(); // Start HTML buffering
    ?>

        <section class="gdi-gallery">
            <div class="row">
                <?php 
                $i = 0;
                for($i; $i < count($images); $i++):
                    $image = $images[$i];
                    $id = $image['id'];
                    $url = $image['url'];
                    $caption = wp_get_attachment_caption( $id );

                    if($i > 3) {
                        break;
                    }
                    else if($i == 0) {
                        ?>
                            <div class="col-6">
                                <img src="<?php echo $url; ?>" alt="<?php echo $caption; ?>">
                                <div class="caption">
                                    <?php echo $caption; ?>
                                </div>
                            </div>
                        <?php
                    }
                    else if($i == 1){
                        ?>
                        <div class="col-6">
                            <div class="col-12">
                                <img src="<?php echo $url; ?>" alt="<?php echo $caption; ?>">
                                <div class="caption">
                                    <?php echo $caption; ?>
                                </div>
                            </div>

                        <?php 
                    }
                    else if($i == 2) {
                        ?> 
                            <div class="col-12">
                                <img src="<?php echo $url; ?>" alt="<?php echo $caption; ?>">
                                <div class="caption">
                                    <?php echo $caption; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                endfor; 

                if($i <= 2) echo "</div>";

                ?>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
