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
        <form action="editProfile.php?action=edit" id="dataForm" name="profiledata" method="POST">
        </form>
    </div>
    <div>
        <h3>Change password</h3>
        <form action="editProfile.php?action=changepw" id="dataForm" name="profilepassword" method="POST">
            <span style="display: inline-block; width: 120px;"><label for="password">Old password</label></span>
            <span><input id="password0" name="password0" type="password"/></span><br/>
            <span style="display: inline-block; width: 120px;"><label for="password">New Password</label></span>
            <span><input id="password1" name="password1" type="password"/></span><br/>
            <span style="display: inline-block; width: 120px;"><label for="password">Repeat it</label></span>
            <span><input id="password2" name="password2" type="password"/></span><br/>
            <div><input type="button" value="change password" name="submit" onclick="javascript:AJAXPost(this)"/></div>
        </form>
    </div>

    <div>
        <h3>Bookmarklet</h3>
        <div>
            {include 'bookmarklet.tpl' baseuri=$baseuri token=$token}
        </div>
    </div>
    <script type="text/javascript" src="js/util.js"></script>
</div>
</body>
</html>
