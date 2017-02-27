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

function folderTreeElement(data, parent, depth) {
    var index, len;
    var result = "";
    var count = 0;
    for(index = 0, len = data.length; index < len; index++) {
        if(data[index].childof != parent)
            continue;

        result += "<li id=\"" + data[index].id + "\">"
                    + data[index].name
                    ;
        
        result +=folderTreeElement(data, data[index].id, depth+1) + "</li>";
    }

    if(result.len == 0) {
        return "";
    }
    return "<ul>" + result + "</ul>";
}

function toggleCheckbox(element)
{
    alert(element);
    element.checked = !element.checked;
}


function updateFolderTree() {
    loadJSON("getFolder.php", buildFolderTree);
}

function buildFolderTree(response) {
var data = JSON.parse(response);

    var navFolder = document.getElementById("listFolder");
    navFolder.innerHTML = "";
    navFolder.innerHTML = folderTreeElement(data,0, 0);
}
