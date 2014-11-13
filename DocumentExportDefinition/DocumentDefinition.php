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

	/**
	 * @Serializer\SerializedName("toc")
	 * @Serializer\Type("DocumentExportDefinition\TOCDefinition")
	 * @var TOCDefinition
	 */
	protected $toc = null;

	const OPTION_ADD_BREAKS_BETWEEN_SECTIONS = "addBreaksBetweenSections";
	const OPTION_ADD_TOC = "addTOC";
	const OPTION_ADD_TITLES = "addTitles";
	const OPTION_HEADER_TEXT = "headerText";
	const OPTION_FOOTER_TEXT = "footerText";
	const OPTION_ADD_PAGE_NUMBERING = "addPageNumbering";

	const PROPERTY_TITLE = "title";
	const PROPERTY_CREATOR = "creator";
	const PROPERTY_TOC = "toc";
	const PROPERTY_COMPANY = "company";
	const PROPERTY_LOCALE = "locale";

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
		self::OPTION_ADD_PAGE_NUMBERING => true,
		self::OPTION_ADD_TOC => true
	];

	/**
	 * @Serializer\SerializedName("documentProperties")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $_documentProperties = [
		self::PROPERTY_TITLE => null,
		self::PROPERTY_CREATOR => null,
		self::PROPERTY_COMPANY => null,
		self::PROPERTY_LOCALE => null
	];

	public function setTOC(TOCDefinition $toc)
	{
		$this->toc = $toc;
	}

	/**
	 * @return TOCDefinition
	 */
	public function getTOC()
	{
		return $this->toc;
	}

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
