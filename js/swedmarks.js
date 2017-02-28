function attachEvent(element, type, handler) {
    if (element.addEventListener)
        element.addEventListener(type, handler, false);
    else 
        element.attachEvent("on"+type, handler);
}

function detachEvent(element, type, handler) {
    if (element.removeEventListener)
        element.removeEventListener(type, handler);
    else
        element.detachEvent("on"+type, handler);
}



function loadJSON(url, callback) {
    var xobj = new XMLHttpRequest();
        xobj.overrideMimeType("application/json");
    xobj.open('GET', url, true);
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
          }
    };
    xobj.send(null);  
}

function buildBookmarks(response) {
    var navFolder = document.getElementById("navBookmarks");
    navFolder.innerHTML = response;
}

function updateBookmarksEvent(e) {
    updateBookmarks(e.target.id);
}

function updateBookmarks(id) {
    loadJSON("getLinks.php?parent=" + id, buildBookmarks);
}

function buildFolderTree(response) {
    var listFolder = document.getElementById("listFolder");
    if(listFolder != null) {
        detachEvent(listFolder, "click", updateBookmarksEvent);
    }

    var navFolder = document.getElementById("navFolder");
    navFolder.innerHTML = response;

    listFolder = document.getElementById("listFolder");
    attachEvent(listFolder, "click", updateBookmarksEvent);
}

function updateFolderTree() {
    loadJSON("getFolder.php", buildFolderTree);
}
