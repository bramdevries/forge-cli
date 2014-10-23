<?php

namespace Bramdevries\ForgeCli;

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

		return $sites[$identifier];
    }

	/**
	 * @return false|string
	 */
	private function loadFile()
	{
		return $this->filesystem->read($this->file);
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
