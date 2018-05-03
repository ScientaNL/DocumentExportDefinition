<?php
namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class FormDefinition extends AbstractDataDefinition
{
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

	public function getType()
	{
		return 'FormDefinition';
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
	 * @return mixed
	 */
	public function getDescription(): string
	{
		return (string)$this->description;
	}

	/**
	 * @param mixed $url
	 * @return FormDefinition
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
