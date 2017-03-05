<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/swedmarks.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div>
    <h2><img src="assets/person.svg" class="icon24"/>{$user}'s profile</h2>
    <div>
        <h3>User data</h3>
        <form action="editProfile.php?action={$action}" id="dataForm" name="profile" method="POST">
        </form>
    </div>
    <div>
        <h3>Bookmarklet</h3>
<p> <a class="bookmarklet" title="Ziehe diesen Link in deine Bookmarks!" href="javascript:void((function(){ldelim}var%20e=document.createElement('script');e.src='{$baseuri}/js/bookmarklet.js';document.body.appendChild(e);{rdelim})());"> <img src="assets/batman.ico" class="bookmarklet-icon">S.W.E.D.mark it!</a> &nbsp;« Add this shortcut to your toolbar! </p>
        <div>
    </div>


</div>
</body>
</html>
