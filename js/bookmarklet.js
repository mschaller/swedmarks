var uiCode = document.createElement('div'); 
uiCode.id = 'swedmarks_box';
uiCode.style = 'display:none';
uiCode.innerHTML = ` 
<h2>S.W.E.D.mark it!</h2>
<form action="https://dev.swednet.de/swedmarks/bookmarklet.php" id="dataForm" name="swedmarks" method="POST">
    <p>Title<br>
    <input type=text name="title" size="50" value="">
    </p>
    <p>URL<br>
    <input type=text name="url" size="50" value="">
    </p>
    <p>Description<br>
    <textarea name="description" cols="50" rows="8"></textarea>
    </p>
    <input type="submit" name="submit" value=" OK ">
    <input type="button" value=" Cancel " onClick="self.close()">
</form>
<script>
    this.focus();
    document.getElementById('dataForm').title.focus();
</script>
`;

document.body.appendChild(uiCode); 

$.blockUI({ message: $('#swedmarks_box'), css: { width: '400px', height: '400px'} });
setTimeout($.unblockUI, 2000);  
