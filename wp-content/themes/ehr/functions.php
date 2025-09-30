<?php

add_action('wp_enqueue_scripts', 'ehr_enqueue_scripts', 10, 3);
function ehr_enqueue_scripts()
{
	wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', array(), '1.0');
	wp_enqueue_style('css', get_template_directory_uri() . '/assets/css/application.css', array(), '3.9');
}

add_filter('script_loader_tag', 'ehr_add_defer_attribute', 10, 2);

function ehr_add_defer_attribute($tag, $handle)
{
    $handles = array(
        'vendor-js',
        'app',
    );

    foreach ($handles as $defer_script) {
        if ($defer_script === $handle) {
            return str_replace(' src', ' defer="defer" src', $tag);
        }
    }

    return $tag;
}

show_admin_bar(false);

// menu
add_theme_support('menus');
register_nav_menus(array(
    'header_menu' => 'Header Menu Main',
    'header_menu_mobile' => 'Header Menu Mobile',
    'footer_menu_1' => 'Footer menu 1',
    'footer_menu_2' => 'Footer menu 2',
    'footer_menu_3' => 'Footer menu 3',
    'footer_menu_4' => 'Footer menu 4',
    'footer_menu_bottom' => 'Footer Menu Bottom',
));

// options
add_action('init', 'ea_acf_options_page');
function ea_acf_options_page()
{
    if (function_exists('ea_acf_options_page')) {
        acf_add_options_page('Contacts');
        acf_add_options_page('Options');
    }
}


// svg
add_filter('upload_mimes', 'svg_upload_allow');
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
function svg_upload_allow($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}
	if ($dosvg) {

		if (current_user_can('manage_options')) {
			$data['ext'] = 'svg';
			$data['type'] = 'image/svg+xml';
		} else {
			$data['ext'] = false;
			$data['type'] = false;
		}
	}
	return $data;
}

class Main_Menu_Walker_Nav_Menu extends Walker_Nav_Menu {
    private $privacy_policy_url;

    public function __construct() {
        $this->privacy_policy_url = get_privacy_policy_url();
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );

