<?php
namespace DocumentExportDefinition\Section\Encoded;

use JMS\Serializer\Annotation as Serializer;

class FlowchartDefinition extends AbstractEncodedDataDefinition
{
	/**
	 * @Serializer\SerializedName("mimeType")
	 * @Serializer\Type("string")
	 */
	protected $mimeType;

	/**
	 * @Serializer\SerializedName("extension")
	 * @Serializer\Type("string")
	 */
	protected $extension;

	/**
	 * @Serializer\SerializedName("width")
	 * @Serializer\Type("integer")
	 */
	protected $width;
	/**
	 * @Serializer\SerializedName("height")
	 * @Serializer\Type("integer")
	 */
	protected $height;

	public function getType()
	{
		return 'FlowchartDefinition';
	}

	/**
	 * @param int $mimeType
	 */
	public function setMimeType($mimeType)
	{
		$this->mimeType = $mimeType;
	}

	/**
	 * @return int
	 */
	public function getMimeType()
	{
		return $this->mimeType;
	}

	/**
	 * @param string $extension
	 */
	public function setExtension($extension)
	{
		$this->extension = $extension;
	}

	/**
	 * @return string
	 */
	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * @param int $width
	 */
	public function setWidth($width)
	{
		$this->width = $width;
	}

	/**
	 * @return int
	 */
	public function getWidth()
	{
		return $this->width;
	}

	/**
	 * @param int $height
	 */
	public function setHeight($height)
	{
		$this->height = $height;
	}

	/**
	 * @return int
	 */
	public function getHeight()
	{
		return $this->height;
	}
}
