
<div class='container cl-black' >
        
    <form action="registerLogic.php" method="post">
        <div class='form-horizontal'>

            <div class='form-group'>
                <div class='col-md-2 text-right'>
                    <label for="inputFirstName">First Name</label>
                </div>
                <div class='col-md-4'>
                    <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="Enter your first name" required/>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-md-2 text-right'>
                    <label for="inputSecondName">Second Name</label>
                </div>
                <div class='col-md-4'>
                    <input type="text" name="secondname" class="form-control" id="inputSecondName" placeholder="Enter your second name" required/>
                </div>
            </div>

            <div class='form-group'>
                <div class='col-md-2 text-right'>
                    <label for="inputUsername">Username</label>
                </div>
                <div class='col-md-4'>
                    <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Enter your username" required/>
                </div>
            </div>

            <div class='form-group'>
                <div class='col-md-2 text-right'>
                    <label for="inputEmail">Email</label>
                </div>
                <div class='col-md-4'>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter your email" required/>
                </div>
            </div>

            <div class='form-group'>
                <div class='col-md-2 text-right'>
                    <label for="inputPassword">Password</label>
                </div>
                <div class='col-md-4'>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter your password" required/>
                </div>
            </div>

            <div class='row'>
                <div class='col-md-6'>
                    <input type='submit' value='Submit!' class='btn btn-success'>
                </div>
            </div>
        
        </div>
    </form>
</div>