<ul id="listFolder">
    <li> 
        <span id="0" class="activeFolder">Uncategorized</span>
    </li>
    {foreach from=$rows item=row}
        {if $row.childof eq 0}
        <li><span id="{$row.id}">{$row.name}</span>
            {include 'folderitem.tpl' parent=$row.id rows=$rows}
        </li>
        {/if}
    {foreachelse}

    {/foreach}
</ul>

