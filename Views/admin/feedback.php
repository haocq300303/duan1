<div class="alert alert-primary" role="alert">
    <h1>Quản lý bình luận</h1>
</div>

<div>
    <h1 class="text-xl mb-2">Lọc comments</h1>
</div>

<select class="form-select" id="category" onchange="
        if(this.value === '') {
        location.href='<?=URL?>admin?page=feedback'
        } else {
        location.href='<?=URL?>admin?page=feedback&idRoom=' + this.value
        }"
        name="category" required
>
    <option selected value="">Tất cả</option>
    <?php foreach ($products as $key => $value) {
        extract($value);
        ?>
        <option <?php echo isset($idRoom) && $idRoom == $id ? "selected" : ""; ?> value="<?php echo $id;?>"><?php echo $name;?></option>
    <?php } ?>
</select>

<table class="table table-hover rounded mt-3" style="border: 2px solid #ccc; border-collapse: revert;" >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Content</th>
        <th scope="col">User</th>
        <th scope="col">Room</th>
        <th scope="col">Date</th>
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
            <td><?php echo $content;?></td>
            <td><?php $nameUser = getOneUser($id_user); echo $nameUser['fullname'];?></td>
            <td><?php $nameRoom = getOneProduct($id_room); echo $nameRoom['name'];?></td>
            <td><?php echo $created_at;?></td>
            <td style="text-align: center;">
                <button
                        type="button" class="btn btn-danger"
                        data-bs-toggle="modal" data-bs-target="#delete"
                        onclick="
                                const result = confirm('Bạn có chắc chắn muốn xóa không?');
                                if(result){
                                location.href='<?=URL?>admin?page=feedback&idDelete=<?php echo $id; ?>'
                                }"
                >
                    Xóa
                </button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

