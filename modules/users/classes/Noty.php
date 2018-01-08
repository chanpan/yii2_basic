<?php

namespace app\modules\users\classes;

use Yii;
use \yii\helpers\Json;

class Noty {

	const TYPE_ALERT = 'alert';
	const TYPE_ERROR = 'error';
	const TYPE_SUCCESS = 'success';
	const TYPE_INFO = 'information';
	const LAYOUT_TOP = 'top';
	const LAYOUT_TOPCENTER = 'topCenter';
	const LAYOUT_BOOTTOM = 'bottom';
	const LAYOUT_CENTER = 'center';
	const LAYOUT_TOPLEFT = 'topLeft';
	const LAYOUT_TOPRIGHT = 'topRight';
	const LAYOUT_BOTTOMLEFT = 'bottomLeft';
	const LAYOUT_BOTTOMRIGHT = 'bottomRight';

	/**
	 * @var array the initial JavaScript options that should be passed to the JUI plugin.
	 */

	/**
	  'options' => array(
		'layout' => 'bottomRight',
		'theme' => 'noty_theme_twitter',
		'animateOpen' => '{height: 'toggle'}',
		'animateClose' => '{height: 'toggle'}',
		'easing' => 'swing',
		'text' => '',
		'type' => 'alert',
		'speed' => 500,
		'timeout' => 5000,
		'closeButton' => false,
		'closeOnSelfClick' => true,
		'closeOnSelfOver' => false,
		'force' => false,
		'onShow' => false,
		'onShown' => false,
		'onClose' => false,
		'onClosed' => false,
		'buttons' => false,
		'modal' => false,
		'template' => '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',
		'cssPrefix' => 'noty_',
		'custom' => {
			container: null
		},
	  ),
	 */
	public static function setDefault($options = array()) {
		if (!isset($options['layout'])) {
			$options['layout'] = self::LAYOUT_BOTTOMRIGHT;
		}

		if (!isset($options['type'])) {
			$options['type'] = self::TYPE_ALERT;
		}

		$optionsJS = Json::encode($options);

		$js = " var options = {$optionsJS};
			for (var key in options) {
				$.noty.defaultOptions[key] = options[key];
			}";
		Yii::$app->view->registerJs($js);
	}

	public static function show($text, $type = 'alert') {
		return 'var noty_id = noty({"text":' . $text . ', "type":' . $type . '});';
	}

	public static function confirm($text, $callback, $type = 'alert') {
		return 'var noty_id = noty({"text":' . $text . ', "type":' . $type . ',
			"buttons": [{type: "btn btn-primary", text: "Ok", click: function($noty) {
							$noty.close();
							' . $callback . '
						}
					},
					{type: "btn", text: "Cancel", click: function($noty) {
							$noty.close();
						}
					},
				], "timeout":false });';
	}

	public static function alert($text, $type = 'alert') {
		return 'var noty_id = noty({"text":' . $text . ', "type":' . $type . ',
			"buttons": [{type: "btn", text: "Ok", click: function($noty) {					
							$noty.close();
						}
					},
				], "timeout":false });';
	}

}
