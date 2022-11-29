<div class="alert alert-primary" role="alert">
    <h1>Quản lý thành viên</h1>
</div>
<button type="button" class="btn btn-primary" onclick="location.href='<?=URL?>admin?page=user&act=add'">Thêm thành viên</button>
<table class="table table-hover rounded mt-3" style="border: 2px solid #ccc; border-collapse: revert;" >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Fullname</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
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
            <td><?php echo $fullname;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $role;?></td>
            <td style="text-align: center;">
                <button
                        type="button" class="btn btn-danger"
                        data-bs-toggle="modal" data-bs-target="#delete"
                        onclick="
                                const result = confirm('Bạn có chắc chắn muốn xóa không?');
                                if(result){
                                location.href='<?=URL?>admin?page=user&idDelete=<?php echo $id; ?>'
                                }"
                >
                    Xóa
                </button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

