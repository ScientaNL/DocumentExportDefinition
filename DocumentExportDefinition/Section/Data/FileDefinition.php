<?php

namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\Encoded\AbstractEncodedDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class FileDefinition extends AbstractEncodedDataDefinition
{
	/**
	 * @Serializer\SerializedName("fileSize")
	 * @Serializer\Type("string")
	 * @var string|null
	 */
	protected $fileSize = null;

	/**
	 * @Serializer\SerializedName("fileName")
	 * @Serializer\Type("string")
	 * @var string|null
	 */
	protected $fileName = null;

	/**
	 * @Serializer\SerializedName("fileType")
	 * @Serializer\Type("string")
	 * @var string|null
	 */
	protected $fileType = null;

	/**
	 * @Serializer\SerializedName("description")
	 * @Serializer\Type("string")
	 * @var string|null
	 */
	protected $description = null;

	/**
	 * @Serializer\SerializedName("url")
	 * @Serializer\Type("string")
	 * @var string|null
	 */
	protected $url = null;

	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	public function getType(): string
	{
		return 'FileDefinition';
	}

	/**
	 * @return string|null
	 */
	public function getFileSize()
	{
		return $this->fileSize;
	}

	/**
	 * @return string
	 */
	public function getFileName(): string
	{
		return (string)$this->fileName;
	}

	/**
	 * @return string
	 */
	public function getFileType(): string
	{
		return (string)$this->fileType;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return (string)$this->description;
	}

	/**
	 * @param string $fileSize
	 * @return FileDefinition
	 */
	public function setFileSize(string $fileSize)
	{
		$this->fileSize = $fileSize;
		return $this;
	}

	/**
	 * @param string $fileName
	 * @return FileDefinition
	 */
	public function setFileName(string $fileName)
	{
		$this->fileName = $fileName;
		return $this;
	}

	/**
	 * @param string $fileType
	 * @return FileDefinition
	 */
	public function setFileType(string $fileType)
	{
		$this->fileType = $fileType;
		return $this;
	}

	/**
	 * @param string $description
	 * @return FileDefinition
	 */
	public function setDescription(string $description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @param string $url
	 * @return FileDefinition
	 */
	public function setUrl(string $url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return (string)$this->url;
	}
}
