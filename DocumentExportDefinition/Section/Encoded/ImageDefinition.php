<?php

namespace DocumentExportDefinition\Section\Encoded;

use JMS\Serializer\Annotation as Serializer;

class ImageDefinition extends AbstractEncodedDataDefinition
{
	/**
	 * @Serializer\Type("int")
	 * @var int|null
	 */
	protected $width = null;

	/**
	 * @Serializer\Type("int")
	 * @var int|null
	 */
	protected $height = null;

	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	public function getType(): string
	{
		return 'ImageDefinition';
	}

	/**
	 * @return int|null
	 */
	public function getWidth(): ?int
	{
		return $this->width;
	}

	/**
	 * @param int|null $width
	 * @return self
	 */
	public function setWidth(?int $width): self
	{
		$this->width = $width;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getHeight(): ?int
	{
		return $this->height;
	}

	/**
	 * @param int|null $height
	 * @return self
	 */
	public function setHeight(?int $height): self
	{
		$this->height = $height;
		return $this;
	}
}
