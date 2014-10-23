<?php

namespace Bramdevries\ForgeCli\Commands;


use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bramdevries\ForgeCli\Services\Deployer;

class AddSiteCommand extends Command
{

	/**
	 * @var string
	 */
	protected $name = 'add';

	/**
	 * @var string
	 */
	protected $description = 'Add a new site';

	/**
	 * @param InputInterface  $input
	 * @param OutputInterface $output
	 * @return mixed|void
	 */
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		/** @var \Bramdevries\ForgeCli\Services\Deployer $deployer */
		$deployer = $this->laravel->make(Deployer::class);

		$deployer->addSite(array(
			'server' => $this->option('server') ?: $this->ask('What is the id of the server the site is located on?'),
			'site'   => $this->option('site')   ?: $this->ask('What is the id of the site?'),
			'token'  => $this->option('token')  ?: $this->ask('What is the token for this site?'),
			'name'   => $this->option('name')   ?: $this->ask('What is the name of the site?'),
		));
	}

	/**
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('server', null, InputOption::VALUE_OPTIONAL, 'The id of the server this site is located on'),
			array('site', null, InputOption::VALUE_OPTIONAL, 'The id of the site'),
			array('token', null, InputOption::VALUE_OPTIONAL, 'The deploy token for the site'),
			array('name', null, InputOption::VALUE_OPTIONAL, 'The name of the site'),
		);
	}


} 