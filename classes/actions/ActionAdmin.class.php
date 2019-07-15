<?php


class PluginProperty_ActionAdmin extends PluginAdmin_ActionPlugin
{

  

    public function Init()
    {
//        $this->SetDefaultEvent('list');
        $this->Component_Add('property:p-property');
    }

    /**
     * Регистрируем евенты
     *
     */
    protected function RegisterEvent()
    {
        
        $this->RegisterEventExternal('Property', 'PluginProperty_ActionAdmin_EventProperty');
        $this->AddEventPreg( '#^[\w-]+$#i', '#^$#i', 'Property::EventPropertiesTarget');
        $this->AddEventPreg( '#^[\w-]+$#i', '#^remove$#i', '#^\d{1,5}$#i', 'Property::EventPropertyRemove');
        $this->AddEventPreg( '#^[\w-]+$#i', '#^update$#i', '#^\d{1,5}$#i', 'Property::EventPropertyUpdate');
        $this->AddEventPreg( '#^[\w-]+$#i', '#^create$#i', '#^$#i', 'Property::EventPropertyCreate');
        $this->AddEventPreg('#^ajax$#i', '#^sort-save$#i', '#^$#i', 'Property::EventAjaxSortSave');
        
        
    }

}