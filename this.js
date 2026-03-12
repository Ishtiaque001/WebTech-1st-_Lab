function add(value){
    document.getElementById("display").innerHTML += value;
}

function clearDisplay(){
    document.getElementById("display").innerHTML = "";
}

function calculate(){
    let exp = document.getElementById("display").innerHTML;
    let result = eval(exp);
    document.getElementById("display").innerHTML = result;
}