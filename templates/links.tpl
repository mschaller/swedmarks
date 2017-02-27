{foreach from=$rows item=row}
<div class="bookmarkItem">
    <div class="bookmarkName">
        <a href="{$row.url}">{$row.title}</a>
    </div>
    <div class="bookmarkUrl">{$row.url}</div>
    <div class="bookmarkDescription">{$row.description}</div>
</div>
{foreachelse}
<div>
    n&uuml;schts...
</div>
{/foreach}

