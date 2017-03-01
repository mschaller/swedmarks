<div>
    <h2 class="title">New Folder</h2>
    <form action="editFolder.php?action={$action}" id="fnew" method="POST">
        <p><input type=text name="foldername" size="50" value="{$foldertitle}"></p>
        <input type="hidden" name="folder" value="{$folderid}">
        <input type="submit" value=" OK " name="submit">
        <input type="button" value=" Cancel " onClick="self.close()">
    </form>
    <script>
        this.focus();
        document.getElementById('fnew').foldername.focus();
    </script>
</div>
