<?php
namespace DocumentExportDefinition;

use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Exception\InvalidArgumentException;

class TOCDefinition
{
	/**
	 * @Serializer\SerializedName("toc")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $toc;


	/**
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $title;


	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTOC($toc)
	{
		$this->toc = $toc;
	}

	public function getTOC()
	{
		return $this->toc;
	}

}
