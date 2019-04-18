<form id="searchform" action="/login.php" method="post">

<div class="form-group">
<input name="admin_name" type="text" class="form-control" placeholder="Enter a name">
<input name="password" type="text" class="form-control" placeholder="Enter password">
</div>

<?php
if ($values[0] == 'error')
{
    echo ('<label class="control-label" for="inputError2">
        All fields must be filled
        </label>');
}
if ($values[0] == 'invalid')
{
    echo ('<label class="control-label" for="inputError2">
        Invalid username and/or password
        </label>');
}

?>

<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
</form>