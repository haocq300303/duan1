<div class="py-4" style="width: 1200px;margin: 0 auto;">
    <a href="?page=collections" class="px-3 py-2 bg-blue-500 rounded text-white mt-3"><-- Back collections</a>
    <div class="grid grid-cols-3 gap-3 mt-6">
        <?php
            foreach ($productsForCate as $key => $value) {
                extract($value);
        ?>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" style="height: 255px;" src="Views/asset/images/<?php echo $image; ?>" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $name; ?></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $description; ?>.</p>
                    <span class="text-3xl font-bold text-rose-500 dark:text-white my-3 block">$<?php echo $price; ?></span>
                    <a href="?page=detail&idDetail=<?php echo $id; ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Xem ngay
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
            <?php } ?>
    </div>
</div>
