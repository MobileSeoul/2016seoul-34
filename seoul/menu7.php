<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울시 공구도서관 (대여소) 정보</h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<div id="menu7_atdrc_<?=$data['NO']?>" class="hide"><?=$data['ATDRC']?></div>
				<div id="menu7_bsns_nm_<?=$data['NO']?>" class="hide"><?=$data['BSNS_NM']?></div>
				<div id="menu7_poses_thng_<?=$data['NO']?>" class="hide"><?=$data['POSES_THNG']?></div>
				<div id="menu7_adres_<?=$data['NO']?>" class="hide"><?=$data['ADRES']?></div>
				<div id="menu7_telno_<?=$data['NO']?>" class="hide"><?=$data['TELNO']?></div>
				<div id="menu7_target_<?=$data['NO']?>" class="hide"><?=$data['TARGET']?></div>
				<div id="menu7_opentime_<?=$data['NO']?>" class="hide"><?=$data['OPENTIME']?></div>
				<div id="menu7_rent_<?=$data['NO']?>" class="hide"><?=$data['RENT']?></div>

				<li><a class="block_link menu7View" seq="<?=$data['NO']?>">
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['BSNS_NM']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['ATDRC']?> <span class="tltle_bar"> | </span><?=$data['OPENTIME']?></div>
						</div>
						<!--// title_nums -->
					</div>
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

				<div id="menu7_atdrc_<?=$data['NO']?>" class="hide"><?=$data['ATDRC']?></div>
				<div id="menu7_bsns_nm_<?=$data['NO']?>" class="hide"><?=$data['BSNS_NM']?></div>
				<div id="menu7_poses_thng_<?=$data['NO']?>" class="hide"><?=$data['POSES_THNG']?></div>
				<div id="menu7_adres_<?=$data['NO']?>" class="hide"><?=$data['ADRES']?></div>
				<div id="menu7_telno_<?=$data['NO']?>" class="hide"><?=$data['TELNO']?></div>
				<div id="menu7_target_<?=$data['NO']?>" class="hide"><?=$data['TARGET']?></div>
				<div id="menu7_opentime_<?=$data['NO']?>" class="hide"><?=$data['OPENTIME']?></div>
				<div id="menu7_rent_<?=$data['NO']?>" class="hide"><?=$data['RENT']?></div>

				<li><a class="block_link menu7View" seq="<?=$data['NO']?>">
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['BSNS_NM']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['ATDRC']?> <span class="tltle_bar"> | </span><?=$data['OPENTIME']?></div>
						</div>
						<!--// title_nums -->
					</div>
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
