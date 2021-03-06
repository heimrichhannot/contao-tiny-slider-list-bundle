<?php

$dca = &$GLOBALS['TL_DCA']['tl_list_config_element'];

/**
 * Palettes
 */
$dca['palettes'][\HeimrichHannot\TinySliderListBundle\Backend\ListConfigElement::TYPE_TINY_SLIDER] = '{title_type_legend},title,type;{config_legend},tinySliderConfig,imageSelectorField,imageField;';

/**
 * Fields
 */
$fields = [
    'tinySliderConfig' => [
        'label'            => &$GLOBALS['TL_LANG']['tl_list_config_element']['tinySliderConfig'],
        'exclude'          => true,
        'filter'           => true,
        'inputType'        => 'select',
        'options_callback' => ['huh.tiny_slider.backend.tiny_slider_spread', 'getBaseConfigurations'],
        'eval'             => ['tl_class' => 'w50', 'mandatory' => true, 'includeBlankOption' => true, 'submitOnChange' => true],
        'sql'              => "int(10) unsigned NOT NULL default '0'",
    ],
];

$dca['fields'] += $fields;