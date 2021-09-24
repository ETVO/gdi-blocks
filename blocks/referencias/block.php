<?php

function render_block_referencias($attributes, $content)
{
    $title = $attributes['title'];
    $address = $attributes['address'];

    if(trim($address) == '')
        $address = get_field('endereco'); 

    $single_line_address = strip_tags($address);
    $map_address = str_replace(' ', '+', $single_line_address);

    $map_url = "https://maps.google.com/maps?q=" . $map_address
    . "&t=m&mrt=yp&z=15&output=embed&iwloc=addr&msa=0";

    
    ob_start(); // Start HTML buffering

    ?>

        <section class="gdi-referencias">
            <div class="container col-xl-10 m-auto pe-lg-0 me-lg-0">
                <div class="row w-100 m-0">
                    <div class="content col-12 col-lg-6 col-xl-5 m-auto px-3 order-first">
                        <div class="thin-title">
                            <h2>
                                <?php echo $title; ?>
                            </h2>
                        </div>
                        <div class="address mt-3">
                            <h5 class="d-flex">
                                <span class="bi bi-geo-alt-fill me-2"></span>
                                <span class="info">
                                    <?php echo $address; ?>
                                </span>
                            </h5>
                        </div>
                        <div class="addresses mt-3">
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <div class="map col-12 col-lg-6 col-xl-7 p-0">
                        <iframe frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="<?php echo $map_url; ?>" title="<?php echo $single_line_address; ?>" aria-label="<?php echo $single_line_address; ?>">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