        // Default class.
        $classes = array();

        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );

        $atts          = array();
        $atts['class'] = ! empty( $class_names ) ? $class_names : '';

        $atts       = apply_filters( 'nav_menu_submenu_attributes', $atts, $args, $depth );
        $attributes = $this->build_atts( $atts );

        $output .= "{$n}{$indent}" . ($depth ? "" : "<div class=\"submenu\">") . "<ul{$attributes}>{$n}";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent  = str_repeat( $t, $depth );
        $output .= "$indent</ul>" . ($depth ? "" : "</div>") . "{$n}";
    }

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        // Restores the more descriptive, specific name for use within this method.
        $menu_item = $data_object;

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $menu_item->classes ) ? array() : (array) $menu_item->classes;
        $classes[] = 'menu-item-' . $menu_item->ID;

        $args = apply_filters( 'nav_menu_item_args', $args, $menu_item, $depth );

        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $menu_item, $args, $depth ) );

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth );

        $li_atts          = array();
        $li_atts['id']    = ! empty( $id ) ? $id : '';
        $li_atts['class'] = ! empty( $class_names ) ? $class_names : '';

        $li_atts       = apply_filters( 'nav_menu_item_attributes', $li_atts, $menu_item, $args, $depth );
        $li_attributes = $this->build_atts( $li_atts );

        $output .= $indent . '<li' . $li_attributes . '>';

        $title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );

        // Save filtered value before filtering again.
        $the_title_filtered = $title;

        $title = apply_filters( 'nav_menu_item_title', $title, $menu_item, $args, $depth );

        $atts           = array();
        $atts['target'] = ! empty( $menu_item->target ) ? $menu_item->target : '';
        $atts['rel']    = ! empty( $menu_item->xfn ) ? $menu_item->xfn : '';

        if ( ! empty( $menu_item->url ) ) {
            if ( $this->privacy_policy_url === $menu_item->url ) {
                $atts['rel'] = empty( $atts['rel'] ) ? 'privacy-policy' : $atts['rel'] . ' privacy-policy';
            }

            $atts['href'] = $menu_item->url;
        } else {
            $atts['href'] = '';
        }

        $atts['aria-current'] = $menu_item->current ? 'page' : '';

        // Add title attribute only if it does not match the link text (before or after filtering).
        if ( ! empty( $menu_item->attr_title )
            && trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $menu_item->title ) )
            && trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $the_title_filtered ) )
            && trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $title ) )
        ) {
            $atts['title'] = $menu_item->attr_title;
        } else {
            $atts['title'] = '';
        }

        $atts       = apply_filters( 'nav_menu_link_attributes', $atts, $menu_item, $args, $depth );
        $attributes = $this->build_atts( $atts );
        $icon = get_field('icon', $menu_item->ID);

        if($depth){
            $item_output  = $args->before;
            // Проверяем, является ли элемент текущей страницей (current-menu-item или active)
            if($menu_item->current || in_array('current-menu-item', $classes) || in_array('active', $classes)) {
                // Убираем href из атрибутов и создаем span вместо ссылки
                $span_attributes = str_replace(' href="' . $menu_item->url . '"', '', $attributes);
                $item_output .= '<span' . $span_attributes . '>';
                if(!empty($icon)){
                    $item_output .= '<img src="' . $icon . '" alt="' . $title . '">';
                }
                $item_output .= $args->link_before . $title . $args->link_after;
                if(in_array('menu-item-has-children', $classes)){
                    $item_output .= '<svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.183059 8.81171C-0.0610189 8.56066 -0.0610189 8.15363 0.183059 7.90257L3.49112 4.5L0.183059 1.09743C-0.0610182 0.846374 -0.0610182 0.439339 0.18306 0.188288C0.427137 -0.0627636 0.822865 -0.0627636 1.06694 0.188288L4.81694 4.04543C5.06102 4.29648 5.06102 4.70352 4.81694 4.95457L1.06694 8.81171C0.822865 9.06276 0.427136 9.06276 0.183059 8.81171Z" fill="#383838"/></svg>';
                }
                $item_output .= '</span>';
            } else {
                $item_output .= '<a' . $attributes . '>';
                if(!empty($icon)){
                    $item_output .= '<img src="' . $icon . '" alt="' . $title . '">';
                }
                $item_output .= $args->link_before . $title . $args->link_after;
                if(in_array('menu-item-has-children', $classes)){
                    $item_output .= '<svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.183059 8.81171C-0.0610189 8.56066 -0.0610189 8.15363 0.183059 7.90257L3.49112 4.5L0.183059 1.09743C-0.0610182 0.846374 -0.0610182 0.439339 0.18306 0.188288C0.427137 -0.0627636 0.822865 -0.0627636 1.06694 0.188288L4.81694 4.04543C5.06102 4.29648 5.06102 4.70352 4.81694 4.95457L1.06694 8.81171C0.822865 9.06276 0.427136 9.06276 0.183059 8.81171Z" fill="#383838"/></svg>';
                }
                $item_output .= '</a>';
            }
            $item_output .= $args->after;
        }else{
            $item_output  = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . $title . $args->link_after;
            if(in_array('menu-item-has-children', $classes)){
                $item_output .= '<svg xmlns="http://www.w3.org/2000/svg" width="9" height="5" viewBox="0 0 9 5" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.188288 0.183059C0.43934 -0.061019 0.846374 -0.061019 1.09743 0.183059L4.5 3.49112L7.90257 0.183058C8.15363 -0.0610193 8.56066 -0.0610193 8.81171 0.183058C9.06276 0.427136 9.06276 0.822864 8.81171 1.06694L4.95457 4.81694C4.70352 5.06102 4.29648 5.06102 4.04543 4.81694L0.188288 1.06694C-0.062763 0.822865 -0.062763 0.427136 0.188288 0.183059Z" fill="#383838"/></svg>';
            }
            $item_output .= '</a>';
            $item_output .= $args->after;
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args );
    }

    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }

    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element ) {
            return;
        }

        $max_depth = (int) $max_depth;
        $depth     = (int) $depth;

        $id_field = $this->db_fields['id'];
        $id       = $element->$id_field;

        // Display this element.
        $this->has_children = ! empty( $children_elements[ $id ] );
        if ( isset( $args[0] ) && is_array( $args[0] ) ) {
            $args[0]['has_children'] = $this->has_children; // Back-compat.
        }

        if(in_array('current-menu-parent', $element->classes)){
            unset($children_elements[$id][0]->classes[0]);
            foreach($children_elements[$id] as $i => $child){
                if(in_array('current-menu-item', $child->classes)){
                    $children_elements[$id][$i]->classes[] = 'active';
                    break;
                }
            }
        }

        $this->start_el( $output, $element, $depth, ...array_values( $args ) );

        // Descend only when the depth is right and there are children for this element.
        if ( ( 0 === $max_depth || $max_depth > $depth + 1 ) && isset( $children_elements[ $id ] ) ) {

            foreach ( $children_elements[ $id ] as $child ) {

                if ( ! isset( $newlevel ) ) {
                    $newlevel = true;
                    // Start the child delimiter.
                    $this->start_lvl( $output, $depth, ...array_values( $args ) );
                }
                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
            }
            $args[0]->current_children_elements = $children_elements[ $id ];
            unset( $children_elements[ $id ] );
        }

        if ( isset( $newlevel ) && $newlevel ) {
            // End the child delimiter.
            $this->end_lvl( $output, $depth, ...array_values( $args ) );
            unset($args['current_children_elements']);
        }

        // End this element.
        $this->end_el( $output, $element, $depth, ...array_values( $args ) );
    }
}

