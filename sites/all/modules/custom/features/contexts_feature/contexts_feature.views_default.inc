<?php
/**
 * @file
 * contexts_feature.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function contexts_feature_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'promotions';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Promotions';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = '<none>';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Link */
  $handler->display->display_options['fields']['field_promo_link']['id'] = 'field_promo_link';
  $handler->display->display_options['fields']['field_promo_link']['table'] = 'field_data_field_promo_link';
  $handler->display->display_options['fields']['field_promo_link']['field'] = 'field_promo_link';
  $handler->display->display_options['fields']['field_promo_link']['label'] = '';
  $handler->display->display_options['fields']['field_promo_link']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_promo_link']['element_type'] = '0';
  $handler->display->display_options['fields']['field_promo_link']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_promo_link']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_promo_link']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_promo_link']['click_sort_column'] = 'url';
  $handler->display->display_options['fields']['field_promo_link']['type'] = 'link_plain';
  $handler->display->display_options['fields']['field_promo_link']['field_api_classes'] = TRUE;
  /* Field: Content: Image */
  $handler->display->display_options['fields']['field_promo_image']['id'] = 'field_promo_image';
  $handler->display->display_options['fields']['field_promo_image']['table'] = 'field_data_field_promo_image';
  $handler->display->display_options['fields']['field_promo_image']['field'] = 'field_promo_image';
  $handler->display->display_options['fields']['field_promo_image']['label'] = '';
  $handler->display->display_options['fields']['field_promo_image']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_promo_image']['alter']['text'] = '<a href="[field_promo_link]">[field_promo_image]</a>';
  $handler->display->display_options['fields']['field_promo_image']['alter']['path'] = '[field_promo_link]';
  $handler->display->display_options['fields']['field_promo_image']['alter']['external'] = TRUE;
  $handler->display->display_options['fields']['field_promo_image']['element_type'] = '0';
  $handler->display->display_options['fields']['field_promo_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_promo_image']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_promo_image']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_promo_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_promo_image']['settings'] = array(
    'image_style' => 'promo_image',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_promo_image']['field_api_classes'] = TRUE;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['alter']['max_length'] = '100';
  $handler->display->display_options['fields']['body']['alter']['strip_tags'] = TRUE;
  $handler->display->display_options['fields']['body']['alter']['trim'] = TRUE;
  $handler->display->display_options['fields']['body']['element_type'] = '0';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['body']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['body']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['body']['type'] = 'text_plain';
  $handler->display->display_options['fields']['body']['field_api_classes'] = TRUE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['text'] = '<a href="[field_promo_link]">[title]</a>';
  $handler->display->display_options['fields']['title']['alter']['path'] = '[field_promo_link]';
  $handler->display->display_options['fields']['title']['alter']['absolute'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['external'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Content: Has taxonomy term ID */
  $handler->display->display_options['arguments']['tid']['id'] = 'tid';
  $handler->display->display_options['arguments']['tid']['table'] = 'taxonomy_index';
  $handler->display->display_options['arguments']['tid']['field'] = 'tid';
  $handler->display->display_options['arguments']['tid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['tid']['default_argument_type'] = 'raw';
  $handler->display->display_options['arguments']['tid']['default_argument_options']['index'] = '1';
  $handler->display->display_options['arguments']['tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['tid']['specify_validation'] = TRUE;
  $handler->display->display_options['arguments']['tid']['validate']['type'] = 'taxonomy_term';
  $handler->display->display_options['arguments']['tid']['validate_options']['vocabularies'] = array(
    'resource_category' => 'resource_category',
  );
  $handler->display->display_options['arguments']['tid']['validate_options']['type'] = 'convert';
  $handler->display->display_options['arguments']['tid']['validate_options']['transform'] = TRUE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'promo' => 'promo',
  );
  /* Filter criterion: Content: Promoted to front page */
  $handler->display->display_options['filters']['promote']['id'] = 'promote';
  $handler->display->display_options['filters']['promote']['table'] = 'node';
  $handler->display->display_options['filters']['promote']['field'] = 'promote';
  $handler->display->display_options['filters']['promote']['value'] = '1';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block_1');
  $export['promotions'] = $view;

  return $export;
}
