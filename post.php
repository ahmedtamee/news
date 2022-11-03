<?php 
include('./inc/header.php');
include('./inc/naavbar.php');
?>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->



                    <?php 
                    
                    if(isset($_GET['pid'])){
                        $pid=$_GET['pid'];
                    }

                    $posts ="SELECT * FROM `posts` WHERE `post_id` = '$pid'";
                    $selectallposts = mysqli_query($conn, $posts);

                    while ($posty = mysqli_fetch_array($selectallposts)) {

                        $post_id = $posty["post_id"];
                        $post_title = $posty["post_title"];
                        $post_img = $posty["post_img"];
                        $post_date = $posty["post_date"];
                        $post_content =$posty["post_content"];
                        $category = $posty["category"];
                    
                    ?>
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= $post_title ?> </h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2"><?= $post_date?></div>
                            <!-- Post categories-->

                            <?php 
                            $categoriessql = "SELECT * FROM `categories` WHERE `cat_id` = '$category'";
                            $allcategoriessql = mysqli_query($conn, $categoriessql);
    
                            while ($category = mysqli_fetch_array($allcategoriessql)) {
                                $cat_id = $category['cat_id'];
                                $cat_title = $category['cat_title'];
    
                            ?>
                            <a class="badge bg-secondary text-decoration-none link-light" href="bycategory.php?cid= <?=$cat_id?>"><?= $cat_title ?></a>
                           <?php 
                            }
                           ?>

                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="./img/<?= $post_img?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?= $post_content?></p>
        
                        </section>
                    </article>

                    <?php
                    }
                    ?>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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
