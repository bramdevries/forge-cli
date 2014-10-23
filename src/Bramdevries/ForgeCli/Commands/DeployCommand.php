<?php

namespace Bramdevries\ForgeCli\Commands;


use Bramdevries\ForgeCli\Services\DeploySite;
use Illuminate\Console\Command;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bramdevries\ForgeCli\Services\FileLoader;

class DeployCommand extends Command
{
	/**
	 * @var string
	 */
	protected $name = 'deploy';

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$site = $this->argument('site') ?: $this->ask('Please provide the name of the site you want to deploy');

		/** @var \Bramdevries\ForgeCli\Services\DeploySite $deployer */
		$deployer = $this->laravel->make(DeploySite::class);
		$this->info($deployer->deploy($site));
	}

	protected function getArguments()
	{
		return array(
			array('site', InputOption::VALUE_REQUIRED, 'The site to deploy'),
		);
	}


} 