/*!
  * E-Library script (https://github.com/gparap/lamp/tree/master/e-library)
  * Copyright 2025 gparap (https://github.com/gparap)
  * Licensed under MIT (https://github.com/gparap/lamp/blob/master/LICENSE)
  */

//Book search validation. 
//	(prevents submiting empty queries)
function validateSearchInput() {
	document.getElementById("search-form").addEventListener("submit", function(event) {
		let searchInput = document.getElementById("search-input");
		let searchInputValue = document.getElementById("search-input").value.trim();
		if (searchInputValue === "") {
			//do NOT sumbit the form if empty
			event.preventDefault();
		} else {
			//display "q" in the address bar instead of "search-input"
			searchInput.setAttribute('name', 'q');
		}
	});
}