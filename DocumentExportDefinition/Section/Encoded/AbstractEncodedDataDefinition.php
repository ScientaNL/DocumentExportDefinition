<?php
namespace DocumentExportDefinition\Section\Encoded;

use DocumentExportDefinition\Section\AbstractSectionDefinition;
use JMS\Serializer\Annotation as Serializer;

abstract class AbstractEncodedDataDefinition extends AbstractSectionDefinition
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
	 * @Serializer\SerializedName("contents")
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getEncodedContents",setter="setEncodedContents")
	 *
	 * @var string
	 */
	protected $contents;

	/**
	 * AbstractSectionDefinition constructor.
	 * @param null $title
	 * @param null $contents
	 */
	public function __construct($title = null, $contents = null)
	{
		parent::__construct($title, $contents);
		$this->fileId = uniqid($this->getType());
	}

	/**
	 * @param $contents
	 */
	public function setEncodedContents($contents)
	{
		$this->contents = base64_decode($contents);
	}

	/**
	 * @return string
	 */
	public function getEncodedContents()
	{
		return base64_encode($this->contents);
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
	 * @return string
	 */
	public function getFileId()
	{
		return $this->fileId;
	}
}
