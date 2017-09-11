var delElts= document.getElementsByClassName("delete");

// delElts is an HTMLCollection. 

[].forEach.call(delElts, function(delElt){

	delElt.addEventListener("click",function(e){

		var verif= confirm("Supprimer ?");
		
		if (verif==false){
			e.preventDefault();
			console.log("Cancelled")
		}
		else{
			console.log("Ok");
		}

	});

});





