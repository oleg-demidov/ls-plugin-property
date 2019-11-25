{component 'bs-form' template='checkbox'
    custom  = 1
    name    = "property[{$property->getId()}]"
    value   = $property->getParam( 'default_value' )
    checked = $property->getValue()->getValueForForm()
    note    = $property->getDescription()
    label   = $property->getTitle()}