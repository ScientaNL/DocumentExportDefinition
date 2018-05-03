<?php
namespace DocumentExportDefinition\Section\Encoded;

use JMS\Serializer\Annotation as Serializer;

class DocxDefinition extends AbstractEncodedDataDefinition
{
    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("objectType")
     * @Serializer\Type("string")
     * @return string
     */
	public function getType()
	{
		return 'DocxDefinition';
	}
}
