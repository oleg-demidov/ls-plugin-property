<?php

class PluginProperty_HookAdmin extends Hook {
    
    /**
     * Регистрируем хуки
     */
    public function RegisterHook() {
        /**
         * Хук на отображение админки
         */
        $this->AddHook('init_action_admin', 'InitActionAdmin');
    }

    public function InitActionAdmin($aParams) { 
        
        /*
         * если нет ни одного плагина, который использует дополнительные поля - не выводить соотв. пункт меню
         */
        if (!$aTypes = $this->Property_GetTargetTypes()) {
            return false;
        }

        $oSection = Engine::GetEntity('PluginAdmin_Ui_MenuSection')->SetCaption('Пользовательские поля')->SetName('properties')->SetUrl('plugin/property')->setIcon('th-list');
        foreach ($aTypes as $sKey => $aParams) {
            $oSection->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')->SetCaption(isset($aParams['name']) ? htmlspecialchars_decode($aParams['name']) : $sKey)
                    ->SetUrl('/admin/plugin/property/'.$sKey));
        }

        $oMenu = $this->PluginAdmin_Ui_GetMenuMain();
        $oMenu->AddSection($oSection);
        
        
    }
}