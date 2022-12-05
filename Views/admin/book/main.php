<div class="alert alert-primary" role="alert">
    <h1>Quản lý đặt phòng</h1>
</div>
<table class="table table-hover rounded mt-3" style="border: 2px solid #ccc; border-collapse: revert;" >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Fullname</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Endow</th>
        <th scope="col">Date checkin</th>
        <th scope="col">Date checkout</th>
        <th scope="col">Total price</th>
        <th scope="col">Status</th>
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
            <td><?php echo $phone;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $vocher;?></td>
            <td><?php echo $checkin_date;?></td>
            <td><?php echo $checkout_date;?></td>
            <td><?php echo $total_price;?></td>
            <td><?php echo $status;?></td>
            <td style="text-align: center;">
                <button
                        type="button" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#detailBook"
                        onclick="location.href='<?=URL?>admin?page=book&act=detail&idDetail=<?php echo $id; ?>'"
                >
                    Detail
                </button>
                <button
                        type="button" class="btn btn-danger mt-2"
                        style="width: 64px;"
                        onclick="
                                const result = confirm('Bạn có chắc chắn muốn xóa không?');
                                if(result){
                                location.href='<?=URL?>admin?page=book&idDelete=<?php echo $id; ?>'
                                }"
                >
                    Xóa
                </button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

