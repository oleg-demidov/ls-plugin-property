{$value = $property->getValue()}
{$valueType = $value->getValueTypeObject()}

<div class="ls-property">
    <div class="ls-property-list-item-label">
        {$property->getTitle()}
    </div>

    {if $value->getValueVarchar()}
        {if $oUserCurrent || ! $property->getParam('access_only_auth')}
            <a href="{router page="property/download"}{$value->getValueVarchar()}/">{$value->getValueForDisplay()}</a>
            {if $valueType->getCountDownloads()}
                <br/>{lang 'plugin.property.file.downloads'}: {$valueType->getCountDownloads()}
            {/if}
        {else}
            {lang 'plugin.property.file.forbidden'}
        {/if}
    {else}
        {lang 'plugin.property.file.empty'}
    {/if}
</div>