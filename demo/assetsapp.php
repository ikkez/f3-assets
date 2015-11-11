<?php

class AssetsApp {

	static function init() {
		\Base::instance()->route(array(
			'GET /assets',
			'GET /assets/@page'
		), 'AssetsApp->get');
	}

	/**
	 * GET /assets
	 * GET /assets/@page
	 *
	 * @param $f3
	 * @param $params
	 */
	function get( \Base $f3,$params) {
		$f3->config('sugar/Assets/demo/assets_config.ini');
		$params = $params + array('page'=>'home');
		$f3->page = $params['page'];

		if (!is_file('sugar/Assets/demo/ui/templates/'.$f3->page.'.html'))
			$f3->error(404);

		if ($f3->exists('GET.theme',$new_theme)) {
			if (in_array($new_theme,array('yeti','sandstone','')))
				$f3->copy('GET.theme','SESSION.theme');
			$f3->reroute($f3->PATH);
		}

		$theme = 'yeti';
		if ($f3->exists('SESSION.theme'))
			$theme = $f3->get('SESSION.theme');

		$f3->theme = 'bootstrap'.($theme?'-'.$theme:'').'.min.css';

		$f3->set('ASSETS.onFileNotFound',function($file) use ($f3){
			// file not found: $file
		});

		\Assets::instance();

		echo \Template::instance()->render('index.html');
	}
}