<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   STARTERKIT_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: STARTERKIT_field()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Returns HTML for a query pager.
 *
 * Menu callbacks that display paged query results should call theme('pager') to
 * retrieve a pager control so that users can view other results. Format a list
 * of nearby pages with additional query results.
 *
 * @param $vars
 *   An associative array containing:
 *   - tags: An array of labels for the controls in the pager.
 *   - element: An optional integer to distinguish between multiple pagers on
 *     one page.
 *   - parameters: An associative array of query string parameters to append to
 *     the pager links.
 *   - quantity: The number of pages in the list.
 *
 * @ingroup themeable
 */
function d7theme_pager($variables) {
  global $pager_page_array, $pager_total;
  
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => $i,
          );
        }
        
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    
    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pager', 'clearfix')),
    ));
  }
}

/**
 *  Implements hook_item_list().
 */
function d7theme_item_list($variables) {
  $items = $variables['items'];
  $title = $variables['title'];
  $type = $variables['type'];
  $attributes = $variables['attributes'];

  $output = '<div class="item-list">';
  if (isset($title)) {
    $output .= '<h3>' . $title . '</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $num_items = count($items);
    
    foreach ($items as $i => $item) {
      $attributes = array();
      $children = array();
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      
      if ($i == 0) {
        $attributes['class'][] = 'first';
      }
      
      if ($i == $num_items - 1) {
        $attributes['class'][] = 'last';
      }
      
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>";
    }
    
    $output .= "</$type>";
  }
  
  $output .= '</div>';
  
  return $output;
}

/**
 * Implements hook_views_mini_pager().
 * 
 * This custom theming for views_mini_pager changes the previous/next
 * links to remove theme completely when not present to avoid the
 * &nbsp; messing up the spacing/theming in the list.
 */
function d7theme_views_mini_pager($variables) {
  global $pager_page_array, $pager_total;

  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  $li_previous = theme('pager_previous',
    array(
      'text' => (isset($tags[1]) ? $tags[1] : t('‹‹')),
      'element' => $element,
      'interval' => 1,
      'parameters' => $parameters,
    )
  );
  
  if (empty($li_previous)) {
    $li_previous = "";
  }

  $li_next = theme('pager_next',
    array(
      'text' => (isset($tags[3]) ? $tags[3] : t('››')),
      'element' => $element,
      'interval' => 1,
      'parameters' => $parameters,
    )
  );
  
  if (empty($li_next)) {
    $li_next = "";
  }

  if ($pager_total[$element] > 1) {
    $items[] = array(
      'class' => array('pager-previous'),
      'data' => $li_previous,
    );

    $items[] = array(
      'class' => array('pager-current'),
      'data' => t('@current of @max', array('@current' => $pager_current, '@max' => $pager_max)),
    );

    $items[] = array(
      'class' => array('pager-next'),
      'data' => $li_next,
    );
    
    return theme('item_list',
      array(
        'items' => $items,
        'title' => NULL,
        'type' => 'ul',
        'attributes' => array('class' => array('pager')),
      )
    );
  }
}

/**
 * Implements hook_links().
 */
function d7theme_links($variables) {
  global $language_url;
  
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  
  $output = '';

  if (count($links) > 0) {
    // Treat the heading first if it is present to prepend it to the list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading.
          'level' => 'h2',
        );
      }
      
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      
      if ($i == $num_links) {
        $class[] = 'last';
      }
      
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page())) && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      
      // Add a class for has a sub-menu
      if(isset($link['below'])) {
        $class[] = 'has-subitems';
      }
      
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l(trim($link['title']), $link['href'], $link);
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }
      
      // Theme in nested links in the UL
      if(isset($link['below'])) {
        $output .= theme('links', array(
          'links' => $link['below'],
          'attributes' => array(
            'class' => array('links', 'main-menu', 'secondary-items'),
          ),
        ));
      }
      
      $i++;
      $output .= "</li>";
    }

    $output .= '</ul>';
  }

  return $output;
}

/**
  * Adding js via Drupal libraries for better control over where they are aggregated (SYSTEM, LIBRARIES or THEME)
 *  Implements hook_library().
 */
