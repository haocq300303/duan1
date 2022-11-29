<?php
$idEdit = isset($_GET['idEdit']) ? $_GET['idEdit'] : "";
if(isset($_POST['edit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    updateUser($idEdit, $fullname, $email, $role);
    $message = "Edit thành công!";
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

<h2>Edit thành viên</h2>

<form class="row g-3 needs-validation" novalidate action="" method="POST">
    <div class="col-md-12">
        <label for="name" class="form-label">Fullname</label>
        <input type="text" class="form-control" name="fullname" id="name" value="<?php echo $row['fullname']; ?>" placeholder="Enter name..." required>
        <div id="nameFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="Enter email..." required>
        <div id="emailFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="role" class="form-label">Role</label>
        <select class="form-select" name="role" id="role" required>
            <?php if($row['role'] === 'ADMIN') {?>
            <option selected value="ADMIN">ADMIN</option>
            <option value="USER">USER</option>
            <?php } else { ?>
            <option selected value="USER">USER</option>
            <option value="ADMIN">ADMIN</option>
            <?php } ?>
        </select>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" name="edit" type="submit">Edit</button>
    </div>
    <?php
    echo isset($message) ? "<div class='alert alert-success col-12' role='alert'>$message.</div>" : "";
    ?>
</form>
