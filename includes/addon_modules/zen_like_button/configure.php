<?php
/*
 * �������̤Ǥ��������
 */
	if (!defined('IS_ADMIN_FLAG')) {
	  die('Illegal Access');
	}

    define('MODULE_ZEN_LIKE_BUTTON_STATUS_DEFAULT',				'true');
	define('MODULE_ZEN_LIKE_BUTTON_LAYOUT_DEFAULT',				'standard');
	define('MODULE_ZEN_LIKE_BUTTON_FACE_DEFAULT',				'false');
    define('MODULE_ZEN_LIKE_BUTTON_IFRAME_WIDTH_DEFAULT',		450);
    define('MODULE_ZEN_LIKE_BUTTON_IFRAME_HEIGHT_DEFAULT',		35);
    define('MODULE_ZEN_LIKE_BUTTON_ACTION_DEFAULT',				'like');
	define('MODULE_ZEN_LIKE_BUTTON_SORT_ORDER_DEFAULT',			'');

	define('MODULE_ZEN_LIKE_BUTTON_COLOR_LIGHT',				'light');
	define('MODULE_ZEN_LIKE_BUTTON_COLOR_DARK',					'dark');

	define('MODULE_ZEN_LIKE_BUTTON_IFRAME_SCROLLING',			'no');
	define('MODULE_ZEN_LIKE_BUTTON_IFRAME_FRAMEBORDER',			0);
	define('MODULE_ZEN_LIKE_BUTTON_IFRAME_ALLOWTRANSPARENCY',	true);

	define('MODULE_ZEN_LIKE_BUTTON_IFRAME_STYLE_BORDER',		'border:none;');
	define('MODULE_ZEN_LIKE_BUTTON_IFRAME_STYLE_OVERFLOW',		'overflow:hidden;');
	define('MODULE_ZEN_LIKE_BUTTON_IFRAME_STYLE_WIDTH',			'width:'.MODULE_ZEN_LIKE_BUTTON_IFRAME_WIDTH.'px;');
	define('MODULE_ZEN_LIKE_BUTTON_IFRAME_STYLE_HEIGHT',		'height:'.MODULE_ZEN_LIKE_BUTTON_IFRAME_HEIGHT.'px;');
?>