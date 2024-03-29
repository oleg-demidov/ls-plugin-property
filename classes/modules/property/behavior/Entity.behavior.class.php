<?php
/*
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Maxim Mzhelskiy <rus.engine@gmail.com>
 *
 */

/**
 * Поведение для подключения функционала дополнительных полей к сущностям
 *
 * @package application.modules.property
 * @since 2.0
 */
class PluginProperty_ModuleProperty_BehaviorEntity extends Behavior
{
    /**
     * Дефолтные параметры
     *
     * @var array
     */
    protected $aParams = array(
        'target_type' => '',
    );
    /**
     * Список хуков
     *
     * @var array
     */
    protected $aHooks = array(
        'validate_after' => 'CallbackValidateAfter',
        'after_save'     => 'CallbackAfterSave',
        'after_delete'   => 'CallbackAfterDelete',
    );
    
    protected $aProperties;

    /**
     * Коллбэк
     * Выполняется при инициализации сущности
     *
     * @param $aParams
     */
    public function CallbackValidateAfter($aParams)
    {
        if ($aParams['bResult']) {
            $aFields = $aParams['aFields'];
            if (is_null($aFields) or in_array('properties', $aFields)) {
                $oValidator = $this->Validate_CreateValidator('properties_check', $this, 'properties');
                $oValidator->validateEntity($this->oObject, $aFields);
                $aParams['bResult'] = !$this->oObject->_hasValidateErrors();
            }
        }
        
    }

    /**
     * Коллбэк
     * Выполняется после сохранения сущности
     */
    public function CallbackAfterSave()
    {
        
        $this->PluginProperty_Property_UpdatePropertiesValue($this->getPropertiesForSave(), $this->oObject);
    }

    /**
     * Коллбэк
     * Выполняется после удаления сущности
     */
    public function CallbackAfterDelete()
    {
        $this->PluginProperty_Property_RemovePropertiesValue($this->oObject, $this);
    }

    /**
     * Дополнительный метод для сущности
     * Запускает валидацию дополнительных полей
     *
     * @return mixed
     */
    public function ValidatePropertiesCheck()
    {
        return $this->PluginProperty_Property_ValidateEntityPropertiesCheck($this->oObject, $this);
    }

    /**
     * Возвращает полный список свойств сущности
     *
     * @return mixed
     */
    public function getPropertyList()
    {
        return $this->PluginProperty_Property_GetEntityPropertyList($this->oObject, $this);
    }

    /**
     * Возвращает значение конкретного свойства
     * @see PluginProperty_ModuleProperty_EntityValue::getValueForDisplay
     *
     * @param int|string $sPropertyId ID или код свойства
     *
     * @return mixed
     */
    public function getPropertyValue($sPropertyId)
    {
        return $this->PluginProperty_Property_GetEntityPropertyValue($this->oObject, $this, $sPropertyId);
    }

    /**
     * Возвращает объект конкретного свойства сущности
     *
     * @param int|string $sPropertyId ID или код свойства
     *
     * @return PluginProperty_ModuleProperty_EntityProperty|null
     */
    public function getProperty($sPropertyId)
    {
        return $this->PluginProperty_Property_GetEntityProperty($this->oObject, $this, $sPropertyId);
    }

    /**
     * Возвращает тип объекта для дополнительных полей
     *
     * @return string
     */
    public function getPropertyTargetType()
    {
        if ($sType = $this->getParam('target_type')) {
            return $sType;
        }
        /**
         * Иначе дополнительно смотрим на наличие данного метода у сущности
         * Это необходимо, если тип вычисляется динамически по какой-то своей логике
         */
        if (func_method_exists($this->oObject, 'getPropertyTargetType', 'public')) {
            return call_user_func(array($this->oObject, 'getPropertyTargetType'));
        }
    }
    
    public function setPropertiesForSave($aProperties) {
        $this->aProperties = $aProperties;
    }
    
    public function getPropertiesForSave() {
        return $this->aProperties;
    }
}