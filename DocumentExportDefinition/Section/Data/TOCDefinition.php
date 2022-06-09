<?php

namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

/**
 * @psalm-extends AbstractDataDefinition<array>
 */
class TOCDefinition extends AbstractDataDefinition
{
	/**
	 * @Serializer\SerializedName("value")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $value = [];

	/**
	 * @Serializer\VirtualProperty
	 * @Serializer\SerializedName("objectType")
	 * @Serializer\Type("string")
	 * @return string
	 */
	public function getType(): string
	{
		return 'TOCDefinition';
	}

	/**
	 * @param array $value
	 * @return $this
	 */
	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}
}
