<?php
namespace DocumentExportDefinition;

use DocumentExportDefinition\Section\AbstractSectionDefinition;
use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Exception\InvalidArgumentException;

class DocumentDefinition
{
	/**
	 * @Serializer\SerializedName("sections")
	 * @Serializer\Type("array<DocumentExportDefinition\Section\AbstractSectionDefinition>")
	 * @var AbstractSectionDefinition[]
	 */
	protected $sections = [];

	/**
	 * @Serializer\Type("string")
	 * @Serializer\SerializedName("templateDocx")
	 * @Serializer\Accessor(getter="getEncodedTemplate",setter="setEncodedTemplate")
	 */
	protected $templateDocx;

	const OPTION_ADD_BREAKS_BETWEEN_SECTIONS = "addBreaksBetweenSections";
	const OPTION_PAGE_NUMBERING = "pageNumbering";
	const OPTION_ADD_TITLES = "addTitles";
	const OPTION_DOWNLOAD_IMAGES = "downloadImages";

	const PROPERTY_TITLE = "title";
	const PROPERTY_CREATOR = "creator";
	const PROPERTY_COMPANY = "company";
	const PROPERTY_LOCALE = "locale";
	const PROPERTY_DATE = 'date';

	/**
	 * @Serializer\SerializedName("options")
	 * @Serializer\Type("array")
	 * @var array
	 */
	protected $options = [
		self::OPTION_ADD_TITLES => true,
		self::OPTION_ADD_BREAKS_BETWEEN_SECTIONS => true,
		self::OPTION_DOWNLOAD_IMAGES => true,
		self::OPTION_PAGE_NUMBERING => true
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
		self::PROPERTY_LOCALE => null,
        self::PROPERTY_DATE => null
	];

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

	public function setTemplateDocx($templateFile)
	{
		$this->templateDocx = $templateFile;
	}

	public function getTemplateDocx()
	{
		return $this->templateDocx;
	}

	/**
	 * @param $templateFile
	 */
	public function setEncodedTemplate($templateFile)
	{
		$this->templateDocx = base64_decode($templateFile);
	}

	/**
	 * @return string
	 */
	public function getEncodedTemplate()
	{
		return base64_encode($this->templateDocx);
	}
}
