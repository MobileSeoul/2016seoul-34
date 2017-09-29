<?php if($page  == 1) : ?>
<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울시 생필품 농수축산물 가격 정보</h3>
			</div>
			<!--// title_header -->

			<div class="select_number_area">
				<div class="search_number5"><strong class="number_type1">시장/마트명</strong></div>
				<div class="search_number3"><strong class="number_type1">품목명</strong></div>
				<div class="search_number4"><strong class="number_type1">자치구</strong></div>

				<!-- btn_list_wrap -->
				<div class="btn_list_wrap4">
					<!-- input_wrapt_list -->
					<div class="input_wrapt_list">
						<span class="input_wrapt"><input type="text" title="검색어 입력" id="marketName" name="marketName" value="<?= $marketName ? $marketName : ''?>"></span>
						<span class="input_wrapt"><input type="text" title="검색어 입력" id="goodsName" name="goodsName" value="<?= $goodsName ? $goodsName : ''?>"></span>
					</div>
					<!--// input_wrapt_list -->

					<label class="btn_line_t1  select01_wrap2 mr10 labe_type" for="areaCode">
					<select class="btn_line_t2 btn_line_value1   btn_select_align" id="areaCode" name="areaCode" title="검색 옵션 선택">
						<?php foreach($areaInfo as $key => $area) : ?>
						<option value="<?=$key?>" <?= $areaCode == $key ? ' selected' : '';?>><?=$area['name']?></option>
						<?php endforeach;?>
					</select>
					</label>

					<span class="btn_wrapt2"><a href="#" class="btn_mt_black"  id="searchMarketBtn" name="searchMarketBtn">검색</a></span>
				</div>
				<!--// btn_list_wrap -->

			</div>

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<li><a class="block_link">
					<div class="block_right_txt">
						<p class="title_s01">[<?=$data['M_NAME']?>] <b><?=$data['A_NAME']?></b></p>
						<div class="title_nums">
							<div class="author2">규격 : <?=$data['A_UNIT']?><span class="tltle_bar"> | </span> 가격 : <em class="num_red"><?=number_format($data['A_PRICE'])?>원</em></div>
							<div class="author2">자치구 : <?=$data['M_GU_NAME']?></div>
							<?php if($data['ADD_COL']) : ?>
							<div class="author2">비고 : <?=$data['ADD_COL']?></div>
							<?php endif;?>
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

				<li><a class="block_link">
					<div class="block_right_txt">
						<p class="title_s01">[<?=$data['M_NAME']?>] <b><?=$data['A_NAME']?></b></p>
						<div class="title_nums">
							<div class="author2">규격 : <?=$data['A_UNIT']?><span class="tltle_bar"> | </span> 가격 : <em class="num_red"><?=number_format($data['A_PRICE'])?>원</em></div>
							<div class="author2">자치구 : <?=$data['M_GU_NAME']?></div>
							<?php if($data['ADD_COL']) : ?>
							<div class="author2">비고 : <?=$data['ADD_COL']?></div>
							<?php endif;?>
						</div>
						<!--// title_nums -->
					</div>
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
