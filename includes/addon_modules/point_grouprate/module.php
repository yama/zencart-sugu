<?php
/**
 * point_grouprate Module
 *
 * @package Viewed_group
 * @copyright Copyright (C) 2009 Liquid System Technology, Inc.
 * @author Koji Sasaki
 * @copyright Portions Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author Koji Sasaki <sasaki@liquidst.jp>
 * @version $Id: point_grouprate.php $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

  class point_grouprate extends addOnModuleBase {
    var $title = MODULE_POINT_GROUPRATE_TITLE;
    var $description = MODULE_POINT_GROUPRATE_DESCRIPTION;

    var $author                        = "Koji Sasaki";
    var $author_email                  = "info@zencart-sugu.jp";
    var $version                       = "0.1";
    var $require_zen_cart_version      = "1.3.0.2";
    var $require_addon_modules_version = "0.1";

    var $sort_order = MODULE_POINT_GROUPRATE_SORT_ORDER;
    var $icon;
    var $status = MODULE_POINT_GROUPRATE_STATUS;
    var $enabled;
    var $configuration_keys = array(
          array(
            'configuration_title' => MODULE_POINT_GROUPRATE_STATUS_TITLE,
            'configuration_key' => 'MODULE_POINT_GROUPRATE_STATUS',
            'configuration_value' => MODULE_POINT_GROUPRATE_STATUS_DEFAULT,
            'configuration_description' => MODULE_POINT_GROUPRATE_STATUS_DESCRIPTION,
            'use_function' => 'null',
            'set_function' => 'zen_cfg_select_option(array(\'true\', \'false\'), '
          ),
          array(
            'configuration_title' => MODULE_POINT_GROUPRATE_SORT_ORDER_TITLE,
            'configuration_key' => 'MODULE_POINT_GROUPRATE_SORT_ORDER',
            'configuration_value' => MODULE_POINT_GROUPRATE_SORT_ORDER_DEFAULT,
            'configuration_description' => MODULE_POINT_GROUPRATE_SORT_ORDER_DESCRIPTION,
            'use_function' => 'null',
            'set_function' => 'null'
          ),
        );
    var $require_modules = array('point_base');
    var $notifier = array();

    var $tables = array(
      TABLE_GROUP_POINT_RATE => array(
        'group_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11),
        'rate' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11),
        'INDEXES' => array(
          'PRIMARY' => array('group_id'),
          ),
        ),
      );

    // class constructer for php4
    function point_grouprate() {
      $this->__construct();
    }

    function notifierUpdate($notifier) {
    }

    function _install() {
    }

    function _update() {
    }

    function _remove() {
    }

    function _cleanUp() {
    }

    // specify methods
    function insertPointRate($group_id, $rate) {
      global $db;
      $sql_data_array = array(
        'group_id' => $group_id,
        'rate' => $rate
        );
      zen_db_perform(TABLE_GROUP_POINT_RATE, $sql_data_array);
    }

    function deletePointRate($group_id) {
      global $db;
      $query = "
        delete
        from " . TABLE_GROUP_POINT_RATE . "
        where
          group_id = :groupID
        ;";
      $query = $db->bindVars($query, ':groupID', $group_id, 'integer');
      $db->Execute($query);
    }

    function getPointRate($group_id) {
      global $db;
      $query = "
        select
          rate
        from " . TABLE_GROUP_POINT_RATE . "
        where
          group_id = :groupID
        ;";
      $query = $db->bindVars($query, ':groupID', $group_id, 'integer');
      $result = $db->Execute($query);
      if ($result->RecordCount() > 0) {
        return (int)$result->fields['rate'];
      }
      return false;
    }

  }