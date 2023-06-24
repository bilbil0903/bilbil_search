//writed by bilbil on 2022/12/4
function OnInput (event) {
                    var xhr = null;
                    try{
                        xhr = new XMLHttpRequest();
                    }catch(error){
                        xhr = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xhr.open("get", "key.php?word="+event.target.value, true);
                    xhr.send();
                    xhr.onreadystatechange = function(){
                        if(xhr.readyState == 4){
                            if(xhr.status == 200){
							data=xhr.responseText;
                                //alert(data);
								data=eval(data);
								tempArr=[];
		var pt = document.getElementById('input');
    if (pt.value=='') {
		
      if (my$("dv")) {
        my$("box").removeChild(my$("dv"));
		document.getElementById("ulanma").style.display="block";
      }
      return;
    }
		   for(var i=0;i<data.length; i++){
             tempArr.push(data[i].title.replaceAll("<em>","").replaceAll("</em>",""));
								}
			  if(my$("dv")){
      my$("box").removeChild(my$("dv"));
	  
    }
	
    var dvObj = document.createElement("div");
    my$("box").appendChild(dvObj);
    dvObj.id = "dv";
    dvObj.style.width = "100%";
    //dvObj.style.border = "1px solid green";
	if(tempArr.length>0){
		document.getElementById("ulanma").style.display="none";
	}
    for (var i = 0; i < tempArr.length; i++) {
      var pObj = document.createElement("p");
      dvObj.appendChild(pObj);
      setInnerText(pObj, tempArr[i]);
      pObj.style.margin = 0;
      pObj.style.padding = 0;
      pObj.style.cursor = "pointer";
      pObj.style.marginTop = "2px";
	  pObj.style.paddingTop = "2px";
	    pObj.style.paddingBottom = "2px";
      pObj.style.marginLeft = "5px";
	  pObj.style.borderBottom = "1px solid #b8c2cc";
      pObj.onmouseover = function () {
        this.style.backgroundColor = "#767272";
		this.style.color="#ffffff";
      };
      pObj.onmouseout = function () {
        this.style.backgroundColor = "";
		this.style.color="#000000";
      };
	  pObj.onmouseup = function () {
	    document.getElementsByTagName("input")[0].value=this.innerText
		 dvObj.style.display="none";
		 document.getElementsByTagName("button")[0].click();
      };
	  var body = document.getElementById("c");  
    body.onclick =function(){  
		 dvObj.style.display="none";
		  document.getElementById("ulanma").style.display="block";
    }; 
    }
	
                            }else{
                                //alert("Error:" + xhr.status);
                            }
                        }
              }
	}