function d7theme_library() {

  // Feature detection and conditional script loading
  $libraries['modernizr'] = array(
    'title' => 'modernizr',
    'website' => 'modernizr',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'd7theme') . '/js/lib-base/modernizr.dev.js' => array(
        'type' => 'file',
        'weight' => 1000,
        'group' => JS_LIBRARY),
    ),
  );

  $libraries['matchMedia_polyfill'] = array(
    'title' => 'Polyfill matchMedia in IE9',
    'website' => 'https://github.com/paulirish/matchMedia.js/',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/media.match.min.js' => array(
        'type' => 'file',
        'weight' => 1002,
        'group' => JS_LIBRARY),
    ),
  );
  // Responsive JS framework via Javascript matchMedia API
  $libraries['enquire'] = array(
    'title' => 'Javasript matchMedia API Framework',
    'website' => 'http://wicky.nillia.ms/enquire.js/',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/enquire.min.js' => array(
        'type' => 'file',
        'weight' => 1003,
        'group' => JS_LIBRARY),
    ),
  );
  // Responsive JS framework via browser window tests
  $libraries['ssm'] = array(
    'title' => 'Simple State Manager',
    'website' => 'http://www.simplestatemanager.com/',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/ssm.js' => array(
        'type' => 'file',
        'weight' => 1003,
        'group' => JS_LIBRARY),
    ),
  );

  $libraries['core'] = array(
    'title' => 'Core JS',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'd7theme') . '/js/lib-base/core.js' => array(
        'type' => 'file',
        'weight' => 1001,
        'group' => JS_LIBRARY),
    ),
  );

  $libraries['to_top'] = array(
    'title' => 'To top scroll button',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/to-top-button.js' => array(
        'type' => 'file',
        'group' => JS_THEME),
    ),
    'css' => array(
      drupal_get_path('theme', 'd7theme') . '/css/lib-conditional/to-top-button.css' => array(
        'type' => 'file',
        'media' => 'screen',
      ),
    ),
  );

  $libraries['responsive_js'] = array(
    'title' => 'Responsive JS',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'd7theme') . '/js/lib-base/responsive-app.js' => array(
        'type' => 'file',
        'weight' => 1004,
        'group' => JS_LIBRARY),
    ),
  );

  $libraries['touch'] = array(
    'title' => 'Touch Device JS',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/touch.js' => array(
        'type' => 'file',
        'weight' => 1005,
        'group' => JS_LIBRARY),
    ),
  );
      
  return $libraries;
}


/**
 * Override or insert variables into the html template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered. This is usually "html", but can
 *   also be "maintenance_page" since d7theme_preprocess_maintenance_page() calls
 *   this function to have consistent variables.
 */
