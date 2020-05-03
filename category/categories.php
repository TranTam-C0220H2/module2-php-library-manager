<?php
include '../database/ConnectDatabase.php';
include 'class/CategoryManager.php';

$categoryManager = new CategoryManager();
$arrayCategory = $categoryManager->getAllDatabase();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Library Manager</title>
</head>
<body>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link active" href="../category/categories.php">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../book/books.php">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
<div class="card-body">
    <form action="view/show-search.php" method="get" class="card card-sm">
        <div class="card-body row no-gutters align-items-center">
            <div class="col-auto">
                <select id="inputState" name="choose" class="form-control form-control-lg form-control-borderless">
                    <option selected>Choose...</option>
                    <option>ID</option>
                    <option>Name</option>
                </select>
            </div>
            <!--end of col-->
            <div class="col">
                <input class="form-control form-control-lg form-control-borderless" type="search"
                       placeholder="Search by choose" name="keyword">
            </div>
            <!--end of col-->
            <div class="col-auto">
                <!-- Example split danger button -->
                <div class="btn-group">
                    <button class="btn btn-lg btn-success" type="submit">Search</button>
                </div>
            </div>
            <!--end of col-->
        </div>
    </form>
</div>
<br>
<div class="card-body">
    <h4>Categories List</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($arrayCategory as $item): ?>
            <tr>
                <th scope="row"><?php echo $item['id'] ?></th>
                <td><?php echo $item['name'] ?></td>
                <td><a href="view/update.php?id=<?php echo $item['id'] ?>">Update</a>|<a
                            onclick="return confirm('Delete?')" href="action/delete.php?id=<?php echo $item['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="card-body"><a href="view/add.php">Add new category</a></div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>