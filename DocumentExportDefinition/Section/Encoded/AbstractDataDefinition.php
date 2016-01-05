<?php
namespace DocumentExportDefinition\Section\Encoded;

use DocumentExportDefinition\AbstractSectionDefinition;
use JMS\Serializer\Annotation as Serializer;

abstract class AbstractDataDefinition extends AbstractSectionDefinition
{
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