function d7theme_preprocess_html(&$variables, $hook) {
  // Add variables and paths needed for HTML5 and responsive support.
  $variables['base_path'] = base_path();
  $variables['path_to_d7theme'] = drupal_get_path('theme', 'd7theme');

  $add_viewport_indicator = theme_get_setting('d7theme_browser_width_indicator');
  $variables['add_easing'] = theme_get_setting('d7theme_easing');
  $add_easing = $variables['add_easing'];

  $variables['add_to_top'] = theme_get_setting('d7theme_to_top');
  $add_to_top = $variables['add_to_top'];

  $variables['d7theme_responsive_js_framework'] = theme_get_setting('d7theme_responsive_js_framework');
  $add_responsive_js = $variables['d7theme_responsive_js_framework'];

  $variables['add_scroll'] = theme_get_setting('d7theme_scroll');
  $add_scroll = $variables['add_scroll'];

  $variables['add_ms_tile_color'] = theme_get_setting('d7theme_ms_tile_color');
  $add_ms_tile_color = $variables['add_ms_tile_color'];

  if ($add_easing == 1) {
    drupal_add_js(drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/jquery.easing.js', array('type' => 'file','weight' => 1040,'group' => JS_LIBRARY));
  }
  if ($add_scroll == 1) {
    drupal_add_js(drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/jquery.smooth-scroll.js',  array('type' => 'file','weight' => 1045,'group' => JS_LIBRARY));
  }
  if ($add_to_top == 1) {
    drupal_add_library('d7theme', 'to_top');
  }

  if ($add_viewport_indicator) {
      if ($variables['is_admin'] && !module_exists('overlay')) {
        $variables['attributes_array']['class'][] = 'd7theme_browser-width-indicator';
        drupal_add_js(drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/viewport-indicator.js', array('group' => JS_THEME, 'weight' => -10, 'every_page' => TRUE));
        drupal_add_css(drupal_get_path('theme', 'd7theme') . '/css/lib-conditional/development.css', array('group' => CSS_THEME, 'weight' => -10, 'every_page' => TRUE));
      }
  }
  // Add css and js if usimg theming helper region
  if (!empty($variables['page']['theming_sidebar']) && $variables['is_admin'] == TRUE) {
    $variables['classes_array'][] = 'has-theming-sidebar';
    drupal_add_js(drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/theming-sidebar.js', array('type' => 'file'));
    drupal_add_css(drupal_get_path('theme','d7theme') .'/css/lib-conditional/theming-sidebar.css');
  } 
  // Add body class, css and js when mobile sidebar has blocks content.. Otherwise use slidetoggle style menu
  if (!empty($variables['page']['mobile_sidebar'])) {
    $variables['classes_array'][] = 'has-mobile-sidebar';
    drupal_add_js(drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/off-canvas-sidebar.js', array('type' => 'file','weight' => 1050,'group' => JS_LIBRARY));
    drupal_add_css(drupal_get_path('theme','d7theme') .'/css/lib-conditional/modular/off-canvas-sidebar.css');
  } else {
    drupal_add_js(drupal_get_path('theme', 'd7theme') . '/js/lib-conditional/toggle-menu.js', array('type' => 'file','weight' => 1055,'group' => JS_LIBRARY));
    drupal_add_css(drupal_get_path('theme','d7theme') .'/css/lib-conditional/modular/toggle-menu.css');
  }

  drupal_add_library('d7theme', 'modernizr');
  drupal_add_library('d7theme', 'core');

  if ($add_responsive_js == 0) {
    drupal_add_library('d7theme', 'matchMedia_polyfill');
    drupal_add_library('d7theme', 'enquire');
  }
  if ($add_responsive_js == 1) {
    drupal_add_library('d7theme', 'ssm');
  }

  drupal_add_library('d7theme', 'responsive_js');
  drupal_add_library('d7theme', 'touch');

  // Add css and js if usimg theming helper region
  if (!empty($variables['page']['content_bottom'])) {
    $variables['classes_array'][] = 'has-content-bottom';
  } 

}


/**
 * Override or insert variables into the page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function d7theme_preprocess_page(&$variables) {
  // Expose theme setting for conditionally loaded markup in page template.
  $variables['add_to_top'] = theme_get_setting('d7theme_to_top');
  $add_to_top = $variables['add_to_top'];

}


/**
 * Preprocess variables for region.tpl.php
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
function d7theme_preprocess_region(&$variables, $hook) {
 // Add template suggestions to appropriate blocks.
  switch ($variables['region']) {
    case 'content_top':
    case 'content_bottom':
      // Use no-wrapper template.
      $variables['theme_hook_suggestions'][] = 'region__content';
      break;
  }
}


/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function d7theme_preprocess_block(&$variables, $hook) {
  // add grid class dependant upon number of blocks in a region. Requires rdg custom responsive blocks css
  // if ($variables['block']->region == 'footer') {
  //     // Get the count of blocks
  //     $aBlocks = block_list($variables['block']->region);
  //     $count = count($aBlocks);
      
  //     switch ($count) {
  //       case 0:
  //         $count = 'empty';
  //         break;
          
  //       case 1:
  //         $count = 'one';
  //         break;
          
  //       case 2:
  //         $count = 'two';
  //         break;

  //       case 3:
  //         $count = 'three';
  //         break;
          
  //       case 4:
  //         $count = 'four';
  //         break;
          
  //       case 5:
  //         $count = 'five';
  //         break;
          
  //       case 6:
  //         $count = 'six';
  //         break;

  //       default:
  //         $count = 'one';
  //     }
  //     // add class to use to style responsive layout
  //     $variables['classes_array'][] = 'max-'. ($count);
  // }

  // Add template suggestions to appropriate blocks.
  switch ($variables['block']->module) {
    case 'system':
      switch ($variables['block']->delta) {
        case 'help':
        case 'powered-by':
          break;

        case 'main':
          // Use a template with no wrapper for the page's main content.
          $variables['theme_hook_suggestions'][] = 'block__no_wrapper';
          break;

        default:
          // Any other "system" block is a menu block and should use block--nav.tpl.php
          $variables['theme_hook_suggestions'][] = 'block__nav';
          break;
      }
      break;

    case 'menu':
    case 'menu_block':
      // Use block--nav.tpl.php template.
      $variables['theme_hook_suggestions'][] = 'block__nav';
      break;
  }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */


/**
 * Implements hook_block_list_alter().
 */
function d7theme_block_list_alter(&$blocks) {

  // Hide the main content block on the front page if the theme settings are
  // configured that way.
  if (!theme_get_setting('d7theme_toggle_front_page_content') && drupal_is_front_page()) {
    foreach ($blocks as $key => $block) {
      if ($block->module == 'system' && $block->delta == 'main') {
        unset($blocks[$key]);
      }
    }
    drupal_set_page_content();
  }
}


/**
 * Implements template_preprocess_user_picture().
 * - Add "change picture" link to be placed underneath the user image.
 */
function d7theme_preprocess_user_picture(&$variables) {
  // Create a variable with an empty string to prevent PHP notices when
  // attempting to print the variable.
  $variables['edit_picture'] = '';

  // The account object contains the information of the user whose photo is
  // being processed. Compare that to the user id of the user object which    
  // represents the currently logged in user.
  if ($variables['account']->uid == $variables['user']->uid) {
    // Create a variable containing a link to the user profile, with a class
    // "change-user-picture" to style against with CSS.
    $variables['edit_picture'] = l('Change picture', 'user/' . $variables['account']->uid . '/edit',
      array(
        'fragment' => 'edit-picture',
        'attributes' => array('class' => array('change-user-picture')),
      )
    ); 
  }
}


/**
 * Alter forms.
 *
 */
function d7theme_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    // HTML5 placeholder attribute
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
  }
  // Placeholder text in other areas
  if (in_array( $form_id, array( 'user_login', 'user_login_block'))) {
    // Add "Username" & "Password" placeholders
    $form['name']['#attributes']['placeholder'] = t( 'Username' );
    $form['pass']['#attributes']['placeholder'] = t( 'Password' );

    // Remove the "Username" & "Password" labels from the form.
    unset($form['name']['#title']);
    unset($form['pass']['#title']);
  }

}


function d7theme_css_alter(&$css) {
//   if (isset($css[drupal_get_path('system', 'lang_dropdown') .'/msdropdown/dd_after.css'])) {
//     $css[drupal_get_path('module', 'lang_dropdown') .'/msdropdown/dd_after.css']['data'] = drupal_get_path('theme', 'custom') . '/css/custom-dd_after.css';
//   }
//   // Remove defaults.css file.
//   unset($css[drupal_get_path('module', 'lang_dropdown') . '/msdropdown/dd_after.css']);
//   
//   
  // Omega Team: the CSS_SYSTEM aggregation group doesn't make any sense. Therefore, we are
  // pre-pending it to the CSS_DEFAULT group. This has the same effect as giving
  // it a separate (low-weighted) group but also allows it to be aggregated
  // together with the rest of the CSS.
  foreach ($css as &$item) {
    if ($item['group'] == CSS_SYSTEM) {
      $item['group'] = CSS_DEFAULT;
      $item['weight'] = $item['weight'] - 100;
    }
  }

  // Clean up core and contrib module CSS.
  $overrides = array(
    'aggregator' => array(
      'aggregator.css' => array(
        'theme' => 'aggregator.theme.css',
      ),
      'aggregator-rtl.css' => array(
        'theme' => 'aggregator.theme-rtl.css',
      ),
    ),
    'block' => array(
      'block.css' => array(
        'admin' => 'block.admin.css',
        'demo' => 'block.demo.css',
      ),
    ),
    'book' => array(
      'book.css' => array(
        'theme' => 'book.theme.css',
        'admin' => 'book.admin.css',
      ),
      'book-rtl.css' => array(
        'theme' => 'book.theme-rtl.css',
      ),
    ),
    'color' => array(
      'color.css' => array(
        'admin' => 'color.admin.css',
      ),
      'color-rtl.css' => array(
        'admin' => 'color.admin-rtl.css',
      ),
    ),
    'comment' => array(
      'comment.css' => array(
        'theme' => 'comment.theme.css',
      ),
      'comment-rtl.css' => array(
        'theme' => 'comment.theme-rtl.css',
      ),
    ),
    'contextual' => array(
      'contextual.css' => array(
        'base' => 'contextual.base.css',
        'theme' => 'contextual.theme.css',
      ),
      'contextual-rtl.css' => array(
        'base' => 'contextual.base-rtl.css',
        'theme' => 'contextual.theme-rtl.css',
      ),
    ),
    'field' => array(
      'theme/field.css' => array(
        'theme' => 'field.theme.css',
      ),
      'theme/field-rtl.css' => array(
        'theme' => 'field.theme-rtl.css',
      ),
    ),
    'field_ui' => array(
      'field_ui.css' => array(
        'admin' => 'field_ui.admin.css',
      ),
      'field_ui-rtl.css' => array(
        'admin' => 'field_ui.admin-rtl.css',
      ),
    ),
    'file' => array(
      'file.css' => array(
        'theme' => 'file.theme.css',
      ),
    ),
    'filter' => array(
      'filter.css' => array(
        'theme' => 'filter.theme.css',
      ),
    ),
    'forum' => array(
      'forum.css' => array(
        'theme' => 'forum.theme.css',
      ),
      'forum-rtl.css' => array(
        'theme' => 'forum.theme-rtl.css',
      ),
    ),
    'image' => array(
      'image.css' => array(
        'theme' => 'image.theme.css',
      ),
      'image-rtl.css' => array(
        'theme' => 'image.theme-rtl.css',
      ),
      'image.admin.css' => array(
        'admin' => 'image.admin.css',
      ),
    ),
    'locale' => array(
      'locale.css' => array(
        'admin' => 'locale.admin.css',
      ),
      'locale-rtl.css' => array(
        'admin' => 'locale.admin-rtl.css',
      ),
    ),
    'openid' => array(
      'openid.css' => array(
        'base' => 'openid.base.css',
        'theme' => 'openid.theme.css',
      ),
      'openid-rtl.css' => array(
        'base' => 'openid.base-rtl.css',
        'theme' => 'openid.theme-rtl.css',
      ),
    ),
    'poll' => array(
      'poll.css' => array(
        'admin' => 'poll.admin.css',
        'theme' => 'poll.theme.css',
      ),
      'poll-rtl.css' => array(
        'theme' => 'poll.theme-rtl.css',
      ),
    ),
    'search' => array(
      'search.css' => array(
        'theme' => 'search.theme.css',
      ),
      'search-rtl.css' => array(
        'theme' => 'search.theme-rtl.css',
      ),
    ),
    'system' => array(
      'system.base.css' => array(
        'base' => 'system.base.css',
      ),
      'system.base-rtl.css' => array(
        'base' => 'system.base-rtl.css',
      ),
      'system.theme.css' => array(
        'theme' => 'system.theme.css',
      ),
      'system.theme-rtl.css' => array(
        'theme' => 'system.theme-rtl.css',
      ),
      'system.admin.css' => array(
        'admin' => 'system.admin.css',
      ),
      'system.admin-rtl.css' => array(
        'admin' => 'system.admin-rtl.css',
      ),
      'system.menus.css' => array(
        'theme' => 'system.menus.theme.css',
      ),
      'system.menus-rtl.css' => array(
        'theme' => 'system.menus.theme-rtl.css',
      ),
      'system.messages.css' => array(
        'theme' => 'system.messages.theme.css',
      ),
      'system.messages-rtl.css' => array(
        'theme' => 'system.messages.theme-rtl.css',
      ),
    ),
    'taxonomy' => array(
      'taxonomy.css' => array(
        'admin' => 'taxonomy.admin.css',
      ),
    ),
    'user' => array(
      'user.css' => array(
        'base' => 'user.base.css',
        'admin' => 'user.admin.css',
        'theme' => 'user.theme.css',
      ),
      'user-rtl.css' => array(
        'admin' => 'user.admin-rtl.css',
        'theme' => 'user.theme-rtl.css',
      ),
    ),
  );
}


