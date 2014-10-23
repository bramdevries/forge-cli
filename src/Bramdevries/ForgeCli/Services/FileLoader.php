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
		$sites = json_decode($this->loadFile(), true);

		return isset($sites[$identifier]) ? $sites[$identifier] : "$identifier does not exist";
    }

	/**
	 * @return false|string
	 */
	private function loadFile()
	{
		if (!$this->sites) {
			$this->sites = $this->filesystem->read($this->file);
		}

		return $this->sites;
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
}
