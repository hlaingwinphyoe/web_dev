let input = document.getElementById("input");
let from = document.getElementById("from");
let to = document.getElementById("to");
let result = document.getElementById("result");
let record = document.getElementById("record")

function createOption(x,y,z){
    let o = document.createElement("option");
    let t = document.createTextNode(y);
    o.setAttribute("value",toNum(z));
    o.appendChild(t);
    x.appendChild(o);
}

function toNum(x){
    return Number(x.replace(",",""));
}

for (x in data.rates){
    createOption(from,x,data.rates[x]);
    createOption(to,x,data.rates[x]);
    // console.log(x,data.rates[x]);
}

function createTr(x){
    let rowSpacer = document.getElementById("rowSpacer");
    if (rowSpacer){
        rowSpacer.remove();
    }
    let tr = document.createElement("tr");
    x.map(function (el){
        let td = document.createElement("td");
        let text = document.createTextNode(el);
        td.appendChild(text);
        tr.appendChild(td);
    });

    record.appendChild(tr);

}

function store(){
    localStorage.setItem("record",record.innerHTML);
}


document.getElementById("calc").addEventListener("submit",function (e){
    e.preventDefault();

    // get state

    let x = input.value;
    let y = from.value;
    let z = to.value;

    // process state
    let fromText = x +" "+from.options[from.selectedIndex].innerText;
    let toText = to.options[to.selectedIndex].innerText;
    let first = x * y;
    console.log(first);
    let second = first/z;
    // console.log(second.toFixed(2));
    let r = second.toFixed(2);
    let d = new Date().toLocaleString();
    let arr = [d,fromText,toText,r];
    createTr(arr);
    store();

    // set state

    result.innerHTML = r;
    input.value = "";
    input.focus();
    from.value = "";
    to.value = "1";
    // result.innerHTML = "";
});

(function (){
    if (localStorage.getItem("record")){
        record.innerHTML = localStorage.getItem("record");
    }else{
        record.innerHTML = `<tr id="rowSpacer"><td colspan="4">There's no Record</td></tr>`
    }
})();

function changeMode(){
    document.body.classList.toggle("night-mode");
    document.getElementById("modeIcon").classList.toggle("fa-sun");
}

// function test(){
//     console.log(from.options[from.selectedIndex].innerText);
// }
