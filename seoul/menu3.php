<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울의공원 프로그램 정보</h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<div id="menu3_p_name_<?=$data['P_IDX']?>" class="hide"><?=$data['P_NAME']?></div>
				<div id="menu3_p_eduperson_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EDUPERSON']?></div>
				<div id="menu3_p_eamax_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EAMAX']?></div>
				<div id="menu3_p_content_<?=$data['P_IDX']?>" class="hide"><?=$data['P_CONTENT']?></div>
				<div id="menu3_p_eduday_s_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EDUDAY_S']?></div>
				<div id="menu3_p_eduday_e_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EDUDAY_E']?></div>
				<div id="menu3_p_edutime_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EDUTIME']?></div>
				<div id="menu3_p_proday_<?=$data['P_IDX']?>" class="hide"><?=$data['P_PRODAY']?></div>
				<div id="menu3_p_park_<?=$data['P_IDX']?>" class="hide"><?=$data['P_PARK']?></div>
				<div id="menu3_p_list_content_<?=$data['P_IDX']?>" class="hide"><?=$data['P_LIST_CONTENT']?></div>
				<div id="menu3_p_addr_<?=$data['P_IDX']?>" class="hide"><?=$data['P_ADDR']?></div>
				<div id="menu3_p_zone_<?=$data['P_IDX']?>" class="hide"><?=$data['P_ZONE']?></div>
				<div id="menu3_p_division_<?=$data['P_IDX']?>" class="hide"><?=$data['P_DIVISION']?></div>
				<div id="menu3_p_img_<?=$data['P_IDX']?>" class="hide"><?=$data['P_IMG']?></div>
				<div id="menu3_p_admintel_<?=$data['P_IDX']?>" class="hide"><?=$data['P_ADMINTEL']?></div>
				<div id="menu3_lat_<?=$data['P_IDX']?>" class="hide"><?=$data['LATITUDE']?></div>
				<div id="menu3_lng_<?=$data['P_IDX']?>" class="hide"><?=$data['LONGITUDE']?></div>

				<li><a class="block_link menu3View" seq="<?=$data['P_IDX']?>">
					<span class="thumb_style"><img src="<?=$data['P_IMG']?>" alt="<?=$data['P_NAME']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['P_NAME']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['P_PARK']?> <span class="tltle_bar"> | </span><?=$data['P_EDUDAY_S']?> ~ <?=$data['P_EDUDAY_E']?></div>
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

				<div id="menu3_p_name_<?=$data['P_IDX']?>" class="hide"><?=$data['P_NAME']?></div>
				<div id="menu3_p_eduperson_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EDUPERSON']?></div>
				<div id="menu3_p_eamax_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EAMAX']?></div>
				<div id="menu3_p_content_<?=$data['P_IDX']?>" class="hide"><?=$data['P_CONTENT']?></div>
				<div id="menu3_p_eduday_s_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EDUDAY_S']?></div>
				<div id="menu3_p_eduday_e_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EDUDAY_E']?></div>
				<div id="menu3_p_edutime_<?=$data['P_IDX']?>" class="hide"><?=$data['P_EDUTIME']?></div>
				<div id="menu3_p_proday_<?=$data['P_IDX']?>" class="hide"><?=$data['P_PRODAY']?></div>
				<div id="menu3_p_park_<?=$data['P_IDX']?>" class="hide"><?=$data['P_PARK']?></div>
				<div id="menu3_p_list_content_<?=$data['P_IDX']?>" class="hide"><?=$data['P_LIST_CONTENT']?></div>
				<div id="menu3_p_addr_<?=$data['P_IDX']?>" class="hide"><?=$data['P_ADDR']?></div>
				<div id="menu3_p_zone_<?=$data['P_IDX']?>" class="hide"><?=$data['P_ZONE']?></div>
				<div id="menu3_p_division_<?=$data['P_IDX']?>" class="hide"><?=$data['P_DIVISION']?></div>
				<div id="menu3_p_img_<?=$data['P_IDX']?>" class="hide"><?=$data['P_IMG']?></div>
				<div id="menu3_p_admintel_<?=$data['P_IDX']?>" class="hide"><?=$data['P_ADMINTEL']?></div>
				<div id="menu3_lat_<?=$data['P_IDX']?>" class="hide"><?=$data['LATITUDE']?></div>
				<div id="menu3_lng_<?=$data['P_IDX']?>" class="hide"><?=$data['LONGITUDE']?></div>

				<li><a class="block_link menu3View" seq="<?=$data['P_IDX']?>">
					<span class="thumb_style"><img src="<?=$data['P_IMG']?>" alt="<?=$data['P_NAME']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['P_NAME']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['P_PARK']?> <span class="tltle_bar"> | </span><?=$data['P_EDUDAY_S']?> ~ <?=$data['P_EDUDAY_E']?></div>
						</div>
						<!--// title_nums -->
					</div>
					<!--// block_right_txt -->
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
