<?php
    include_once "../main/connection.php";

    $ajax= new Connection("satelite");

    if(isset($_POST["insert_title"]) && isset($_POST["insert_date"]) && isset($_POST["insert_author"])){
        $data= array($_POST["insert_title"], $_POST["insert_date"], $_POST["insert_author"]);
        $ajax->insert("book",$data);
    }

    if(isset($_POST["update_orig_title"])  && isset($_POST["update_title"])&& isset($_POST["update_date"]) && isset($_POST["update_author"])){
        $data= array($_POST["update_orig_title"],$_POST["update_title"], $_POST["update_date"], $_POST["update_author"]);
        $ajax->update("book",$data);
    }

    if(isset($_POST["delete_title"])){
        $data= $_POST["delete_title"];
        $ajax->delete("book",$data);
    }


    $order="title";        
    $ajax->select("book","*",null,$order);
    $result=$ajax->getResult();
    // echo "<br>";
    echo "<table>
    <tr>
        <th>Title</th>
        <th>Publication Date</th>
        <th>Author</th>
        <th></th>
        <th></th>
    </tr>";
    while($row= $result->fetch_array(MYSQLI_NUM)){
    echo "
        <tr class='td'>
        <td class='book_title'>".$row[1]."</td>
        <td class='publication_date'>".$row[2]."</td>
        <td class='author'>".$row[5]."</td>
        <td><button id='update_button' class='btn btn-light' onclick='update_input(this)' >Update</button></td>
        <td><button id='delete_button' class='btn btn-danger' onclick='deleteBook(this)'>Delete</button></td>";
    }
    echo  " </tr> 
    </table>";  
  
?>