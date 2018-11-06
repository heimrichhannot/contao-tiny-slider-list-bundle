<?php

namespace HeimrichHannot\TinySliderListBundle\EventListener;

use Contao\System;
use HeimrichHannot\ListBundle\Event\ListCompileEvent;
use HeimrichHannot\TinySliderBundle\Model\TinySliderConfigModel;

class ListCompileListener
{
    public function onListCompileRender(ListCompileEvent $event)
    {
        $module = $event->getModule();
        $listConfig = $event->getListConfig();

        /** @var TinySliderConfigModel $tinyConfigModel */
        $tinyConfigModel = System::getContainer()->get('contao.framework')->getAdapter(TinySliderConfigModel::class);

        if ($listConfig->addTinySlider && null !== ($config = $tinyConfigModel->findByPk($listConfig->slickConfig))) {
            $cssID = $module->cssID;
            $cssID[1] = $cssID[1].($cssID[1] ? ' ' : '').System::getContainer()->get('huh.tiny_slider.util.config')->getCssClassFromModel($config);
            $module->cssID = $cssID;
        }
    }
}