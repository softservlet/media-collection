<?php namespace Softservlet\MediaCollection\Laravel\Repo;

use Softservlet\MediaCollection\Repo\AlbumRepositoryInterface;
use Softservlet\MediaCollection\Laravel\ORM\AlbumDB;
use Softservlet\MediaCollection\Laravel\AlbumEloquent;


/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */

class AlbumRepositoryEloquent implements AlbumRepositoryInterface
{
	/**
	 * @brief eloquent object
	 *
	 * @var AlbumDB
	 */
	protected $album;


	public function __construct(AlbumDB $album)
	{
			$this->album = $album;	
	}	

	/**
	 * @brief get albums by id
	 *
	 * @param string id
	 *
	 * @return AlbumInterface album
	 */
	public function byId($id)
	{		
		return new AlbumEloquent($this->album->find($id));	
	}

	/**
	 * @brief create a new album
	 *
	 * @param album name
	 *
	 * @return AlbumInterface
	 */
	public function create($name)
	{
		$this->album->unguard();

		$album = $this->album->create(array(
			'name' => $name	
		));

		return new AlbumEloquent($album);
	}

}