<?php include_once "connection.php"; 
include_once "../classes/author.php";
include_once "../classes/book.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"  href="../style/style.css">
    <link rel="shortcut icon" href="../books.png"/>
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center">
        
        <h1>Books</h1>
        
    </div>
    <div class="row d-flex justify-content-center">
    <div id="table_book">
            <?php
                $connection = new Connection("moda");
                $order="title";
                $connection->select("book","*",null,$order);
                $result=$connection->getResult();
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
        </div>
    </div>

    <div class="row two">
        <div class="col-sm row d-flex justify-content-center">
            
            <form method="post" id="form_add_book">
            <h3>Add Book</h3>
                <p>Add title:</p> 
                <input type="text" name="b_title_insert" id="add_b_title" placeholder="Type in book title">
                <p>Add publication date:</p>
                <input type="text" name="b_date_insert" id="add_b_date" placeholder="Type in publicatin date" >
                <p>Select author:</p>
                <select name="select_author" id="select_author">
            <?php
            $authors= array();
            $connection->select("author");
            while($row = mysqli_fetch_array($connection->getResult())){
                array_push($authors,$row[1]);
                echo "<option>".$row[1]."</option>"; 
                }
            echo"
            </select>";
           ?>
            <input type="submit" name="add_book_button" id="add_book_button" value="Add">
            </form>
        </div>

        <div class="col-sm row d-flex justify-content-center">
            <form method="post" id="form_update_book">
            <h3>Update Book</h3>
            <input type="text" name="show_title" id="show_title" hidden>
                <p>Update title:</p><input type="text" name="b_title_update" id="update_b_title" placeholder="Type in book title">
                <p>Update publication date:</p><input type="text" name="b_date_update" id="update_b_date" placeholder="Type in publication date">
                <p>Update author:</p>

                <p>Select author:</p>
                <select name="select_author2" id="select_author2">
            <?php
            $authors= array();
            $connection->select("author");
            while($row = mysqli_fetch_array($connection->getResult())){
                array_push($authors,$row[1]);
                echo "<option>".$row[1]."</option>"; 
                }
            echo"
            </select>";
            ?>
                <input type="submit" name="update_book_button" id="update_book_button" value="Update">
            </form>
        </div>  

    </div>

    <div class="row d-flex justify-content-center books">
        <a href="author_page.php"><button id="authors">Authors</button></a>
    </div>

    <script src="../js/book.js"></script>

</div>
</body>
</html>