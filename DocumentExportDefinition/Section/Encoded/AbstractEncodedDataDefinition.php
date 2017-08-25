<?php
namespace DocumentExportDefinition\Section\Encoded;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

abstract class AbstractEncodedDataDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\SerializedName("fileId")
	 * @Serializer\Type("string")
	 */
	protected $fileId;

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
	 * @Serializer\SerializedName("value")
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getEncodedValue",setter="setEncodedValue")
	 *
	 * @var string
	 */
	protected $value;

	/**
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $title;


	public function __construct($title = null, $value = null)
	{
		parent::__construct();
		parent::setValue($value);

		$this->title = $title;
		$this->fileId = uniqid($this->getType());
	}

	/**
	 * @param $value
	 */
	public function setEncodedValue($value)
	{
		$this->value = base64_decode($value);
	}

	/**
	 * @return string
	 */
	public function getEncodedValue()
	{
		return base64_encode($this->value);
	}

	/**
	 * @param int $mimeType
	 */
	public function setMimeType($mimeType)
	{
		$this->mimeType = $mimeType;
	}

	/**
	 * @param int $extension
	 */
	public function setExtension($extension)
	{
		$this->extension = $extension;
	}

	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * @return int
	 */
	public function getMimeType()
	{
		return $this->mimeType;
	}

	/**
	 * @return string
	 */
	public function getFileId()
	{
		return $this->fileId;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
}
