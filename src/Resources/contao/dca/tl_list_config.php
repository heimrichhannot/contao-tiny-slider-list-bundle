<?php

$dca = &$GLOBALS['TL_DCA']['tl_list_config'];

/**
 * Palettes
 */
$dca['palettes']['default'] = str_replace('addMasonry', 'addMasonry,addTinySlider', $dca['palettes']['default']);

/**
 * Subpalettes
 */
$dca['palettes']['__selector__'][] = 'addTinySlider';

$dca['subpalettes']['addTinySlider'] = 'tinySliderConfig';

/**
 * Fields
 */
$fields = [
    'addTinySlider'    => [
        'label'     => &$GLOBALS['TL_LANG']['tl_list_config']['addTinySlider'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => ['tl_class' => 'w50 clr', 'submitOnChange' => true],
        'sql'       => "char(1) NOT NULL default ''",
    ],
    'tinySliderConfig' => [
        'label'            => &$GLOBALS['TL_LANG']['tl_list_config']['tinySliderConfig'],
        'exclude'          => true,
        'filter'           => true,
        'inputType'        => 'select',
        'options_callback' => ['huh.tiny_slider.backend.tiny_slider_spread', 'getBaseConfigurations'],
        'eval'             => ['tl_class' => 'w50', 'mandatory' => true, 'includeBlankOption' => true, 'submitOnChange' => true],
        'sql'              => "int(10) unsigned NOT NULL default '0'",
    ],
];

$dca['fields'] += $fields;