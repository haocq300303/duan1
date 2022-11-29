<?php
$idEdit = isset($_GET['idEdit']) ? $_GET['idEdit'] : "";
if(isset($_POST['edit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $id_category = $_POST['category'];
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
    updateProduct($idEdit, $name, $image, $price, $desc, $id_category);
    $message = "Edit thành công!";
    echo "<script>
            setTimeout(() => {
                window.location.href = 'admin?page=product';
            },1500);
        </script>";
}
?>

<div class="alert alert-primary" role="alert">
    <h1>Quản lý phòng</h1>
</div>

<h2>Edit phòng</h2>

<form class="row g-3 needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
    <div class="col-md-12">
        <label for="name" class="form-label">Name room</label>
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
    <div class="col-md-12  d-flex flex-column">
        <label for="price" class="form-label">Price</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <span class="input-group-text">0.00</span>
            <input type="number" class="form-control" name="price" id="price" aria-label="Dollar amount (with dot and two decimal places)" value="<?php echo $row['price']; ?>" required>
        </div>
        <div id="priceFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" spellcheck="false" id="desc" name="desc" placeholder="Enter description..." rows="3" required><?php echo $row['description']; ?></textarea>
        <div id="descFeedback" class="invalid-feedback">
            Required!!!
        </div>
    </div>
    <div class="col-md-12">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" id="category" name="category" required>
            <option selected disabled value="<?php echo $row['id_category']; ?>">
            </option>
            <?php foreach ($categories as $key => $value) {
                extract($value);
                ?>
                <option <?php echo $row['id_category'] == $value['id'] ? "selected" : ""; ?> value="<?php echo $id;?>"><?php echo $name;?></option>
            <?php } ?>
        </select>
        <div id="categoryFeedback" class="invalid-feedback">
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
