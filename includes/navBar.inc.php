<?php
  include ('includes/scripts.php');
?>

<div id="navHeader">
    <div class="container">
        <div class="mart-0 pad-5">
        <div id="logoDiv" class="disp-in padb-2 fs-4">
                    <a href="../index.php"><img src="../img/logo2.png" alt="logo" class="center"></a>
                </div>
        </div>
        <div class="disp-block" style="margin-top:6%; margin-left:15%">
        <ul id="navList" class="list-inline">
            <?
                if(!empty($_SESSION)){  
                    if(isset($_SESSION['admin'])) {
                        echo "<li><a href='logics/authorize.php'>Admin Page</a></li>";
                    }
                    echo "<li><a href='generateResults.php'>View Results</a></li>";
                }
                if(isset($_GET['failed'])){
                    echo "Login has failed!";
                }
                if (isset($_SESSION['user'])){
                    include "includes/logoutbutton.php";
                }
                if(isset($_SESSION['admin'])){
                    include "includes/logoutbutton.php";
                }
                if(empty($_SESSION)){
                    include "includes/login.php";
                }
        

            ?>

                <!-- <li><a href='registerbootbox.php'>Register</a></li> -->

                <!-- <button type="button" class="btn btn-info btn-lg" id="test">Register</button> -->


                                  <!-- <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog"> -->

                                      <!-- Modal content-->
                                      <!-- <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Register Form</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form action="registerform.php" method="post">
                                              <div class ="form-horizontal">
                                                <div class="form-group">
                                                  <label for "firstname" class="col-md-5 col-md-offset-1 text-right">First Name:</label>
                                                  <div class="col-md-6">
                                                    <input type="text" name="firstname" value="" class="cl-black"/>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class ="form-horizontal">
                                                  <div class="form-group">
                                                    <label for "secondname" class="col-md-5 col-md-offset-1 text-right">Second Name:</label>
                                                    <div class="col-md-6">
                                                      <input type="text" name="secondname" value="" class="cl-black"/>
                                                    </div>
                                                  </div>
                                                </div>

                                              <div class ="form-horizontal">
                                                <div class="form-group">
                                                    <label for "username" class="col-md-5 col-md-offset-1 text-right">Username:</label>
                                                      <div class="col-md-6">
                                                        <input type="text" name="username" value="" class="cl-black"/>
                                                      </div>
                                                    </div>
                                                  </div>

                                                    <div class ="form-horizontal">
                                                      <div class="form-group">
                                                        <label for "email" class="col-md-5 col-md-offset-1 text-right">Email Address:</label>
                                                        <div class="col-md-6">
                                                          <input type="text" name="email" value="" class="cl-black"/>
                                                        </div>
                                                      </div>
                                                    </div>

                                                <div class ="form-horizontal">
                                                      <div class="form-group">
                                                        <label for "password" class="col-md-5 col-md-offset-1 text-right">Password:</label>
                                                          <div class="col-md-6">
                                                            <input type="text" name="password" value="" class="cl-black"/>
                                                          </div>
                                                        </div>
                                                      </div>

                                              <input type="submit" value="Register" class="cl-black"/>
                                              </div>
                                          </form>

                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>

                                  </div>
                                </div> -->

            </ul>
        </div>
    </div>
</div>
</div>

<script>
  $('#register-btn').click(function (){
    $.ajax({
      url: "registerform.php",
      type: "GET",
      success: function(data){
        bootbox.dialog({
            message: data,
            title: "Register"
        });
      }
    });
  })
</script>


<!-- jbkjbk -->
