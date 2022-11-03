<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
        <form action="search.php" method="post">
            <div class="input-group">
                <input class="form-control" name="searchtext" type="text" placeholder="Enter search term..." />
                <button class="btn btn-primary"  type="submit" name="searchbtn" id="button-search" type="button">Go!</button>
            </div>
        </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">


                        <?php
                        $categoriessql = "SELECT * FROM `categories`";
                        $allcategoriessql = mysqli_query($conn, $categoriessql);

                        while ($category = mysqli_fetch_array($allcategoriessql)) {
                            $cat_id = $category['cat_id'];
                            $cat_title = $category['cat_title'];

                        ?>

                            <li><a href="bycategory.php?cid= <?=$cat_id?>"><?= $cat_title ?></a></li>



                        <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- Side widget-->

</div>
</div>