// show time - WeekDay - Month - Day - Year -Time zone 

document.getElementById("myBtn").addEventListener("click", displayDate);

function displayDate() {
  document.getElementById("demo").innerHTML = Date();
}

// create  column
var elements = document.getElementsByClassName("column");

var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}

var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

// Project3-- Array and Object
document.getElementById("demo-1").addEventListener("click", myFunction1);
function myFunction1() {
 
var students = new Array("Saba", "Shabnam", "Saeid", "Amirali", "Hossein");
		Array.prototype.displayItems=function(){
			for (i=0;i<this.length;i++){
				document.write(this[i] + "<br />");
			}
		}	
		document.write("students array<br />");
		students.displayItems();
		document.write("<br />The number of items in students array is " + students.length + "<br />");
		document.write("<br />The SORTED students array<br />");
		students.sort();
		students.displayItems();
		document.write("<br />The REVERSED students array<br />");
		students.reverse();
		students.displayItems();
		document.write("<br />THE students array after REMOVING the LAST item<br />");
		students.pop();
		students.displayItems();
        document.write("<br />THE students array after PUSH<br />");
        students.push("New Student");
    students.displayItems();
  }
// Project 4.

function addProject(name) {
    let c;
    let n;
    for(let i=0;i<5;i++){
        if(projects[i].project===name){
            c=projects[i].price;
        }
    }
    let p = parseFloat(document.getElementById("total").innerHTML);
    p+=c;
    document.getElementById("total").innerHTML = p;

    let i = parseInt(document.getElementById("item").innerHTML);
    i+=1;
    document.getElementById("item").innerHTML = i;
}

function clear() {
    document.getElementById("total").innerHTML = 0;
    document.getElementById("item").innerHTML = 0;

}
var projects = [{ project: "project1", price: 100.00 },
{ project: "project2", price: 150.00 },
{ project: "project3", price: 120.50 },
{ project: "project4", price: 210.00 },
{ project: "project5", price: 260.00 }];

document.getElementById("project1").addEventListener("click", function () { addProject("project1"); });
document.getElementById("project2").addEventListener("click", function () { addProject("project2"); });
document.getElementById("project3").addEventListener("click", function () { addProject("project3"); });
document.getElementById("project4").addEventListener("click", function () { addProject("project4"); });
document.getElementById("project5").addEventListener("click", function () { addProject("project5"); });


document.getElementById("clear").addEventListener("click", function () { clear("clear"); });


