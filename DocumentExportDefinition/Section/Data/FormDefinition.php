<?php
namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractSectionDefinition;
use JMS\Serializer\Annotation as Serializer;

class FormDefinition extends AbstractSectionDefinition
{
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
