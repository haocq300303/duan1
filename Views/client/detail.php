<?php
    if(isset($_POST['add']) ) {
        $content = $_POST['content'];
        $id_user = $_SESSION['user']['id'];
        $id_room = $row['id'];
        insertFeedback($content, $id_user, $id_room);
    }
    $feedbacks = getAllFeedbackForRoom($row['id']);

    if(isset($_POST['book'])) {
        $idRoom = $row['id'];
        $image = $row['image'];
        $nameRoom = $row['name'];
        $desc = $row['description'];
        $price = $row['price'];
        $infoRoom = [$idRoom, $image, $nameRoom, $desc, $price];

        if(isset($_SESSION['cart']) === false) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $infoRoom;
        echo "<script>window.location.href = '?page=checkout'</script>";
    }

?>

<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-6 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" style="height: 600px;object-fit: cover;" src="Views/asset/images/<?php echo $row['image']; ?>">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">

                    <h2 class="text-sm title-font text-gray-500 tracking-widest">NAME ROOM</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?php echo $row['name']; ?></h1>
                    <div class="flex mb-4">
                    <span class="flex items-center">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <span class="text-gray-600 ml-3">4 Reviews</span>
                  </span>
                    <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
                    <a class="text-gray-500">
                      <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                      </svg>
                    </a>
                    <a class="ml-2 text-gray-500">
                      <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                      </svg>
                    </a>
                    <a class="ml-2 text-gray-500">
                      <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>
                    </a>
                  </span>
                    </div>
                    <p class="leading-relaxed"><?php echo $row['description']; ?></p>
                    <div>
                        <form class="flex mt-4" action="?page=detail&idDetail=<?php echo $row['id']; ?>" class="mt-3" method="post">
                        <span class="title-font font-medium text-2xl text-gray-900">$<?php echo $row['price']; ?></span>
                        <button name="book" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Đặt phòng</button>
                        <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                            </svg>
                        </button>
                        </form>
                    </div>
                    <div class="flex flex-col mt-6">
                <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">Feedback</h1>
                <?php
                    foreach ($feedbacks as $key => $value) {
                        extract($value);
                ?>
                <div class="bg-white rounded p-4 mt-2">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                    alt="Bonnie Green"
                                >
                                <?php
                                   $userFeedback = getOneUser($id_user);
                                   echo $userFeedback['fullname'];
                                ?>
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <time pubdate datetime="2022-03-12" title="March 12th, 2022"><?php echo $created_at;?></time>
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400"><?php echo $content;?></p>
                </div>
                <?php } ?>
                <?php if(isset($_SESSION['user'])) { ?>
                        <form action="?page=detail&idDetail=<?php echo $row['id']; ?>" class="mt-3" method="post">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6" name="content"
                                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                  placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit" name="add"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Post comment
                    </button>
                        </form>
                <?php } else { ?>
                <h3 class="text-red-500 mt-3">Đăng nhập để có thể bình luận!!!</h3>
                <?php } ?>
            </div>
            </div>
        </div>
    </div>
</section>