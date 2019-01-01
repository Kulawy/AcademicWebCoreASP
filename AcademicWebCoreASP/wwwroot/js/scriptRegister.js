var helpArray = [ "Enter your name in this input box.", 
     "Enter your last name.",
     "Enter your e-mail address in the format user@domain.", "Enter your phone number",
     "Enter your phone number",
     "This button submits the form to the server-side script." ];
    var helpText;
	
  function init()
   {
      helpText = document.getElementById( "helpText" );

      
      registerListeners( document.getElementById( "first_name" ), 0 );
      registerListeners( document.getElementById( "last_name" ), 1 );
      registerListeners( document.getElementById( "email" ), 2 );
      registerListeners( document.getElementById( "phone" ), 3 );
      registerListeners( document.getElementById( "month_bd" ), 4 );
      registerListeners( document.getElementById( "submit" ), 5 );
	  registerSpecialEvent();
  }

   
   function registerListeners( object, messageNumber )
  {
      object.addEventListener( "focus",                                  
         function() { helpText.innerHTML = helpArray[ messageNumber ]; },
         false );                                                        
      object.addEventListener( "blur",                                   
         function() { helpText.innerHTML = ''; }, false );   
   }
   
   function registerSpecialEvent() 
   {
	   helpText = document.getElementById( "helpText" );
	   window.addEventListener("keypress", function(e) {
		   if (e.code==='Space') {
			   helpText.innerHTML = 'Nacisnales spacje. Po co?';
		   }			   
	   });
   }

   window.addEventListener( "load", init, false );
