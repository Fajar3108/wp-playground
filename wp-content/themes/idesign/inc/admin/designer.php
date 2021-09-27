<?php

function create_post_designers() {
    register_post_type('designers', [
        'description' => __('Our Designers', 'IDesign'),
        'labels' => [
            'name' => _x('Designers', 'Post Type General Name', 'IDesign'),
            'singular_name' => _x('Designer', 'Post Type Singular Name', 'IDesign'),
            'add_new_item' => 'Add Designer',
            'editw_item' => 'Edit Designer',
        ],
        'supports' => [''],
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
    ]);
    // Remove input title
    remove_post_type_support('designers', 'title');
}

add_action('init', 'create_post_designers');

// Change title input label
// function custom_enter_title($input) {
//     if (get_post_type() == 'designers') return 'Name';
//     return $input;
// }

// add_filter('enter_title_here', 'custom_enter_title');

function add_designers_meta_box() {
    add_meta_box( 
        'designers_meta_box',
        'Designer Data',
        'show_designer_field_meta_box',
        'designers',
        'normal',
        'high',
    );
}

add_action( 'add_meta_boxes', 'add_designers_meta_box' );

function show_designer_field_meta_box()
{
    global $post;
    $meta = get_post_meta($post->ID, 'designers', true);
    ?> 
    <input type="hidden" name="your_meta_box_nonce" value="<?= wp_create_nonce( basename(__FILE__) ); ?>">

    <!-- Input Data Designer -->

    <div class="input-group">
        <label for="profileImage">Profile Image</label>
        <br>
        <input type="text" name="designers[image]" id="profileImage" class="meta-image regular-text" value="<?= $meta['image'] ?? ''; ?>">
	    <button class="button image-upload" id="upload_image_button">Browse</button>
    </div>
    <br>
    <div class="image-preview"><img src="<?= $meta['image'] ?? ''; ?>" style="max-width: 250px;" id="imagePreview"></div>
    <br>
    <div class="input-group">
        <label for="designers[name]">Name</label>
        <br>
        <input type="text" name="designers[name]" id="designers[name]" style="width: 100%" value="<?= $meta['name'] ?? ''; ?>">
    </div>
    <br>
    <div class="input-group">
        <label for="designers[description]">Description</label>
        <br>
        <textarea name="designers[description]" id="designers[description]" rows="5" cols="30" style="width: 100%"><?= $meta['description'] ?? ''; ?></textarea>
    </div>
    <br>
    <div class="input-group">
        <label for="designers[join_date]">Join Date</label>
        <br>
        <input type="date" name="designers[join_date]" id="designers[join_date]" style="width: 100%" value="<?= $meta['join_date'] ?? ''; ?>">
    </div>
    <script>
        jQuery(document).ready( function( $ ) {

            $('#upload_image_button').click(function() {

                formfield = $('#profileImage').attr('name');
                tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
                window.send_to_editor = function(html) {
                    imgurl = $(html).attr('src');
                    $('#profileImage').val(imgurl);
                    document.querySelector('#imagePreview').src = imgurl;
                    tb_remove();
                }

                return false;
            });

        });
    </script>
    <?php
}

function save_designers_meta($post_id) {
    // Verify nonce
    if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) return $post_id;

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // Check permission
    if ('page' === $_POST['post_type']) {
        if (!current_user_can( 'edit_page', $post_id )) return $post_id;
        else if (!current_user_can( 'edit_post', $post_id )) return $post_id;
    }

    $old = get_post_meta( $post_id, 'designers', true );
    $new = $_POST['designers'];

    if ( $new && $new !== $old )  update_post_meta( $post_id, 'designers', $new );
    else if ( '' === $new && $old ) delete_post_meta( $post_id, 'designers', $old );
}

add_action( 'save_post', 'save_designers_meta' );

function set_designers_table_head($defaults){
    $defaults['name'] = 'Name';
    $defaults['description'] = 'Description';
    $defaults['join_date'] = 'Join Date';
    return $defaults;
}

add_action('manage_designers_posts_columns', 'set_designers_table_head');

function set_designers_table_content($column_name, $post_id ){
    $designer = get_post_meta( $post_id, 'designers', true );
    if ($column_name == "name") {
        echo $designer["name"];
    }
    if ($column_name == "description") {
        echo wp_trim_words($designer["description"], 8);
    }
    if ($column_name == "join_date") {
        echo date('d F Y', strtotime($designer["join_date"]));
    }
}

add_action('manage_designers_posts_custom_column', 'set_designers_table_content', 10, 2);