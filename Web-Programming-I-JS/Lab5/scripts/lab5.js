//Lab5 - Working with the Document Object Model

//1.Add the following text to the element with id=”mainTitle”
//1.Learning about the Document Object Model
//2.Add the attribute to centre align the element with id=”mainTitle”

var mainTitle = document.getElementById("mainTitle")
mainTitle.innerHTML = "Learning about the Document Object Model";
mainTitle.setAttribute ("align" , "center");


//3.Change the title attribute on the img tag with the following text
//JavaScript 1
//4.Add the attribute to right align the element with id=”image1”

var image = document.getElementById("image1")
image.setAttribute("title","JavaScript 1");
image.setAttribute("align" , "right" );


//5.Append the following text as a list item so it appears as the second item in theJavaScript Version History list
//August 1996

var newItem1 = document.createElement("li")
var textnode1 = document.createTextNode("August 1996")
newItem1.appendChild(textnode1);
var listItem = document.getElementById("list")
listItem.insertBefore(newItem1, listItem.children[1]);



//6.Append the following text as a list item so it appears as the last item in theJavaScript Version History list
//1.8.2 June 22, 2009

var newItem2 = document.createElement("li")
var textnode2 = document.createTextNode("1.8.2 June 22, 2009")
newItem2.appendChild(textnode2);
document.getElementById("list").appendChild(newItem2);


//7.Change the list item that contains the text 1.6 November 9999 to now contain thetext 1.6 November 2005

var item = document.getElementById("list").children
item[5].innerHTML = "1.6 November 2004";




//8.Using the document.write method, display the number of li tags in the web page

function countItems() {
    var ul = document.getElementById("list")
    document.write(ul.getElementsByTagName("li").length);
}
document.write(" The numbers of List Item :  ");
countItems();

