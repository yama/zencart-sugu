<?php
/**
 * @copyright Copyright (c) ark-web, Inc. All rights reserved.
 * @author Syuichi Kohata
 * @copyright Portions Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if (file_exists(DIR_WS_CLASSES . 'split_page_results.php')) {
  require_once(DIR_WS_CLASSES . 'split_page_results.php');
}

global $zco_notifier;
global $easy_admin_products_product;
global $easy_admin_products_validate;
global $easy_admin_products_product_id;
global $easy_admin_products_searchs;

// 検索条件が指定されていた場合はセッションへ
// 指定されていない場合はセッションから戻す
$zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_BEFORE_SEARCH');
$searchs  = array(
  'category_id',
  'title',
  'model',
  'manufacturer',
  'description',
  'special'
);
if (is_array($easy_admin_products_searchs)) {
  foreach($easy_admin_products_searchs as $v)
    $searchs[] = $v;
}


$languages = zen_get_languages();
$model     = new easy_admin_products_model();
$html      = new easy_admin_products_html();
$action    = (isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index');

$model->set_get_search_condition($searchs);

require(dirname(__FILE__) . '/products.php');

$special  = array(
  array('id' => '',           'text' => MODULE_EASY_ADMIN_PRODUCTS_SPECIAL_SELECT),
  array('id' => 'download',   'text' => MODULE_EASY_ADMIN_PRODUCTS_SPECIAL_DOWNLOAD),
  array('id' => 'featured',   'text' => MODULE_EASY_ADMIN_PRODUCTS_SPECIAL_FEATURED),
  array('id' => 'special',    'text' => MODULE_EASY_ADMIN_PRODUCTS_SPECIAL_SPECIAL),
  array('id' => 'quantity',   'text' => MODULE_EASY_ADMIN_PRODUCTS_SPECIAL_QUANTITY),
  array('id' => 'arrival',    'text' => MODULE_EASY_ADMIN_PRODUCTS_SPECIAL_ARRIVAL),
  array('id' => 'display',    'text' => MODULE_EASY_ADMIN_PRODUCTS_SPECIAL_DISPLAY),
  array('id' => 'nondisplay', 'text' => MODULE_EASY_ADMIN_PRODUCTS_SPECIAL_NONDISPLAY),
);

$template  = "index";
$zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_BEFORE_ACTION');
switch($action) {
  case 'index':
    break;

  case 'status_on':
    $zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_START_STATUS_ON');
    $messageStack->add(MODULE_EASY_ADMIN_PRODUCTS_NOTICE_STATUS, 'success');
    $model->change_status($_REQUEST['products_id'], 1);
    break;

  case 'status_off':
    $zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_START_STATUS_OFF');
    $messageStack->add(MODULE_EASY_ADMIN_PRODUCTS_NOTICE_STATUS, 'success');
    $model->change_status($_REQUEST['products_id'], 0);
    break;

  case 'new':
    $template = "edit";
    $zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_START_EDIT');
    $columns  = array(
                  "languages"                             => $languages,
                  "products_column"                       => $products_column,
                  "products_description_column"           => $products_description_column,
                  "featured_column"                       => $featured_column,
                  "specials_column"                       => $specials_column,
                  "meta_tags_products_description_column" => $meta_tags_products_description_column,
                );
    $product  = $model->new_product($columns);
    $easy_admin_products_validate = array();
    break;

  case 'edit':
    $template = "edit";
    $zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_START_EDIT');
    $columns  = array(
                  "languages"                             => $languages,
                  "products_column"                       => $products_column,
                  "products_description_column"           => $products_description_column,
                  "featured_column"                       => $featured_column,
                  "specials_column"                       => $specials_column,
                  "meta_tags_products_description_column" => $meta_tags_products_description_column,
                );
    $product  = $model->load_product($columns, $_REQUEST['products_id']);
    $easy_admin_products_validate = array();
    break;

  case 'save':
    $template = "edit";
    $product  = array();
    foreach($_POST as $k => $v) {
      $product[$k] = $v;
    }

    $easy_admin_products_product  = $product;
    $easy_admin_products_validate = $model->validate_save($product);
    $zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_FINISH_VALIDATE_SAVE');
    $product                      = $easy_admin_products_product;

    if (count($easy_admin_products_validate) > 0) {
      $messageStack->add(MODULE_EASY_ADMIN_PRODUCTS_NOTICE_ERROR_SAVE, 'error');
    }
    else {
      $products_id = $model->save_product($product);
      if ($product['products_id'] > 0)
        $messageStack->add_session(MODULE_EASY_ADMIN_PRODUCTS_NOTICE_UPDATE, 'success');
      else
        $messageStack->add_session(MODULE_EASY_ADMIN_PRODUCTS_NOTICE_INSERT, 'success');
      zen_redirect(zen_href_link(FILENAME_ADDON_MODULES_ADMIN, 'module=easy_admin_products&products_id='.(int)$products_id.'&action=edit'));
    }
    break;

  case 'delete':
    $template = "delete";
    $columns  = array(
                  "languages"                             => $languages,
                  "products_column"                       => $products_column,
                  "products_description_column"           => $products_description_column,
                  "featured_column"                       => $featured_column,
                  "specials_column"                       => $specials_column,
                  "meta_tags_products_description_column" => $meta_tags_products_description_column,
                );
    $product  = $model->load_product($columns, $_REQUEST['products_id']);
    break;

  case 'delete_process':
    $template = "index";
    $easy_admin_products_product_id = (int)$_REQUEST['products_id'];
    $zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_START_DELETE');
    $model->delete_product($_REQUEST['products_id'], $_REQUEST['products_image']);
    $zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_FINISH_DELETE');
    $messageStack->add(sprintf(MODULE_EASY_ADMIN_PRODUCTS_NOTICE_DELETE, $_REQUEST['products_name']."(ID:".$_REQUEST['products_id'].")"), 'success');
    break;

  case 'copy':
    $template = "copy";
    $columns  = array(
                  "languages"                             => $languages,
                  "products_column"                       => $products_column,
                  "products_description_column"           => $products_description_column,
                  "featured_column"                       => $featured_column,
                  "specials_column"                       => $specials_column,
                  "meta_tags_products_description_column" => $meta_tags_products_description_column,
                );
    $product               = $model->load_product($columns, $_REQUEST['products_id']);
    $product['categories'] = "";
    break;

  case 'copy_process':
    $product  = array();
    foreach($_POST as $k => $v) {
      $product[$k] = $v;
    }
    $easy_admin_products_product  = $product;
    $easy_admin_products_validate = $model->validate_copy($product);
    $zco_notifier->notify('NOTIFY_EASY_ADMIN_PRODUCTS_FINISH_VALIDATE_COPY');
    $product                      = $easy_admin_products_product;
    if (count($easy_admin_products_validate) > 0) {
      $template = "copy";
      $messageStack->add(MODULE_EASY_ADMIN_PRODUCTS_NOTICE_ERROR_SAVE, 'error');
    }
    else {
      $template = "index";
      $names    = array();
      $categories      = explode(",", $product['categories']);
      foreach($categories as $v) {
        if ($v > 0) {
          $names[] = $model->get_category($v);
        }
      }

      $model->copy_product($_REQUEST['products_id'], $_REQUEST['products_image'], $_REQUEST['categories']);
      $messageStack->add(sprintf(MODULE_EASY_ADMIN_PRODUCTS_NOTICE_COPY, $_REQUEST['products_name']."(ID:".$_REQUEST['products_id'].")", implode(" , ", $names)), 'success');
    }
    break;
}

$query_raw = $model->get_products_query($_REQUEST);
$split     = new splitPageResults($_GET['page'], MODULE_EASY_ADMIN_PRODUCTS_MAX_RESULTS, $query_raw, $query_numrows);
$products  = $db->Execute($query_raw);
?>
