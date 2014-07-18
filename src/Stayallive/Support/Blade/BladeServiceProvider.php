<?php

namespace Stayallive\Support\Blade;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {

		// Get the blade compiler instance
		$blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();

		// Register: @set('varname', $value)
		$blade->extend(function($value, $compiler) {
			return preg_replace("/@set\('(.*?)'\,(.*)\)/", '<?php $$1 = $2; ?>', $value);
		});

	}

}