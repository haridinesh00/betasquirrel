// function CheckandPrint(){
//     try {
//         var x = document.getElementById("inp_field");
        
//         let result = eval(x.value);
//         // console.log(result);
//         x.value = result;
//     }
//     catch(err){
//         x.value = "ERROR: Enter valid inputs";
//     }
// }

var answer = 0;
var last_opr = '';
var temp;
function getElementValue(){
    var x = document.getElementById("inp_field");
    return x;
}
function clear_screen(){
    temp = getElementValue();
    temp.value = '';
    last_opr = '';
    answer = 0;
}
function lastOp(y){
    if(last_opr == '+'){
        answer = answer + Number(y.value);
    }
    else if(last_opr == '-'){
        answer = answer - Number(y.value);
    }
    else if(last_opr == '*'){
        answer = answer * Number(y.value);
    }
    else if(last_opr == '/'){
        answer = answer / Number(y.value);
    }
    else if(last_opr == '%'){
        answer = answer % Number(y.value);
    }
    return answer;
}
function plus(){
    temp = getElementValue();
    if(temp.value != ''){
        answer = Number(temp.value);
        var z = lastOp(temp);
        last_opr = '+';
        temp.value = '';
    }
}
function minus(){
    temp = getElementValue();
    if(temp.value == ''){
        temp.value += '-';
    }
    else {
        answer = Number(temp.value);
        var z = lastOp(temp);
        last_opr = '-';
        temp.value = '';
    }
}
function divide(){
    temp = getElementValue();
    if(temp.value == ''){
        last_opr = '';
    }
    else {
        answer = Number(temp.value);
        var z = lastOp(temp);
        last_opr = '/';
        temp.value = '';
    }
}
function multiply(){
    temp = getElementValue();
    if(temp.value == ''){
        last_opr = '';
    }
    else {
        answer = Number(temp.value);
        var z = lastOp(temp);
        last_opr = '*';
        temp.value = '';
    }
}
function modulus(){
    temp = getElementValue();
    if(temp.value == ''){
        last_opr = '';
    }
    else {
        answer = Number(temp.value);
        var z = lastOp(temp);
        last_opr = '%';
        temp.value = '';
    }
}
function solution(){
    temp = getElementValue();
    var z = lastOp(temp);
    temp.value = z;
    answer = 0;
    last_opr = '';
}
