<?php

namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class FormDefinition extends AbstractDataDefinition
{
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

	public function getType(): string
	{
		return 'FormDefinition';
	}

	/**
	 * @param string|null $description
	 * @return $this
	 */
	public function setDescription(?string $description): FormDefinition
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return (string)$this->description;
	}

	/**
	 * @param string $url
	 * @return $this
	 */
	public function setUrl(string $url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getUrl(): ?string
	{
		return $this->url;
	}
}
