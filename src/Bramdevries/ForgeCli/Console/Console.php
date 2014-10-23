<?php

namespace Bramdevries\ForgeCli\Console;


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


	}
} 