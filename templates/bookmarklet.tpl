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
    document.body.appendChild(uiCode); 
{rdelim}

{rdelim})();">S.W.E.D.mark it!</a>
