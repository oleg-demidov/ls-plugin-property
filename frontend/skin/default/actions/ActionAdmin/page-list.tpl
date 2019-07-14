{**
 * Список тестов
 *
 *}
<h3>
    Список страниц
</h3>

{block 'page_content'}
    
    <div class="ls-grid-row"> 
        <div class="ls-grid-col ls-grid-col-12"> 
            {component "button" text="Создать" url={router page="admin/plugin/page/add"}}
        </div>
    </div>
    
    <table class="ls-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Создано</th>
                <th class="ls-table-cell-actions">Действие</th>
            </tr>
        </thead>
        <tbody>
            {if !count($aPages)}
                <tr>
                    <td colspan="4">{component "blankslate" title="Пусто"}</td>
                </tr>
            {/if}

            {foreach $aPages as $oPage}
                
                <tr data-id="{$oPage->getId()}">
                    <td>{$oPage->getId()}</td>
                    <td>
                        <a href="{router page="{Config::Get('plugin.page.action')}/{$oPage->getUrl()}"}">{$oPage->getTitle()}</a>
                        
                    </td>
                    <td>
                        {($oPage->category->getCategory())?$oPage->category->getCategory()->getTitle():'-'}
                    </td>
                    <td>
                        {$oPage->getDateCreate()}
                    </td>
                    
                    <td class="ls-table-cell-actions">
                        <a href="{router page="admin/plugin/page/edit/{$oPage->getId()}"}" class="fa fa-edit" title="{$aLang.plugin.admin.edit}"></a>
                        <a href="{router page="admin/plugin/page/remove/{$oPage->getId()}"}?security_ls_key={$LIVESTREET_SECURITY_KEY}" class="fa fa-trash-o js-confirm-remove" title="{$aLang.plugin.admin.delete}"></a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
     
    
{/block}

 