<ul>
    {foreach from=$rows item=row}
        {if $row.childof eq $parent}
            <li id="{$row.id}">{$row.name}
                {include 'folderitem.tpl' parent=$row.id rows=$rows}
            </li>
        {/if}
    {foreachelse}

    {/foreach}
</ul>
 
