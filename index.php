<?php
include('./inc/header.php');
include('./inc/naavbar.php');
?>

<body>

    <!-- Responsive navbar-->

    <!-- Page content-->
    <div class="container mt-3">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2022</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="post.php">Read more →</a>

                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">

                    <?php
                    $posts = "SELECT * FROM `posts`";
                    $selectallposts = mysqli_query($conn, $posts);

                    while ($posty = mysqli_fetch_array($selectallposts)) {

                        $post_id = $posty["post_id"];
                        $post_title = $posty["post_title"];
                        $post_img = $posty["post_img"];
                        $post_date = $posty["post_date"];
                        $post_content = substr( $posty["post_content"],0,100);
                        $category = $posty["category"];
                    ?>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="./img/<?= $post_img?>" height="210" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?=$post_date?></div>
                                    <h2 class="card-title h4"><?=$post_title?></h2>
                                    <p class="card-text"><?=$post_content?></p>
                                    <a class="btn btn-primary" href="post.php?pid=<?= $post_id?> ">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->

                        </div>
                    <?php
                    }

                    ?>


                </div>
                <!-- Pagination-->

            </div>
            <!-- Side widgets-->
            <?php
            include('./inc/card.php');
            ?>
        </div>
    </div>
    <!-- Footer-->
    <?php
    include('./inc/footer.php');
    ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>