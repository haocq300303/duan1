<div class="alert alert-primary" role="alert">
    <h1>Quản lý phòng</h1>
</div>
<button type="button" class="btn btn-primary" onclick="location.href='<?=URL?>admin?page=product&act=add'">Thêm phòng</button>
<table class="table table-hover rounded mt-3" style="border: 2px solid #ccc; border-collapse: revert;" >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result as $key => $value){
        extract($value);
        ?>
        <tr>
            <th scope="row"><?php echo $id;?></th>
            <td><?php echo $name;?></td>
            <td><img style="width: 130px; height: 100px; border-radius: 50%; object-fit: cover;" src="Views/asset/images/<?php echo $image;?>" alt=""></td>
            <td>$<?php echo $price;?></td>
            <td><?php echo $description;?></td>
            <td>
                <?php
                    foreach ($categories as $index => $item){
                        if ($id_category == $item['id']) {
                            echo $item['name'];
                        }
                    }
                ?>
            </td>
            <td style="text-align: center;">
                <button
                        type="button" class="btn btn-primary"
                        onclick="location.href='<?=URL?>admin?page=product&act=edit&idEdit=<?php echo $id; ?>'"
                >
                    Sửa
                </button>
                <button
                        type="button" class="btn btn-danger mt-2"
                        data-bs-toggle="modal" data-bs-target="#delete"
                        onclick="
                                const result = confirm('Bạn có chắc chắn muốn xóa không?');
                                if(result){
                                location.href='<?=URL?>admin?page=product&idDelete=<?php echo $id; ?>'
                                }"
                >
                    Xóa
                </button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

