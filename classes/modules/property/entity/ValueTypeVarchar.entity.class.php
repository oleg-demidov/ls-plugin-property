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
 * Объект управления типом varchar
 *
 * @package application.modules.property
 * @since 2.0
 */
class PluginProperty_ModuleProperty_EntityValueTypeVarchar extends PluginProperty_ModuleProperty_EntityValueType
{

    public function getValueForDisplay()
    {
        return $this->getValueObject()->getValueVarchar();
    }

    public function getValueForForm()
    {
        $oValue = $this->getValueObject();
        $oProperty = $oValue->getProperty();
        return $oValue->_isNew() ? $oProperty->getParam('default') : $oValue->getValueVarchar();
    }

    public function validate()
    {
        return $this->validateStandart('string');
    }

    public function setValue($mValue)
    {
        $this->resetAllValue();
        $oValue = $this->getValueObject();
        $oValue->setValueVarchar($mValue ? htmlspecialchars($mValue) : null);
    }

    public function prepareValidateRulesRaw($aRulesRaw)
    {
        $aRules = array();
        $aRules['allowEmpty'] = isset($aRulesRaw['allowEmpty']) ? false : true;

        if (isset($aRulesRaw['max']) and is_numeric($aRulesRaw['max'])) {
            $aRules['max'] = (int)$aRulesRaw['max'];
        }
        if (isset($aRulesRaw['min']) and is_numeric($aRulesRaw['min'])) {
            $aRules['min'] = (int)$aRulesRaw['min'];
        }
        return $aRules;
    }

    public function prepareParamsRaw($aParamsRaw)
    {
        $aParams = array();

        if (isset($aParamsRaw['default'])) {
            $aParams['default'] = htmlspecialchars($aParamsRaw['default']);
        }
        
        if (isset($aParamsRaw['placeholder'])) {
            $aParams['placeholder'] = htmlspecialchars($aParamsRaw['placeholder']);
        }
        
        if (isset($aParamsRaw['icon'])) {
            $aParams['icon'] = htmlspecialchars($aParamsRaw['icon']);
            
//            $iconExplode = explode(':', $aParams['icon']);
//            $aParams['icon'] = [
//                'icon' => array_shift($iconExplode),
//                'style' => array_shift($iconExplode)
//            ];
                
        }

        return $aParams;
    }
    
}