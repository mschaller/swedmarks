{foreach from=$rows item=row}
<div class="bookmarkItem">
    <div class="bookmarkInfo">
        <div class="bookmarkInfoLeft">
            <img src="assets/star.svg" class="opticon"/>
        </div>
        <div class="bookmarkInfoMain">
            <div class="bookmarkName">
                <a href="{$row.url}" target="_blank">{$row.title}</a>
            </div>
            <div class="bookmarkUrl">{$row.url}</div>
            <div class="bookmarkDescription">{$row.description}</div>
        </div>
    </div>
    <div class="bookmarkMenu">
        <ul>
            <li><a href="javascript:editBookmark({$row.id});">
            <img src="assets/pencil.svg"/>
            </a></li>
            <li><a href="javascript:deleteBookmark({$row.id});">
            <img src="assets/trashcan.svg"/>
            </a></li>
        </ul>
    </div>
</div>
{foreachelse}
<div>
    n&uuml;schts...
</div>
{/foreach}

