// JavaScript Document
var kazaaTime=false;

$(function() {
		$( "#diskUsage" ).progressbar({
			value: 0
		});
	});
	$(function() {
		$( "#memUsage" ).progressbar({
			value: 0
		});
	});
	$(function() {
		$( "#uploadStats" ).progressbar({
			value: 0
		});
	});
	$(function() {
		$( "#downloadStats" ).progressbar({
			value: 0
		});
	});
	
function startUpload() {
	document.getElementById("upload_process").innerHTML = "Status: <font color=\"yellow\">Uploading...</font>";
	return true;
}
function stopUpload(success){
	if(success) {
	document.getElementById("upload_process").innerHTML = "Status: <font color=\"green\">Upload Done!</font>";
	}else{
		document.getElementById("upload_process").innerHTML = "Status: <font color=\"red\">Upload Failed! :(</font>";
	}
	return true;
}
function closeUpload() {
	document.getElementById("upload").style.visibility="hidden";
}
function openUpload() {
	document.getElementById("upload").style.visibility="visible";
}
function updateStats() {
	var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    updateStatsDiv(xmlhttp.responseText);
    }
  }
xmlhttp.open("GET","remote.php?a=stats",true);
xmlhttp.send();
}
function updateTrents() {
	var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    updateTrentsDiv(xmlhttp.responseText);
    }
  }
xmlhttp.open("GET","remote.php?a=list",true);
xmlhttp.send();
}
function updateTrentsDiv(text) {
	pos = 95;
	var torrents = text.split("\n");
	for(i=0;i<torrents.length;i++) {
		if(torrents[i].length>5) {
		var torrent = torrents[i].split("~");
		tDiv = document.getElementById(torrent[0]);
		if(tDiv == null) {
			nDiv = document.createElement("div");
			nDiv.id = torrent[0];
			nDiv.style.top=pos+"px";
			nDiv.className="download";
			document.body.appendChild(nDiv);
		}
		tDiv = document.getElementById(torrent[0]);
		tDiv.style.top=pos+"px";
		var status = "Downloading";
		if(torrent[8]==1) {
			status = "Seeding";
		}
		if(torrent[9]==1) {
			status = "Hashing";
		}
		percentDone = (torrent[4]/torrent[3])*100;
		tDiv.innerHTML=torrent[1]+" - <font color=\"#9A2C9A\">"+status+"</font><br/><div class=\"downloadProgressLabel\">Download Progress:</div><div id=\""+torrent[0]+"Perc\" class=\"downloadProgressBar\"></div><div id=\""+torrent[0]+"Text\" class=\"downloadProgressText\">"+Math.round((torrent[4]/Math.pow(10,6))*10)/10+" MB / "+Math.round((torrent[3]/Math.pow(10,6))*10)/10+" MB - "+Math.round(percentDone)+"%</div><div class=\"uploadRateImage\"><img src=\"images/uploadIcon.png\" width=\"24\" height=\"24\" title=\"Upload Rate\" /></div><div class=\"downloadRateImage\"><img src=\"images/downloadIcon.png\" width=\"24\" height=\"24\" title=\"Download Rate\" /></div><div class=\"downloadRate\">"+Math.round(torrent[6]/Math.pow(10,3))+" Kbps</div><div class=\"uploadRate\">"+Math.round(torrent[7]/Math.pow(10,3))+" Kbps</div><div class=\"uploadedTotal\"><font color=\"#666666\">Total Uploaded:</font> <font color=\"#9A2C9A\">"+Math.round((torrent[5]/Math.pow(10,6))*10)/10+" MB</font></div><div class=\"torrentDelete\"><img src=\"images/delete-icon.png\" width=\"75\" height=\"75\" title=\"Delete Torrent\" onclick=\"removeTorrent('"+torrent[0]+"')\"/> </div>";
		$( "#"+torrent[0]+"Perc" ).progressbar({
			value: percentDone
		});
		if(status=="Downloading") {
			etaST = Math.round((torrent[3]-torrent[4])/torrent[6]);
			if(kazaaTime) {
				kTime = Math.random();
				if(kTime>0.5) {
				kTime = Math.random()*50;
				}else{
					kTime=kTime/10;
				}
				etaST = Math.round(etaST*kTime);
			}
			etaStr = "";
			if(etaST>86400) {
				etaD = Math.floor(etaST/86400);
				etaST = etaST - (etaD*86400);
				etaStr = etaD+" D, ";
			}
			if(etaST>3600) {
				etaH = Math.floor(etaST/3600);
				etaST = etaST - (etaH*3600);
				etaStr = etaStr+etaH+" H, ";
			}
			if(etaST>60) {
				etaM = Math.floor(etaST/60);
				etaST = etaST - (etaM*60);
				etaStr = etaStr+etaM+" M, ";
			}
			etaStr = etaStr+etaST+" S ";
			tDiv.innerHTML=tDiv.innerHTML+"<div class=\"ETA\"><font color=\"#666666\">ETA:</font><font color=\"#9A2C9A\"> "+etaStr+"</font></div>";
		}
		pos+=100;
	}
	}
}
function updateStatsDiv(text) {
	var parts = text.split("~");
	//Hopefully got that right...
	if(parts[0]=="RS") {
		document.getElementById("memUsageText").innerHTML=Math.round(parts[2]/Math.pow(10,6))+" MB /"+Math.round(parts[1]/Math.pow(10,6))+" MB";
		document.getElementById("downloadStatsText").innerHTML=Math.round(parts[5]/Math.pow(10,3))+" Kbps /"+Math.round(parts[3]/Math.pow(10,3))+" Kbps";
		document.getElementById("uploadStatsText").innerHTML=Math.round(parts[6]/Math.pow(10,3))+" Kbps /"+Math.round(parts[4]/Math.pow(10,3))+" Kbps";
		document.getElementById("diskUsageText").innerHTML=(Math.round((parts[7]/Math.pow(10,3))*10)/10)+" GB /"+(Math.round((parts[8]/Math.pow(10,3))*10)/10)+" GB";
		var du = (parts[7]/parts[8])*100;
		var mu = (Math.round(parts[2]/Math.pow(10,6))/Math.round(parts[1]/Math.pow(10,6)))*100;
		
		var us = (parts[6]/parts[4])*100;
		var ds = (parts[5]/parts[3])*100;
		$( "#diskUsage" ).progressbar({
			value: du
		});
		$( "#memUsage" ).progressbar({
			value: mu
		});
		$( "#downloadStats" ).progressbar({
			value: ds
		});
		$( "#uploadStats" ).progressbar({
			value: us
		});
	}
}
function removeTorrent(str) {
	var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		document.getElementById(str).innerHTML="";
    	document.getElementById(str)=null;
    }
  }
xmlhttp.open("GET","remote.php?a=remove&id="+str,true);
xmlhttp.send();
}
function update() {
	updateTrents();
	updateStats();
}
update();
var updateInterval = window.setInterval(update, 5000);