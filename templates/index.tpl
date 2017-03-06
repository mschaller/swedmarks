<html>
    <head>
        <title>S.W.E.D.marks</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="icon" href="assets/batman.ico">
        <link rel="stylesheet" href="css/swedmarks.css">
    </head>
    <body>
        <div id="navHeader">{include 'header.tpl'}</div>
        <div id="navFolder"></div>
        <div id="navBookmarks"></div>
        <script type="text/javascript" src="js/swedmarks.js"></script>
        <script type="text/javascript">
            function init() {
                updateFolderTree();
                updateBookmarks(0);
            }
            init();
        </script>
    </body>
</html>
