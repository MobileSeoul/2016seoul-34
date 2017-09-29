<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울시 주차정보 안내</h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<div id="menu10_park_name_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['PARK_NAME']?></div>
				<div id="menu10_max_parking_cnt_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['MAX_PARKING_CNT']?></div>
				<div id="menu10_parking_cnt_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['PARKING_CNT']?></div>
				<div id="menu10_park_address_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['PARK_ADDRESS']?></div>
				<div id="menu10_tel_no_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['TEL_NO']?></div>
				<div id="menu10_owner_name_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['OWNER_NAME']?></div>
				<div id="menu10_company_nm_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['COMPANY_NM']?></div>

				<li><a class="block_link menu10View" seq="<?=$data['PARKMASTER_CD']?>">
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['PARK_NAME']?></p>
						<div class="title_nums">
							<div class="author2">최대 : <?=$data['MAX_PARKING_CNT']?> 대 <span class="tltle_bar"> | </span>잔여 : <em class="num_red"><?=$data['PARKING_CNT']?> 대</em></div>
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

				<div id="menu10_park_name_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['PARK_NAME']?></div>
				<div id="menu10_max_parking_cnt_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['MAX_PARKING_CNT']?></div>
				<div id="menu10_parking_cnt_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['PARKING_CNT']?></div>
				<div id="menu10_park_address_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['PARK_ADDRESS']?></div>
				<div id="menu10_tel_no_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['TEL_NO']?></div>
				<div id="menu10_owner_name_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['OWNER_NAME']?></div>
				<div id="menu10_company_nm_<?=$data['PARKMASTER_CD']?>" class="hide"><?=$data['COMPANY_NM']?></div>

				<li><a class="block_link menu10View" seq="<?=$data['PARKMASTER_CD']?>">
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['PARK_NAME']?></p>
						<div class="title_nums">
							<div class="author2">최대 : <?=$data['MAX_PARKING_CNT']?> 대 <span class="tltle_bar"> | </span>잔여 : <em class="num_red"><?=$data['PARKING_CNT']?> 대</em></div>
						</div>
						<!--// title_nums -->
					</div>
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
