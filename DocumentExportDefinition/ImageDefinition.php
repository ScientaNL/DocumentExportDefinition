<?php
namespace DocumentExportDefinition;

use JMS\Serializer\Annotation as Serializer;

class ImageDefinition
{
	/**
	 * @Serializer\SerializedName("imageId")
	 * @Serializer\Type("string")
	 */
	protected $_imageId;
	
	/**
	 * @Serializer\SerializedName("fileName")
	 * @Serializer\Type("string")
	 */	
	protected $_fileName;
	
	/**
	 * @Serializer\SerializedName("contents")
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getEncodedContents",setter="setEncodedContents")
	 * 
	 * @var string
	 */	
	protected $_contents;

	public function __construct($fileName, $contents)
	{
		$this->_fileName = $fileName;
		$this->_contents = $contents;
		
		$this->_imageId = uniqid("img");
	}
	
	public function getImageId()
	{
		return $this->_imageId;
	}

	public function getContents()
	{
		return $this->_contents;
	}
	
	public function setEncodedContents($contents)
	{
		$this->_contents = base64_decode($contents);
	}
	
	public function getEncodedContents()
	{
		return base64_encode($this->_contents);
	}
}