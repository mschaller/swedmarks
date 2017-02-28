<ul id="listFolder">
    <li id="0">Uncategorized</li>
    {foreach from=$rows item=row}
        {if $row.childof eq 0}
        <li id="{$row.id}">{$row.name}
            {include 'folderitem.tpl' parent=$row.id rows=$rows}
        </li>
        {/if}
    {foreachelse}

    {/foreach}
</ul>

