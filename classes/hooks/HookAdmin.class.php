<?php

class PluginProperty_HookAdmin extends Hook {
    
    /**
     * Регистрируем хуки
     */
    public function RegisterHook() {
        /**
         * Хук на отображение админки
         */
//        $this->AddHook('init_action_admin', 'InitActionAdmin');
    }

    public function InitActionAdmin($aParams) { 
        
       /**
         * Получаем объект главного меню
         */
        $oMenu = $this->PluginAdmin_Ui_GetMenuMain();
        /**
         * Добавляем новый раздел
         */
        $oSection =  Engine::GetEntity('PluginAdmin_Ui_MenuSection');
        
        $oSection->SetCaption($this->Lang_Get('plugin.page.admin.nav.text'))->SetName('page')->SetUrl('plugin/page')->setIcon('file');
        
        
        $oMenu->AddSection( $oSection );
        
        
    }
}