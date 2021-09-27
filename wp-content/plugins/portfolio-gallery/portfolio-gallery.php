<?php
/**
 * Plugin Name: Portfolio Gallery
*/

function portfolio_post_type() {
    register_post_type('portfolio', [
        'show_in_rest' => true,
        'supports' => [''],
        'rewrite' => ['slug' => 'portfolios'],
        'has_archive' => true,
        'public' => true,
        'labels' => [
            'name' => 'Portfolios',
            'add_new_item' => 'Add New Portfolio',
            'edit_item' => 'Edit Portfolio',
            'all_items' => 'All Portfolios',
            'singular_name' => 'Portfolio'
        ],
        'menu_icon' => 'dashicons-format-image',
    ]);
}

add_action('init', 'portfolio_post_type');

function portfolio_activate() {
    portfolio_post_type();
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'portfolio_activate' );

function portfolio_deactivate() {
    unregister_post_type('portfolio');
    flush_rewrite_rules();
}

register_deactivation_hook(__File__, 'porfolio_deactivate');

function portfolio_render()
{
    $portfolio = new WP_Query([
        'post_type' => 'portfolio'
    ]);
    ?>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        #portfolio-wrapper {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
        }

        #portfolio-wrapper img {
            width: 25%;
            height: 250px;
            object-fit: cover;
            cursor: pointer;
            padding: 5px;
        }

        #previewModal {
            display: none;
        }

        #previewModal.active {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0,0,0,.5);
        }

        #previewModal.active img {
            width: 35%;
            object-fit: contain;
        } 

        @media screen and (max-width: 780px) {
            #portfolio-wrapper img, #previewModal.active img {
                width: 50%;
            }
        }
        @media screen and (max-width: 480px) {
            #portfolio-wrapper img {
                width: 1030%;
            }
            #previewModal.active img {
                width: 75%;
            } 
        }
    </style>

    <div id="portfolio-wrapper">
        <?php while($portfolio->have_posts()) : $portfolio->the_post(); ?>

        <?php 
        $meta = get_post_meta(get_the_ID(), 'portfolio', true); 
        $imageUrl = $meta['image'];
        ?>
        
        <img src="<?= $imageUrl ?? '' ?>" alt="..." onclick="showModal(<?= get_the_ID() ?>)" id="porto-<?= get_the_ID() ?>">
        <?php endwhile; ?>
    </div>

    <div id="previewModal">
        <img src="" alt=".." id="modalImage">
    </div>

    <script>
        const modal = document.querySelector('#previewModal');
        const showModal = (id) => {
            const image = document.querySelector(`#porto-${id}`);
            modal.classList.add('active');
            const modalImage = document.querySelector('#modalImage');
            modalImage.src = image.src;
        }

        modal.addEventListener('click', () => {
            modal.classList.remove('active');
        })
    </script>
    <?php 
}

add_shortcode('portfolio_gallery', 'portfolio_render');

function add_portfolio_meta_box() {
    add_meta_box(
        'portfolio_meta_box',
        'Portfolio Data',
        'show_portfolio_field_meta_box',
        'portfolio',
        'normal',
    );
}

add_action('add_meta_boxes', 'add_portfolio_meta_box');

function show_portfolio_field_meta_box() {
    global $post;
    $meta = get_post_meta($post->ID, 'portfolio', true);
    ?>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <input type="hidden" value="<?= wp_create_nonce(basename(__FILE__)) ?>" name="portfolio_nonce">

        <div class="input-group">
            <input class="form-control" type="text" id="thumbnail" name="portfolio[image]" value="<?= $meta['image'] ?? '' ?>" aria-label="Image" aria-describedby="upload_image_button">
            <button class="btn btn-primary" type="button" id="upload_image_button">Browse</button>
        </div>

        <img src="<?= $meta['image'] ?? '' ?>" class="img-thumbnail" alt="..." id="thumbnailPreview">

        <script>
            jQuery(document).ready(function($) {
                $('#upload_image_button').click(() => {
                    formfield = $('thumbnail').attr('name');
                    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                    window.send_to_editor = (html) => {
                        imgurl = $(html).attr('src');
                        $('#thumbnail').val(imgurl);
                        document.querySelector('#thumbnailPreview').src = imgurl;
                        tb_remove();
                    }

                    return false
                })
            });
        </script>
    </body>
    <?php
}

function save_portfolio_meta($post_id) {
    if (!wp_verify_nonce($_POST['portfolio_nonce'], basename(__FILE__))) return $post_id;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    if ($_POST['post_type'] === 'page') {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
        else if (!current_user_can('edit_post', $post_id)) return $post_id;
    }

    $old = get_post_meta($post_id, 'portfolio', true);
    $new = $_POST['portfolio'];

    if ($new && $new !== $old) {
        update_post_meta($post_id, 'portfolio', $new);
    } else if ('' === $new && $old) {
        delete_post_meta($post_id, 'portfolio', $old);
    }
}

add_action('save_post', 'save_portfolio_meta');