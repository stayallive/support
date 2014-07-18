<?php

namespace Stayallive\Support\Gravatar;

use Illuminate\Support\ServiceProvider;

class GravatarServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {

		$this->app->bind('stayallive.support.gravatar', 'Stayallive\Support\Gravatar\Gravatar');

	}

}