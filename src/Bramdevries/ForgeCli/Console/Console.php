<?php

namespace Bramdevries\ForgeCli\Console;


use Bramdevries\ForgeCli\Commands\AddSiteCommand;
use Bramdevries\ForgeCli\Commands\DeployCommand;
use Illuminate\Console\Application;

class Console extends Application
{
	public function __construct($container)
	{
		parent::__construct();

		$this->setLaravel($container);

		// Register the deploy command
		$this->add(new DeployCommand);
		$this->add(new AddSiteCommand);
	}
} 