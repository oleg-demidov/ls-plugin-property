<?php
/**
 * 
 * @author Oleg Demidov
 *
 */

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginProperty extends Plugin
{
    protected $aInherits = [
        'entity' => [
            'ModuleUser_EntityUser' => '_ModuleProperty_EntityUser'
        ],
//        'module' => [
//            'ModuleUser' => '_ModuleUser'
//        ]
    ];


    public function Init()
    {
//        $this->Lang_AddLangJs([
//            'plugin.subscribe.subscribe.text.subscribe',
//            'plugin.subscribe.subscribe.text.unsubscribe'
//        ]);

//        $this->Component_Add('subscribe:subscribe');
        
        
    }

    public function Activate()
    {
        $this->PluginProperty_Property_CreateTargetType('field', [
            'name' => 'Поля пользователя'
        ]);
        
        $aFields = array(
            array(
                'data'=>array(
                'type'=>PluginProperty_ModuleProperty::PROPERTY_TYPE_VARCHAR,
                'title'=>'Сайт',
                'code'=>'site',
                'sort'=>100
            ),
            'validate_rule'=>array(
                'min'=>3
            ),
            'params'=>array(),
            'additional'=>array()
            )
        );
        $this->PluginProperty_Property_CreateDefaultTargetPropertyFromPlugin($aFields, 'field');
        
        return true;
    }

    public function Deactivate()
    {
        
        return true;
    }
    
    public function Remove()
    {
        
        return true;
    }
}