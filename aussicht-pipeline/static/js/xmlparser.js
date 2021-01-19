var xmlDoc;
var docname = "anchor_podcast_rss.xml";

function loadXMLDoc(){

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			myFunction(this);
		}
	};

	xmlhttp.open("GET", docname, true);
	xmlhttp.send();
}

function myFunction(xml) {
	var x, xmlDoc, txt;
	xmlDoc = xml.responseXML;
	txt = "";
	x = xmlDoc.getElementsByTagName("title");
	for (i = 0; i< x.length; i++) {
		txt += x[i].childNodes[0].nodeValue + "<br>";
	}
	document.getElementsByClassNames("container").innerHTML = txt;
}