<?php

namespace DocumentExportDefinition\Section\Encoded;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

/**
 * @extends AbstractDataDefinition<string|null>
 */
abstract class AbstractEncodedDataDefinition extends AbstractDataDefinition
{
	/**
	 * @var string
	 *
	 * @Serializer\SerializedName("fileId")
	 * @Serializer\Type("string")
	 */
	protected $fileId;

	/**
	 * @var string|null
	 *
	 * @Serializer\SerializedName("mimeType")
	 * @Serializer\Type("string")
	 */
	protected $mimeType;

	/**
	 * @var string|null
	 *
	 * @Serializer\SerializedName("extension")
	 * @Serializer\Type("string")
	 */
	protected $extension;

	/**
	 * @var string|null
	 *
	 * @Serializer\SerializedName("value")
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getEncodedValue",setter="setEncodedValue")
	 */
	protected $value;

	/**
	 * @param string|null $title
	 * @param string|null $value
	 */
	public function __construct($title = null, $value = null)
	{
		$this->setValue($value);

		$this->title = $title;
		$this->fileId = uniqid($this->getType(), true);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setEncodedValue(string $value): self
	{
		$this->value = base64_decode($value);
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEncodedValue(): string
	{
		return base64_encode((string)$this->value);
	}

	/**
	 * @param string $mimeType
	 * @return $this
	 */
	public function setMimeType(string $mimeType): self
	{
		$this->mimeType = $mimeType;
		return $this;
	}

	/**
	 * @param string $extension
	 * @return $this
	 */
	public function setExtension(string $extension): self
	{
		$this->extension = $extension;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * @return string|null
	 */
	public function getMimeType()
	{
		return $this->mimeType;
	}

	/**
	 * @return string
	 */
	public function getFileId(): string
	{
		return $this->fileId;
	}
}
