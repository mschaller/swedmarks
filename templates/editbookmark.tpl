<div>
    <h2>{$title}</h2>
    <form action="editBookmark.php?action={$action}" id="dataForm" name="bmnew" method="POST">
        <p>Title<br>
        <input type=text name="title" size="50" value="{$bmtitle|default:""}"></p>
        <p>URL<br>
        <input type=text name="url" size="50" value="{$bmurl|default:"http://"}"></p>
        <p>Description<br>
        <textarea name="description" cols="50" rows="8">{$bmdescription}</textarea></p>
        <input type="hidden" name="folder" value="{$bmfolderid}">
        <input type="hidden" name="bookmarkid" value="{$bmid|default:""}">
        <input type="submit" name="submit" value=" OK ">
        <input type="button" value=" Cancel " onClick="self.close()">
    </form>
    <script>
        this.focus();
        document.getElementById('bmnew').title.focus();
    </script>
</div>