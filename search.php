<?php require_once "connect.php"; ?>
<?php
if(isset($_REQUEST['term']))
{
    $sql = "SELECT * FROM user WHERE u_name LIKE ?";
    if($stmt = mysqli_prepare($db, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        $param_term = $_REQUEST['term'] . '%';
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                   ?>
                   <center>
                    <table class="table table-responsive mt-2 table_view">
                      <tbody>
                        <tr>
                          <th scope="row"><i class="fas fa-user-circle mb-3" style="font-size: 50px;"></i></th>
                          <td><?=$row['u_name']; ?></td>
                          <td><i class="fas fa-square-full"></i> &nbsp; <i class="fas fa-square-full"></i>&nbsp;<i class="fas fa-square-full"></i></td>
                          <td><button type="button" class="btn btn-outline-secondary">pricesheet</button></td>
                        </tr>
                      </tbody>
                    </table>
                    </center>
                   <?php
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
    mysqli_stmt_close($stmt);
}

?>
