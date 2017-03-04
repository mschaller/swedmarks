{foreach from=$rows item=row}
<div class="bookmarkItem">
    <div class="bookmarkInfo">
        <div class="bookmarkName">
            <a href="{$row.url}" target="_blank">{$row.title}</a>
        </div>
        <div class="bookmarkUrl">{$row.url}</div>
        <div class="bookmarkDescription">{$row.description}</div>
    </div>
    <div class="bookmarkMenu">
        <ul>
            <li><a href="javascript:editBookmark({$row.id});">edit</a></li>
            <li><a href="javascript:deleteBookmark({$row.id});">delete</a></li>
        </ul>
    </div>
</div>
{foreachelse}
<div>
    n&uuml;schts...
</div>
{/foreach}

