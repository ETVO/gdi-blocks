<?php

function render_block_vida($attributes, $content)
{
    $title1 = $attributes['title1'];
    $title2 = $attributes['title2'];
    $hashtag = $attributes['hashtag'];
    $text = $attributes['text'];
    $images = $attributes['images'];

    $show_caracters = true;

    ob_start(); // Start HTML buffering
    ?>

        <section class="gdi-vida py-5">
            <div class="container col-xl-10 px-3 py-4 m-auto">
                <div class="row w-100 m-0">
                    <div class="content col-12 col-lg-7 my-auto pb-4 pb-lg-0 pe-lg-5 order-first">
                        <div class="title">
                            <h2 class="first">
                                <?php echo $title1; ?>
                            </h2>
                            <h2 class="second">
                                <?php echo $title2; ?>
                            </h2>
                        </div>
                        <div class="hashtag">
                            <h2 class="buffalo">
                                <span>#</span><?php echo $hashtag; ?>
                            </h2>
                        </div>
                        <div class="text mt-3">
                            <p>
                                <?php echo $text; ?>
                            </p>
                        </div>
                    </div>
                    <div class="gallery col-12 col-lg-5 p-0">
                        <div class="row g-3">
                            <?php 
                            foreach($images as $image):
                                $image = get_image_props_id($image['id']);
                                ?>
                                    <div class="col-sm-6">
                                        <img class="w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['caption'] ?>">
                                    </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
