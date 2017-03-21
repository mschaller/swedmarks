<ul id="listFolder">
    <li> 
        <span id="f0" class="folderItem activeFolder">Uncategorized</span>
    </li>
    {foreach from=$rows item=row}
        {if $row.childof eq 0}
        <li><span id="f{$row.id}" class="folderItem">{$row.name}</span>
            {include 'folderitem.tpl' parent=$row.id rows=$rows}
        </li>
        {/if}
    {foreachelse}

    {/foreach}
</ul>

