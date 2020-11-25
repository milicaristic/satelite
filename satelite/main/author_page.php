<?php include_once "connection.php"; 
include_once "../classes/author.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authors</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"  href="../style/style.css">
    <link rel="shortcut icon" href="../books.png"/>
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center">
        
        <h1>Authors</h1>
        
    </div>
    <div class="row d-flex justify-content-center">
       <div id="tabela_autor">
            <?php
                $connection = new Connection("moda");
                $order="name_surname";
                $connection->select("author","*",null,$order);
                $result=$connection->getResult();
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
        </div>
    </div>

    <div class="row two ">
        <div class="col-sm row d-flex justify-content-center">
            
            <form method="post" id="add_author_form">
            <h3>Add Author</h3>
                <p>Add name:</p> 
                <input type="text" name="a_name_insert" id="add_a_name" placeholder="Type in author's name">
                <p>Add origin:</p>
                <input type="text" name="a_origin_insert" id="add_a_origin" placeholder="Type in author's origin" >
                <input type="submit" name="add_author_button" id="add_author_button" value="Add">
            </form>
            
        </div>

        <div class="col-sm row d-flex justify-content-center">
            
            <form method="post" id="update_author_form">
            <h3>Update Author</h3>
                <input type="text" name="to_hide" id="show_name" hidden>
                <p>Update name:</p><input type="text" name="a_name_update" id="update_a_name" placeholder="Type in author's name">
                <p>Update origin:</p><input type="text" name="a_origin_update" id="update_a_origin" placeholder="Type in author's origin">
                <input type="submit" name="update_author_button" id="update_author_button" value="Update">
            </form>
        </div>  

        <!-- <div class="col-sm">
            <h3>Delete Author</h3>
                <form method="post" id="update_author_form">
                <p>Name:</p><input type="text" name="a_name_delete" id="delete_a_name" placeholder="Type in author's name">
                <input type="submit" name="delete_author_button" id="delete_author_button" value="Update">
            </form>
        </div> -->
    </div>

    <div class="row d-flex justify-content-center books">
        <a href="book_page.php"><button id="books">Books</button></a>
    </div>

</div>

<script src="../js/author.js"></script>
</body>
</html>