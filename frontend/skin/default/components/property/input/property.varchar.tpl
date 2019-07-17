    
{if !$property->getValidateRuleOne('allowEmpty')}
    {$required = true}
{/if}

    
{component "bs-form.text"
    name  = "property[{$property->getId()}]"
    value = $property->getValue()->getValueForForm()
    desc  = $property->getDescription()
    label = $property->getTitle()
    placeholder = $property->getParam('placeholder')
    type = 'text'
    attributes = [
        required => $required,
        maxlength => $property->getValidateRuleOne('max'),
        minlength => $property->getValidateRuleOne('min')
    ]
}