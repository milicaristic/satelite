document.getElementById("form_add_book").addEventListener("submit", addBook);
document.getElementById("form_update_book").addEventListener("submit", updateBook);

function addBook(e){
    e.preventDefault();
    var title= document.getElementById("add_b_title").value.trim();
    var date= document.getElementById("add_b_date").value.trim();
    var author_doc = document.getElementById('select_author');
    var index = author_doc.selectedIndex;
    var author=author_doc[index].innerHTML;

    if(title==""){
        alert("TITLE EMPTY");
        return;
    }
    if(isNaN(date)){
        alert("YOU MUST ENTER A NUMBER");
        return;
    }

    var params="insert_title="+title+"&insert_date="+date+"&insert_author="+author;
    http(params);
}

function http(params){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../ajax/ajax_book.php',true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('table_book').innerHTML = this.responseText;
    }
    xhr.send(params);
}

function updateBook(e){
   
    e.preventDefault();
    console.log("updateBook()");
    let orig_title=document.getElementById("show_title").value.trim();
    let title= document.getElementById("update_b_title").value.trim();
    let date= document.getElementById("update_b_date").value.trim();

    var author_doc = document.getElementById('select_author2');
    var index = author_doc.selectedIndex;
    var author=author_doc[index].innerHTML;

    var params= "update_orig_title="+orig_title+"&update_title="+title+"&update_date="+date+"&update_author="+author;
    http(params);
    console.log(params);
}

function update_input(id){
    document.getElementById("show_title").value=id.parentNode.parentNode.children[0].innerHTML;
    document.getElementById("update_b_title").value=id.parentNode.parentNode.children[0].innerHTML;
    document.getElementById("update_b_date").value=id.parentNode.parentNode.children[1].innerHTML;
    let author_name=document.getElementById("select_author2").value=id.parentNode.parentNode.children[2].innerHTML;
    

    let select_authors= document.getElementById("select_author2");
    window.scrollTo(0,document.body.scrollHeight);
    
    
}

function deleteBook(id){
    let title=id.parentNode.parentNode.children[0].innerHTML;
    var params="delete_title="+title;
    http(params);
}