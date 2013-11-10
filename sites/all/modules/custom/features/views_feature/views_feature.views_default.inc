<?php
/**
 * @file
 * views_feature.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function views_feature_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'resources';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Resources';
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
  $handler->display->display_options['pager']['type'] = 'mini';
  $handler->display->display_options['pager']['options']['items_per_page'] = '12';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['style_options']['class'] = 'ui-list';
  $handler->display->display_options['style_options']['wrapper_class'] = '';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_type'] = 'h2';
  $handler->display->display_options['fields']['title']['element_class'] = 'resource-title';
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Content: Phone */
  $handler->display->display_options['fields']['field_resource_phone']['id'] = 'field_resource_phone';
  $handler->display->display_options['fields']['field_resource_phone']['table'] = 'field_data_field_resource_phone';
  $handler->display->display_options['fields']['field_resource_phone']['field'] = 'field_resource_phone';
  $handler->display->display_options['fields']['field_resource_phone']['label'] = '';
  $handler->display->display_options['fields']['field_resource_phone']['element_type'] = '0';
  $handler->display->display_options['fields']['field_resource_phone']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_phone']['element_wrapper_type'] = 'div';
  $handler->display->display_options['fields']['field_resource_phone']['element_wrapper_class'] = 'resource-phone';
  $handler->display->display_options['fields']['field_resource_phone']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_resource_phone']['delta_offset'] = '0';
  $handler->display->display_options['fields']['field_resource_phone']['multi_type'] = 'ul';
  /* Field: Content: Web Address */
  $handler->display->display_options['fields']['field_resource_link']['id'] = 'field_resource_link';
  $handler->display->display_options['fields']['field_resource_link']['table'] = 'field_data_field_resource_link';
  $handler->display->display_options['fields']['field_resource_link']['field'] = 'field_resource_link';
  $handler->display->display_options['fields']['field_resource_link']['label'] = '';
  $handler->display->display_options['fields']['field_resource_link']['element_type'] = '0';
  $handler->display->display_options['fields']['field_resource_link']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_link']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_resource_link']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_resource_link']['click_sort_column'] = 'url';
  $handler->display->display_options['fields']['field_resource_link']['field_api_classes'] = TRUE;
  /* Field: Content: Description */
  $handler->display->display_options['fields']['field_resource_description']['id'] = 'field_resource_description';
  $handler->display->display_options['fields']['field_resource_description']['table'] = 'field_data_field_resource_description';
  $handler->display->display_options['fields']['field_resource_description']['field'] = 'field_resource_description';
  $handler->display->display_options['fields']['field_resource_description']['label'] = '';
  $handler->display->display_options['fields']['field_resource_description']['element_type'] = '0';
  $handler->display->display_options['fields']['field_resource_description']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_description']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_resource_description']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_resource_description']['field_api_classes'] = TRUE;
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
    'resource' => 'resource',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['css_class'] = FALSE;
  $handler->display->display_options['css_class'] = 'resource-list';
  $handler->display->display_options['path'] = 'resources/%';
  $handler->display->display_options['menu']['title'] = 'Resources';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'main-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;

  /* Display: Category Resources */
  $handler = $view->new_display('block', 'Category Resources', 'block_1');
  $handler->display->display_options['enabled'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
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
  $export['resources'] = $view;

  $view = new view();
  $view->name = 'resrource_types';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'taxonomy_term_data';
  $view->human_name = 'Resrource Types';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = '<none>';
  $handler->display->display_options['css_class'] = 'clearfix';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['style_options']['row_class'] = 'max-four';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['style_options']['wrapper_class'] = 'item-list max-grid';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Taxonomy term: Landing Page Image */
  $handler->display->display_options['fields']['field_resource_category_image']['id'] = 'field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['table'] = 'field_data_field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['field'] = 'field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['label'] = '';
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['path'] = 'resources/[name]';
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['replace_spaces'] = TRUE;
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['path_case'] = 'lower';
  $handler->display->display_options['fields']['field_resource_category_image']['element_type'] = '0';
  $handler->display->display_options['fields']['field_resource_category_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_category_image']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_resource_category_image']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_resource_category_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_category_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_resource_category_image']['field_api_classes'] = TRUE;
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path'] = 'resources/[name]';
  $handler->display->display_options['fields']['name']['alter']['replace_spaces'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path_case'] = 'lower';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['name']['element_type'] = 'h2';
  $handler->display->display_options['fields']['name']['element_class'] = 'resource-title';
  $handler->display->display_options['fields']['name']['element_label_type'] = '0';
  $handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['name']['element_default_classes'] = FALSE;
  /* Field: Taxonomy term: Term description */
  $handler->display->display_options['fields']['description']['id'] = 'description';
  $handler->display->display_options['fields']['description']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['description']['field'] = 'description';
  $handler->display->display_options['fields']['description']['label'] = '';
  $handler->display->display_options['fields']['description']['element_type'] = 'p';
  $handler->display->display_options['fields']['description']['element_class'] = 'resource-text';
  $handler->display->display_options['fields']['description']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['description']['element_default_classes'] = FALSE;
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name_1']['id'] = 'name_1';
  $handler->display->display_options['fields']['name_1']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name_1']['field'] = 'name';
  $handler->display->display_options['fields']['name_1']['label'] = '';
  $handler->display->display_options['fields']['name_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['name_1']['element_label_colon'] = FALSE;
  /* Sort criterion: Taxonomy term: Name */
  $handler->display->display_options['sorts']['name']['id'] = 'name';
  $handler->display->display_options['sorts']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['sorts']['name']['field'] = 'name';
  /* Contextual filter: Taxonomy term: Name */
  $handler->display->display_options['arguments']['name']['id'] = 'name';
  $handler->display->display_options['arguments']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['arguments']['name']['field'] = 'name';
  $handler->display->display_options['arguments']['name']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['name']['summary']['format'] = 'default_summary';
  /* Filter criterion: Taxonomy vocabulary: Machine name */
  $handler->display->display_options['filters']['machine_name']['id'] = 'machine_name';
  $handler->display->display_options['filters']['machine_name']['table'] = 'taxonomy_vocabulary';
  $handler->display->display_options['filters']['machine_name']['field'] = 'machine_name';
  $handler->display->display_options['filters']['machine_name']['value'] = array(
    'resource_category' => 'resource_category',
  );

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['css_class'] = FALSE;
  $handler->display->display_options['css_class'] = 'resource-center';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['style_options']['row_class'] = 'max-four resource-item';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['style_options']['class'] = 'ui-list';
  $handler->display->display_options['style_options']['wrapper_class'] = 'max-grid';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name_1']['id'] = 'name_1';
  $handler->display->display_options['fields']['name_1']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name_1']['field'] = 'name';
  $handler->display->display_options['fields']['name_1']['label'] = '';
  $handler->display->display_options['fields']['name_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['name_1']['element_label_colon'] = FALSE;
  /* Field: Taxonomy term: Landing Page Image */
  $handler->display->display_options['fields']['field_resource_category_image']['id'] = 'field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['table'] = 'field_data_field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['field'] = 'field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['label'] = '';
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['path'] = 'resources/[name_1]';
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['replace_spaces'] = TRUE;
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['path_case'] = 'lower';
  $handler->display->display_options['fields']['field_resource_category_image']['element_type'] = '0';
  $handler->display->display_options['fields']['field_resource_category_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_category_image']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_resource_category_image']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_resource_category_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_category_image']['settings'] = array(
    'image_style' => 'category_small',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_resource_category_image']['field_api_classes'] = TRUE;
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path'] = 'resources/[name]';
  $handler->display->display_options['fields']['name']['alter']['replace_spaces'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path_case'] = 'lower';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['name']['element_type'] = 'h2';
  $handler->display->display_options['fields']['name']['element_class'] = 'resource-title';
  $handler->display->display_options['fields']['name']['element_label_type'] = '0';
  $handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['name']['element_default_classes'] = FALSE;
  /* Field: Taxonomy term: Short Description */
  $handler->display->display_options['fields']['field_resource_short_description']['id'] = 'field_resource_short_description';
  $handler->display->display_options['fields']['field_resource_short_description']['table'] = 'field_data_field_resource_short_description';
  $handler->display->display_options['fields']['field_resource_short_description']['field'] = 'field_resource_short_description';
  $handler->display->display_options['fields']['field_resource_short_description']['label'] = '';
  $handler->display->display_options['fields']['field_resource_short_description']['element_type'] = 'div';
  $handler->display->display_options['fields']['field_resource_short_description']['element_class'] = 'resource-text';
  $handler->display->display_options['fields']['field_resource_short_description']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_short_description']['element_default_classes'] = FALSE;
  $handler->display->display_options['block_description'] = 'Landing Page Resource Types Block';

  /* Display: Category Header Block */
  $handler = $view->new_display('block', 'Category Header Block', 'block_1');
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Taxonomy term: Landing Page Image */
  $handler->display->display_options['fields']['field_resource_category_image']['id'] = 'field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['table'] = 'field_data_field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['field'] = 'field_resource_category_image';
  $handler->display->display_options['fields']['field_resource_category_image']['label'] = '';
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['path'] = 'resources/%1';
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['replace_spaces'] = TRUE;
  $handler->display->display_options['fields']['field_resource_category_image']['alter']['path_case'] = 'lower';
  $handler->display->display_options['fields']['field_resource_category_image']['element_type'] = '0';
  $handler->display->display_options['fields']['field_resource_category_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_category_image']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_resource_category_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_resource_category_image']['settings'] = array(
    'image_style' => 'category_large',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_resource_category_image']['field_api_classes'] = TRUE;
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['exclude'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path'] = 'resources/%1';
  $handler->display->display_options['fields']['name']['alter']['replace_spaces'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path_case'] = 'lower';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['name']['element_default_classes'] = FALSE;
  /* Field: Taxonomy term: Term description */
  $handler->display->display_options['fields']['description']['id'] = 'description';
  $handler->display->display_options['fields']['description']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['description']['field'] = 'description';
  $handler->display->display_options['fields']['description']['label'] = '';
  $handler->display->display_options['fields']['description']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['description']['alter']['text'] = '<div id="resource-header"><h1 class="resource-title">[name]</h1><p class="resource-text">[description]</p></div>';
  $handler->display->display_options['fields']['description']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['description']['element_default_classes'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Taxonomy term: Name */
  $handler->display->display_options['arguments']['name']['id'] = 'name';
  $handler->display->display_options['arguments']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['arguments']['name']['field'] = 'name';
  $handler->display->display_options['arguments']['name']['default_action'] = 'default';
  $handler->display->display_options['arguments']['name']['default_argument_type'] = 'raw';
  $handler->display->display_options['arguments']['name']['default_argument_options']['index'] = '1';
  $handler->display->display_options['arguments']['name']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['name']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['name']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['name']['limit'] = '0';
  $handler->display->display_options['arguments']['name']['transform_dash'] = TRUE;

  /* Display: Category Navigation */
  $handler = $view->new_display('block', 'Category Navigation', 'block_2');
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['style_options']['class'] = 'ui-list';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path'] = 'resources/[name]';
  $handler->display->display_options['fields']['name']['alter']['replace_spaces'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path_case'] = 'lower';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
  $export['resrource_types'] = $view;

  return $export;
}
