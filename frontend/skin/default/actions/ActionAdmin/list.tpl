{**
 * Список дополнительных полей
 *
 * @param array $aPropertyItems Список полей
 *
 * TODO: Вывод имени плагина
 *}
 <h4>Список полей типа &laquo;{$aPropertyTargetParams.name}&raquo;</h4>


{block 'layout_content_actionbar'}
	{component 'bs-button' 
            text    = $aLang.plugin.admin.add 
            url     = {router page="admin/plugin/property/{$sPropertyTargetType}/create"} 
            bmods   = 'primary'}
{/block}



{component 'property:p-property' template='list' properties=$aPropertyItems}
