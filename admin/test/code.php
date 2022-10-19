<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">


<style>
    #days, #open, #close{
        padding:1%;
        text-transform: uppercase;
        border:none;
        /* border-bottom: 1px solid black; */
        
    }

    #open, #close{
        text-align: center;
        
    }
</style>

<?php
session_start();
$con = mysqli_connect("localhost","root","","ams");

if(isset($_POST['update_sched_data']))
{
    
    $days = $_POST['days'];
    $open = $_POST['open'];
    $close = $_POST['close'];
    

    $query = "UPDATE schedule SET open='$open', close='$close' WHERE days='$days'";
    
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {        
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Not Updated";
        header("Location: index.php");
        
    }
}

?>

					<?php					

                    $query = "SELECT * FROM schedule";
                    $query_run = mysqli_query($con, $query);
                
                    if(mysqli_num_rows($query_run) > 0){

                        
?>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                DAYS
            </div>

            <div class="col-sm text-center">
                OPEN
            </div>

            <div class="col-sm text-center">
                CLOSE
            </div>
            <hr>

                    </div>
                    </div>
<?php
                            
							foreach($query_run as $row){
								?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md" id="days" style="background:#fff;">
                                            <?=$row['days'];?>
                                        </div>

                                        <div class="col-md" id="open" style="background:cyan;">
                                        <?=$row['open'];?>
                                        </div>

                                        <div class="col-md" id="close" style="background:orange;">
                                        <?=$row['close'];?>
                                        </div>

                                        </div>
                                </div>    

								<?php
                                

							}
                            


						}

						else {
							?>
								<tr>
									<td colspan="6">No record found</td>
								</tr>
								<?php
						}
					?>

        
        
        
        
        



























