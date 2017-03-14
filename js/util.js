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

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { 
        // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("POST",url,false);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", params.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(params);

    return xmlhttp.responseText;
}
