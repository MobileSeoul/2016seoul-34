<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">남산예술센터 공연 </h3>
			</div>
			<!--// title_header -->

			<div class="used_area fixed_top_margin">
			<ul class="used_list_t1"  id="dataContainer">
				<?php foreach($dataList as $data) : ?>

				<div id="menu4_name_<?=$data['ID']?>" class="hide"><?=$data['NAME']?></div>
				<div id="menu4_open_<?=$data['ID']?>" class="hide"><?=$data['OPEN']?></div>
				<div id="menu4_close_<?=$data['ID']?>" class="hide"><?=$data['CLOSE']?></div>
				<div id="menu4_genrename_<?=$data['ID']?>" class="hide"><?=$data['GENRENAME']?></div>
				<div id="menu4_theatername_<?=$data['ID']?>" class="hide"><?=$data['THEATERNAME']?></div>
				<div id="menu4_runningtime_<?=$data['ID']?>" class="hide"><?=$data['RUNNINGTIME']?></div>
				<div id="menu4_grade_<?=$data['ID']?>" class="hide"><?=$data['GRADE']?></div>
				<div id="menu4_listprice_<?=$data['ID']?>" class="hide"><?=$data['LISTPRICE']?></div>
				<div id="menu4_juche_<?=$data['ID']?>" class="hide"><?=$data['JUCHE']?></div>
				<div id="menu4_conduct_<?=$data['ID']?>" class="hide"><?=$data['CONDUCT']?></div>
				<div id="menu4_producer_<?=$data['ID']?>" class="hide"><?=$data['PRODUCER']?></div>
				<div id="menu4_author_<?=$data['ID']?>" class="hide"><?=$data['AUTHOR']?></div>
				<div id="menu4_director_<?=$data['ID']?>" class="hide"><?=$data['DIRECTOR']?></div>
				<div id="menu4_mainimg_<?=$data['ID']?>" class="hide"><?=$data['MAINIMG']?></div>
				<div id="menu4_contents_<?=$data['ID']?>" class="hide"><?=$data['CONTENTS']?></div>

				<li><a class="block_link menu4View" seq="<?=$data['ID']?>">
					<span class="thumb_style"><img src="<?=$data['MAINIMG']?>" alt="<?=$data['NAME']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['NAME']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['GENRENAME']?> <span class="tltle_bar"> | </span><?=substr($data['OPEN'], 0, 4)?>-<?=substr($data['OPEN'], 4, 2)?>-<?=substr($data['OPEN'], 6, 2)?></div>
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

				<div id="menu4_name_<?=$data['ID']?>" class="hide"><?=$data['NAME']?></div>
				<div id="menu4_open_<?=$data['ID']?>" class="hide"><?=$data['OPEN']?></div>
				<div id="menu4_close_<?=$data['ID']?>" class="hide"><?=$data['CLOSE']?></div>
				<div id="menu4_genrename_<?=$data['ID']?>" class="hide"><?=$data['GENRENAME']?></div>
				<div id="menu4_theatername_<?=$data['ID']?>" class="hide"><?=$data['THEATERNAME']?></div>
				<div id="menu4_runningtime_<?=$data['ID']?>" class="hide"><?=$data['RUNNINGTIME']?></div>
				<div id="menu4_grade_<?=$data['ID']?>" class="hide"><?=$data['GRADE']?></div>
				<div id="menu4_listprice_<?=$data['ID']?>" class="hide"><?=$data['LISTPRICE']?></div>
				<div id="menu4_juche_<?=$data['ID']?>" class="hide"><?=$data['JUCHE']?></div>
				<div id="menu4_conduct_<?=$data['ID']?>" class="hide"><?=$data['CONDUCT']?></div>
				<div id="menu4_producer_<?=$data['ID']?>" class="hide"><?=$data['PRODUCER']?></div>
				<div id="menu4_author_<?=$data['ID']?>" class="hide"><?=$data['AUTHOR']?></div>
				<div id="menu4_director_<?=$data['ID']?>" class="hide"><?=$data['DIRECTOR']?></div>
				<div id="menu4_mainimg_<?=$data['ID']?>" class="hide"><?=$data['MAINIMG']?></div>
				<div id="menu4_contents_<?=$data['ID']?>" class="hide"><?=$data['CONTENTS']?></div>

				<li><a class="block_link menu4View" seq="<?=$data['ID']?>">
					<span class="thumb_style"><img src="<?=$data['MAINIMG']?>" alt="<?=$data['NAME']?>" class="thumb_img01"></span>
					<!-- block_right_txt -->
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['NAME']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['GENRENAME']?> <span class="tltle_bar"> | </span><?=substr($data['OPEN'], 0, 4)?>-<?=substr($data['OPEN'], 4, 2)?>-<?=substr($data['OPEN'], 6, 2)?></div>
						</div>
						<!--// title_nums -->
					</div>
					<!--// block_right_txt -->
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
