<?php

function render_block_gallery($attributes, $content)
{
    $images = $attributes['images'];
    $i = 0;
    $show_action = true;

    $rand = rand(0, 999);
    $modal_id = "gdiGalleryModal" . $rand;
    $modal_carousel_id = "gdiGalleryModalCarousel" . $rand;

    $count = count($images);
    if($count > 6) $count = 6; 

    if(!$images) return;
    ob_start(); // Start HTML buffering
    ?>

        <section class="gdi-gallery py-4">

            <div class="container py-5 col-lg-11 col-xl-9">

                <div class="thin-title text-center mb-3">
                    <h2>
                        Características do<br>Empreendimento
                    </h2>
                </div>
                
                <div class="items row g-3 w-100 m-0">
                    <?php 
                    for($i = 0; $i < $count; $i++) {
                        $image = get_image_props($images, $i);
                        
                        ?>

                        <div class="item col-12 col-md-6 col-lg-4">
                            <div class="item-inner">
                                <img src="<?php echo $image['url']; ?>" alt="">
                                <?php if($image['caption']): ?>
                                <div class="img-overlay">
                                    <span>
                                        <?php echo $image['caption']; ?>
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div>

                <?php if($show_action): ?>
                    <div class="action-wrap mt-4">
                        <div class="action text-center">
                            <button class="bot-but wider" 
                                data-bs-target="#<?php echo $modal_id; ?>" 
                                data-bs-toggle="modal" 
                                data-bs-dismiss="modal">
                                ver todas
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="modal fade p-0" id="<?php echo $modal_id; ?>" aria-hidden="true" aria-label="<?php echo __('Visualização de imagens'); ?>" tabindex="-1">
                <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                    <div class="modal-content text-light">
                        <div class="modal-header">
                            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="<?php echo __('Fechar'); ?>">
                                <span class="bi bi-x text-light" style="line-height: 1rem; font-size: 2rem;"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="<?php echo $modal_carousel_id; ?>" class="carousel slide" data-touch='false' data-bs-ride="carousel" data-bs-interval="40000">

                                <div class="carousel-inner h-100">
                                    <?php for ($i = 0; $i < count($images); $i++) : ?>
                                        <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                                            <img src="<?php echo $images[$i]['url']; ?>" class="d-block" alt="">
                                        </div>
                                    <?php endfor; ?>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $modal_carousel_id; ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden"><?php echo __("Anterior"); ?></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $modal_carousel_id ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden"><?php echo __("Próximo"); ?></span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="selectors m-auto d-flex justify-content-center">
                                <?php for ($i = 0; $i < count($images); $i++) : ?>
                                    <div class="image-preview">
                                        <img src="<?php echo $images[$i]['url']; ?>" class="d-block" alt="" data-bs-target="#<?php echo $modal_carousel_id; ?>" data-bs-slide-to="<?php echo $i; ?>" aria-label="Slide <?php echo $i; ?>">
                                    </div>
                                <?php endfor; ?>
                            </div>
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