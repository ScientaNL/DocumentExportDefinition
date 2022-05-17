<?php

namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

class StringDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	public function getType(): string
	{
		return 'StringDefinition';
	}
}
