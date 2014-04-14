<?php
namespace DocumentExportDefinition;

use JMS\Serializer\Annotation as Serializer;

class DocumentDefinition
{
	/**
	 * @Serializer\SerializedName("sections")
	 * @Serializer\Type("array<DocumentExportDefinition\SectionDefinition>")
	 * @var SectionDefinition[]
	 */
	protected $_sections = array();

	const OPTION_ADD_BREAKS_BETWEEN_SECTIONS = "addBreaksBetweenSections";
	const OPTION_ADD_TITLES = "addTitles";

	protected $_options = [
			self::OPTION_ADD_TITLES => true,
			self::OPTION_ADD_BREAKS_BETWEEN_SECTIONS => true
		];

	public function addSection(SectionDefinition $section)
	{
		$this->_sections[] = $section;
	}
	
	/**
	 * @return SectionDefinition[]
	 */
	public function getSections()
	{
		return $this->_sections;
	}

	public function setOption($option, $value)
	{
		if(array_key_exists($option, $this->_options) === false)
		{
			throw new \LogicException(sprintf("Invalid option %s specified", $option));
		}

		$this->_options[$option] = $value;
	}

	public function getOption($option)
	{
		if(array_key_exists($option, $this->_options) === false)
		{
			throw new \LogicException(sprintf("Invalid option %s specified", $option));
		}

		return $this->_options[$option];
	}
}