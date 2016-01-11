<?php
namespace DocumentExportDefinition\Section\Html;

use DocumentExportDefinition\Section\Encoded\ImageDefinition;
use JMS\Serializer\Annotation as Serializer;

class HtmlImageDefinition extends ImageDefinition
{
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

	const IMG_PROTOCOL_NAME = "dedimg";

	public function getType()
	{
		return 'HtmlImageDefinition';
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
