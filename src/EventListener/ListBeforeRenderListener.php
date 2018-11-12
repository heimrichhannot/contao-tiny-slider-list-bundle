<?php

namespace HeimrichHannot\TinySliderListBundle\EventListener;

use Contao\System;
use HeimrichHannot\ListBundle\Event\ListBeforeRenderEvent;
use HeimrichHannot\TinySliderBundle\Model\TinySliderConfigModel;

class ListBeforeRenderListener
{
    public function onListBeforeRender(ListBeforeRenderEvent $event)
    {
        $templateData = $event->getTemplateData();
        $listConfig = $event->getListConfig();

        /** @var TinySliderConfigModel $tinyConfigModel */
        $tinyConfigModel = System::getContainer()->get('contao.framework')->getAdapter(TinySliderConfigModel::class);

        if ($listConfig->addTinySlider && null !== ($config = $tinyConfigModel->findByPk($listConfig->tinySliderConfig))) {
            $dataAttributes = $templateData['dataAttributes'] ?: '';
            $dataAttributes .= System::getContainer()->get('huh.tiny_slider.util.config')->getAttributes($config);
            $templateData['wrapperClass'] = System::getContainer()->get('huh.tiny_slider.util.config')->getCssClass($config);
            $templateData['dataAttributes'] = $dataAttributes;
            $templateData['itemsClass'] = 'tiny-slider-container';

            $event->setTemplateData($templateData);
        }
    }
}