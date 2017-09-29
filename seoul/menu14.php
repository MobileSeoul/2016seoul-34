<?php if($page  == 1) : ?>
<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울시 <?=$areaName?> 전통시장 현황
				<select  id="areaCodeSelectBox" name="areaCodeSelectBox" title="검색 옵션 선택">
					<?php foreach($areaInfo as $key => $area) : ?>
					<option value="<?=$key?>" <?= $areaCode == $key ? ' selected' : '';?>><?=$area['name']?></option>
					<?php endforeach;?>
				</select>
				</h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<li><a class="block_link menu14View" lat="<?=$data['LAT']?>" lng="<?=$data['LNG']?>" m_name="<?=$data['M_NAME']?>" m_tel="<?=$data['M_TEL']?>" m_addr="<?=$data['M_ADDR']?>">
					<div class="block_right_txt">
						<p class="title_s01"><b><?=$data['M_NAME']?></b></p>
						<div class="title_nums">
							<div class="author2"><?=$data['M_TEL']?><span class="tltle_bar"> | </span><?=$data['M_ADDR']?></div>
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

				<li><a class="block_link menu14View" lat="<?=$data['LAT']?>" lng="<?=$data['LNG']?>" m_name="<?=$data['M_NAME']?>" m_tel="<?=$data['M_TEL']?>" m_addr="<?=$data['M_ADDR']?>">
					<div class="block_right_txt">
						<p class="title_s01"><b><?=$data['M_NAME']?></b></p>
						<div class="title_nums">
							<div class="author2"><?=$data['M_TEL']?><span class="tltle_bar"> | </span><?=$data['M_ADDR']?></div>
						</div>
						<!--// title_nums -->
					</div>
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
