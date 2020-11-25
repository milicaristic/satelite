<?php
class Connection{
    private $hostname="localhost";
    private $username="root";
    private $password = "";
    private $dbname;
    private $dblink;
    private $result;

    function __construct($dbname){
        $this->dbname = $dbname;
        $this->Connect();
    }
    
    public function getResult(){
        return $this->result;
    }

    function Connect(){
        $this->dblink=new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
        if($this->dblink ->connect_errno){
            exit();
        }
        $this->dblink->set_charset("utf8");
    }
    
    function select($table,$rows='*',$where=null,$order=null){
        if($table=="author"){
            $q='SELECT '.$rows.'FROM '.$table;
            if($where!=null) {
                $q.= ' WHERE '.$where;
            }
            if($order!=null){
                $q.= ' ORDER BY '.$order;
            }
       }
       else if($table=="book"){
           $q='SELECT '.$rows.' FROM '.$table.' INNER JOIN author ON book.id_author=author.id'; 
           if($where!=null) {
            $q.= ' WHERE '.$where;
        }
        if($order!=null){
            $q.= ' ORDER BY '.$order;
        }
       }
       $this->ExecuteQuery($q);
    }

    function insert($table, $values){
        $insert='INSERT INTO '.$table;
        if($table=="author"){
            $this->select("author","*","name_surname='".$values[0]."'");
            if($this->result->num_rows>0){
                
                echo "<script type='text/javascript'>alert('This author already exists');</script>";
                return;
            }
            $insert.=' (name_surname, origin)';
            $insert.=' VALUES (';
            $insert.="'".$values[0]."', '".$values[1]."')";
        }
       
        if($table=="book"){
            $insert.=' (title, publication_date, id_author)';
            $insert.=' VALUES (';
            $insert.="'".$values[0]."', '".$values[1]."', '";
            $this->select("author","*","name_surname='".$values[2]."'");
            if($this->result->num_rows==1){
                    $row = mysqli_fetch_array($this->getResult());
                    $id_author = $row[0];
            }
            $insert.= $id_author."')";
        }
        echo $insert;
        $this->ExecuteQuery($insert);           
        
    }
    
    function delete($table,$value){
        $delete='DELETE FROM '.$table;
        if($table == "author"){
            $delete.=" WHERE name_surname='".$value."'";
        }
        else if($table == "book"){
            $delete.=" WHERE title='".$value."'";
        }

        $this->ExecuteQuery($delete);
        
    }

    function update($table, $values){
        $update = 'UPDATE '.$table." SET name_surname='". $values[1] ."', origin='" . $values[2] . "' WHERE name_surname='".$values[0]."'";
        //echo $update;
        if($table=="author"){
            $this->select("author","*","name_surname='".$values[1]."' AND origin='".$values[2]."'");
            
            if($this->result->num_rows>0){
                echo "<script type='text/javascript'>alert('This author already exists');</script>";
                return;
            }
        }
        if($table=="book"){
            $this->select("author","*","name_surname='".$values[3]."'");
            
            $row = mysqli_fetch_array($this->getResult());
            $id_author = $row[0];

            $this->select("book","*","title='".$values[1]."' AND publication_date='".$values[2]."' AND id_author='".$id_author."'");
            
            if($this->result->num_rows>0){
                //  echo "this kind of book already exists";
                 echo "<script type='text/javascript'>alert('This kind of book already exists');</script>";
                return;
             }

            $update = 'UPDATE '.$table." SET title='". $values[1] ."', publication_date='" . $values[2] ."', id_author='" . $id_author . "' WHERE title='".$values[0]."'";
            

        }
        if ($this->ExecuteQuery($update)){
            return true;
        }

        else{
            return false;
        } 
    }

    function ExecuteQuery($query){
      
        if($this->result = $this->dblink->query($query)){
            return true;
        }
        else{
        
            return false;
        }
    }
}

?>