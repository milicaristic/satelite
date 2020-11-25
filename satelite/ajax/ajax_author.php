
<?php
include_once "../main/connection.php";

$ajax= new Connection("satelite");

if(isset($_POST["insert_name"]) && isset($_POST["insert_origin"])){
    $data=array($_POST["insert_name"], $_POST["insert_origin"]);
    $ajax->insert("author",$data);
}

if(isset($_POST["update_name"])&& isset($_POST["update_new_name"]) &&  isset($_POST["update_origin"])){
    $data=array($_POST["update_name"], $_POST["update_new_name"],$_POST["update_origin"]);
    echo "data:".$data[0].$data[1].$data[2];
     $ajax->update("author",$data);
}

if(isset($_POST["delete_name"])){
    $data=$_POST["delete_name"];
     $ajax->delete("author",$data);
}
    $order="name_surname";
    $ajax->select("author","*",null,$order);
    $result=$ajax->getResult();
     // echo "<br>";
     echo "<table>
                <tr >
                    <th>Name</th>
                    <th>Origin</th>
                    <th></th>
                    <th></th>
                </tr>";
                while($row= $result->fetch_array(MYSQLI_NUM)){
                echo "
                    <tr class='td'>
                    <td class='author_name'>".$row[1]."</td> 
                    <td class='author_origin'>".$row[2]."</td>
                    <td class='button_update'><button type='button' class='btn btn-light' onclick='update_input(this)'>Update</button></td>
                    <td class='button_delete'><button type='button' class='btn btn-danger' onclick='deleteAuthor(this)'>Delete</button></td>" ;
                }
                echo  " </tr> 
                </table>";


    
?>

