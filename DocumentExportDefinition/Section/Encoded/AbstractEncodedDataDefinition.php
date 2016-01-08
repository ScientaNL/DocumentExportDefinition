<?php
namespace DocumentExportDefinition\Section\Encoded;

use DocumentExportDefinition\Section\AbstractSectionDefinition;
use JMS\Serializer\Annotation as Serializer;

abstract class AbstractEncodedDataDefinition extends AbstractSectionDefinition
{
	/**
	 * @Serializer\SerializedName("contents")
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getEncodedContents",setter="setEncodedContents")
	 *
	 * @var string
	 */
	protected $contents;

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
}
