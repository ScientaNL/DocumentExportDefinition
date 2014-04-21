<?php
namespace DocumentExportDefinition;

use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Exception\InvalidArgumentException;

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
	const OPTION_HEADER_TEXT = "headerText";
	const OPTION_FOOTER_TEXT = "footerText";
	const OPTION_ADD_PAGE_NUMBERING = "addPageNumbering";

	const PROPERTY_TITLE = "title";
	const PROPERTY_CREATOR = "creator";

	/**
	 * @Serializer\SerializedName("options")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $_options = [
			self::OPTION_ADD_TITLES => true,
			self::OPTION_ADD_BREAKS_BETWEEN_SECTIONS => true,
			self::OPTION_HEADER_TEXT => null,
			self::OPTION_FOOTER_TEXT => null,
			self::OPTION_ADD_PAGE_NUMBERING => true
		];

	/**
	 * @Serializer\SerializedName("documentProperties")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $_documentProperties = [
			self::PROPERTY_TITLE => null,
			self::PROPERTY_CREATOR => null
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
			throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
		}

		$this->_options[$option] = $value;
	}

	public function getOption($option)
	{
		if(array_key_exists($option, $this->_options) === false)
		{
			throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
		}

		return $this->_options[$option];
	}

	public function setDocumentProperty($property, $value)
	{
		if(array_key_exists($property, $this->_documentProperties) === false)
		{
			throw new InvalidArgumentException(sprintf("Invalid property %s specified", $property));
		}

		$this->_documentProperties[$property] = $value;
	}

	public function getDocumentProperty($property)
	{
		if(array_key_exists($property, $this->_documentProperties) === false)
		{
			throw new InvalidArgumentException(sprintf("Invalid option %s specified", $property));
		}

		return $this->_documentProperties[$property];
	}
}
