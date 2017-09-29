<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울시 문화공간 현황 </h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<div id="menu6_codename_<?=$data['FAC_CODE']?>" class="hide"><?=$data['CODENAME']?></div>
				<div id="menu6_fac_name_<?=$data['FAC_CODE']?>" class="hide"><?=$data['FAC_NAME']?></div>
				<div id="menu6_main_img_<?=$data['FAC_CODE']?>" class="hide"><?=$data['MAIN_IMG']?></div>
				<div id="menu6_addr_<?=$data['FAC_CODE']?>" class="hide"><?=$data['ADDR']?></div>
				<div id="menu6_phne_<?=$data['FAC_CODE']?>" class="hide"><?=$data['PHNE']?></div>
				<div id="menu6_fax_<?=$data['FAC_CODE']?>" class="hide"><?=$data['FAX']?></div>
				<div id="menu6_homepage_<?=$data['FAC_CODE']?>" class="hide"><?=$data['HOMEPAGE']?></div>
				<div id="menu6_openhour_<?=$data['FAC_CODE']?>" class="hide"><?=$data['OPENHOUR']?></div>
				<div id="menu6_entr_fee_<?=$data['FAC_CODE']?>" class="hide"><?=$data['ENTR_FEE']?></div>
				<div id="menu6_closeday_<?=$data['FAC_CODE']?>" class="hide"><?=$data['CLOSEDAY']?></div>
				<div id="menu6_open_day_<?=$data['FAC_CODE']?>" class="hide"><?=$data['OPEN_DAY']?></div>
				<div id="menu6_seat_cnt_<?=$data['FAC_CODE']?>" class="hide"><?=$data['SEAT_CNT']?></div>
				<div id="menu6_etc_desc_<?=$data['FAC_CODE']?>" class="hide"><?=$data['ETC_DESC']?></div>
				<div id="menu6_fac_desc_<?=$data['FAC_CODE']?>" class="hide"><?=$data['FAC_DESC']?></div>
				<div id="menu6_x_coord_<?=$data['FAC_CODE']?>" class="hide"><?=$data['X_COORD']?></div>
				<div id="menu6_y_coord_<?=$data['FAC_CODE']?>" class="hide"><?=$data['Y_COORD']?></div>

				<li><a class="block_link menu6View" seq="<?=$data['FAC_CODE']?>">
					<span class="thumb_style"><img src="<?=$data['MAIN_IMG']?>" alt="<?=$data['FAC_NAME']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['FAC_NAME']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['CODENAME']?> <span class="tltle_bar"> | </span><?=$data['OPENHOUR']?></div>
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

				<div id="menu6_codename_<?=$data['FAC_CODE']?>" class="hide"><?=$data['CODENAME']?></div>
				<div id="menu6_fac_name_<?=$data['FAC_CODE']?>" class="hide"><?=$data['FAC_NAME']?></div>
				<div id="menu6_main_img_<?=$data['FAC_CODE']?>" class="hide"><?=$data['MAIN_IMG']?></div>
				<div id="menu6_addr_<?=$data['FAC_CODE']?>" class="hide"><?=$data['ADDR']?></div>
				<div id="menu6_phne_<?=$data['FAC_CODE']?>" class="hide"><?=$data['PHNE']?></div>
				<div id="menu6_fax_<?=$data['FAC_CODE']?>" class="hide"><?=$data['FAX']?></div>
				<div id="menu6_homepage_<?=$data['FAC_CODE']?>" class="hide"><?=$data['HOMEPAGE']?></div>
				<div id="menu6_openhour_<?=$data['FAC_CODE']?>" class="hide"><?=$data['OPENHOUR']?></div>
				<div id="menu6_entr_fee_<?=$data['FAC_CODE']?>" class="hide"><?=$data['ENTR_FEE']?></div>
				<div id="menu6_closeday_<?=$data['FAC_CODE']?>" class="hide"><?=$data['CLOSEDAY']?></div>
				<div id="menu6_open_day_<?=$data['FAC_CODE']?>" class="hide"><?=$data['OPEN_DAY']?></div>
				<div id="menu6_seat_cnt_<?=$data['FAC_CODE']?>" class="hide"><?=$data['SEAT_CNT']?></div>
				<div id="menu6_etc_desc_<?=$data['FAC_CODE']?>" class="hide"><?=$data['ETC_DESC']?></div>
				<div id="menu6_fac_desc_<?=$data['FAC_CODE']?>" class="hide"><?=$data['FAC_DESC']?></div>
				<div id="menu6_x_coord_<?=$data['FAC_CODE']?>" class="hide"><?=$data['X_COORD']?></div>
				<div id="menu6_y_coord_<?=$data['FAC_CODE']?>" class="hide"><?=$data['Y_COORD']?></div>

				<li><a class="block_link menu6View" seq="<?=$data['FAC_CODE']?>">
					<span class="thumb_style"><img src="<?=$data['MAIN_IMG']?>" alt="<?=$data['FAC_NAME']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['FAC_NAME']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['CODENAME']?> <span class="tltle_bar"> | </span><?=$data['OPENHOUR']?></div>
						</div>
						<!--// title_nums -->
					</div>
					<!--// block_right_txt -->
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
