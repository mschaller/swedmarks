var uiCode = document.createElement('div'); 
uiCode.id = 'swedmarks_box';
uiCode.style = 'display:none';
uiCode.innerHTML = "Hello world!";
document.body.appendChild(uiCode); 


$.blockUI({ message: $('#swedmarks_box'), css: { width: '275px' } });
setTimeout($.unblockUI, 2000);  
