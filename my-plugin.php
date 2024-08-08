<?php
/*
Plugin Name: My Custom Block Plugin
Description: A plugin to add a custom block to the WordPress block editor.
Version: 1.0.0
Author: Your Name
*/

function my_plugin_register_blocks()
{
    // Automatically load dependencies and version from the asset file
    $asset_file = include(plugin_dir_path(__FILE__) . 'build/index.asset.php');

    wp_register_script(
        'my-plugin-blocks',
        plugins_url('build/index.js', __FILE__),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    // Register block type
    register_block_type('my-plugin/my-block', array(
        'editor_script' => 'my-plugin-blocks',
    ));
}

add_action('init', 'my_plugin_register_blocks');
