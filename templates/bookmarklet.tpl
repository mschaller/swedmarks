<a href="javascript:(function() {ldelim} 
if (!($ = window.jQuery)) {ldelim}  
    script = document.createElement( 'script' );
    script.src = '{$baseuri}/js/jquery.min.js'; 
    script.onload=_jq_done;
    document.body.appendChild(script);
{rdelim}
else {ldelim}
    _jq_done();
{rdelim}

function _jq_done() {ldelim}
    var uiCode = document.createElement('script'); 
    uiCode.src = '{$baseuri}/js/jquery.blockUI.min.js';
    uiCode.onload=_ui_done;
    document.body.appendChild(uiCode); 
{rdelim}

function _ui_done() {ldelim}
    var uiCode = document.createElement('script'); 
    uiCode.src = '{$baseuri}/js/bookmarklet.js';
    uiCode.onload=_ui_settoken;
    document.body.appendChild(uiCode); 
{rdelim}

function _ui_settoken() {ldelim}
    var token = document.getElementById('swedmarksformtoken');
    token.setAttribute('value', '{$token}');
{rdelim}
{rdelim})();">S.W.E.D.it!</a>
