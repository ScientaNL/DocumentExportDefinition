<?php
namespace DocumentExportDefinition;

use DocumentExportDefinition\Section\AbstractSectionDefinition;
use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Exception\InvalidArgumentException;

class DocumentDefinition
{
	/**
	 * @Serializer\SerializedName("sections")
	 * @Serializer\Type("array<DocumentExportDefinition\AbstractSectionDefinition>")
	 * @var AbstractSectionDefinition[]
	 */
	protected $sections = [];

	const OPTION_ADD_BREAKS_BETWEEN_SECTIONS = "addBreaksBetweenSections";
	const OPTION_ADD_TITLES = "addTitles";
	const OPTION_DOWNLOAD_IMAGES = "downloadImages";
	const OPTION_HEADER_TEXT = "headerText";
	const OPTION_FOOTER_TEXT = "footerText";

	const PROPERTY_TITLE = "title";
	const PROPERTY_CREATOR = "creator";
	const PROPERTY_COMPANY = "company";
	const PROPERTY_LOCALE = "locale";

	/**
	 * @Serializer\SerializedName("options")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $options = [
		self::OPTION_ADD_TITLES => true,
		self::OPTION_ADD_BREAKS_BETWEEN_SECTIONS => true,
		self::OPTION_DOWNLOAD_IMAGES => true,
		self::OPTION_HEADER_TEXT => null,
		self::OPTION_FOOTER_TEXT => null
	];

	/**
	 * @Serializer\SerializedName("documentProperties")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $documentProperties = [
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

	/**
	 * @param AbstractSectionDefinition $section
	 */
	public function prependSection(AbstractSectionDefinition $section)
	{
		array_unshift($this->sections, $section);
	}

	/**
	 * @param AbstractSectionDefinition $section
	 */
	public function addSection(AbstractSectionDefinition $section)
	{
		$this->sections[] = $section;
	}

	/**
	 * @param $sectionType
	 * @return bool
	 */
	public function hasSection($sectionType)
	{
		foreach ($this->sections as $section)
		{
			if ($section instanceof $sectionType)
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * @return AbstractSectionDefinition[]
	 */
	public function getSections()
	{
		return $this->sections;
	}

	public function setOption($option, $value)
	{
		if(array_key_exists($option, $this->options) === false)
		{
			throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
		}

		$this->options[$option] = $value;
	}

	public function getOption($option)
	{
		if(array_key_exists($option, $this->options) === false)
		{
			throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
		}

		return $this->options[$option];
	}

	public function setDocumentProperty($property, $value)
	{
		if(array_key_exists($property, $this->documentProperties) === false)
		{
			throw new InvalidArgumentException(sprintf("Invalid property %s specified", $property));
		}

		$this->documentProperties[$property] = $value;
	}

	public function getDocumentProperty($property)
	{
		if(array_key_exists($property, $this->documentProperties) === false)
		{
			throw new InvalidArgumentException(sprintf("Invalid option %s specified", $property));
		}

		return $this->documentProperties[$property];
	}
}
