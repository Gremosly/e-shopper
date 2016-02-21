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
                            <h2 class="title text-center">Корзина</h2>

                            <?php if ($productsInCart): ?>
                            
                            	<table class="cart-table">
									<tr><td><b>Код товара</b></td><td><b>Название</b></td><td><b>Стоимость</b></td><td><b>Количество</b></td></tr>
									<?php foreach ($products as $item): ?>
										<tr><td><?php echo $item['code']; ?></td><td><a href="/product/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></td><td><?php echo $item['price']; ?>$</td><td><?php echo $productsInCart[$item['id']]; ?></td></tr>	
									<?php endforeach ?>
									<tr><td><b>Общая стоимость:</b></td><td></td><td></td><td><?php echo $totalPrice ?>$</td></tr>                            		
                            	</table>

                            <?php else: ?>
                            	<p>В корзине нет товаров</p>
                            <?php endif ?>                            

                        </div><!--features_items-->

                    </div>

                    
                </div>
            </div>
        </section>

<?php include ROOT."/views/layouts/footer.php"; ?>