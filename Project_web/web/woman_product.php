<br>
</div>

<div class="text-center rp-title">
				<h5>Related products</h5>
			</div>
			<?php
				if(isset($_SESSION['uname']))
				{
					echo "Welcome ".$_SESSION['uname'];
				}
				else
					{
						header('location:login');
					}
			?>

			<div class="row">
                
				<div class="col-lg-3">
				<?php
                    foreach($woman_product as $w)
                    {
                ?>
					<div class="product-item">
						<figure>
							<img src="../Admin/upload/<?php echo $w->pro_image;?>" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="img/icons/eye.png" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="img/icons/heart.png" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<form method="post">
								<input type="hidden" name="pro_id" value="<?php echo $w->pro_id;?>">
								<h6><?php echo $w->pro_name;?></h6>
								<p><?php echo $w->pro_price; ?></p>
								<input type="number" name="qty" min="1" max="5">
								<button class="site-btn btn-line" name="addtocart">ADD TO CART</button>
							</form>
						</div>
					</div>
					<?php
                    }
                ?>
			</div>
				</div>
				</div>
			