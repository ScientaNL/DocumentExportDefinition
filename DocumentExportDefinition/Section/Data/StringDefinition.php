<?php
namespace DocumentExportDefinition\Section\Data;

use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Section\Data\AbstractDataDefinition;

class StringDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\SerializedName("value")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $value;

	public function getType()
	{
		return 'StringDefinition';
	}
}
