String.prototype.trim=trim;
//將前後空白去掉
function trim() {
  return this.replace(/^[\s]+|[\s]+$/g,"");
}




	 var wa_LogingImg = undefined;
	 var wa_alpha = 70;
	 var wa_background = " #ffffff"; 

	
var MaskV2 = function() {
	this.loginImage = "/images/login/loadingAnimation.gif";
	//中間部份
	this.d = undefined;
	//mask
	this.el = undefined;

	
	this.inited = false;
	
	//初始化
	this.initializeElement = function()
	{


		wa_LogingImg = new Image();
		wa_LogingImg.src = this.loginImage;
		
		var doc = document.getElementsByTagName("body")[0];
		
		var maskDiv = document.createElement("Div");
		maskDiv.setAttribute("id","wa_maskDiv");
		maskDiv.setAttribute("class","mask");
		
		var loginDiv = document.createElement("Div");
		loginDiv.setAttribute("id","wa_loginDiv");
		loginDiv.setAttribute("style","display:none;");
		loginDiv.setAttribute("class","loginDiv");

		
		doc.appendChild(loginDiv);
		doc.appendChild(maskDiv);
		
		this.d = loginDiv;
		
		this.el = maskDiv;	
		this.el.obj = this;
		this.el.onclick = function(){
			this.obj.hidelogin(this.obj);
		}
		this.inited = true;
			
	};
	this.hide = function()
	{
		this.hidelogin();
	};
	this.hidelogin = function(obj)
	{
		if(obj==undefined || obj == null)
		{
			obj = this;
		}
		obj.d.update("");
		obj.d.hide();
		obj.el.hide();
	};
	this.show = function()
	{
		if(!this.inited)
			this.initializeElement();
		this.d.update(wa_LogingImg);
		this.showlogin(this.obj);
	};	
   this.getWindowSize =  function() {
   
   var de = document.documentElement;
	var w = window.innerWidth || self.innerWidth || (de&&de.clientWidth) || document.body.clientWidth;
	var h = window.innerHeight || self.innerHeight || (de&&de.clientHeight) || document.body.clientHeight;
	arrayPageSize = [w,h];
	
	return arrayPageSize;
	
    };
    this.showloginWH = function(width,height,obj)
    {
	
		if(obj==undefined || obj == null)
		{
			obj = this;
		}
      var size = obj.getWindowSize();
	  //if(this.d.style.display=="none")
	  
      var maskHeight = Math.max(document.documentElement.scrollHeight , size[1]);
	  //var maskWidth =Math.max(document.documentElement.scrollWidth ,size[0] );
	  //obj.el.setAttribute("class","mask");
      obj.el.style.height = "100%";//maskHeight + "px";
	  //if(obj.el.style.display=="none")
	  {
	  if(!window.XMLHttpRequest && window.ActiveXObject)//fixed ie6
	  {
		obj.el.style.position="absolute"; 
	  }
	  else
	  {
		  obj.el.style.position="fixed"; 
	  }
		  obj.el.style.left= "0";  
		  obj.el.style.top= "0";
		  //filter: 'alpha(opacity=80)';*filter: alpha(opacity=80);opacity: 0.8;background: #000000; display:none;
		  obj.el.style.zIndex = 90;
		  obj.el.style.width =  "100%";
		  
		  obj.el.style.display="block";
		  obj.el.style.filter = "alpha(opacity="+wa_alpha+")";//ie6用的
		  obj.el.style.background = wa_background;
	  }
	  if(!window.XMLHttpRequest && window.ActiveXObject)//ie6,前面已做過處理
	  {
		obj.d.style.position = "absolute";
	  }
	  else
	  {
		obj.d.style.position = "fixed";
	  }
	  obj.d.style.zIndex = 100;
      obj.d.style.left = (size[0] - width) / 2  +"px";
      obj.d.style.top = (size[1] -height) / 2   + "px";
	  obj.d.style.display="block";
	  
	  
    };
	this.showlogin = function(obj)
    {
	
		if(obj==undefined || obj == null)
		{
			obj = this;
		}
		
		obj.showloginWH(250,130,obj);
    };

	}


