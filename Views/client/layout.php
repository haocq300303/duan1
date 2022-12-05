<?php
    session_start();
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $checkUser = checkuser($email, $password);
        if (is_array($checkUser)) {
            $success = true;
            $_SESSION['user'] = $checkUser;
            if ($checkUser['role'] == 'ADMIN'){
                $_SESSION['userAdmin'] = true;
                header('Location: /duan1/admin');
            }
        } else {
            $error = true;
        }
    }

    if(isset($_POST['register'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = insertUser($fullname, $email, $password, 'USER');
        if (is_array($user)) {
            $_SESSION['user'] = $user;
            $success = true;
        }
    }

    if(isset($_POST['logout'])) {
        session_unset();
    }

    if(isset($_POST['lostPassword'])) {
        $email = $_POST['emailUser'];
        $emailUser = getPassword($email);
        if (is_array($emailUser)) {
            $_SESSION['message'] = 'Mật khẩu của bạn là: '.$emailUser['password'];
            $messagePass = true;
        } else {
            $_SESSION['message'] = 'Sai email!!';
            $messagePass = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ROSEDALE HOTEL</title>
    <link rel="stylesheet" href="<?=FILE_PATH?>/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Roboto:wght@400;900&display=swap"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Roboto:wght@400;700&display=swap"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="<?=FILE_PATH?>/js/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css"
    />
    <link
            rel="stylesheet"
            href="<?=FILE_PATH?>/js/OwlCarousel2-2.3.4//dist/assets/owl.theme.default.min.css"
    />
    <link rel="canonical" href="https://rosedale-hotel.myharavan.com/" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
            rel="stylesheet"
            type="text/css"
            href="https://npmcdn.com/flatpickr/dist/themes/dark.css"
    />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    />
    <link
            href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
            rel="stylesheet"
    />

    <link
            href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:wght@700&family=Inter:wght@400;500&family=Roboto:ital,wght@0,500;1,400&display=swap"
            rel="stylesheet"
    />
    <link
            href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:wght@700&family=Roboto:ital,wght@0,500;1,400&display=swap"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body>
<header>
    <!-- header-->
    <div class="max-w-8xl mx-auto mt-10">
        <div class="mt5 justify-between justify-items-center flex px-40 sa">
            <a href="<?=URL?>" class="px-5">
                <img src="Views/asset/images/logo.wed.webp" alt="" class="w-40" />
            </a>

            <nav class="flex nav-subb">
                <li><a href="<?=URL?>" class="text-xs text-white">TRANG CHỦ</a></li>

                <li class="">
                    <a href="<?=URL?>?page=collections" class="text-xs text-white"> CÁC LOẠI PHÒNG</a>
                    <ul class="nav-sub">
                        <?php
                            foreach ($categories as $key => $value) {
                            extract($value);
                        ?>
                        <li class="menu-item">
                            <a href="<?=URL?>?page=products&idProduct=<?php echo $id; ?>" class=""><?php echo $name; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="<?=URL?>?page=news" class="text-xs text-white">BÀI VIẾT- TIN TỨC</a></li>

                <li><a href="<?=URL?>?page=introduce" class="text-xs text-white">GIỚI THIỆU</a></li>

                <li>
                    <a href="#" class="<?php echo isset($_SESSION['user']) ? 'text-[#4ade80]' : ''; ?>">
                        <i class="fa-sharp fa-solid fa-circle-user text-xl" style="color: #ffffff"></i>
                    </a>
                    <?php if(isset($_SESSION['user'])) { ?>
                    <ul class="dangnhap">
                        <?php if(isset($_SESSION['userAdmin']) && $_SESSION['userAdmin'] === true) { ?>
                            <li class="py-2">
                                <a href="/duan1/admin" class="text-white hover:border-none text-sm px-8">Admin</a>
                            </li>
                        <?php } ?>
                        <li>
                            <button class="text-white text-sm px-8 py-2" name="logout" data-bs-toggle="modal" data-bs-target="#modalProfile">View profile</button>
                        </li>
                        <li>
                            <form action="" method="post">
                            <button class="text-white text-sm px-8 py-2" name="logout">Thoát</button>
                            </form>
                        </li>
                    </ul>
                    <?php } else { ?>
                    <ul class="dangnhap">
                        <li>
                            <button class="text-white text-sm px-8 py-2" data-bs-toggle="modal" data-bs-target="#modalLogin">Đăng nhập</button>
                        </li>
                        <li>
                            <button class="text-white text-sm px-8 py-2" data-bs-toggle="modal" data-bs-target="#modalRegister">Đăng ký</button>
                        </li>
                    </ul>
                    <?php } ?>
                </li>
                <li class="">
                    <a class="" href="#">
                        <i class="fas fa-search text-xl" style="color: #ffffff"></i>
                    </a>
                </li>
            </nav>
        </div>
    </div>
</header>

<!--banner-->
<?php if(!isset($_GET['page'])) { ?>
<section class="slider owl-carousel owl-theme">
    <?php
        foreach ($sliders as $key => $value) {
        extract($value);
    ?>
    <div class="slider-item"
         style="
             background-image: url('Views/asset/images/<?php echo $image; ?>');
             background-position: center;
             background-repeat: no-repeat;
             background-size: cover;
         "
    >
        <div class="text-hi">
            <div class="text py-52 text-center ">
                <h1 class="white text-4xl pb-7 pt-5 ss"><?php echo $title; ?></h1>
                <div class=" py-5 border-t-2 v "> </div>
                <p class="white font-bold text-7xl pb-5"><?php echo $desc; ?></p>
                <h2 class="text-white g"><?php echo $content; ?></h2>
            </div>
        </div>
    </div>
    <?php } ?>
</section>
<?php } else { ?>
<section class="slider">
    <div class="one h-96">
        <div class="text-hi">
            <div class="text py-32 text-center">
                <p class="white font-bold text-5xl pb-5">
                    <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : "";
                        switch ($page) {
                            case "collections":
                                echo "Tất cả loại phòng";
                                break;
                            case "news":
                                echo "Tin tức";
                                break;
                            case "introduce":
                                echo "Giới thiệu";
                                break;
                            case "detail":
                                echo "Chi tiết phòng";
                                break;
                            case "checkout":
                                echo "Checkout";
                                break;
                            case "products":
                                if(isset($_GET['idProduct'])) {
                                    $idProduct = $_GET['idProduct'];
                                    $products = getAllCategory();
                                    foreach ($products as $key => $value){
                                        extract($value);
                                        if($id == $idProduct) {
                                            echo $name;
                                            break;
                                        }
                                    }
                                }
                                break;
                        }
                    ?>
                </p>
                <p class="white italic pb-7 pt-5">
                    Rosedale Hotel vui lòng khách đến - Hài lòng khách đi
                </p>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<div class="container" style="padding: 0 !important;">
    <?php include $VIEW;?>
</div>

<footer>
    <div class="bg-[#1E1E1E] px-2">
        <div class="grid grid-cols-4 gap-8 py-12 max-w-5xl mx-auto">
            <div class="text-white">
                <!--cột 1-->
                <h2 class="a">THÔNG TIN</h2>
                <div class="flex mt-7 items-center">
                    <i class="fa fa-phone" style="font-size: 20px; color: white"></i>

                    <p class="text-sm px-2 text-[#C4C4BF]">0973.4344.85</p>
                </div>

                <div class="flex py-2 items-center">
                    <i
                            class="fa fa-envelope"
                            style="font-size: 16px; color: white"
                    ></i>
                    <p class="text-sm px-2 text-[#C4C4BF]">nhom5dz@gmail.com</p>
                </div>

                <div class="flex py-5 items-center">
                    <a href="">
                        <i
                                class="fa fa-twitter-square"
                                style="font-size: 30px; color: white"
                        ></i>
                        <i
                                class="fa fa-facebook-square px-3"
                                style="font-size: 30px; color: white"
                        ></i>
                        <i
                                class="fa fa-google-plus-square"
                                style="font-size: 30px; color: white"
                        ></i>
                        <i
                                class="fa fa-instagram px-3"
                                style="font-size: 30px; color: white"
                        ></i>
                    </a>
                </div>
            </div>
            <!--cột 2-->
            <div class="text-white">
                <h2 class="a">BÀI VIẾT MỚI NHẤT</h2>
                <div class="flex items-center mt-4">
                    <img
                            src="Views/asset/images/master-slider-right.png"
                            alt=""
                            class="w-1.5 h-2 ma"
                    />
                    <a href="" class="text-sm px-2 text-[#C4C4BF] py-2 ma"
                    >Tổng quan về Rosedale Hotel</a
                    >
                </div>
                <div class="py-1 border-t"></div>
                <div class="flex items-center py-1">
                    <img
                            src="Views/asset/images/master-slider-right.png"
                            alt=""
                            class="w-1.5 h-2 ma"
                    />
                    <a href="" class="text-sm px-2 text-[#C4C4BF] ma"
                    >Trải nghiệm phòng ngủ đặc biệt...</a
                    >
                </div>
                <div class="py-1 border-t"></div>
                <div class="flex items-center py-1">
                    <img
                            src="Views/asset/images/master-slider-right.png"
                            alt=""
                            class="w-1.5 h-2 ma"
                    />
                    <a href="" class="text-sm px-2 text-[#C4C4BF] ma"
                    >Tặng ăn sáng buffer cho các...</a
                    >
                </div>
                <div class="py-1 border-t py-1"></div>
                <div class="flex items-center py-1">
                    <img
                            src="Views/asset/images/master-slider-right.png"
                            alt=""
                            class="w-1.5 h-2 ma"
                    />
                    <a href="" class="text-sm px-2 text-[#C4C4BF] ma"
                    >Khuyến mãi hè 2016</a
                    >
                </div>
                <div class="py-1 border-t"></div>
            </div>

            <!--cột 3-->
            <div class="text-white">
                <h2 class="a">Về chúng tôi</h2>
                <img src="Views/asset/images/logo.wed.webp" alt="" class="mt-5 w-40" />
                <p class="text-sm py-6 text-[#C4C4BF]">
                    Nơi nghỉ dưỡng tuyệt vời, nơi thư giãn sau thời gian làm việc căng
                    thẳng của bạn và gia đình. Rosedale Hotel được xây dựng dọc theo
                    bờ biển trải dài với cát trắng, với vị trí tuyệt vời, là nơi lý
                    tưởng để bạn ngắm bình minh và hoàng hôn.
                </p>
            </div>

            <!--cột 4-->
            <div class="text-white">
                <h2 class="a">KẾT NỐI VỚI CHÚNG TÔI</h2>
                <div class="py-6">
                    <div class="container-img">
                        <div class="boi w-56"><img src="Views/asset/images/dd (1).png" alt="" /></div>
                        <div class="bo px-2 py-2 flex">
                            <img
                                    src="Views/asset/images/dd (2).png"
                                    alt=""
                                    class="border-4 border-emerald-400 w-14 h-14"
                            />
                            <p class="text-blue-800 px-2">Haravan</p>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>
</footer>
<!---->
<!--footer 2-->
<div class="bg-[#0F0F0F]">
    <div class="justify-between flex py-4 max-w-5xl mx-auto">
        <div class="footer2">
            <a href="" class="text-xs">Trang chủ</a>
            <a href="" class="text-xs"> Bài viết- Tin tức</a>
            <a href="" class="text-xs"> Giới thiệu</a>
            <a href="" class="text-xs"> Liên hệ </a>
        </div>
        <div class="">
            <h2 class="text-white">Nhóm 5 khách sạn</h2>
        </div>
    </div>
</div>

<!--Modal login-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalLogin" tabindex="-1" aria-labelledby="modalLogin" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between items-center p-4 pb-0 rounded-t-md">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white" id="exampleModalCenteredScrollableLabel">
                    Login to ROSEDALE HOTEL
                </h5>
                <button type="button"
                        class="btn-close box-content flex justify-center items-center w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close" style="font-size: 20px;"><i class="fa-sharp fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body relative px-6">
                <form class="space-y-6" action="" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalLostPass" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                    </div>
                    <button type="submit" name="login" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                    <div class="text-sm pb-4 font-medium text-gray-500 dark:text-gray-300">
                        Not registered? <a href="" class="text-blue-700 hover:underline dark:text-blue-500" data-bs-toggle="modal" data-bs-target="#modalRegister" data-bs-dismiss="modal" aria-label="Close">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal resgister-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalRegister" tabindex="-1" aria-labelledby="modalRegister" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between items-center p-4 pb-0 rounded-t-md">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white" id="exampleModalCenteredScrollableLabel">
                    Resgister
                </h5>
                <button type="button"
                        class="btn-close box-content flex justify-center items-center w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close" style="font-size: 20px;"><i class="fa-sharp fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body relative px-6">
                <form class="flex flex-col gap-3" action="" method="post">
                    <div>
                        <label for="fullname" class="block text-sm font-medium text-gray-900 dark:text-white">Your fullname</label>
                        <input name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter fullname..." required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" name="register" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
                    <div class="text-sm pb-4 font-medium text-gray-500 dark:text-gray-300">
                        Do you already have an account? <a href="" class="text-blue-700 hover:underline dark:text-blue-500" data-bs-toggle="modal" data-bs-target="#modalLogin" data-bs-dismiss="modal" aria-label="Close">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal error-->
<?php if(isset($error)) { ?>
<button type="button" id="modalError" style="display: none;" data-bs-toggle="modal" data-bs-target="#error">
</button>
<?php } ?>
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
     id="error" data-bs-backdrop="error" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-body relative p-4">
                <h1 class="text-red-600">Thông tin không chính xác!!!</h1>
            </div>
            <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-2 border-t border-gray-200 rounded-b-md">
                <button type="button"
                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-dismiss="modal"
                >
                    Xác nhận
                </button>
            </div>
        </div>
    </div>
</div>

<!--Modal success-->
<?php if(isset($success)) { ?>
    <button type="button" id="modalSuccess" style="display: none;" data-bs-toggle="modal" data-bs-target="#success">
    </button>
<?php } ?>
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
     id="success" data-bs-backdrop="success" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-body relative p-4">
                <h1 class="text-red-600">Đăng nhập thành công</h1>
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

<!--Modal profile-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalProfile" tabindex="-1" aria-labelledby="modalProfile" aria-modal="true" role="dialog">
    <form action="" method="post">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                        Thông tin thành viên
                    </h5>
                    <button type="button"
                            class="btn-close box-content flex justify-center items-center    w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close" style="font-size: 30px;"><i class="fa-sharp fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body relative p-4">
                    <div class="mb-2">
                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Your fullname</label>
                        <input id="name" name="name" value="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['fullname'] : ''; ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter name..." required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" value="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['email'] : ''; ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@gmail.com" required>
                    </div>
                </div>
                <div
                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal lost password-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
     id="modalLostPass" data-bs-backdrop="modalLostPass" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-body relative p-4">
                <form class="space-y-6" action="" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="emailUser" id="emailUser" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                    </div>
                    <div
                            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-2 border-t border-gray-200 rounded-b-md">
                        <button type="submit"
                                class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                name="lostPassword"
                        >
                            Xác nhận
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if(isset($messagePass)) { ?>
    <button type="button" id="messagePass" style="display: none;" data-bs-toggle="modal" data-bs-target="#messagePassword">
    </button>
<?php } ?>
<!--Modal message-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
     id="messagePassword" data-bs-backdrop="messagePassword" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-body relative p-4">
                <h1 class="text-red-600"><?php echo isset($_SESSION['message']) ? $_SESSION['message'] : "";?></h1>
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

</body>
<script>
    document.getElementById('modalError').click();
</script>
<script>
    document.getElementById('messagePass').click();
</script>
<script>
    document.getElementById('modalSuccess').click();
</script>
<script>
    document.getElementById('modalSuccessBook').click();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<Script src="<?=FILE_PATH?>/js/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></Script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel();
    });

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 7000,
        responsive: {
            0: {
                items: 1
            },
            1000: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>

    const all = document.querySelector(".all")

    const songuoi = document.querySelector(".songuoi")
    const thoat = document.querySelector(".thoat")


    all.addEventListener("click", function () {
        songuoi.classList.add("active")

    })
    thoat.addEventListener("click", function () {
        songuoi.classList.remove("active")

    })
    const cong = document.querySelector(".cong")
    const tru = document.querySelector(".tru")
    let manh = document.querySelector(".manh span")
    let i = 0

    cong.addEventListener("click", function () {

        i = i + 1
        manh.innerHTML = i
        alll()
    })
    tru.addEventListener("click", function () {

        if (i <= 0) { i = 0 }
        else {
            i = i - 1
        }
        manh.innerHTML = i
        alll()
    })

    function alll() {
        allll = i
        all.value = allll + " " + " Người"
    }



</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$(document).ready(function () {
        $(".travel").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            arrows: false,
            // dots:true,
        });
    });
    $(document).ready(function () {
        $(".personnel").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            arrows: false,
            // dots:true,
        });
    });
</script>
</html>
