<?php
if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $id_room = $_POST['room'];

    insertService($name, $price, $desc, $id_room);
    $message = "Thêm thành công!";
    echo "<script>
            setTimeout(() => {
                window.location.href = 'admin?page=service';
            },1500);
        </script>";
}
?>

<div class="alert alert-primary" role="alert">
    <h1>Quản lý dịch vụ</h1>
</div>

<h2>Thêm dịch vụ</h2>

<form class="row g-3 needs-validation" novalidate action="?page=service&act=add" method="POST" enctype="multipart/form-data">
    <div class="col-md-12">
        <label for="name" class="form-label">Name service</label>
        <input type="text" class="form-control" name="name" id="name" value="" placeholder="Enter name..." required>
        <div id="nameFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-text">$</span>
            <span class="input-group-text">0.00</span>
            <input type="text" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
        </div>
        <div id="priceFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" id="desc" name="desc" placeholder="Enter description..." rows="3" required></textarea>
        <div id="descFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="room" class="form-label">Room</label>
        <select class="form-select" id="room" name="room" required>
            <option selected disabled value="">Choose...</option>
            <?php foreach ($rooms as $key => $value) {
                extract($value);
                ?>
                <option value="<?php echo $id;?>"><?php echo $name;?></option>
            <?php } ?>
        </select>
        <div id="roomFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" name="add" type="submit">Thêm mới</button>
    </div>
    <?php
    echo isset($message) ? "<div class='alert alert-success col-12' role='alert'>$message.</div>" : "";
    ?>
</form>
