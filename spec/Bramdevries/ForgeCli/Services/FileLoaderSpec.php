<?php

namespace spec\Bramdevries\ForgeCli\Services;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileLoaderSpec extends ObjectBehavior
{

	function let()
	{
		$filesystem = new Filesystem(new Local('./spec/'));
		$this->beConstructedWith($filesystem);

		$this->setFile('mocks/sites.json');
	}

	function it_is_initializable()
	{
		$this->shouldHaveType('Bramdevries\ForgeCli\FileLoader');
	}

	function it_should_set_the_path_to_the_file()
	{
		$this->getFile()->shouldReturn('mocks/sites.json');
	}

	function it_should_return_the_site_settings()
	{
		$this->getSite('site1')->shouldReturn([
			'name'   => 'site-1.be',
			'server' => 1,
			'site'   => 1,
			'token' => 'secret',
		]);

		$this->getSite('site2')->shouldReturn([
			'name'   => 'site-2.be',
			'server' => 1,
			'site'   => 2,
			'token'  => 'secret',
		]);
	}

	function it_should_return_a_message_if_the_site_does_not_exist()
	{
		$this->getSite('site3')->shouldReturn('site3 does not exist');
	}

}
