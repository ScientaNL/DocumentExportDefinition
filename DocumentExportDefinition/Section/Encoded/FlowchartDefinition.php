<?php
namespace DocumentExportDefinition\Section\Encoded;

use JMS\Serializer\Annotation as Serializer;

class FlowchartDefinition extends AbstractEncodedDataDefinition
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

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("objectType")
     * @Serializer\Type("string")
     * @return string
     */
	public function getType()
	{
		return 'FlowchartDefinition';
	}

	/**
	 * @param int $width
	 * @return $this
	 */
	public function setWidth($width)
	{
		$this->width = $width;
		return $this;
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
	 * @return $this
	 */
	public function setHeight($height)
	{
		$this->height = $height;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getHeight()
	{
		return $this->height;
	}
}
