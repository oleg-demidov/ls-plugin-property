<?php

class PluginProperty_ActionAdmin_EventPage extends Event
{
    protected $oUserCurrent = null;

    public function Init()
    { 
        $this->oUserCurrent = $this->User_GetUserCurrent();
        
    }

   
    public function EventList()
    {
        $this->SetTemplateAction('page-list');
        
        $aPages = $this->PluginProperty_Page_GetPageItemsByFilter( [
            
        ]);
        
        $this->Viewer_Assign('aPages', $aPages);  
    }
    
    public function EventAdd() {
        
        $this->SetTemplateAction('page-add'); 
        
        $this->Component_Add('bootstrap');
        $this->Component_Add('tinymce');
        
        $oPage = $this->PluginProperty_Page_GetPageById( $this->GetParam(0) );
        if(!$oPage){
            $oPage = Engine::GetEntity('PluginProperty_Page_Page' );
        }
            
        if(isPost()){ 
            
            $oPage->_setData(getRequest('page'));
            $oPage->setCategories(getRequest('categories'));
            $oPage->setUserId($this->oUserCurrent->getId());
                                   
            if($oPage->_Validate()){ 
                if($oPage->Save()){
                    
                    $this->Message_AddNoticeSingle($this->Lang_Get('common.success.save'),'',true);
                    Router::LocationAction("admin/plugin/page/list");
                    
                }else{
                    $this->Message_AddErrorSingle($this->Lang_Get('common.error.system.base'));
                }
            }else{
                foreach($oPage->_getValidateErrors() as $aError){
                    $this->Message_AddError($aError[0], $this->Lang_Get('common.error.error'));
                }
            }  
                      
        }
        
        if($oPage){
            $_REQUEST['page'] = $oPage->_getData();
        }
        $this->Viewer_Assign('oPage', $oPage);
    }
    
    public function EventRemove() {
        $this->SetTemplate(false);
        
        $oPage = $this->PluginWiki_Wiki_GetPageById( $this->GetParam(1) );
        
        if($oPage){
            $this->Security_ValidateSendForm();
            /**
             * Удаляем
             */
            if ($oPage->Delete()) {
                $this->Message_AddNotice('Удаление прошло успешно', null, true);
            } else {
                $this->Message_AddError('Возникла ошибка при удалении', null, true);
            }

            
        }
        
        Router::LocationAction("admin/plugin/wiki/". $this->oWiki->getCode() . '/pages');
        
         
    }
    
}