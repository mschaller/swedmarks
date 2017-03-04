{foreach from=$rows item=row}
<div class="bookmarkItem">
    <div class="bookmarkName">
        <a href="{$row.url}" target="_blank">{$row.title}</a>
    </div>
    <div class="bookmarkUrl">{$row.url}</div>
    <div class="bookmarkDescription">{$row.description}</div>
    <div class="boomkarkEditButton">
        <a href="javascript:editBookmark({$row.id});">edit</a>
    </div>
    <div class="boomkarkDeleteButton">
        <a href="javascript:deleteBookmark({$row.id});">delete</a>
    </div>
</div>
{foreachelse}
<div>
    n&uuml;schts...
</div>
{/foreach}

