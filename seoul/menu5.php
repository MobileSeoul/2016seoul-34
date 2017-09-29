<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울연극센터 이벤트 정보 </h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<div id="menu5_title_<?=$data['IDX']?>" class="hide"><?=$data['TITLE']?></div>
				<div id="menu5_eventdate_<?=$data['IDX']?>" class="hide"><?=$data['EVENTDATE']?></div>
				<div id="menu5_eventdate2_<?=$data['IDX']?>" class="hide"><?=$data['EVENTDATE2']?></div>
				<div id="menu5_enddate_<?=$data['IDX']?>" class="hide"><?=$data['ENDDATE']?></div>
				<div id="menu5_contents_<?=$data['IDX']?>" class="hide"><?=$data['CONTENTS']?></div>
				<div id="menu5_mainfilename_<?=$data['IDX']?>" class="hide"><?=$data['MAINFILENAME']?></div>
				<div id="menu5_regdate_<?=$data['IDX']?>" class="hide"><?=$data['REGDATE']?></div>

				<li><a class="block_link menu5View" seq="<?=$data['IDX']?>">
					<span class="thumb_style"><img src="<?=$data['MAINFILENAME']?>" alt="<?=$data['TITLE']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['TITLE']?></p>
						<div class="title_nums">
							<div class="author2">이벤트 기간 : <?=$data['EVENTDATE']?> ~ <?=$data['EVENTDATE2']?></div>
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

				<div id="menu5_title_<?=$data['IDX']?>" class="hide"><?=$data['TITLE']?></div>
				<div id="menu5_eventdate_<?=$data['IDX']?>" class="hide"><?=$data['EVENTDATE']?></div>
				<div id="menu5_eventdate2_<?=$data['IDX']?>" class="hide"><?=$data['EVENTDATE2']?></div>
				<div id="menu5_enddate_<?=$data['IDX']?>" class="hide"><?=$data['ENDDATE']?></div>
				<div id="menu5_contents_<?=$data['IDX']?>" class="hide"><?=$data['CONTENTS']?></div>
				<div id="menu5_mainfilename_<?=$data['IDX']?>" class="hide"><?=$data['MAINFILENAME']?></div>
				<div id="menu5_regdate_<?=$data['IDX']?>" class="hide"><?=$data['REGDATE']?></div>

				<li><a class="block_link menu5View" seq="<?=$data['IDX']?>">
					<span class="thumb_style"><img src="<?=$data['MAINFILENAME']?>" alt="<?=$data['TITLE']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['TITLE']?></p>
						<div class="title_nums">
							<div class="author2">이벤트 기간 : <?=$data['EVENTDATE']?> ~ <?=$data['EVENTDATE2']?></div>
						</div>
						<!--// title_nums -->
					</div>
					<!--// block_right_txt -->
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
