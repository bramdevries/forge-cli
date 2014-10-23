<?php

namespace Bramdevries\ForgeCli;


use Illuminate\Support\ServiceProvider;
use Bramdevries\ForgeCli\Services\FileLoader;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class ForgeCliServiceProvider extends ServiceProvider
{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton(FileLoader::class, function () {
			$filesystem = new Filesystem(new Local('./.forgecli'));

			$loader = new FileLoader($filesystem);

			$loader->setFile('/sites.json');

			return $loader;
		});
	}
}