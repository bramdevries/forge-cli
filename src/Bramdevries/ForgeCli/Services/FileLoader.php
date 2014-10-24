<?php

namespace Bramdevries\ForgeCli\Services;

use League\Flysystem\Filesystem;

/**
 * Class FileLoader
 *
 * @author Bram Devries <bram@madewithlove.be>
 * @package Bramdevries\ForgeCli
 */
class FileLoader
{
	/**
	 * @var
	 */
	protected $file;

	/**
	 * @var Filesystem
	 */
	protected $filesystem;

	protected $sites;

	/**
	 * @param Filesystem $filesystem
	 */
	public function __construct(Filesystem $filesystem)
	{
		$this->filesystem = $filesystem;
	}

	/**
	 * @param $identifier
	 * @return mixed
	 */
	public function getSite($identifier)
    {
		$sites = $this->getSites();

		return isset($sites[$identifier]) ? $sites[$identifier] : "$identifier does not exist";
    }

	/**
	 * @return false|string
	 */
	private function loadFile()
	{
		if (!$this->filesystem->has($this->getFile())) {
			$this->filesystem->write($this->getFile(), '');
		}

		if (!$this->sites) {
			$this->sites = $this->filesystem->read($this->file);
		}

		return $this->sites;
	}

	public function save($sites)
	{
		return $this->filesystem->put($this->getFile(), json_encode($sites));
	}

	/**
	 * @param $value
	 */
	public function setFile($value)
    {
        $this->file = $value;
    }

	/**
	 * @return mixed
	 */
	public function getFile()
    {
        return $this->file;
    }

	/**
	 * @return mixed
	 */
	public function getSites()
	{
		return json_decode($this->loadFile(), true);
	}
}
