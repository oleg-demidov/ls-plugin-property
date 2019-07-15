<?php

class PluginProperty_ModuleProperty_EntityUser extends PluginProperty_Inherits_ModuleUser_EntityUser
{
        
    
    
    public function Init() {
        parent::Init();
        
        $this->PluginProperty_Property_AttachUserBehavior($this);
    }
}