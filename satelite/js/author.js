document.getElementById("add_author_form").addEventListener("submit", addAuthor);
document.getElementById("update_author_form").addEventListener("submit", updateAuthor);

function addAuthor(e){
    e.preventDefault();
    let name= document.getElementById("add_a_name").value.trim();
    let origin=document.getElementById("add_a_origin").value.trim();
    if(name==""){
        alert("NAME EMPTY");
        return;
    }

    var params="insert_name="+name+"&insert_origin="+origin;
    http(params);
}

function http(params){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../ajax/ajax_author.php',true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('tabela_autor').innerHTML = this.responseText;
    }
    xhr.send(params);
}

function updateAuthor(e){
    e.preventDefault();
    let name= document.getElementById("show_name").value.trim();
    let origin=document.getElementById("update_a_origin").value.trim(); 
    let new_name= document.getElementById("update_a_name").value.trim();
    if(new_name==""){
        alert("NAME EMPTY");
        return;
    }
    console.log(name,new_name,origin);
    var params="update_name="+name + "&update_new_name="+new_name+"&update_origin="+origin;
    console.log(params);
    http(params);
    
}

function update_input(id){
   document.getElementById("update_a_name").value=id.parentNode.parentNode.children[0].innerHTML;
   document.getElementById("update_a_origin").value=id.parentNode.parentNode.children[1].innerHTML;
   document.getElementById("show_name").value=id.parentNode.parentNode.children[0].innerHTML;
   window.scrollTo(0,document.body.scrollHeight);
}

function deleteAuthor(id){
    let name=id.parentNode.parentNode.children[0].innerHTML;
    // console.log(id.parentNode.parentNode.children[0].innerHTML);
    var params="delete_name="+name;
    http(params);
}