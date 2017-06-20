<?php
namespace DocumentExportDefinition\Section\Data;

use JMS\Serializer\Annotation as Serializer;

class TOCDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\SerializedName("value")
	 * @Serializer\Type("array")
	 * @var string
	 */
	protected $value;

	public function getType()
	{
		return 'TOCDefinition';
	}
}
