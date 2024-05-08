<!DOCTYPE html>
<?php require 'connect.php';?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
    <title>Document</title>
<style>
        .container{
    display: flex;
    justify-content: center;
   width: 35%;
    border: 1px solid black;
    height: auto;
    background-color:white;
    border-radius: 5px;
    padding: 5px;
    margin: 10px;

}
.container2{
    display: flex;
    justify-content: center;
   width: 35%;
    border: 1px solid black;
    height: auto;
    background-color:white;
    padding: 5px;
    margin: 10px;
}
input{
    margin-top: 10px;
    justify-content: center;
    width: fit-content;
  
    
    text-align: center;
    height: 30px;
}
button{
    background-color: rgb(58, 58, 250);
    border-radius: 5px;
    width: 300px;
    cursor: pointer;
    margin: 20px;
}
#two{
    background-color: red;
    border-radius: 5px;
    width: 70px;
    cursor: pointer;
    margin: 20px;
}

body{
background-color: black;
justify-content: center;
align-items: center;
align-content: center;
}
td{
    justify-content: space-between;
    margin-left: 3px;
}
table, th, td{
    border:1px solid black;
    border-collapse :collapse;
    border-spacing:10px;
    border-bottom:1px solid #ddd;
   
}
tr:nth-child(even){
    background-color:#D6EEEE;
}
#checked{
    margin-left:5px;
}
    </style>
    
</head>
<body>

    <div class ="container">
   
        <form  method="post">
    <label>TASK</label>        
<input type="text" id="enter" placeholder="Enter Your Task" name="task" required>
<label>DAY</label>        
<input  type="datetime-local" placeholder="Enter Your Task" name="date" required>

<button id="click" name="create" type="submit"> add</button>
        </form>
      
    </div>
    <div class ="container2">
        <p id="para1">
            <table style="width:100%">
            <caption><b>TO-DO-LIST</caption>
            <tr>
                       <th>TASK</th>
                       <th>TIME</th>
                       <th colspan ='2'>OPERATION</th>
                    </tr>
            <?php
         
              $sql= " SELECT * FROM crud";
                $result= $conn->query($sql);
                 if(!$result){
                     die("Invalid query".$conn->error);
}
                        while($row = $result->fetch_assoc()){
                            ?>
                       
                       <tr>
                       <th id="strike"><span><form method="post">
                        <input type='checkbox'  name="deletee" id="checked">
                        </form>
                    </span><p id="task" class="child"><?php echo $row["task"]?></p></th>
                       <th id="time"><?php echo $row["time"]?></th>
                       
                       <th colspan ='2'><form method="post">
                       <button id ='two' type='submit' name='deletee' value=<?php echo $row['id']?>>DELETE</button>
                       </form>
                       </th>
                    </tr>
                    <?php
                         
                     
}
            ?>
                 
            </table>
          
        </p>
    </div>
    <?php
    
    if(isset($_POST['create'])){
       
        $tasks= $_POST['task'];
        $date= $_POST['date'];
      
      $stmt = $conn-> prepare("INSERT INTO crud(task,time)
   VALUES(?,?)");
    $stmt->bind_param("ss", $tasks,$date);
    $stmt->execute();
   
    $stmt->close();
   $conn->close();
  
         }
    
         
    ?>
    
    <?php
  
    if(isset($_POST['deletee'])){
        $id= $_POST['deletee'];
        
        $stmt = $conn-> prepare("DELETE FROM crud  WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $conn->close();
    }
    ?>
    <script src="main.js"></script>
    <script src="index.js"></script>
</body>

</html>