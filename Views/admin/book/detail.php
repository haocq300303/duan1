<?php $totalMoney = 0; ?>
<div class="alert alert-primary" role="alert">
    <h1>Detail book</h1>
</div>
<a href="admin?page=book" class="btn btn-primary"><-- Back</a>
<h1 class="mx-2 text-2xl">Các phòng đã đặt: </h1>
<div class="flex justify-space-between items-center gap-3">
    <?php
    foreach ($rooms as $key => $value){
        extract($value);
        $room = getOneProduct($id_room);
        $services[] = loadAllServiceForRoom($id_room);
        $totalMoney += $price;
        ?>
        <ul style="list-style: none; margin: 10px 0;" >
            <li>Tên phòng: <?php echo $room['name'];?></li>
            <li>Hình ảnh: <img style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" src="Views/asset/images/<?php echo $room['image'];?>" alt=""></li>
            <li>Giá phòng: $<?php echo $price;?></li>
        </ul>
    <?php } ?>
</div>
<h1 class="mb-2 text-2xl">Các dịch vụ: </h1>
<ul style="list-style: none;">
    <?php
    foreach ($services as $key => $value){
        foreach ($value as $index => $item) {
            extract($item);
            $nameRoom = getOneProduct($id_room);
        ?>
            <li><?php echo $name.' '.$nameRoom['name'];?></li>
    <?php }} ?>
</ul>
<h1 class="mt-2 text-2xl">Tổng tiền: $<?php echo $totalMoney; ?> </h1>

