<?php
namespace DocumentExportDefinition\Section\Encoded;

use JMS\Serializer\Annotation as Serializer;

class DocxDefinition extends AbstractEncodedDataDefinition
{
	public function getType()
	{
		return 'DocxDefinition';
	}
}
