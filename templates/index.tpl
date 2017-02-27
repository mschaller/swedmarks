<html>
    <head>
        <title>Test</title>
        <link rel="icon" href="assets/batman.ico">
        <link rel="stylesheet" href="css/swedmarks.css">
    </head>
    <body>
        <div id="navFolder">
            <ul id="listMainFolder">
                <li id="0">
                    Uncategorized
                    <div id="listFolder"></div>
                </li>
            </ul></div>
        <div id="navBookmarks"></div>


        <script type="text/javascript" src="swedmarks.js"></script>
        <script type="text/javascript">
            function AttachEvent(element, type, handler) {
                if (element.addEventListener) element.addEventListener(type, handler, false);
                else element.attachEvent("on"+type, handler);
            }
            function init() {
                var listFolder = document.getElementById("listMainFolder");
                AttachEvent(listFolder, "click", updateBookmarksEvent);                

                updateFolderTree();
                updateBookmarks(0);
            }
            init();
        </script>
    </body>
</html>
