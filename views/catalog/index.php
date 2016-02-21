<?php include ROOT."/views/layouts/header.php"; ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            
                            <div class="panel-group category-products">
                                <?php foreach ($categories as $CategoriesItem ){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?php echo $CategoriesItem['id']; ?>">
                                                <?php echo $CategoriesItem['name']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>

                            <div class="col-sm-4">
                            <?php foreach ($products1 as $productItem): ?>
                                                        
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $productItem['image']; ?>" alt="" />
                                            <h2><?php echo $productItem['price']; ?>$</h2>
                                                <?php if ($productItem['name']): ?>
                                                    <p>
                                                    <a href="/product/<?php echo $productItem['id']; ?>">
                                                    <?php echo $productItem['name']; ?>
                                                    </a>
                                                    </p>
                                                    <a href="#" data-id="<?php echo $productItem['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                <?php endif ?>
                                                
                                            
                                        </div>
                                        <?php if ($productItem['is_new']): ?>
                                            <img src="/template/images/home/new.png" class="new" alt="" />
                                        <?php endif ?>
                                    </div>
                                </div>
                            
                            <?php endforeach; ?>
                            <?php echo $pagination->get(); ?>
                            </div>


                            <div class="col-sm-4">
                            <?php foreach ($products2 as $productItem): ?>
                                                        
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $productItem['image']; ?>" alt="" />
                                            <h2><?php echo $productItem['price']; ?>$</h2>
                                                <?php if ($productItem['name']): ?>
                                                    <p>
                                                    <a href="/product/<?php echo $productItem['id']; ?>">
                                                    <?php echo $productItem['name']; ?>
                                                    </a>
                                                    </p>
                                                    <a href="#" data-id="<?php echo $productItem['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                <?php endif ?>
                                                
                                            
                                        </div>
                                        <?php if ($productItem['is_new']): ?>
                                            <img src="/template/images/home/new.png" class="new" alt="" />
                                        <?php endif ?>
                                    </div>
                                </div>
                            
                            <?php endforeach; ?>
                            </div>



                            <div class="col-sm-4">
                            <?php foreach ($products3 as $productItem): ?>
                                                        
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $productItem['image']; ?>" alt="" />
                                            <h2><?php echo $productItem['price']; ?>$</h2>
                                                <?php if ($productItem['name']): ?>
                                                    <p>
                                                    <a href="/product/<?php echo $productItem['id']; ?>">
                                                    <?php echo $productItem['name']; ?>
                                                    </a>
                                                    </p>
                                                    <a href="#" data-id="<?php echo $productItem['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                <?php endif ?>
                                                
                                            
                                        </div>
                                        <?php if ($productItem['is_new']): ?>
                                            <img src="/template/images/home/new.png" class="new" alt="" />
                                        <?php endif ?>
                                    </div>
                                </div>
                            
                            <?php endforeach; ?>
                            </div>
                            

                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

<?php include ROOT."/views/layouts/footer.php"; ?>