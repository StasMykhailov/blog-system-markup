<?php
    require "functions.php";
    require "header.php";
?>

<div class="container">

    <?php
    if(!isset($_GET['user-id'])) {
        header("Location: index.php");
    } else {
        $posts = getPhotosByUserId($_GET['user-id'],
            (isset($_GET['page']) && $_GET['page'] > 1) ? $_GET['page'] : 1);

        foreach($posts as $post) {
            ?>

            <div class="post">

                <?php if($post['image']) { ?>
                    <hr />
                    <img src="img/<?php echo $post['image']; ?>" />
                <?php } ?>
                 <p class="post-when-by">
                    <?php echo $post['createdAt']; ?>
                </p>
            </div>
            <?php


        }

    }

    ?>


    <nav>
        <ul class="pagination">
            <li>
                <a href="photos.php?user-id=<?php echo ($_GET['page'] < 2) ?
                    $_GET['user-id'] . "&page=1" : $_GET['user-id'] . "&page=" . ($_GET['page'] - 1)
                ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php
            $postCount = getPhotosCount($_GET['user-id']);
            $pageCount = ceil($postCount / 2);

            for($i=0;$i<$pageCount;$i++) {

                ?>

                <li><a href="photos.php?user-id=<?php
                    echo $_GET['user-id'] . "&page=" . ($i + 1)
                    ?>"><?php echo $i + 1; ?></a></li>

            <?php } ?>
            <li>
                <a href="photos.php?user-id=<?php
                if (!isset($_GET['page']) && $pageCount > 1) {
                    echo $_GET['user-id'] . "&page=2";
                }
                elseif ($_GET['page'] >= $pageCount) {
                    echo $_GET['user-id'] . "&page=" . $pageCount;
                }
                else {
                    echo $_GET['user-id'] . "&page=" . ($_GET['page'] + 1);
                }
                ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

</div>
</body>
</html>