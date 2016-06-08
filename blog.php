<?php
require "functions.php";
require "header.php";
?>

<div class="container">

    <?php
    if(!isset($_GET['user-id'])) {
        header("Location: index.php");
    } else {
        $posts = getPostsByUserId($_GET['user-id'], (isset($_GET['page']) && $_GET['page'] > 1));
        foreach($posts as $post) {
            ?>

            <div class="post">
                <h1 class="post-header"><?php echo $post['title'] ?></h1>
                <?php if($post['image']) { ?>
                    <hr />
                    <img src="img/<?php echo $post['image']; ?>" />
                <?php } ?>
                <hr />
                <p class="post-content">
                    <?php echo $post['body']; ?>
                </p>
                <hr />
                <p class="post-when-by">
                    <?php echo $post['createdAt']; ?>
                </p>
            </div>
            <?php
        }
    }
    ?>

    <!--    <div class="post">-->
    <!--        <h1 class="post-header">Hello World</h1>-->
    <!--        <hr />-->
    <!--        <p class="post-content">-->
    <!--            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.-->
    <!--        </p>-->
    <!--        <hr />-->
    <!--        <p class="post-when-by">-->
    <!--            Posted on July 23, 18:30-->
    <!--        </p>-->
    <!--    </div>-->

    <!--    <div class="post">-->
    <!--        <h1 class="post-header">My Favorite Dog</h1>-->
    <!--        <hr />-->
    <!--        <img src="img/dog.jpg" />-->
    <!--        <hr />-->
    <!--        <p class="post-content">-->
    <!--            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.-->
    <!--        </p>-->
    <!--        <hr />-->
    <!--        <p class="post-when-by">-->
    <!--            Posted on July 23, 18:30 by Андрей Иванов-->
    <!--        </p>-->
    <!--    </div>-->


        <nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                    $postsCount = getPostsCount($_GET['user-id']);
                    $pageCount = ceil($postCount / 2);
                    for($i=0;$i<$pageCount;$i++);
                ?>
                <li><a href="blog.php?user-id=<?php echo $_GET['user-id'] . "&page=" . ($i+1) ?>"><?php echo $i +1 ?></a></li>

                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

</div>
</body>
</html>