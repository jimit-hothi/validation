<?php 
include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php');?>
</head>
	<body class="" id="top">
	
									<?php
										$select_cat="SELECT * FROM category order by cat_name";
										$rs_cat = mysql_query($select_cat);
										
										while($row_cat = mysql_fetch_assoc($rs_cat))
										{
											
											echo '<div class="grid_4" id="'.$row_cat['cid'].'">
										<a href="category/'.$row_cat['url_rewrite'].'/'.$row_cat['cat_image'].'" class="gal_item">
											<img src="category/'.$row_cat['url_rewrite'].'/'.$row_cat['cat_image'].'" alt="">
											<div class="gal_caption">'.$row_cat['cat_name'].'</div>
											<span class="gal_magnify"></span>
										</a>
									</div>';
											
										}
									 ?>
				
		<script>
			$(document).ready(function(){
				$("div.grid_4").click(function(e) {
					var id=$(this).attr('id');
					e.preventDefault();
					$.ajax({
						type		: "POST",
						cache	: false,
						url		: "demo.php",
	 					data : {'gal' : id},
						success: function(data) {
							var dataX = data;
							var dataXsplit = dataX.split(',');
							var dataXarrayObj = new Array(), i;
							for(i in dataXsplit){
							 dataXarrayObj[i] = jQuery.parseJSON(dataXsplit[i]);
							}
							var img = dataXarrayObj;
							
							var opts = {
			                        prevEffect : 'none',
			                        nextEffect : 'none',
			                        'fitToView': true,
			                        'autoSize': true,
			                        helpers : {
			                            thumbs : {
			                                width: 75,
			                                height: 50
			                            }
			                        }
			                    };
							
							$.fancybox(img, opts);
						}
					});

	 				});

				$(".iframe").colorbox({iframe:true, width:"85%", height:"101%"});
				$('.bxslider').bxSlider({
					  mode: 'horizontal',
					  useCSS: true,
					  infiniteLoop: true,
					  hideControlOnEnd: false,
					  easing: 'easeOutElastic',
					  speed: 1000,
					  auto: true,
					  pager: false,
					  controls: false,
					});
			 });
		</script>
	</body>
</html>
