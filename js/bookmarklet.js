var uiCode = document.createElement('div'); 
uiCode.id = 'swedmarks_box';
uiCode.style = 'display:none';
uiCode.innerHTML = ` 
<h2>S.W.E.D.mark it!</h2>
<form action="https://dev.swednet.de/swedmarks/bookmarklet.php" id="dataForm" name="swedmarks" method="POST">
    <p>Title<br>
    <input id="swedmarksformtitle" type=text name="title" size="50" value="">
    </p>
    <p>URL<br>
    <input id="swedmarksformurl" type=text name="url" size="50" value="">
    </p>
    <p>Description<br>
    <textarea name="description" cols="50" rows="8"></textarea>
    </p>
    <input id="swedmarksformtoken" type="hidden" name="token" value="">
    <input type="submit" name="submit" value=" OK ">
    <input id="swedmarksformcancel" type="button" value=" Cancel ">
</form>
<script>
    this.focus();
    document.getElementById('dataForm').title.focus();
</script>
`;

document.body.appendChild(uiCode); 
$('#swedmarksformtitle').val(document.title);
$('#swedmarksformurl').val(document.URL);


$.blockUI({ message: $('#swedmarks_box'), css: { width: '400px', height: '400px'} });
//setTimeout($.unblockUI, 2000);  

$('#swedmarksformcancel').click(function() { 
    $.unblockUI();
}); 


