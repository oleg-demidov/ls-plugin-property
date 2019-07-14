<h3>Добавить/редактировать страницу</h3>


<form method="POST" action="{Router::GetPathWebCurrent() }"> 
    
    {component "bs-form.text"
        name = 'page[title]'
        label = "Заголовок:"
        value   = $oPage->getTitle()
    }
    
    {component "bs-form.text" 
        value   = $oPage->getUrl()
        name    = 'page[url]' 
        label   = 'Url:'}
        
    {component "tinymce" name="page[source]" label="Текст:" value   = $oPage->getContentOne('source')}
    
    {capture name="meta"}
        {component "bs-form.textarea"
            name    = 'page[description]'
            label   = "Meta Description:"
            value   = $oPage->getDescription()
        }
        {component "bs-form.textarea"
            name    = 'page[keywords]'
            label   = "Meta Keywords:"
            value   = $oPage->getKeywords()
        }
    {/capture}
    
    {capture name="category"}
        {insert name='block' block='fieldCategory' params=[ 'target' => $oPage, 'entity' => 'PluginProperty_ModulePage_EntityPage' ]}
    {/capture}
    
    {component 'bs-collapse.accordion'
        classes = "mb-3"
        items=[
            [   
                text => 'SEO',
                content => $smarty.capture.meta
            ],
            [
                text => 'Категория',
                content => $smarty.capture.category
            ]
        ]}
  
    
    {component "bs-button" type="submit" text=$aLang.common.save bmods="success"}
</form>
