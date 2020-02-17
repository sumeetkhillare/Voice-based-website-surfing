<?php
/*
Plugin Name: WebAuto
*/
add_action( 'wp_head', 'my_header_scripts' );
function my_header_scripts(){
  ?>

  <script>
  var flg=0;
  var key;
  var zoom=1;
  var f="s";
  	{console.log(f);
  		var sp = new SpeechSynthesisUtterance();
  		sp.rate = 1;
  		sp.pitch = 0.5;
  		console.log("you hit enter");
  		var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
  		recognition.lang = 'en-US';
  		recognition.interimResults = false;
  		recognition.maxAlternatives = 2;
  		//recognition.continuous=true;
  		//recognition.interimResults = true;

  		recognition.start();

  		recognition.onresult = function(event)
  		{

  			key=event.results[0][0].transcript;
  			console.log(key);

  			//key=key.replace("john ","");
  			//key=key.replace("John ","");
  			//recognition.stop();

  			if(key.includes("scroll up"))//Scroll up
  			{

  							key1=event.results[0][0].transcript;
  							console.log(key1);

  				console.log("scroll up case");
  				window.scrollBy(0,-500);
  				sp.text="Scrolled up";
  				window.speechSynthesis.speak(sp);
  			}
  			if(key.includes("scroll down"))//Scroll down
  			{
  				console.log("scroll down case");
  				window.scrollBy(0,500);
  				sp.text="Scrolled down";
  				window.speechSynthesis.speak(sp);

  			}
  			else if(key.includes("screenshot"))//Screenshot
  			{
  				//
  			}
  			else if(key.includes("zoom") && key.includes("in"))//Zoom in
  			{
  				zoom=zoom+0.1;
  				document.body.style.zoom=zoom;
  				sp.text="Zoomed in";
  				window.speechSynthesis.speak(sp);
  			}
  			else if(key.includes("zoom out"))//Zoom out
  			{
  				zoom=zoom-0.1;
  				document.body.style.zoom=zoom;
  				sp.text="Zoomed out";
  				window.speechSynthesis.speak(sp);
  			}
  			else if(key.includes("back"))//back
  			{
  				console.log("back");
  				history.go(-1);
  				sp.text="Redirected back";
  				window.speechSynthesis.speak(sp);
  			}
  			else if(key.includes("head"))//head para
  			{
  				console.log("read head");
  				var a=document.querySelectorAll("p");
  				console.log(a);
  				var i;
  				for(i=0;i<a.length;i++)
  				{
  					var b=a[i].innerText;
  					console.log(b);
  					sp.text=b;
  					window.speechSynthesis.speak(sp);
  					sp="";
  				}/*
  				sp.text=a.innerHTML;
  				window.speechSynthesis.speak(sp);*/
  			}
  			else if(key.includes("read selected"))//read selected
  			{
  				sp.text=getSelectedText();
  				window.speechSynthesis.speak(sp);
  			}
  			else if(key.includes("bottom"))//bottom
  			{
  				window.scrollTo(0,document.body.scrollHeight);
  			}
  			else if(key.includes("focus ")||key.includes("Focus "))//focussing clients form
  			{

  				key=key.replace("focus ","");
  				key=key.replace("Focus ","");
  				const cname = key.charAt(0).toUpperCase() + key.slice(1)
  				console.log(cname);
  				if(cname.toString()==="Name")
  				f=document.getElementById("id-1");
  				else if(cname.toString()==="Email")
  				f=document.getElementById("id-2");
  				else if(cname.toString()==="Phone")
  				f=document.getElementById("id-3");
  				else if(cname.toString()==="Details")
  				f=document.getElementById("id-4");
  				sp.text="Focused "+key;
  				window.speechSynthesis.speak(sp);

  			}
  			else if(key.includes("type "))//typing in clients form
  			{
  				console.log(f);
  				if(f!="s"){
  				console.log(f);
  				key=key.replace("type ","");
  				console.log(key);
  				f.value+=key;
  				console.log(f);
  				sp.text="Typed Successfully";
          f.value="s";
  				window.speechSynthesis.speak(sp);
  								}
  			}
  			else if(key.includes("search"))//search button client side
  			{
  				var s=document.getElementsByClassName("seoicon-loupe")[0];
  				s.click();
  				var t=document.getElementById("search-drop-input");
  				console.log(t);
  				t.click();
  				sp.text="Enter text";
  				window.speechSynthesis.speak(sp);
  			}
  			else if(key.includes("menu"))//menu button client side
  			{
  				var s=document.getElementById("menu-icon-trigger");
  				s.click();
  				sp.text="Selected menu";
  				window.speechSynthesis.speak(sp);
  			}
  			else if(key.includes("click "))//click button
  			{
  				key=key.replace("click ","");
  				console.log(key);
  				console.log(document.getElementsByClassName("btn-hover-shadow btn btn-medium btn--primary ")[0]);
  				var b=document.getElementsByClassName("btn-hover-shadow btn btn-medium btn--primary ")[0];
  				b.click();
  				sp.text="Clicked "+key;
  				window.speechSynthesis.speak(sp);
  			}
  			else if(key.includes("all"))
  			{
  				var markup = document.getElementsByTagName("body").innerHTML;
  				console.log(markup); // Live NodeList of your anchor elements
  			}
  			else if(key.includes("play "))
  			{
  				var t=document.getElementsByTagName("title")[0];
  				var p=document.getElementsByClassName("amazingcarousel-hover");
  				key=key.replace("play ","");
  				if(key=="first")
  				{
  					console.log(p[0]);
  					p[0].click();
  				}
  				else if(key=="second")
  				{
  					console.log(p[1]);
  					p[1].click();
  				}
  				else if(key=="third")
  				{
  					console.log(p[2]);
  					p[2].click();
  				}
  				else if(key=="fourth")
  				{
  					console.log(p[3]);
  					p[3].click();
  				}
  			}
  			else if(key.includes("open "))//Redirect in same tab
  			{
  				key=key.replace("open ","");
  				console.log(key);


  								var size=document.links.length;

  								console.log(key.toString().toLowerCase());
  								//iterated for links and redirected to result
  								for(var i=0;i<size;i++)
  								{

  								//	console.log(document.links[i].text+"   "+document.links[i]);
  									if(key.toString().toLowerCase()===document.links[i].text.toString().toLowerCase())
  									{

  										window.open(document.links[i],"_self");
  										sp.text="Redirected to "+key;
  										window.speechSynthesis.speak(sp);
  										break;
  									}


  								}

  			}
  			else if(key.includes("new "))//Redirect in new tab
  			{
  				console.log("hii")
  				key=key.replace("new ","");
  				console.log(key);
  				var size=document.links.length;
  				for(var i=0;i<size;i++)
  				{
  					if(key.toString().toLowerCase()===document.links[i].text.toString().toLowerCase())
  					{

  						window.open(document.links[i]);
  						sp.text="Redirected to "+key;
  						window.speechSynthesis.speak(sp);
  						break;
  					}


  				}
  				recognition.onend=function(){}
  			}
  			else if(key.includes("get "))
  			{
  				var p=document.getElementsByClassName("indicator");
  				key=key.replace("get ","");
  				console.log(key);
  				console.log(p);
  				switch (key.toString().toLowerCase())
  				{
  					case "about":
  												console.log(p[0]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[0];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;
  					case "digital marketing":
  												console.log(p[1]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[1];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;
  					case "it services":
  												console.log(p[2]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[2];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;
  					case "social media marketing":
  												console.log(p[3]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[3];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;
  					case "google adwords":
  												console.log(p[4]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[4];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;
  					case "telemarketing":
  												console.log(p[5]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[5];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;
  					case "industries":
  												console.log(p[6]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[6];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;
  					case "services":
  												console.log(p[7]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[7];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;
  					case "workshop":
  												console.log(p[8]);
  												var x=document.getElementsByClassName("sub-menu sub-menu-right")[8];
  												x.style.display =x.style.display== "none" ? "block" : "none";
  												p="";
  											  break;

  					default:
  												sp.text="No Dropdowns";
  												window.speechSynthesis.speak(sp);

  					}


  				}

  			else{console.log("Please give a valid command");}




  		};

  recognition.onend=function(){
  	recognition.start();
  }
  }



  function getSelectedText()
  {
      var text = "";
  	if (window.getSelection)
  	{
          text = window.getSelection().toString();
  	} else if (document.selection && document.selection.type != "Control")
  	{
          text = document.selection.createRange().text;
      }
      return text;
  }
  </script>

  <?php
}
