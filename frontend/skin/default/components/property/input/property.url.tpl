    
{$attributes = [
    maxlength => $property->getValidateRuleOne('max'),
    minlength => $property->getValidateRuleOne('min')
]}

{if !$property->getValidateRuleOne('allowEmpty')}
    {$attributes['required'] = true}
{/if}

    
{component "bs-form.text"
    classes =  "rounded-right"
    classesGroup = "mb-1"
    name  = "property[{$property->getId()}]"
    value = $property->getValue()->getValueForForm()
    desc  = $property->getDescription()
    label = $property->getTitle()
    placeholder = $property->getParam('placeholder')
    prepend = {component "bs-icon" icon=$property->getParam('icon')}
    type = 'url'
    validate = [ 
        msgError => {lang "plugin.property.notices.validate_value_url" 
            min=$property->getValidateRuleOne('min')
            max=$property->getValidateRuleOne('max')}
    ]
    attributes = $attributes
}