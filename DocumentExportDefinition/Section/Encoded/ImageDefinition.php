<?php
namespace DocumentExportDefinition\Section\Encoded;

use JMS\Serializer\Annotation as Serializer;

class ImageDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\SerializedName("imageId")
	 * @Serializer\Type("string")
	 */
	protected $imageId;

	/**
	 * ImageDefinition constructor.
	 */
	public function __construct()
	{
		$this->imageId = uniqid("img");
	}

	/**
	 * @return string
	 */
	public function getImageId()
	{
		return $this->imageId;
	}
}
