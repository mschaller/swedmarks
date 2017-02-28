<ul>
    {foreach from=$rows item=row}
        {if $row.childof eq $parent}
            <li><span id="{$row.id}">{$row.name}</span>
                {include 'folderitem.tpl' parent=$row.id rows=$rows}
            </li>
        {/if}
    {foreachelse}

    {/foreach}
</ul>
 
