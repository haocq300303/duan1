<?php
    if(isset($_POST['search'])) {
        $checkin_date = $_POST['checkin_date'];
        $checkout_date = $_POST['checkout_date'];
        $id_category = $_POST['category'];

        $infoUser = [$checkin_date, $checkout_date];

        if(isset($_SESSION['infoUser']) === false) {
            $_SESSION['infoUser'] = [];
        }
        $_SESSION['infoUser'] = $infoUser;
        echo "<script>window.location.href = '?page=products&idProduct=$id_category'"."</script>";
    }
?>

<div class="manh1">
    <h2 class="ba text-center py-10">TÌM PHÒNG</h2>
    <div class="wraper py-5">
        <form action="" method="post">
            <div class="manh-2 row">
                    <div class="manh-3">
                        <div class="select">
                            <select name="category" id="" class="text-sm text-[#999999]">
                                <?php foreach ($categories as $key => $value) {
                                    extract($value);
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="manh-3">
                        <input
                                id="myID"
                                name="checkin_date"
                                type="text"
                                placeholder="Ngày check in"
                                onfocus="(this.type='datetime-local')"
                                class="focus:border-[#1ABC9C] focus:ring-[#1ABC9C] focus:ring-1 sm:text-sm"
                        />
                    </div>

                    <div class="manh-3">
                        <input
                                id="myID"
                                name="checkout_date"
                                type="text"
                                placeholder="Ngày check out"
                                onfocus="(this.type='datetime-local')"
                                class="focus:border-[#1ABC9C] focus:ring-[#1ABC9C] focus:ring-1 sm:text-sm"
                        />
                    </div>

                    <div class="manh-3 aaaa">
                        <i class="fa fa-user" style="font-size: 20px; color: #999999"></i>
                        <br />
                        <input
                                type="text"
                                placeholder="Số người"
                                class="all focus:border-[#1ABC9C] focus:ring-[#1ABC9C] focus:ring-1 sm:text-sm"
                        />

                        <div class="songuoi">
                            <li>
                                <div class="manh-lon">
                                    <p>Số lượng</p>
                                </div>
                                <div class="manh">
                                    <i
                                            class="fa fa-minus-square tru"
                                            style="font-size: 20px; color: #999999"
                                    ></i>

                                    <span>0</span>
                                    <i
                                            class="fa fa-plus-square cong"
                                            style="font-size: 20px; color: #999999"
                                    ></i>
                                </div>
                            </li>

                            <a class="thoat text-base">Lưu</a>
                        </div>
                    </div>
                    <div class="manh-3">
                        <button type="submit" name="search" class="bg-[#1ABC9C] text-white px-2 py-1 rounded-md">
                            Tìm kiếm
                        </button>
                    </div>
            </div>
        </form>
    </div>
</div>

<!--dưới đặt phòng-->
<div class="content">
    <div class="grid grid-cols-3 gap-8 max-w-5xl mx-auto">
        <div class="">
            <img
                    src="Views/asset/images/about_img_1.jpg"
                    alt=""
                    class="rounded-full mt-20 center"
            />
            <h2 class="a text-[#1ABC9C] text-center py-8">THỰC ĐƠN FFF</h2>
            <p class="text-white text-sm text-center">
                Đồ uống và thực đơn tại Rosedale luôn đa dạng, phù hợp với mọi lứa tuổi,
                làm hài lòng những vị khách khó tính nhất.
            </p>
        </div>
        <div class="">
            <img
                    src="Views/asset/images/about_img_2.jpg"
                    alt=""
                    class="rounded-full mt-20 center"
            />
            <h2 class="a text-[#1ABC9C] text-center py-8">TẬN HƯỞNG KÌ NGHỈ</h2>
            <p class="text-white text-sm text-center">
                Bạn không cần phải đặt cọc, hãy ở và tận hưởng không khí tại Rosedale
                rồi thanh toán sau.
            </p>
        </div>
        <div class="">
            <img
                    src="Views/asset/images/about_img_3.jpg"
                    alt=""
                    class="rounded-full mt-20 center"
            />
            <h2 class="a text-[#1ABC9C] text-center py-8">
                NHÀ HÀNG LUÔN PHỤC VỤ 24 GIỜ
            </h2>
            <p class="text-white text-sm text-center">
                Nhà hàng tại Rosedale luôn mở cửa phục vụ quý khách 24 giờ/ngày, với các
                món ăn Việt - Âu - Á, với các đầu bếp có tay nghề cao.
            </p>
        </div>
        <div class="">
            <img
                    src="Views/asset/images/about_img_4.jpg"
                    alt=""
                    class="rounded-full mt-5 center"
            />
            <h2 class="a text-[#1ABC9C] text-center py-8">DỊCH VỤ SPA</h2>
            <p class="text-white text-sm text-center">
                Bạn mệt mỏi sau 1 ngày tham quan du lịch, bạn có thể sử dụng các dịch vụ
                massage, thư giãn giúp bạn thoải mái hơn.
            </p>
        </div>
        <div class="">
            <img
                    src="Views/asset/images/about_img_5.jpg"
                    alt=""
                    class="rounded-full mt-5 center"
            />
            <h2 class="a text-[#1ABC9C] text-center py-8">SPA & MASSAGE</h2>
            <p class="text-white text-sm text-center">
                Rosedale Hotel có 200 phòng nghỉ tiện nghi, gần như với một ban công
                riêng nhìn ra khu vườn quyến rũ xinh đẹp.
            </p>
        </div>
        <div class="">
            <img
                    src="Views/asset/images/about_img_6.jpg"
                    alt=""
                    class="rounded-full mt-5 center"
            />
            <h2 class="a text-[#1ABC9C] text-center py-8">PHÒNG CỦA CHÚNG TÔI</h2>
            <p class="text-white text-sm text-center">
                Rosedale Hotel có 200 phòng nghỉ tiện nghi, gần như với một ban công
                riêng nhìn ra khu vườn quyến rũ xinh đẹp.
            </p>
        </div>
    </div>
</div>
<!--phòng nổi bật-->

<h2 class="ba text-center py-10">Phòng nổi bật</h2>

<div class="">
    <div class="travel ml-4">
        <?php
            foreach ($products as $key => $value) {
            extract($value);
        ?>
        <div class="location item1">
            <a href="?page=detail&idDetail=<?php echo $id; ?>"
            ><img src="Views/asset/images/<?php echo $image; ?>" alt="" style="width: 450px; object-fit: cover;" />

                <div class="">
                    <a href=""
                    ><p class="text-[#1ABC9C] font-bold text-base pt-5"><?php echo $name; ?></p></a
                    >
                    <a href="?page=detail&idDetail=<?php echo $id; ?>"><i class="text-sm text-[] py-2">Xem chi tiết </i></a>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>

    <!--aaaa-->
    <div class="abc mt-10">
        <div class="py-32 grid grid-cols-4 gap-8 max-w-5xl mx-auto">
            <div class="item-wrapper">
                <div class="item-title">2800</div>
                <div class="item-dot">•</div>
                <div class="item">Khách</div>
            </div>
            <div class="item-wrapper">
                <div class="item-title">35000</div>
                <div class="item-dot">•</div>
                <div class="item">THỜI GIAN</div>
            </div>
            <div class="item-wrapper">
                <div class="item-title">99.9%</div>
                <div class="item-dot">•</div>
                <div class="item">HÀI LÒNG</div>
            </div>
            <div class="item-wrapper">
                <div class="item-title">100%</div>
                <div class="item-dot">•</div>
                <div class="item">QUAY LẠI</div>
            </div>
        </div>
    </div>

    <!---->

    <!--Thư viện hình-->
    <div class="max-w-5xl mx-auto mt-20">
        <div class="grid grid-cols-2 gap-10">
            <div class="">
                <h2 class="black py-4">Thư viện hình</h2>
                <div class="py-2 border-t-2 border-[#1ABC9C] oo"></div>

                <div class="grid grid-cols-2 gap-8 py-4">
                    <div class="">
                        <img src="Views/asset/images/gallery_img_1.jpg" alt="" />
                        <div class="grid grid-cols-2 gap-8 py-10">
                            <div class="">
                                <img
                                        src="Views/asset/images/gallery_img_6.jpg"
                                        alt=""
                                        class="w-40"
                                />
                            </div>

                            <div class="">
                                <img src="Views/asset/images/gallery_img_7.jpg" alt="" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 ee">
                        <div class="aaa">
                            <img src="Views/asset/images/gallery_img_2.jpg" alt="" />
                        </div>
                        <div class="aaa">
                            <img src="Views/asset/images/gallery_img_3.jpg" alt="" />
                        </div>
                        <div class="aaa">
                            <img src="Views/asset/images/gallery_img_4.jpg" alt="" />
                        </div>
                        <div class="aaa">
                            <img src="Views/asset/images/gallery_img_5.jpg" alt="" />
                        </div>
                        <div class="aaa">
                            <img src="Views/asset/images/gallery_img_8.jpg" alt="" />
                        </div>
                        <div class="aaa">
                            <img src="Views/asset/images/gallery_img_9.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!--tin tuc-->

            <div class="">
                <h2 class="black py-4">Tin tức</h2>
                <div class="py-2 border-t-2 border-[#1ABC9C] oo"></div>
                <div class="grid grid-cols-1 divide-y-2">
                    <div class="py-5">
                        <div class="bg-[#1ABC9C] rounded-md text-center text-white left">
                            <div class="">
                                <p class="pt-1 font-bold">18</p>
                                <div class="text-xs flex px-1 font-bold">
                                    <p c>Tháng</p>
                                    <p class="px-1 pb-2">02</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6">
                            <a href="">
                                <p class="e text-sm">Tổng quan về Rosedale Hotel</p>
                            </a>
                            <p class="text-sm py-1">
                                Windmill Hotel được xây dựng dọc bờ biển, dựa theo ý tưởng Hy
                                Lạp cổ đại, nhưng vẫn mang hình...
                            </p>
                        </div>
                    </div>
                    <div class="py-5">
                        <div class="bg-[#1ABC9C] rounded-md text-center text-white left">
                            <div class="">
                                <p class="pt-1 font-bold">18</p>
                                <div class="text-xs flex px-1 font-bold">
                                    <p c>Tháng</p>
                                    <p class="px-1 pb-2">02</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6">
                            <a href="">
                                <p class="e text-sm">
                                    Trải nghiệm phòng ngủ đặc biệt với giá phải chăng
                                </p>
                            </a>
                            <p class="text-sm py-1">
                                Windmill Hotel được xây dựng dọc bờ biển, dựa theo ý tưởng Hy
                                Lạp cổ đại, nhưng vẫn mang hình...
                            </p>
                        </div>
                    </div>
                    <div class="py-5">
                        <div class="bg-[#1ABC9C] rounded-md text-center text-white left">
                            <div class="">
                                <p class="pt-1 font-bold">18</p>
                                <div class="text-xs flex px-1 font-bold">
                                    <p>Tháng</p>
                                    <p class="px-1 pb-2">02</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6">
                            <a href="">
                                <p class="e text-sm">
                                    buffer cho các chị em phụ nữ trong ngày 20/10
                                </p>
                            </a>
                            <p class="text-sm py-1">
                                Windmill Hotel được xây dựng dọc bờ biển, dựa theo ý tưởng Hy
                                Lạp cổ đại, nhưng vẫn mang hình...
                            </p>
                        </div>
                    </div>
                </div>
                <a href=""> <i class="text-sm text-[#1ABC9C]">Xem thêm</i></a>
            </div>
        </div>
    </div>
</div>
