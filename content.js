var key;
var zoom=1;
document.addEventListener("keypress", function()
{
	if (event.keyCode == 13) 
	{
		console.log("u hit enter");
		g="Command please";
		var sp = new SpeechSynthesisUtterance();
		sp.rate = 1;
		sp.pitch = 0.5;
		sp.text = g;
		console.log("you hit enter");
		window.speechSynthesis.speak(sp);
		var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
		recognition.lang = 'en-US';
		recognition.interimResults = false;
		recognition.maxAlternatives = 5;
		recognition.start();

		recognition.onresult = function(event) 
		{
			//inputted text is captured in key variable
			key=event.results[0][0].transcript;
			console.log(key);
			if(key.includes("scroll up"))
			{
				console.log("scroll up case");
				window.scrollBy(0,-500);
				sp.text="Scrolled up";
				window.speechSynthesis.speak(sp);	
			}
			else if(key.includes("scroll down"))
			{
				console.log("scroll down case");
				window.scrollBy(0,500);
				sp.text="Scrolled down";
				window.speechSynthesis.speak(sp);	
			}
			else if(key.includes("screenshot"))
			{
				//
			}
			else if(key.includes("zoom in"))
			{
				zoom=zoom+0.1;
				document.body.style.zoom=zoom;
				sp.text="Zoomed in";
				window.speechSynthesis.speak(sp);
			}
			else if(key.includes("zoom out"))
			{
				zoom=zoom-0.1;
				document.body.style.zoom=zoom;
				sp.text="Zoomed out";
				window.speechSynthesis.speak(sp);
			}
			else if(key.includes("back"))
			{
				console.log("back");
				history.go(-1);
				sp.text="Redirected back";
				window.speechSynthesis.speak(sp);
			}
			else if(key.includes("head"))
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
				}/*			
				sp.text=a.innerHTML;
				window.speechSynthesis.speak(sp);*/
			}
			else if(key.includes("read selected"))
			{
				sp.text=getSelectedText();
				window.speechSynthesis.speak(sp);
			}
			else
			{
				
				var size=document.links.length;

				console.log(key.toString().toLowerCase());
				//iterated for links and redirected to result
				for(var i=0;i<size;i++)
				{

					//console.log(document.links[i].text+"   "+document.links[i]);
					if(key.toString().toLowerCase()===document.links[i].text.toString().toLowerCase())
					{
										
						window.open(document.links[i],"_self");	
						sp.text="Redirected to "+key;
						window.speechSynthesis.speak(sp);	
						break;			
					}
					
					
				}
			}

		};


	}
	
});



//functions required
function speak(s)
{
	console.log(s);
	t="Redirected to "+s;
	textToSpeech();
	function textToSpeech() 
	{
		var utter = new SpeechSynthesisUtterance();
		utter.rate = 1;
		utter.pitch = 0.5;
		utter.text = t;
		utter.onend = function() {
		}
		window.speechSynthesis.speak(utter);
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












