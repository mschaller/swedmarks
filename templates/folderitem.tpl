<ul>
    {foreach from=$rows item=row}
        {if $row.childof eq $parent}
            <li><span id="{$row.id}" class="folderItem">{$row.name}</span>
                {include 'folderitem.tpl' parent=$row.id rows=$rows}
            </li>
        {/if}
    {foreachelse}

    {/foreach}
</ul>
 
