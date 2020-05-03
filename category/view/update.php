<?php
session_start();
include '../../database/ConnectDatabase.php';
include '../class/CategoryManager.php';

if (isset($_REQUEST['id'])) {
$id = $_REQUEST['id'];
$categoryManager = new CategoryManager();
$categoryById = $categoryManager->getAllDatabaseById($id);
$_SESSION['idOfUpdate'] = $categoryById['id'];
$_SESSION['name'] = $categoryById['name'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Update category</title>
</head>
<body>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link active" href="../categories.php">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../book/books.php">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
<div class="card-body">
    <h3>Update category</h3>
    <form action="../action/change.php?id=<?php echo isset($_SESSION['idOfUpdate'])?$_SESSION['idOfUpdate']:''?>" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo isset($_SESSION['name'])?$_SESSION['name']:'' ?>">
        </div>
        <?php
        if (isset($_SESSION['name'])) {
            unset($_SESSION['name']);
        }
        ?>
        <div class="col-sm-9 col-sm-offset-3">
            <span class="help-block">*Required fields</span>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</div>
<?php unset($_SESSION['idOfUpdate']) ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

