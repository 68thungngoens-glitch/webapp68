<?php   
    session_start();
    include '../config/connectdb_test.php';
    
    $sql = "SELECT * FROM tb_movies";
    $result = mysqli_query($link,$sql);
?>
<html>
    <a href='add_movies.php'>Add : </a>
    <table border = "1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php   while($arr = mysqli_fetch_array($result)){?>
        <tr>
            <td><?php   echo $arr['movies_id'];?></td>
            <td><a href="detail_movies.php?id=<?php  echo $arr['movies_id'];?>"><?php   echo $arr['movies_name'];?></a></td>
            <td><a>Edit<a></td>
            <td><a>Delete<a></td>
        </tr>
        <?php   }?>
    </table>
<?php echo "actioned : ".$_SESSION['member_name']." : ".$_SESSION['action'];?>
<br><a href='list.php'>Back : </a>
</html>