function CheckandPrint(){
    try {
        var x = document.getElementById("inp_field").value;
        var y = document.getElementById("inp_field");
        
        let result = eval(x);
        // console.log(result);
        y.value = result;
    }
    catch(err){
        y.value = "ERROR: Enter valid inputs";
    }
}
