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
        <div>
            {include 'bookmarklet.tpl' baseuri=$baseuri}
        </div>
    </div>


</div>
</body>
</html>
