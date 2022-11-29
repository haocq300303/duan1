<?php
if(isset($_POST['add'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    insertUser($fullname, $email, $password, $role);
    $message = "Thêm thành công!";
    echo "<script>
            setTimeout(() => {
                window.location.href = 'admin?page=user';
            },1500);
        </script>";
}
?>

<div class="alert alert-primary" role="alert">
    <h1>Quản lý thành viên</h1>
</div>

<h2>Thêm thành viên</h2>

<form class="row g-3 needs-validation" novalidate action="?page=user&act=add" method="POST">
    <div class="col-md-12">
        <label for="name" class="form-label">Fullname</label>
        <input type="text" class="form-control" name="fullname" id="name" value="" placeholder="Enter name..." required>
        <div id="nameFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="" placeholder="Enter email..." required>
        <div id="emailFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Enter password..." required>
        <div id="passwordFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="role" class="form-label">Role</label>
        <select class="form-select" name="role" id="role" required>
            <option selected value="USER">USER</option>
            <option value="ADMIN">ADMIN</option>
        </select>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" name="add" type="submit">Thêm mới</button>
    </div>
    <?php
    echo isset($message) ? "<div class='alert alert-success col-12' role='alert'>$message.</div>" : "";
    ?>
</form>
