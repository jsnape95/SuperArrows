<?php require __DIR__."/includes/bundle.php"; ?>

<form action="updatelogic.php" method="POST">
    First Name:<br />
    <input type="text" name="updatefirstname"/>
    <br /><br />
    Last Name:<br />
    <input type="text" name="updatelastname"/>
    <br /><br />
    <input type="submit" value="Submit" />
    <br /><br />
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
</form>

