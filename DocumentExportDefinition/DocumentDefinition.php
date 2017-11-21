<?php
namespace DocumentExportDefinition;

use DocumentExportDefinition\Section\SectionDefinition;
use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Exception\InvalidArgumentException;

class DocumentDefinition
{
    const PROPERTY_TITLE = "title";
    const PROPERTY_CREATOR = "creator";
    const PROPERTY_KEYWORDS = "keywords";
    const PROPERTY_DESCRIPTION = "description";
    const PROPERTY_CATEGORY = "category";
    const PROPERTY_CONTENT_STATUS = "contentStatus";
    const PROPERTY_COMPANY = "company";
    const PROPERTY_DATE = 'date';
    const PROPERTY_LOCALE = "locale";

    const OPTION_BASE_URL = 'baseUrl';
	const OPTION_CONVERSION_TYPE = 'conversionType';
	const OPTION_CATEGORIES_AS_FOLDERS = "categoriesAsFolders";
	const OPTION_MERGE_CONTINUOUS = 'mergeContinuous';
	const OPTION_TEMPLATE_VAR_SYMBOL = 'templateVarSymbol';

    const LANDSCAPE = 'landscape';
    const PORTRAIT = 'portrait';

    /**
     * @Serializer\SerializedName("header")
     * @Serializer\Type("DocumentExportDefinition\Section\SectionDefinition")
     * @var SectionDefinition
     */
    protected $header;

    /**
     * @Serializer\SerializedName("footer")
     * @Serializer\Type("DocumentExportDefinition\Section\SectionDefinition")
     * @var SectionDefinition
     */
    protected $footer;

    /**
     * @Serializer\SerializedName("sections")
     * @Serializer\Type("array<DocumentExportDefinition\Section\SectionDefinition>")
     * @var SectionDefinition[]
     */
    protected $sections = [];

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("templateDocx")
     * @Serializer\Accessor(getter="getEncodedTemplate",setter="setEncodedTemplate")
     */
    protected $templateDocx;

    /**
     * @Serializer\SerializedName("options")
     * @Serializer\Type("array")
     * @var array
     */
    protected $options = [
        self::OPTION_BASE_URL => null,
        self::OPTION_CONVERSION_TYPE => null,
        self::OPTION_CATEGORIES_AS_FOLDERS => null,
        self::OPTION_MERGE_CONTINUOUS => null,
        self::OPTION_TEMPLATE_VAR_SYMBOL => '$'
    ];

    /**
     * @Serializer\SerializedName("documentProperties")
     * @Serializer\Type("array")
     * @var array
     */
    protected $documentProperties = [
        self::PROPERTY_TITLE => null,
        self::PROPERTY_CREATOR => null,
        self::PROPERTY_KEYWORDS => null,
        self::PROPERTY_DESCRIPTION => null,
        self::PROPERTY_CATEGORY => null,
        self::PROPERTY_CONTENT_STATUS => null,
        self::PROPERTY_COMPANY => null,
        self::PROPERTY_DATE => null,
        self::PROPERTY_LOCALE => null
    ];

	/**
	 * @param SectionDefinition $section
	 */
	public function setHeader(SectionDefinition $section)
	{
		$this->header = $section;
		return $this;
	}

    /**
     * @return SectionDefinition
     */
    public function getHeader()
    {
        return $this->header;
    }

	/**
	 * @param SectionDefinition $section
	 */
	public function setFooter(SectionDefinition $section)
	{
		$this->footer = $section;
		return $this;
	}

	/**
     * @return SectionDefinition
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param SectionDefinition $section
     */
    public function prependSection(SectionDefinition $section)
    {
        array_unshift($this->sections, $section);
		return $this;
    }

    /**
     * @param SectionDefinition $section
     */
    public function addSection(SectionDefinition $section)
    {
        $this->sections[] = $section;
		return $this;
    }

    /**
     * @param $sectionType
     * @return bool
     */
    public function hasSection($sectionType)
    {
        foreach ($this->sections as $section) {
            if ($section instanceof $sectionType) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return SectionDefinition[]
     */
    public function getSections()
    {
        return $this->sections;
    }

	/**
	 * @param $option
	 * @param $value
	 */
	public function setOption($option, $value)
    {
        if (array_key_exists($option, $this->options) === false) {
            throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
        }

        $this->options[$option] = $value;
		return $this;
    }

	/**
	 * @param $option
	 * @return mixed
	 */
	public function getOption($option)
    {
        if (array_key_exists($option, $this->options) === false) {
            throw new InvalidArgumentException(sprintf("Invalid option %s specified", $option));
        }

        return $this->options[$option];
    }

	/**
	 * @param $property
	 * @param $value
	 */
	public function setDocumentProperty($property, $value)
    {
        if (array_key_exists($property, $this->documentProperties) === false) {
            throw new InvalidArgumentException(sprintf("Invalid property %s specified", $property));
        }

        $this->documentProperties[$property] = $value;
		return $this;
    }

	/**
	 * @param $property
	 * @return mixed
	 */
	public function getDocumentProperty($property)
    {
        if (array_key_exists($property, $this->documentProperties) === false) {
            throw new InvalidArgumentException(sprintf("Invalid property %s specified", $property));
        }

        return $this->documentProperties[$property];
    }

	/**
	 * @param $templateFile
	 */
	public function setTemplateDocx($templateFile)
    {
        $this->templateDocx = $templateFile;
		return $this;
    }

	/**
	 * @return mixed
	 */
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
		return $this;
    }

    /**
     * @return string
     */
    public function getEncodedTemplate()
    {
        return base64_encode($this->templateDocx);
    }

}
