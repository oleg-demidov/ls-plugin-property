<?php


class PluginProperty_ActionAdmin extends PluginAdmin_ActionPlugin
{

  

    public function Init()
    {
        $this->SetDefaultEvent('list');
    }

    /**
     * Регистрируем евенты
     *
     */
    protected function RegisterEvent()
    {
        
        
        $this->RegisterEventExternal('Page', 'PluginProperty_ActionAdmin_EventPage');  
        $this->AddEventPreg('/^list$/i', '/^(page([\d{1,5}]))?$/i', 'Page::EventList');
        $this->AddEventPreg('/^(add|edit)$/i', '/^([0-9]{1,50})?$/i', 'Page::EventAdd');
        $this->AddEventPreg('/^[a-z_0-9]{1,50}$/i', '/^remove_page$/i', '/^([0-9]{1,50})?$/i', 'Page::EventRemove');
        
        
    }

}