<?php
namespace App\Modules\Patient\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use Lang;
use View;

class PatientServiceProvider extends ServiceProvider {
	/**
	 * Register the Patient module service provider.
	 *
	 * @return void
	 */
	public function register() {
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Patient\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Patient module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces() {
		Lang::addNamespace('Patient', realpath(__DIR__ . '/../Resources/Lang'));

		View::addNamespace('Patient', realpath(__DIR__ . '/../Resources/Views'));
	}
}
