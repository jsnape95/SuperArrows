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
                if(isset($_SESSION['admin']))
                {
                    echo "<li><a href='logics/authorize.php'>Admin Page</a></li>";
                }
            ?>
              <li><a href='generateResults.php'>View Results</a></li>

                <!-- <li><a href='registerbootbox.php'>Register</a></li> -->

                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalForm">Register</button>

                <div class="modal fade" id="modalForm" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title cl-black" id="myModalLabel">Register Form</h4>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form" action="registerform.php" method="post">
>
                                    <!-- <div class="form-group cl-black">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Enter your name"/>
                                    </div> -->
                                    <div class="form-group cl-black">
                                        <label for="inputEmail">First Name</label>
                                        <input type="email" class="form-control" id="inputMessage" placeholder="Enter your first name"/>
                                    </div>
                                    <div class="form-group cl-black">
                                        <label for="inputEmail">Second Name</label>
                                        <input type="email" class="form-control" id="inputMessage" placeholder="Enter your second name"/>
                                    </div>
                                    <div class="form-group cl-black">
                                        <label for="inputEmail">Username</label>
                                        <input type="email" class="form-control" id="inputMessage" placeholder="Enter your username"/>
                                    </div>
                                    <div class="form-group cl-black">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email"/>
                                    </div>
                                    <div class="form-group cl-black">
                                        <label for="inputEmail">Password</label>
                                        <input type="email" class="form-control" id="inputMessage" placeholder="Enter your password"/>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- </div>
              </div>

 -->


                <?
            if(isset($_GET['failed'])){
                echo "Login has failed!";
            }
            if (isset($_SESSION['user']))
            {
                include "includes/logoutbutton.php";
            }
            if(isset($_SESSION['admin']))
            {
                include "includes/logoutbutton.php";
            }
            if(empty($_SESSION))
            {
                        include "includes/login.php";
            }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>


<!-- jbkjbk -->
