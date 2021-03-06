<?php
/**
 * Common Template - tpl_header.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_header = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_header.php 3392 2006-04-08 15:17:37Z birdbrain $
 */
?>

<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>

<?php
// -> zen_smartphone: この辺一切を削除
/*
<!-- global-header -->
<div id="global-header">

<?php echo GLOBAL_HEADER_LOGO; ; ?>

<?php // if (zen_visitors_is_enabled() && zen_visitors_is_visitor()) { ?>
<?php // echo HEADER_TEXT_FOR_VISITOR ?>
<?php // } elseif ($_SESSION['customer_id']) { ?>
<?php // echo HEADER_TEXT_FOR_ACCOUNT ?>
<?php // }else{ ?>
<?php // echo HEADER_TEXT_FOR_NOACCOUNT ?>
<?php // } ?>

<!-- global-header-login -->
<div id="global-header-login">
<?php if (IS_VISITORS_SESSION === true) { ?>
<?php  echo HEADER_TEXT_FOR_VISITOR ?>
<?php } elseif ($_SESSION['customer_id']) { ?>
<?php  echo HEADER_TEXT_FOR_ACCOUNT ?><?php
      } else {
?>
<?php  echo HEADER_TEXT_FOR_NOACCOUNT ?>
<?php } ?>
</div>
<!-- /global-header-login -->

<?php echo GLOBAL_HEADER_FONT;  ?>

<?php echo GLOBAL_HEADER_NAV;  ?>

</div>
<!-- /global-header -->
*/
// -> zen_smartphone: この辺一切を削除
?>

<!-- header -->
<div id="header">
<?php
// -> zen_smartphone: easy designは反映しないつもり。
/*
<?php if (MODULE_EASY_DESIGN_STATUS == 'true') { ?>
<?php if($category_depth == 'top'){?>
<h1 id="logo"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '"><img src="'.getLogoImage(getDefaultTemplate()).'" alt="'.TITLE.'" title="'.TITLE.'"/></a>'; ?></h1>
<?php }else{ ?>
<p id="logo"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '"><img src="'.getLogoImage(getDefaultTemplate()).'" alt="'.TITLE.'" title="'.TITLE.'"/></a>'; ?></p>
<?php } ?>

<?php
 if (EASY_DESIGN_TAGLINE != '') {
?>

<?php if($category_depth == 'top'){?>
<h2 id="tagline"><?php echo EASY_DESIGN_TAGLINE;?></h2>
<?php }else{ ?>
<p id="tagline"><?php echo EASY_DESIGN_TAGLINE;?></p>
<?php } ?>

<?php
}
}
*/
// <- zen_smartphone: easy designは反映しないつもり。
?>

<?php
// -> zen_smartphone: シンプルに変更
/*
<!-- header-nav -->
<?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
<?php } ?>
<!-- /header-nav -->
*/
?>
<!-- header-nav -->
<div id="logo"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '" target="_blank">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT) . '</a>'; ?></div>
<!-- /header-nav -->
<?php
// <- zen_smartphone: シンプルに変更
?>

</div>
<!-- /header -->
<?php } ?>

<?php
// -> zen_smartphone: messageStackの位置調整
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
    echo htmlspecialchars(urldecode($_GET['error_message']));
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
    echo htmlspecialchars($_GET['info_message']);
  } else {
    
  }
// <- zen_smartphone: messageStackの位置調整
?>

<?php
  // displays addon_modules layout blocks
  if ($header) {
?>
<!-- header-bar-->
<div id="header-bar" class="transparent"><div id="header-bar-inner">
<?php echo $header; ?>
</div></div>
<!-- header-bar-->
<?php
  }
?>