class Mobile_Menu_Walker_Nav_Menu extends Walker_Nav_Menu {
    private $privacy_policy_url;

    public function __construct() {
        $this->privacy_policy_url = get_privacy_policy_url();
    }

    public function start_lvl( &$output, $depth = 0, $title = null, $args = null) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );

        // Default class.
        $classes = array( 'sub-menu' );

        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );

        $atts          = array();
        $atts['class'] = ! empty( $class_names ) ? $class_names : '';

        $atts       = apply_filters( 'nav_menu_submenu_attributes', $atts, $args, $depth );
        $attributes = $this->build_atts( $atts );

        $output .= "{$n}{$indent}<div class=\"mobile-menu__lvl".($depth+2)."\">" .
            '<span class="menu-back lvl'.($depth+2).'">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.183059 8.81171C-0.0610189 8.56066 -0.0610189 8.15363 0.183059 7.90257L3.49112 4.5L0.183059 1.09743C-0.0610182 0.846374 -0.0610182 0.439339 0.18306 0.188288C0.427137 -0.0627636 0.822865 -0.0627636 1.06694 0.188288L4.81694 4.04543C5.06102 4.29648 5.06102 4.70352 4.81694 4.95457L1.06694 8.81171C0.822865 9.06276 0.427136 9.06276 0.183059 8.81171Z" fill="#383838"/>
                    </svg>
                </i>
                <span><a href="javascript:void(0)">' . $title . '</a></span>
            </span>' .
            "<ul{$attributes}>{$n}";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent  = str_repeat( $t, $depth );
        $output .= "$indent</ul></div>{$n}";
    }

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        // Restores the more descriptive, specific name for use within this method.
        $menu_item = $data_object;

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $menu_item->classes ) ? array() : (array) $menu_item->classes;
        $classes[] = 'menu-item-' . $menu_item->ID;
        $classes[] = 'lvl' . ($depth + 1);

        $args = apply_filters( 'nav_menu_item_args', $args, $menu_item, $depth );

        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $menu_item, $args, $depth ) );

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth );

        $li_atts          = array();
        $li_atts['id']    = ! empty( $id ) ? $id : '';
        $li_atts['class'] = ! empty( $class_names ) ? $class_names : '';

        $li_atts       = apply_filters( 'nav_menu_item_attributes', $li_atts, $menu_item, $args, $depth );
        $li_attributes = $this->build_atts( $li_atts );

        $output .= $indent . '<li' . $li_attributes . '>';

        $title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );

        // Save filtered value before filtering again.
        $the_title_filtered = $title;

        $title = apply_filters( 'nav_menu_item_title', $title, $menu_item, $args, $depth );

        $atts           = array();
        $atts['target'] = ! empty( $menu_item->target ) ? $menu_item->target : '';
        $atts['rel']    = ! empty( $menu_item->xfn ) ? $menu_item->xfn : '';

        if ( ! empty( $menu_item->url ) ) {
            if ( $this->privacy_policy_url === $menu_item->url ) {
                $atts['rel'] = empty( $atts['rel'] ) ? 'privacy-policy' : $atts['rel'] . ' privacy-policy';
            }

            $atts['href'] = $menu_item->url;
        } else {
            $atts['href'] = '';
        }

        $atts['aria-current'] = $menu_item->current ? 'page' : '';

        // Add title attribute only if it does not match the link text (before or after filtering).
        if ( ! empty( $menu_item->attr_title )
            && trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $menu_item->title ) )
            && trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $the_title_filtered ) )
            && trim( strtolower( $menu_item->attr_title ) ) !== trim( strtolower( $title ) )
        ) {
            $atts['title'] = $menu_item->attr_title;
        } else {
            $atts['title'] = '';
        }

        $atts       = apply_filters( 'nav_menu_link_attributes', $atts, $menu_item, $args, $depth );
        $attributes = $this->build_atts( $atts );

        if($depth){
            $image = get_field('icon', $menu_item->ID);
        }

        $item_output  = $args->before;
        $item_output .= '<span>';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $depth && !empty($image) ? '<i><img src="'.$image.'" alt="'.$title.'"></i>' : '';
        $item_output .= $args->link_before . $menu_item->post_content . $title . $args->link_after;
        $item_output .= '</a>';
        if(in_array('menu-item-has-children', $classes)){
            $item_output .= '<i><svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.183059 8.81171C-0.0610189 8.56066 -0.0610189 8.15363 0.183059 7.90257L3.49112 4.5L0.183059 1.09743C-0.0610182 0.846374 -0.0610182 0.439339 0.18306 0.188288C0.427137 -0.0627636 0.822865 -0.0627636 1.06694 0.188288L4.81694 4.04543C5.06102 4.29648 5.06102 4.70352 4.81694 4.95457L1.06694 8.81171C0.822865 9.06276 0.427136 9.06276 0.183059 8.81171Z" fill="#383838"/></svg></i>';
        }
        $item_output .= '</span>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args );
    }

    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }

    /**
     * Traverses elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth. It is possible to set the
     * max depth to include all depths, see walk() method.
     *
     * This method should not be called directly, use the walk() method instead.
     *
     * @since 2.5.0
     *
     * @param object $element           Data object.
     * @param array  $children_elements List of elements to continue traversing (passed by reference).
     * @param int    $max_depth         Max depth to traverse.
     * @param int    $depth             Depth of current element.
     * @param array  $args              An array of arguments.
     * @param string $output            Used to append additional content (passed by reference).
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element ) {
            return;
        }

        $max_depth = (int) $max_depth;
        $depth     = (int) $depth;
        $title     = $element->title;

        $id_field = $this->db_fields['id'];
        $id       = $element->$id_field;

        // Display this element.
        $this->has_children = ! empty( $children_elements[ $id ] );
        if ( isset( $args[0] ) && is_array( $args[0] ) ) {
            $args[0]['has_children'] = $this->has_children; // Back-compat.
        }

        $this->start_el( $output, $element, $depth, ...array_values( $args ) );

        // Descend only when the depth is right and there are children for this element.
        if ( ( 0 === $max_depth || $max_depth > $depth + 1 ) && isset( $children_elements[ $id ] ) ) {

            foreach ( $children_elements[ $id ] as $child ) {

                if ( ! isset( $newlevel ) ) {
                    $newlevel = true;
                    // Start the child delimiter.
                    $this->start_lvl( $output, $depth, $title, ...array_values( $args ) );
                }
                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
            }
            unset( $children_elements[ $id ] );
        }

        if ( isset( $newlevel ) && $newlevel ) {
            // End the child delimiter.
            $this->end_lvl( $output, $depth, ...array_values( $args ) );
        }

        // End this element.
        $this->end_el( $output, $element, $depth, ...array_values( $args ) );
    }
}