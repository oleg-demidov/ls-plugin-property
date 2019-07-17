    
{$attributes = [
    maxlength => $property->getValidateRuleOne('max'),
    minlength => $property->getValidateRuleOne('min')
]}

{if !$property->getValidateRuleOne('allowEmpty')}
    {$attributes['required'] = true}
{/if}

    
{component "bs-form.text"
    name  = "property[{$property->getId()}]"
    value = $property->getValue()->getValueForForm()
    desc  = $property->getDescription()
    label = $property->getTitle()
    placeholder = $property->getParam('placeholder')
    type = 'text'
    attributes = $attributes
}