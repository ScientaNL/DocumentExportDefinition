<?php

namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\Encoded\AbstractEncodedDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class FileDefinition extends AbstractEncodedDataDefinition
{
	/**
	 * @Serializer\SerializedName("fileSize")
	 * @Serializer\Type("string")
	 */
	protected $fileSize;

	/**
	 * @Serializer\SerializedName("fileName")
	 * @Serializer\Type("string")
	 */
	protected $fileName;

	/**
	 * @Serializer\SerializedName("fileType")
	 * @Serializer\Type("string")
	 */
	protected $fileType;

	/**
	 * @Serializer\SerializedName("description")
	 * @Serializer\Type("string")
	 */
	protected $description;

	/**
	 * @Serializer\SerializedName("url")
	 * @Serializer\Type("string")
	 */
	protected $url;

	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	public function getType()
	{
		return 'FileDefinition';
	}

	/**
	 * @return mixed
	 */
	public function getFileSize()
	{
		return $this->fileSize;
	}

	/**
	 * @return mixed
	 */
	public function getFileName(): string
	{
		return $this->fileName;
	}

	/**
	 * @return mixed
	 */
	public function getFileType(): string
	{
		return $this->fileType;
	}

	/**
	 * @return mixed
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param mixed $fileSize
	 * @return FileDefinition
	 */
	public function setFileSize($fileSize)
	{
		$this->fileSize = $fileSize;
		return $this;
	}

	/**
	 * @param mixed $fileName
	 * @return FileDefinition
	 */
	public function setFileName($fileName)
	{
		$this->fileName = $fileName;
		return $this;
	}

	/**
	 * @param mixed $fileType
	 * @return FileDefinition
	 */
	public function setFileType($fileType)
	{
		$this->fileType = $fileType;
		return $this;
	}

	/**
	 * @param mixed $description
	 * @return FileDefinition
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @param mixed $url
	 * @return FileDefinition
	 */
	public function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

}
