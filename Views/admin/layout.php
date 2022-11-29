<?php
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Dự án 1 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=FILE_PATH?>/css/admin.css">
</head>
<body>
<div class="wrapper container">
    <div class="row">
        <div class="slidebar bg-black col-3">
            <div class="slidebar-info">
                <div class="avatar">
                    <img src="Views/asset/images/admin.png" alt="">
                </div>
                <p class="username">Admin</p>
            </div>
            <div class="slidebar-menu">
                <ul class="list">
                    <li class="list-item">
                        <a href="/duan1/" class="list-item-link">
                            <span class="icon-menu"><i class="fa-solid fa-house-user"></i></span>
                            <span>Về trang khách</span>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="/duan1/admin" class="list-item-link <?php echo $page === 'home' ? 'active' : '' ?>">
                            <span class="icon-menu"><i class="fa-solid fa-chart-pie"></i></span>
                            <span>Thống kê</span>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="?page=category" class="list-item-link <?php echo $page === 'category' ? 'active' : '' ?>">
                            <span class="icon-menu"><i class="fa-regular fa-chart-bar"></i></span>
                            <span>Quản lý danh sách phòng</span>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="?page=product" class="list-item-link <?php echo $page === 'product' ? 'active' : '' ?>">
                            <span class="icon-menu"><i class="fa-solid fa-bed"></i></span>
                            <span>Quản lý phòng</span>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="?page=user" class="list-item-link <?php echo $page === 'user' ? 'active' : '' ?>">
                            <span class="icon-menu"><i class="fa-solid fa-circle-user"></i></span>
                            <span>Quản lý thành viên</span>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="?page=feedback" class="list-item-link <?php echo $page === 'feedback' ? 'active' : '' ?>">
                            <span class="icon-menu"><i class="fa-solid fa-comment-dots"></i></span>
                            <span>Quản lý bình luận</span>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="?page=book" class="list-item-link <?php echo $page === 'book' ? 'active' : '' ?>">
                            <span class="icon-menu"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                            <span>Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="?page=service" class="list-item-link <?php echo $page === 'service' ? 'active' : '' ?>">
                            <span class="icon-menu"><i class="fa-solid fa-blender-phone"></i></i></span>
                            <span>Quản lý dịch vụ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="view col-9 px-4" style="margin-left: 320px;">
            <?php include $VIEW;?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    (function () {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>
</html>
