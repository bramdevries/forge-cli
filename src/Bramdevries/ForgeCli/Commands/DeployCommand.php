<?php

namespace Bramdevries\ForgeCli\Commands;

use Bramdevries\ForgeCli\Services\Deployer;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DeployCommand extends Command
{
	/**
	 * @var string
	 */
	protected $name = 'deploy';

	/**
	 * @var string
	 */
	protected $description = 'Deploy a site';

	/**
	 * @param InputInterface  $input
	 * @param OutputInterface $output
	 * @return mixed|void
	 */
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$site = $this->argument('site') ?: $this->ask('Please provide the name of the site you want to deploy');

		/** @var \Bramdevries\ForgeCli\Services\Deployer $deployer */
		$deployer = $this->laravel->make(Deployer::class);

		$this->info($deployer->deploy($site));
	}

	/**
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('site', InputOption::VALUE_REQUIRED, 'The site to deploy'),
		);
	}


} 