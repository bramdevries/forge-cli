<?php

namespace Bramdevries\ForgeCli\Services;

use Bramdevries\ForgeCli\Services\Helpers\Curl;

class Deployer
{
	protected $fileloader;

	function __construct(FileLoader $filesystem)
	{
		$this->fileloader = $filesystem;
	}

	public function deploy($site)
	{
		$info = $this->fileloader->getSite($site);

		$url = 'https://forge.laravel.com/servers/[server]/sites/[site]/deploy/http?token=[token]';
		$url = strtr($url, [
			'[server]' => $info['server'],
			'[site]' => $info['site'],
			'[token]' => $info['token'],
		]);

		return $this->call($url);
	}

	public function addSite($info)
	{
		$sites  = $this->fileloader->getSites();

		$sites[$info['name']] = $info;

		$this->fileloader->save($sites);
	}

	private function call($url)
	{
		return (new Curl($url))->getBody();
	}

}
