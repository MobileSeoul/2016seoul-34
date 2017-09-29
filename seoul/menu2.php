<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울시 문화행사</h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1" id="dataContainer">
				<?php foreach($dataList as $data) : ?>
				<li><a class="block_link menu2View" seq="<?=$data['CULTCODE']?>">
					<span class="thumb_style"><img src="<?=$data['MAIN_IMG']?>" alt="<?=$data['TITLE']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['TITLE']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['CODENAME']?> <span class="tltle_bar"> | </span><?=$data['STRTDATE']?></div>
						</div>
						<!--// title_nums -->
					</div>
					<!--// block_right_txt -->
				</a></li>
				<?php endforeach;?>
			</ul>
		</div>
		</div>
		<!--// main_hot_deal -->

	</div></section>
	<!--// content_area -->
	<button id="scrollTopButton" class="btn_scroll_top" type="button" title="스크롤을 맨 위로 이동합니다">맨위로 이동</button>
<?php else :?>
	<?php foreach($dataList as $data) : ?>
	<li><a class="block_link menu2View" seq="<?=$data['CULTCODE']?>">
		<span class="thumb_style"><img src="<?=$data['MAIN_IMG']?>" alt="<?=$data['TITLE']?>" class="thumb_img01"></span>
		<!-- block_right_txt -->
		<div class="block_right_txt">
			<p class="title_s01"><?=$data['TITLE']?></p>
			<div class="title_nums">
				<div class="author2"><?=$data['CODENAME']?> <span class="tltle_bar"> | </span><?=$data['STRTDATE']?></div>
			</div>
			<!--// title_nums -->
		</div>
		<!--// block_right_txt -->
	</a></li>
	<?php endforeach;?>
<?php endif?>