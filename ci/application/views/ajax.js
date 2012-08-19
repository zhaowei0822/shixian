var xmlHttp;
function S_xmlhttprequest()
{
	
	if(window.ActiveXObject)
	{
		
		xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	else if(window.XMLHttpRequest)
	{
		xmlHttp = new XMLHttpRequest();
	}
}


function funphp100(url)
{
	S_xmlhttprequest();
	xmlHttp.open("GET", "/ci/application/views/for.php?id="+url,true);
	xmlHttp.onreadystatechange = byphp;
	xmlHttp.send(null);
}

function byphp()
{
	var byphp100 = xmlHttp.responseText;
	document.getElementById('php100').innerHTML = byphp100;
}
