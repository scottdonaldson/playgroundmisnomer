<?php

/*** Theme setup ***/

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

register_sidebar('Sidebar 1');
register_sidebar('Sidebar 2');

function sight_setup() {
	update_option('thumbnail_size_w', 300);
    update_option('thumbnail_size_h', 300);
    add_image_size( 'mini-thumbnail', 50, 50, true );
    add_image_size( 'slide', 300, 300, true );
    register_nav_menu('Navigation', __('Navigation'));
    register_nav_menu('Top menu', __('Top menu'));
}
add_action( 'init', 'sight_setup' );

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
    update_option( 'posts_per_page', 12 );
    update_option( 'paging_mode', 'default' );
}

/*** Navigation ***/

if ( !is_nav_menu('Navigation') || !is_nav_menu('Top menu') ) {
    $menu_id1 = wp_create_nav_menu('Navigation');
    $menu_id2 = wp_create_nav_menu('Top menu');
    wp_update_nav_menu_item($menu_id1, 1);
    wp_update_nav_menu_item($menu_id2, 1);
}

class extended_walker extends Walker_Nav_Menu{
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );

		//Adds the 'parent' class to the current item if it has children
		if( ! empty( $children_elements[$element->$id_field] ) )
			array_push($element->classes,'parent');

		$cb_args = array_merge( array(&$output, $element, $depth), $args);

		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
}

/*** Slideshow ***/

$prefix = 'sgt_';

$meta_box = array(
    'id' => 'slide',
    'title' => 'Slideshow Options',
    'page' => 'post',
    'context' => 'side',
    'priority' => 'low',
    'fields' => array(
        array(
            'name' => 'Show in slideshow',
            'id' => $prefix . 'slide',
            'type' => 'checkbox'
        )
    )
);
add_action('admin_menu', 'sight_add_box');

// Add meta box
function sight_add_box() {
    global $meta_box;

    add_meta_box($meta_box['id'], $meta_box['title'], 'sight_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function sight_show_box() {
    global $meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="sight_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
                '<th style="width:50%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
        echo     '<td>',
            '</tr>';
    }

    echo '</table>';
}

add_action('save_post', 'sight_save_data');

// Save data from meta box
function sight_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['sight_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

/*** Options ***/

function options_admin_menu() {
	// here's where we add our theme options page link to the dashboard sidebar
	add_theme_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), 'options_page');
}
add_action('admin_menu', 'options_admin_menu');