<?php


/**
 * Implements hook_preprocess_html()
 */
function featurebuilder2016_preprocess_html(&$variables) {

  $alias = drupal_get_path_alias (check_plain($_GET ['q']));
  $term = menu_get_object('taxonomy_term', 2);

  // Add .path & .section classes to body
  if (!empty($term)) {
    $term_href = url('taxonomy/term/' . $term->tid);
    $term_path = "";
    if (isset($term->page_product_tab_name)) {
      $term_tab = $term->page_product_tab_name;
      $term_path = $term_href . "/" . $term_tab;
      $term_path = substr($term_path, 1);
    } else {
      $term_path = substr($term_href, 1);
    }
    // Add path class to body ie .path-support-autocad

    $term_array = explode('/', $term_path);
    $path = $term_array;
    $path = join("/", $path);
    $variables ['classes_array'] [] = 'path-' . str_replace('/', '-', $path);

    // Add section class to body ie .section-support
    $term_array = explode('/', $term_path);
    // remove language prefix from path
    $section = $term_array[0];
    $variables['classes_array'][] = drupal_html_class('section-' . $section);
  } else {
    // Add path class to body ie .path-support-autocad
    $path = $alias;
    $variables ['classes_array'] [] = 'path-' . str_replace('/', '-', $path);

    // Add section class to body ie .section-support
    $term_array = explode('/', $alias);
    // remove language prefix from path
    $section = $term_array[0];
    $variables['classes_array'][] = drupal_html_class('section-' . $section);
  }

  //  drupal_add_js("sites/all/themes/featurebuilder2016/js/vendor/loglevel.min.js", array('type' => 'file', 'scope' => 'header', 'group' => -100));
  //  drupal_add_js("sites/all/themes/featurebuilder2016/js/vendor/foundation.min.js", array('type' => 'file', 'scope' => 'header', 'group' => -100));
  //  drupal_add_js("sites/all/themes/featurebuilder2016/js/vendor/js-cookie.min.js", array('type' => 'file', 'scope' => 'header', 'group' => -100));
  //  drupal_add_js("sites/all/themes/featurebuilder2016/js/vendor/angular/1.4.4/angular.min.js", array('type' => 'file', 'scope' => 'header', 'group' => -100));
  //  drupal_add_js("sites/all/themes/featurebuilder2016/js/vendor/angular/1.4.4/angular-sanitize.min.js", array('type' => 'file', 'scope' => 'header', 'group' => -100));
  //  drupal_add_js("sites/all/themes/featurebuilder2016/js/vendor/angular/1.4.4/angular-route.min.js", array('type' => 'file', 'scope' => 'header', 'group' => -100));
  //
  //  drupal_add_js(path_to_theme() . "/js/app/mobilecheck.js", array('type' => 'file', 'scope' => 'footer', 'every_page' => TRUE));
  //  drupal_add_js(path_to_theme() . "/js/app/akn_header_search.app.js", array('type' => 'file', 'scope' => 'footer', 'every_page' => TRUE));
  //  drupal_add_js("sites/all/modules/custom/autodesk_faceted_search/js/autodesk_faceted_search.validate.js", array('type' => 'file', 'scope' => 'footer', 'every_page' => TRUE));
  //
  //  drupal_add_library('system', 'ui');
  //  drupal_add_library('system', 'ui.widget');

}

function featurebuilder2016_preprocess_region(&$vars) {
  $block_number = count($vars['elements']) - 5;
  $vars['classes_array'][''] = 'block-count-' . $block_number;
}


/**
 * Override or insert variables into the page template.
 */
function featurebuilder2016_process_page(&$variables) {
  // Convenience variables
  if (!empty($variables['page']['sidebar_first'])){
    $left = $variables['page']['sidebar_first'];
  }

  if (!empty($variables['page']['sidebar_second'])) {
    $right = $variables['page']['sidebar_second'];
  }

  // Dynamic sidebars
  if (!empty($left) && !empty($right)) {
    $variables['main_grid'] = 'large-6 push-3';
    $variables['sidebar_first_grid'] = 'large-3 pull-6';
    $variables['sidebar_sec_grid'] = 'large-3';
  } elseif (empty($left) && !empty($right)) {
    $variables['main_grid'] = 'large-9';
    $variables['sidebar_first_grid'] = '';
    $variables['sidebar_sec_grid'] = 'large-3';
  } elseif (!empty($left) && empty($right)) {
    $variables['main_grid'] = 'large-9 push-3';
    $variables['sidebar_first_grid'] = 'large-3 pull-9';
    $variables['sidebar_sec_grid'] = '';
  } else {
    $variables['main_grid'] = 'large-12';
    $variables['sidebar_first_grid'] = '';
    $variables['sidebar_sec_grid'] = '';
  }
}


/**
 * Implements hook_preprocess_block()
 */
function featurebuilder2016_preprocess_block(&$variables) {

  // Add a unique class for each block for styling.
  $variables['classes_array'][] = $variables['block_html_id'];
  // Add classes based on region.
  switch ($variables['elements']['#block']->region) {
    // Add a striping class
    case 'sidebar_first':
    case 'sidebar_second':
      $variables['classes_array'][] = 'block-' . $variables['zebra'];
      switch ($variables['block_html_id']) {
        case 'block-adsk-translation-translation-block':
        case 'block-adsk-related-links-adsk-related-links-related':
        case 'block-block-18':
          $variables['classes_array'][] = 'clearfix';
          break;
      }
      break;

    case 'header':
      $variables['classes_array'][] = 'header';
      break;

    default;
  }

  if ($variables['block']->module == 'menu') {
    array_unshift($variables['theme_hook_suggestions'],'block__menu__' . str_replace('-','_',$variables['block']->region) . '__' . str_replace('-','_', $variables['block']->delta));
    array_unshift($variables['theme_hook_suggestions'],'block__menu__' . str_replace('-','_',$variables['block']->region));
  }
}

/**
 * Show contextual links on all nodes
 */
function featurebuilder2016_node_view_alter( &$build ) {
  $build['#contextual_links']['node'] = array('node', array($build['#node']->nid));
}


/**
 * Implements template_preprocess_node
 */
function featurebuilder2016_preprocess_node(&$variables) {
  // Add node--node_type--view_mode.tpl.php suggestions
  $variables['theme_hook_suggestions'][] = 'node__' . $variables['type'] . '__' . $variables['view_mode'];

  // Add node--view_mode.tpl.php suggestions
  $variables['theme_hook_suggestions'][] = 'node__' . $variables['view_mode'];

  // Add node.tpl suggestion based on the URL alias
  $alias = drupal_get_path_alias($_GET['q']);
  if ($alias != $_GET['q']) {
    $variables['theme_hook_suggestions'][] = 'node__'. str_replace('/', '_', $alias);
  }

  // Add a class for the view mode.
  if (!$variables['teaser']) {
    $variables['classes_array'][] = 'view-mode-' . $variables['view_mode'];
  }

  $variables['title_attributes_array']['class'][] = 'node-title';

}