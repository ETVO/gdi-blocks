<?php

function render_block_present($attributes, $content)
{
    $title = $attributes['title'];
    $description = $attributes['description'];
    $showContacts = $attributes['showContacts'];

    if($showContacts){
        // Phone
        $phone = get_theme_mod('gdi_phone');

        $phone_no = get_theme_mod('gdi_phone_number');
        $phone_no = preg_replace('/[^0-9]/', '', $phone_no);

        $phone_link = "tel:$phone_no";

        // WhatsApp
        $whatsapp = get_theme_mod('gdi_whatsapp');

        $whatsapp_no = get_theme_mod('gdi_whatsapp_number');
        $whatsapp_no = preg_replace('/[^0-9]/', '', $whatsapp_no);

        $whatsapp_link = "https://wa.me/$whatsapp_no";

        $contacts = array(
            array(
                'show' => $phone,
                'number' => $phone_no,
                'link' => $phone_link,
                'icon' => 'telephone-fill',
            ),
            array(
                'show' => $whatsapp,
                'number' => $whatsapp_no,
                'link' => $whatsapp_link,
                'icon' => 'whatsapp',
            )
        );
    }

    ob_start(); // Start HTML buffering
    ?>

        <section class="gdi-present">
            <div class="container col-lg-10 col-xl-8 px-3">
                <div class="d-inline d-lg-flex m-auto">
                    <?php if($title): ?>
                        <div class="title m-auto">
                            <h2 class="m-0">
                                <?php echo $title; ?>
                            </h2>
                        </div>
                    <?php endif; ?>
                    <?php if($description): ?>
                        <div class="description my-auto">
                            <p class="m-0">
                                <?php echo $description; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if($showContacts && count($contacts) > 0): ?>
                    <div class="d-flex mt-4">
                        <div class="contacts m-auto d-flex">
                            
                            <?php foreach ($contacts as $contact) : ?>
                                <div class="list-item mx-2 d-flex d-sm-block">
                                    <div class="d-flex mx-auto">
                                        <a class="icon me-2 text-primary" href="<?php echo $contact['link'] ?>" target="_blank" alt="<?php echo $contact['number']; ?>">
                                            <span class="bi bi-<?php echo $contact['icon'] ?>"></span>
                                        </a>
                                        <a class="text" href="<?php echo $contact['link'] ?>" target="_blank" alt="<?php echo $contact['number']; ?>">
                                            <span><?php echo $contact['show']; ?></span>
                                        </a>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
