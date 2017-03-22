{foreach from=$rows item=row}
<div id="b{$row.id}" class="bookmarkItem" draggable="true" onmouseenter="bmEnter(this)" onmouseleave="bmLeave(this)">
    <a href="{$row.url}" target="_blank" rel="noreferrer">
        <img class="bookmarkImage"></img>
        <div class="bookmarkTitle">{$row.title}</div>
        <!--div class="bookmarkUrl">{$row.url}</div-->
        <div class="bookmarkDescription" style="opacity: 0.0">{$row.description}</div>
        <div class="bookmarkMenu" style="display: none">
            <a href="javascript:editBookmark({$row.id});"><img src="./assets/pencil.svg"></img></a>
            <a href="javascript:deleteBookmark({$row.id});"><img src="./assets/trashcan.svg"></img></a>
        </div>
    </a>
</div>
{foreachelse}
<div>
    n&uuml;schts...
</div>
{/foreach}

