<?php
$idEdit = isset($_GET['idEdit']) ? $_GET['idEdit'] : "";
if(isset($_POST['edit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $oldImage = $row['image'];
    $image = $_FILES["image"]["name"];
    if(empty($image)) {
        $image = $oldImage;
    }

    if(isset($_FILES["image"])){
        $target_dir = "Views/asset/images/";
        $nameImg = $_FILES["image"]["name"];
        $target_file = $target_dir.$nameImg;
        $allowUpload = true;
        $allowTypes = ["jpg","png","jpeg","gif"];
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if(!in_array($imageFileType,$allowTypes)){
            $allowUpload = false;
        }

        if($allowUpload === true){
            move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
        }
    }
    updateCategory($idEdit, $name, $image, $desc);
    $message = "Edit thành công!!";
    echo "<script>
            setTimeout(() => {
                window.location.href = 'admin?page=category';
            },1500);
        </script>";
}
?>

<div class="alert alert-primary" role="alert">
    <h1>Quản lý danh sách phòng</h1>
</div>

<h2>Edit danh sách phòng</h2>

<form class="row g-3 needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
    <div class="col-md-12">
        <label for="name" class="form-label">Name category</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="Enter name..." required>
        <div id="nameFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="image" class="form-label">Image</label>
        <div style="position: relative;">
            <input
                type="file" class="form-control" name="image" id="image"
                onchange="
                    const input = document.querySelector('#image');
                    const oldImage = document.querySelector('#oldImage');
                    oldImage.remove();
                    input.removeAttribute('style');
                "
                style="color: transparent;"
            />
            <span id="oldImage" style="position: absolute; left: 120px; top: 50%; transform: translateY(-50%);"><?php echo $row['image']; ?></span>
        </div>
        <div id="imageFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" id="desc" name="desc" placeholder="Enter description..." rows="3" required><?php echo $row['description']; ?></textarea>
        <div id="descFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" name="edit" type="submit">Edit</button>
    </div>
    <?php
    echo isset($message) ? "<div class='alert alert-success col-12' role='alert'>$message.</div>" : "";
    ?>
</form>
