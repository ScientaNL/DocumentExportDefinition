<?php
namespace DocumentExportDefinition;

use JMS\Serializer\Annotation as Serializer;

class SectionDefinition
{
	/**
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $_title;
	
	/**
	 * @Serializer\SerializedName("contents")
	 * @Serializer\Type("string")
	 * @var string
	 */	
	protected $_contents = [];

	/**
	 * @Serializer\SerializedName("images")
	 * @Serializer\Type("array<string,DocumentExportDefinition\ImageDefinition>")
	 * @var array
	 */	
	protected $_images = [];
	
	public function setTitle($title)
	{
		$this->_title = $title;
	}
	
	public function setContents($contents)
	{
		$this->_contents = $contents;
	}
	
	public function addImage(ImageDefinition $image)
	{
		$this->_images[$image->getImageId()] = $image;
	}
}