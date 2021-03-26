//form element events

//remove warning if firstname has input
document.getElementById("firstName").addEventListener("blur", function(){
    if(this.validation !== ""){
        firstNameWarning.innerHTML = "";
    }
});

//remove warning if lastname has input
document.getElementById("lastName").addEventListener("blur", function(){
    if(this.validation !== ""){
        lastNameWarning.innerHTML = "";
    }
});
//remove warning if address1 has input
document.getElementById("address1").addEventListener("blur", function(){
    if(this.validation !== ""){
        address1Warning.innerHTML = "";
    }
});

//remove warning if city has input
document.getElementById("city").addEventListener("blur", function(){
    if(this.validation !== ""){
        cityWarning.innerHTML = "";
    }
});

//remove warning if province is selected
document.getElementById("province").addEventListener("click", function(){
    if(profile.province.options.selectedIndex !== 0){
        provinceWarning.innerHTML = "";
    }
});

//remove warning if country is selected
document.getElementById("country").addEventListener("click", function(){
    if(profile.country.options.selectedIndex !== 0){
        countryWarning.innerHTML = "";
    }
});


// Add an event to the form on submit to validate input
document.profile.addEventListener("submit", validate);
document.profile.addEventListener("reset",validate);


