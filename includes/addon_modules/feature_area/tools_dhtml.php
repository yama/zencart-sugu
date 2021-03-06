<?php
/**
 * @package admin
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tools_dhtml.php 3026 2006-02-13 06:01:09Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if (!function_exists("page_allowed") ||
    function_exists("page_allowed") && page_allowed('module=feature_area') == 'true') {
  $za_contents[] = array('text' => BOX_ADDON_MODULES_FEATURE_AREA, 'link' => zen_href_link(FILENAME_ADDON_MODULES_ADMIN, 'module=feature_area', 'NONSSL'));
}
?>