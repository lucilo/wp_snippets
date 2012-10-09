<?php

// D�sactivation Plugin updates
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

// D�sactiver la notification de MAJ
if ( !current_user_can('administrator') ) {
    add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
    add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}

// D�sactivation admin bar
show_admin_bar(false); // dans functions.php

// code PHP pour rajouter des customs post type dans l'admin de wordpress
register_post_type('post_type_name', array(
    'label' => __('Label du post type au puriel'),
    'singular_label' => __('label du post type au singulier'),
    'public' => true,
    'exclude_from_search' => false,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array('title', 'author', 'excerpt', 'editor', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes')
));