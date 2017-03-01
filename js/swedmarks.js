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
    if(response == "") {
        window.location.href = "login.php";
    }
    var navFolder = document.getElementById("navBookmarks");
    navFolder.innerHTML = response;
}

function selectFolderItem(item) {
    var list = document.getElementsByClassName("activeFolder");
    for(var i = 0; i < list.length; i++) {
        list[i].removeAttribute("class");
    }

    item.setAttribute("class","activeFolder");
    updateBookmarks(item.id);        
}

function folderItemClicked(e) {
    if(e.target.nodeName != "SPAN")
        return;

    selectFolderItem(e.target);
}

function updateBookmarks(id) {
    loadJSON("getBookmark.php?parent=" + id, buildBookmarks);
}

function buildFolderTree(response) {
    var listFolder = document.getElementById("listFolder");
    if(listFolder != null) {
        detachEvent(listFolder, "click", folderItemClicked);
    }

    if(response == "") {
        window.location.href = "login.php";
    }

    var navFolder = document.getElementById("navFolder");
    navFolder.innerHTML = response;

    listFolder = document.getElementById("listFolder");
    attachEvent(listFolder, "click", folderItemClicked);
}

function updateFolderTree() {
    loadJSON("getFolder.php", buildFolderTree);
}

function newBookmark() {
    var list = document.getElementsByClassName("activeFolder");
    var folderid = 0;
    folderid=list[0].id;

    bookmark_new = window.open("editBookmark.php?action=new&folderid="+folderid, "bookmarknew","toolbar=no,location=no,status=no,scrollbars=yes,resizable=yes,width=500,height=400");
}
