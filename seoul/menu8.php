<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울시 자치구 재활용센터 시설 현황</h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<div id="menu8_area_se_<?=$data['SN']?>" class="hide"><?=$data['AREA_SE']?></div>
				<div id="menu8_cmpnm_<?=$data['SN']?>" class="hide"><?=$data['CMPNM']?></div>
				<div id="menu8_detail_adres_cn_<?=$data['SN']?>" class="hide"><?=$data['DETAIL_ADRES_CN']?></div>
				<div id="menu8_cttpc_cn_<?=$data['SN']?>" class="hide"><?=$data['CTTPC_CN']?></div>
				<div id="menu8_site_url_<?=$data['SN']?>" class="hide"><?=$data['SITE_URL']?></div>

				<li><a class="block_link menu8View" seq="<?=$data['SN']?>">
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['CMPNM']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['AREA_SE']?> <span class="tltle_bar"> | </span><?=$data['CTTPC_CN']?></div>
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

				<div id="menu8_area_se_<?=$data['SN']?>" class="hide"><?=$data['AREA_SE']?></div>
				<div id="menu8_cmpnm_<?=$data['SN']?>" class="hide"><?=$data['CMPNM']?></div>
				<div id="menu8_detail_adres_cn_<?=$data['SN']?>" class="hide"><?=$data['DETAIL_ADRES_CN']?></div>
				<div id="menu8_cttpc_cn_<?=$data['SN']?>" class="hide"><?=$data['CTTPC_CN']?></div>
				<div id="menu8_site_url_<?=$data['SN']?>" class="hide"><?=$data['SITE_URL']?></div>

				<li><a class="block_link menu8View" seq="<?=$data['SN']?>">
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['CMPNM']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['AREA_SE']?> <span class="tltle_bar"> | </span><?=$data['CTTPC_CN']?></div>
						</div>
						<!--// title_nums -->
					</div>
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
