function setForLoopValues(minimum,maximum,increase) {
     minimum = Number(prompt("Enter the minimum value", ""));
     maximum = Number(prompt("Enter the maximum value", ""));
     increase = Number(prompt("Enter the increase value", ""));

    for (var i = minimum; i <= maximum; i += increase) {

        document.writeln("The number is " + i + "<br>");
    }
}
setForLoopValues();


