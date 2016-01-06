<?php
namespace DocumentExportDefinition\Section\Encoded;

use JMS\Serializer\Annotation as Serializer;

class DocxDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("type")
	 * @return string
	 */
	public function getType()
	{
		return 'DocxDefinition';
	}
}
