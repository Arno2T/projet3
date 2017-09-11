var form= document.querySelector("form");
form.addEventListener("submit", function(e){

	var mdp1=form.elements.password.value;
	var mdp2=form.elements.password2.value;

	if (mdp1!=mdp2)
	{

		var pwdVerif= document.createElement("span");
		pwdVerif.classList.add("alert-warning");
		pwdVerif.textContent="Les mots de passes ne sont pas identiques! ";
		document.getElementById("verif").appendChild(pwdVerif);
		e.preventDefault();
	}

});