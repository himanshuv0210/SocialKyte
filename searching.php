<?php 
require_once "connect.php";
$subject=$_POST['subject_name'];
$loc=$_POST['loc'];
$plat=$_POST['plat'];
$selected=$_POST['selected1'];
$search_sql="SELECT * from user where (categories='$subject' OR locations='$loc' OR platform ='$plat') ";
$ssql6=mysqli_query($db,$search_sql);
$search_numrows= mysqli_num_rows($ssql6);

ob_start();
if($search_numrows > 0)
{
    while($row = mysqli_fetch_array($ssql6, MYSQLI_ASSOC))
    {
        echo "<div class='alert bg-primary' style='box-sizing: border-box; border-radius:50px;'>".$row['u_name']."</div>";
    }
}
else
{

}
?>

<?php
echo ob_get_clean();
?>