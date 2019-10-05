var key;
var zoom=1;
document.addEventListener("keypress", function(){
	if (event.keyCode == 13) 
	{
		console.log("you hit enter");
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
			
			
			


			switch (key) 
			{
				case "scroll up":
					console.log("scroll up case");
					window.scrollBy(0,-300);
					  break;
				case "scroll down":
					  console.log("scroll down case");
					  window.scrollBy(0,500);
						break;
				case "screenshot":
					//add your working code for screenshot
					break;
				case "zoom in":
					zoom=zoom+0.1;
					document.body.style.zoom=zoom;
					
					break;
				
				case "zoom out":
					zoom=zoom-0.1;
					document.body.style.zoom=zoom;
					
					break;
				
				default:
					var size=document.links.length;
					console.log(key.toString().toLowerCase());
					//iterated for links and redirected to result
					for(var i=0;i<size;i++)
					{
		
						console.log(document.links[i].text+"   "+document.links[i]);
						if(key.toString().toLowerCase()===document.links[i].text.toString().toLowerCase())
						{
											
							window.open(document.links[i]);	
							break;			
						}
					}
					
					
				  
			  }


		};


	}
});
