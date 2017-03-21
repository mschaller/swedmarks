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

function removeClass(node, cls) {
    if(node && node.className && node.className.indexOf(cls) >= 0) {
        var pattern = new RegExp('\\s*' + cls + '\\s*');
        node.className = node.className.replace(pattern, ' ');
    }
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

function reloadBookmarks() {
    var list = document.getElementsByClassName("activeFolder");
    updateBookmarks(list[0].id.substr(1));
}

function updateBookmarks(id) {
    loadJSON("getBookmark.php?parent=" + id, buildBookmarks);
}

function buildBookmarks(response) {
    if(response == "") {
        window.location.href = "login.php";
    }
    var navFolder = document.getElementById("navBookmarks");
    navFolder.innerHTML = response;

    var bookmarks = document.querySelectorAll(".bookmarkItem");
    [].forEach.call(bookmarks, function(bm) {
        attachEvent(bm, "dragstart", handleDragBookmarkStart);
        attachEvent(bm, "dragend", handleDragBookmarkEnd);
    });

}

function selectFolderItem(item) {
    var list = document.getElementsByClassName("activeFolder");
    for(var i = 0; i < list.length; i++) {
        list[i].classList.remove("activeFolder");
    }

    item.classList.add("activeFolder");
    updateBookmarks(item.id.substr(1));        
}

function folderItemClicked(e) {
    if(e.target.nodeName != "SPAN")
        return;

    selectFolderItem(e.target);
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

    
    var bookmarks = document.querySelectorAll(".folderItem");
    [].forEach.call(bookmarks, function(bm) {
        attachEvent(bm, "dragenter", handleDragFolderEnter);
        attachEvent(bm, "dragleave", handleDragFolderLeave);
        attachEvent(bm, "dragover", handleDragFolderOver);
        attachEvent(bm, "drop", handleDropOnFolder);
    });
}

function updateFolderTree() {
    loadJSON("getFolder.php", buildFolderTree);
}

function newBookmark() {
    var list = document.getElementsByClassName("activeFolder");
    var folderid = list[0].id.substr(1);

    window.open("editBookmark.php?action=new&folderid="+folderid, "bookmarknew","toolbar=no,location=no,status=no,scrollbars=yes,resizable=yes,width=500,height=400");
}

function editBookmark(id) {
    window.open("editBookmark.php?action=edit&bookmarkid="+id, "bookmarkedit","toolbar=no,location=no,status=no,scrollbars=yes,resizable=yes,width=500,height=400");
}

function editProfile() {
    window.open("editProfile.php?action=edit", "bookmarkedit","toolbar=no,location=no,status=no,scrollbars=yes,resizable=yes,width=500,height=400");
}

function deleteBookmark(id) {
    window.open("editBookmark.php?action=delete&bookmarkid="+id, "bookmarkedelete","toolbar=no,location=no,status=no,scrollbars=yes,resizable=yes,width=500,height=150");
}

function newFolder() {
    var list = document.getElementsByClassName("activeFolder");
    var folderid = list[0].id.substr(1);

    window.open("editFolder.php?action=new&folderid="+folderid, "foldernew","toolbar=no,location=no,status=no,scrollbars=yes,resizable=yes,width=500,height=200");
}

function handleDragBookmarkStart(e) {
    this.style.opacity = '0.4';  // this / e.target is the source node.
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.id.substr(1));
}

function handleDragFolderOver(e) {
  if (e.preventDefault) {
    e.preventDefault(); // Necessary. Allows us to drop.
  }

  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

  return false;
}

function handleDragFolderEnter(e) {
  // this / e.target is the current hover target.
  this.classList.add('over');
}

function handleDragFolderLeave(e) {
  this.classList.remove('over');  // this / e.target is previous target element.
}


function handleDropOnFolder(e) {
  // this / e.target is current target element.

  if (e.stopPropagation) {
    e.stopPropagation(); // stops the browser from redirecting.
  }

  // See the section on the DataTransfer object.
  //alert(e.target.id);
  e.target.classList.remove("over");
  alert(e.dataTransfer.getData('text/html'));
  return false;
}

function handleDragBookmarkEnd(e) {
  // this/e.target is the source node.
  this.style.opacity = '1.0';  // this / e.target is the source node.
}

