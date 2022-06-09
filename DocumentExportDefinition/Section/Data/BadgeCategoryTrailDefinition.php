<?php

namespace DocumentExportDefinition\Section\Data;

use DocumentExportDefinition\Section\AbstractDataDefinition;
use JMS\Serializer\Annotation as Serializer;

/**
 * @psalm-extends AbstractDataDefinition<array>
 */
class BadgeCategoryTrailDefinition extends AbstractDataDefinition
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
		return 'BadgeCategoryTrailDefinition';
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

	/**
	 * @return array
	 */
	public function getValue(): array
	{
		return $this->value;
	}
}
