<?php
namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class FileDefinition extends AbstractDataDefinition
{
	public function getType()
	{
		return 'FileDefinition';
	}
}
