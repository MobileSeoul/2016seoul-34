	<?php if($page  == 1) : ?>
		<!-- content_area -->
		<section id="content_area"><div class="content_wrap" >

			<!--  main_hot_deal -->
			<div class="main_hot_deal mt10" >
				<!-- title_header -->
				<div class="title_header">
					<h3 class="title_com">서울시 대중교통 보관 분실물 검색</h3>
				</div>
				<!--// title_header -->

				<div class="select_number_area">
					<div class="search_number"><strong class="number_type1">습득물 분류</strong></div>
					<div class="search_number2"><strong class="number_type1">대중교통수단</strong></div>

					<!-- btn_list_wrap -->
					<div class="btn_list_wrap4">
						<ul class="ul_2col ul_t1">
							<li class="col3">
								<label class="btn_line_t1  select01_wrap2 mr10" for="cate">
								<select class="btn_line_t2 btn_line_value1   btn_select_align" title="검색 옵션 선택" name="cate" id="cate">
									<option value="가방" <?= $cate == '가방' ? 'selected' : '';?>>가방</option>
									<option value="베낭" <?= $cate == '베낭' ? 'selected' : '';?>>베낭</option>
									<option value="서류봉투" <?= $cate == '서류봉투' ? 'selected' : '';?>>서류봉투</option>
									<option value="쇼핑백" <?= $cate == '쇼핑백' ? 'selected' : '';?>>쇼핑백</option>
									<option value="옷" <?= $cate == '옷' ? 'selected' : '';?>>옷</option>
									<option value="지갑" <?= $cate == '지갑' ? 'selected' : '';?>>지갑</option>
									<option value="책" <?= $cate == '책' ? 'selected' : '';?>>책</option>
									<option value="파일" <?= $cate == '파일' ? 'selected' : '';?>>파일</option>
									<option value="핸드폰" <?= $cate == '핸드폰' ? 'selected' : '';?>>핸드폰</option>
									<option value="기타" <?= $cate == '기타' ? 'selected' : '';?>>기타</option>
								</select>
								</label>

								<label class="btn_line_t1  select01_wrap2 mr10" for="wbCode">
								<select class="btn_line_t2 btn_line_value1   btn_select_align" title="검색 옵션 선택"  name="wbCode" id="wbCode">
									<option value="b1" <?= $wbCode == 'b1' ? 'selected' : '';?>>버스</option>
									<option value="b2" <?= $wbCode == 'b2' ? 'selected' : '';?>>마을버스</option>
									<option value="s1" <?= $wbCode == 's1' ? 'selected' : '';?>>지하철(1~4호선)</option>
									<option value="s2" <?= $wbCode == 's2' ? 'selected' : '';?>>지하철(5~8호선)</option>
									<option value="s4" <?= $wbCode == 's4' ? 'selected' : '';?>>지하철(9호선)</option>
									<option value="s3" <?= $wbCode == 's3' ? 'selected' : '';?>>코레일</option>
									<option value="t1" <?= $wbCode == 't1' ? 'selected' : '';?>>법인택시</option>
									<option value="t2" <?= $wbCode == 't2' ? 'selected' : '';?>>개인택시</option>
								</select>
								</label>
							</li>
							<li class="col3"><div class="col3_margin">
								<span class="input_wrapt"><input type="text" title="검색어 입력" id="getName" name="getName" value="<?= $getName ? $getName : ''?>"></span>

								<span class="btn_wrapt"><a href="#" class="btn_mty1" id="searchLostBtn" name="searchLostBtn">검색</a></span>
							</div></li>
							<!--  화살표 가 있을때 ico_btm_arw  화살표 반대 ico_top_arw 추가 -->
						</ul>
					</div>
					<!--// btn_list_wrap -->

				</div>


				<div class="used_area fixed_top_margin">
				<ul class="used_list_t1"  id="dataContainer">
					<?php foreach($dataList as $data) : ?>

					<div id="menu11_take_place_<?=$data['ID']?>" class="hide"><?=$data['TAKE_PLACE']?></div>
					<div id="menu11_get_name_<?=$data['ID']?>" class="hide"><?=$data['GET_NAME']?></div>
					<div id="menu11_get_date_<?=$data['ID']?>" class="hide"><?=$data['GET_DATE']?></div>
					<div id="menu11_get_position_<?=$data['ID']?>" class="hide"><?=$data['GET_POSITION']?></div>
					<div id="menu11_image_<?=$data['ID']?>" class="hide"><?=$imageData[$data['ID']]?></div>
					<div id="menu11_get_thing_<?=$data['ID']?>" class="hide"><?=$detail[$data['ID']]['GET_THING']?></div>
					<div id="menu11_contact_<?=$data['ID']?>" class="hide"><?=$detail[$data['ID']]['CONTACT']?></div>
					<div id="menu11_drive_num_<?=$data['ID']?>" class="hide"><?=$detail[$data['ID']]['DRIVE_NUM']?></div>

					<li><a class="block_link menu11View" seq="<?=$data['ID']?>">
						<span class="thumb_style"><img src="<?=$imageData[$data['ID']]?>" alt="<?=$data['GET_NAME']?>" class="thumb_img01"></span>
						<div class="block_right_txt">
							<p class="title_s01">물품명 : <?=$data['GET_NAME']?></p>
							<div class="title_nums">
								<div class="author2">습득일자 : <?=$data['GET_DATE']?></div>
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

					<div id="menu11_take_place_<?=$data['ID']?>" class="hide"><?=$data['TAKE_PLACE']?></div>
					<div id="menu11_get_name_<?=$data['ID']?>" class="hide"><?=$data['GET_NAME']?></div>
					<div id="menu11_get_date_<?=$data['ID']?>" class="hide"><?=$data['GET_DATE']?></div>
					<div id="menu11_get_position_<?=$data['ID']?>" class="hide"><?=$data['GET_POSITION']?></div>
					<div id="menu11_image_<?=$data['ID']?>" class="hide"><?=$imageData[$data['ID']]?></div>
					<div id="menu11_get_thing_<?=$data['ID']?>" class="hide"><?=$detail[$data['ID']]['GET_THING']?></div>
					<div id="menu11_contact_<?=$data['ID']?>" class="hide"><?=$detail[$data['ID']]['CONTACT']?></div>
					<div id="menu11_drive_num_<?=$data['ID']?>" class="hide"><?=$detail[$data['ID']]['DRIVE_NUM']?></div>

					<li><a class="block_link menu11View" seq="<?=$data['ID']?>">
						<span class="thumb_style"><img src="<?=$imageData[$data['ID']]?>" alt="<?=$data['GET_NAME']?>" class="thumb_img01"></span>
						<div class="block_right_txt">
							<p class="title_s01">물품명 : <?=$data['GET_NAME']?></p>
							<div class="title_nums">
								<div class="author2">습득일자 : <?=$data['GET_DATE']?></div>
							</div>
							<!--// title_nums -->
						</div>
					</a></li>
					<?php endforeach;?>
	<?php endif; ?>


