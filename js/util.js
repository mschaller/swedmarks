function AJAXPost(myself) {
    var elem   = myself.form.elements;
    var url    = myself.form.action;    
    var params = "";
    var value;

    for (var i = 0; i < elem.length; i++) {
        if (elem[i].tagName == "SELECT") {
            value = elem[i].options[elem[i].selectedIndex].value;
        } else {
            value = elem[i].value;                
        }
        params += elem[i].name + "=" + encodeURIComponent(value) + "&";
    }

    return AJAXRawPost(url, params);
}

function AJAXRawPost(url, data, onload = null) {
    var request = new XMLHttpRequest();
    if(onload!=null) {
        request.addEventListener("load", onload, false);
    }
    request.open('POST', url, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send(data);
}
