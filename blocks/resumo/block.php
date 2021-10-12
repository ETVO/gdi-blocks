<?php

function render_block_resumo($attributes, $content)
{
    $title1 = $attributes['title1'];
    $title2 = $attributes['title2'];
    $text = $attributes['text'];
    $image_url = $attributes['image'];
    $info_text = $attributes['infoText'];
    $date = $attributes['date'];

    if(empty(trim($info_text)))
        $info_text = 'Entregue em';

    $caracters = array(
        'medidas',
        'habitacoes',
    );

    $show_caracters = true;

    ob_start(); // Start HTML buffering
    ?>

        <section class="gdi-resumo">
            <div class="row w-100 m-0">
                <div class="content col-12 col-sm-6 d-flex order-first">
                    <div class="my-auto">
                        <div class="title">
                            <h2 class="first">
                                <?php echo $title1; ?>
                            </h2>
                            <h2 class="second">
                                <?php echo $title2; ?>
                            </h2>
                        </div>
                        <div class="text mt-3">
                            <p>
                                <?php echo $text; ?>
                            </p>
                        </div>
                        <?php if($show_caracters): ?>
                            <div class="list mt-4">

                                <?php 
                                if(have_rows('caracters')) { the_row();
                                    foreach($caracters as $caracter): 

                                        $value = get_sub_field($caracter);
                                ?>
                                        <div class="list-item mt-2 d-flex">
                                            <span class="icon me-2">
                                                <?php echo do_shortcode("[icon_$caracter]"); ?>
                                            </span>
                                            <small class="text">
                                                <?php echo $value; ?>
                                            </small>
                                        </div>
                                <?php endforeach; } ?>
                            </div>
                        <?php endif; ?>
                        <div class="seal d-flex">
                            <div class="icon me-3">
                                <?php echo do_shortcode('[icon_dark_seal]') ?>
                            </div>
                            <div class="info my-auto">
                                <small>
                                    <?php echo $info_text; ?>
                                </small>
                                <div class="date fw-bold">
                                    <?php echo $date; ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
