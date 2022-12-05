<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$dateNow = date("Y-m-d H:i:s");
$moneyRoom = 0;
    $services = [];
    if(isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value){
            $result = loadAllServiceForRoom($value[0]);
            $services[] = $result;
        }
    }
    if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $moneyRoom += $value[4];
    }}

    $totalMoney = isset($_SESSION['user']) ? $moneyRoom - 5 : $moneyRoom;

    if(isset($_POST['payment'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $vocher = isset($_SESSION['user']) ? 'Giảm 5$ khuyến mại thành viên' : 'không';
            $dateCheckin = $_POST['date-checkin'];
            $dateCheckout = $_POST['date-checkout'];
            $status = 'Đã thanh toán';
            $checkin = str_split($dateCheckin, 10);
            $checkout = str_split($dateCheckout, 10);

        foreach ($_SESSION['cart'] as $key => $value) {
            $book = checkBooking($value[0], $dateCheckin, $dateCheckout);
        }
        if (is_array($book)) {
            $name_room = getOneProduct($value[0]);
            $messageBook = 'Không thành công. Thời gian '.$checkin[0].' đến '.$checkout[0].' của '.$name_room['name'].' đã hết phòng. Xin quý khách vui lòng chọn ngày khác';
        } else {
            if($dateCheckin < $dateNow || $dateCheckout < $dateNow) {
                $messageBook = 'Không thành công. Thời gian checkin ' . $checkin[0] . ' đến thời gian checkout ' . $checkout[0] . ' là không hợp lệ';
            } else {
                $id_book = insertBook($name, $phone, $email, $vocher, $dateCheckin, $dateCheckout, $totalMoney, $status);
                foreach ($_SESSION['cart'] as $key => $value) {
                    insertDetaiBook($value[0], $id_book, $value[4]);
                }
                $_SESSION['cart'] = [];
                echo "<script>window.location.href = '?page=payment'</script>";
            }
        }
    }
?>

<div class="wrapper">
    <div class="">
        <h1 class="flex items-center justify-center font-bold text-blue-600 pt-6 text-md lg:text-3xl">ROSEDALE HOTEL Checkout </h1>
    </div>
    <div class="container p-12 mx-auto">
        <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
            <div class="flex flex-col md:w-full">
                <h2 class="mb-4 font-bold md:text-xl text-heading ">Address User
                </h2>
                <form class="justify-center w-full mx-auto" method="post" action="">
                    <div class="">
                        <div class="space-x-0 lg:flex lg:space-x-4">
                            <div class="w-full">
                                <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">
                                    Name</label>
                                <input
                                        value="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['fullname'] : ''; ?>"
                                        name="name" type="text" placeholder="Name"
                                       class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="Email"
                                       class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                <input
                                        value="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['email'] : ''; ?>"
                                        name="email" type="text" placeholder="Email"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        required
                                >
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="Phone" class="block mb-3 text-sm font-semibold text-gray-500">Phone</label>
                                <input
                                        value=""
                                        name="phone" type="text" placeholder="Phone"
                                       class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="date-checkin" class="block mb-3 text-sm font-semibold text-gray-500">Date checkin</label>
                                <input
                                        value="<?php echo isset($_SESSION['infoUser']) ? $_SESSION['infoUser'][0] : ''; ?>"
                                        name="date-checkin" type="datetime-local"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                        required
                                >
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="date-checkout" class="block mb-3 text-sm font-semibold text-gray-500">Date checkout</label>
                                <input
                                        value="<?php echo isset($_SESSION['infoUser']) ? $_SESSION['infoUser'][1] : ''; ?>"
                                        name="date-checkout" type="datetime-local"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                        required
                                >
                            </div>
                        </div>
                        <div class="flex items-center mt-4">
                            <label class="flex items-center text-sm group text-heading">
                                <input type="checkbox"
                                       class="w-5 h-5 border border-gray-300 rounded focus:outline-none focus:ring-1">
                                <span class="ml-2">Save this information for next time</span></label>
                        </div>
                        <div class="mt-4">
                            <button
                                name="payment"
                                class="w-full px-6 py-2 text-blue-200 bg-blue-600 hover:bg-blue-900 rounded">Tiếp tục</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
                <div class="pt-12 md:pt-0 2xl:ps-4">
                    <h2 class="text-xl font-bold">Order Summary
                    </h2>
                    <div class="mt-8">
                        <?php if(isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value){
                        ?>
                        <div class="flex flex-col space-y-4">
                            <div class="flex space-x-4 justify-space-between">
                                <div style="height: 100px;width: 200px;">
                                    <img src="Views/asset/images/<?php echo $value[1]; ?>" alt="image"
                                         style="height: 100%;object-fit: cover;width: 100%;">
                                </div>
                                <div style="width: 250px;">
                                    <h2 class="text-xl font-bold"><?php echo $value[2]; ?></h2>
                                    <p class="text-sm"><?php echo $value[3]; ?></p>
                                    <span class="text-red-600">Price</span> $<?php echo $value[4]; ?>
                                </div>
                                <div>
                                    <svg onclick="location.href='?page=checkout&deleteId=<?php echo $key; ?>'" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                    <div class="flex p-4 mt-4">
                        <h2 class="text-xl font-bold"></h2>
                    </div>
                    <div
                        class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                        Tiền phòng phải trả:<span class="ml-2">$<?php echo $moneyRoom; ?></span></div>
                    <?php if(isset($_SESSION['user'])) { ?>
                    <div
                        class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                        Ưu đãi thành viên giảm:<span class="ml-2">$5</span>
                    </div>
                    <?php } ?>
                    <?php
                        foreach ($services as $key => $value) {
                            foreach ($value as $index => $item) {
                    ?>
                        <div class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            <?php
                                $nameRoom = getOneProduct($item['id_room']);
                                echo $item['name'].' phòng '.$nameRoom['name'];
                            ?>
                        </div>
                    <?php }} ?>
                    <div
                        class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                        Tổng
                        <span class="ml-2">
                            $<?php echo $totalMoney;?>
                        </span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal success book-->
<?php if(isset($messageBook)) { ?>
    <button type="button" id="modalSuccessBook" style="display: none;" data-bs-toggle="modal" data-bs-target="#successBook">
    </button>
<?php } ?>
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
     id="successBook" data-bs-backdrop="successBook" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-body relative p-4">
                <h1 class="text-red-600"><?php echo $messageBook; ?></h1>
            </div>
            <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-2 border-t border-gray-200 rounded-b-md">
                <button type="button"
                        class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-dismiss="modal"
                >
                    Xác nhận
                </button>
            </div>
        </div>
    </div>
</div>