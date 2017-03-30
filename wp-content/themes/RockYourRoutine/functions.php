<?php

//---------------------------------------------------//
//---- BASIC WORDPRESS SUPPORT ----------------------//
//---------------------------------------------------//

// Featured Images
add_theme_support( 'post-thumbnails' );

add_filter( 'gform_init_scripts_footer', '__return_true' );


//---------------------------------------------------//
//---- ENQUEUE SCRIPTS AND STYLES -------------------//
//---------------------------------------------------//

function rockyourroutine_scripts() {
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/compiled_css/main.style.css' , false, filemtime( get_template_directory() . '/compiled_css/main.style.css' ), 'screen' );
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), filemtime( get_template_directory() . '/js/main.js' ), false );
}
add_action( 'wp_enqueue_scripts', 'rockyourroutine_scripts' );

//---------------------------------------------------//
//---- ADVANCED CUSTOM FIELDS -----------------------//
//---------------------------------------------------//

function remove_acf_menu() {
  remove_menu_page('edit.php?post_type=acf');
}

add_action( 'admin_menu', 'remove_acf_menu', 999);

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_routinefields',
        'title' => 'RoutineFields',
        'fields' => array (
            array (
                'key' => 'field_58dad251394a4',
                'label' => 'Header Logo',
                'name' => 'header_logo',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_58dad21b953da',
                'label' => 'Intro Copy',
                'name' => 'intro_copy',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_58dac956ae9bd',
                'label' => 'Routines',
                'name' => 'routines',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_58dac95fae9be',
                        'label' => 'Routine Title',
                        'name' => 'routine_title',
                        'type' => 'text',
                        'required' => 1,
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_58dac96bae9bf',
                        'label' => 'Routine Image',
                        'name' => 'routine_image',
                        'type' => 'image',
                        'required' => 1,
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_58dac981ae9c0',
                        'label' => 'Routine Bullet Points',
                        'name' => 'routine_bullet_points',
                        'type' => 'repeater',
                        'required' => 1,
                        'column_width' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_58dac996ae9c1',
                                'label' => 'Routine Bullet',
                                'name' => 'routine_bullet',
                                'type' => 'textarea',
                                'required' => 1,
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'maxlength' => '',
                                'rows' => 5,
                                'formatting' => 'br',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => 8,
                        'layout' => 'table',
                        'button_label' => 'Add Row',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array (
                'key' => 'field_58dd5c08a0233d',
                'label' => 'Show Form',
                'name' => 'show_form',
                'type' => 'true_false',
                'instructions' => 'Uncheck this box to hide the sweepstakes form.   You should uncheck this box once the deadline for the form hits and you can recheck it for future sweepstakes (just make sure to empty the form entries database before starting a new sweepstakes!)',
                'message' => 'Show Form',
                'default_value' => 1,
            ),
            array (
                'key' => 'field_58dc19ea33ey1',
                'label' => 'Form Image',
                'name' => 'form_image',
                'type' => 'image',
                'column_width' => '',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_58dac95fadaf93',
                'label' => 'Form Image Text',
                'name' => 'form_image_text',
                'type' => 'text',
                'required' => 0,
                'column_width' => '',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_58dd2d1973792',
                'label' => 'Rules',
                'name' => 'rules',
                'type' => 'file',
                'save_format' => 'object',
                'library' => 'all',
            ),
            array (
                'key' => 'field_58dbfe2de1d74',
                'label' => 'Social',
                'name' => 'social',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_58dc19ed4af7a',
                        'label' => 'Social Image',
                        'name' => 'social_image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_58dd34e609abb',
                        'label' => 'Social Link',
                        'name' => 'social_link',
                        'type' => 'text',
                        'instructions' => 'Add the link for the social post. You must include the full link for this field to work include http:// or https://',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'the_content',
            ),
        ),
        'menu_order' => 0,
    ));
}


?>