
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!-- used_area -->
		<div class="used_area" style="margin: 47px 10px 10px 10px">

			<!-- zoom_spec_shadow -->
			<div class="zoom_spec_shadow">
				<!-- goods_zoom_area -->
				<div class="goods_zoom_area">
					<!-- goods_zoom_imgs -->
					<div class="goods_zoom_imgs">
						<img src="<?=$MAIN_IMG?>" class="zoom_img_150" alt="<?=$TITLE?>">
					</div>
					<!--// goods_zoom_imgs -->
				</div>
				<!--// goods_zoom_area -->

				<!-- goods_zoom_spec -->
				<div class="goods_zoom_spec">
					<p class="goods_spec_txt"><?=$CODENAME?> / <?=$TITLE?></p>
				</div>
				<!--// goods_zoom_spec -->
			</div>
			<!--// zoom_spec_shadow -->

			<!-- pc_goods_table2 -->
			<div class="pc_goods_table2">
				<h3 class="pc_goods_title">이용정보</h3>
				<table class="tbl_goods_t1">
					<caption class="shidden">문화 이용정보 : 해당 문화정보에대해 날짜,시간,장소, 이용대상, 이용요금, 주최, 문의, 주관및 후원등의 정보를 자세히 알수있습니다.</caption>
					<tbody>
						<?php if($STRTDATE || $END_DATE) : ?>
						<tr>
							<th style="width:85px" scope="row">날짜</th>
							<td><?=$STRTDATE?> ~ <?=$END_DATE?></td>
						</tr>
						<?php endif;?>

						<?php if($TIME) : ?>
						<tr>
							<th scope="row">시간</th>
							<td><?=$TIME?></td>

						</tr>
						<?php endif;?>

						<?php if($PLACE) : ?>
						<tr>
							<th scope="row">장소</th>
							<td><?=$PLACE?></td>
						</tr>
						<?php endif;?>

						<?php if($USE_TRGT) : ?>
						<tr>
							<th scope="row">이용대상</th>
							<td><?=$USE_TRGT?></td>
						</tr>
						<?php endif;?>


						<?php if($USE_FEE) : ?>
						<tr>
							<th scope="row">이용요금</th>
							<td><?=$USE_FEE?></td>
						</tr>
						<?php endif;?>

						<?php if($SPONSOR) : ?>
						<tr>
							<th scope="row">주최</th>
							<td><?=$SPONSOR?></td>
						</tr>
						<?php endif;?>

						<?php if($INQUIRY) : ?>
						<tr>
							<th scope="row">문의</th>
							<td><?=$INQUIRY?></td>
						</tr>
						<?php endif;?>

						<?php if($SUPPORT) : ?>
						<tr>
							<th scope="row">주관및후원</th>
							<td><?=$SUPPORT?></td>
						</tr>
						<?php endif;?>

						<?php if($ETC_DESC) : ?>
						<tr>
							<th scope="row">기타</th>
							<td><?=$ETC_DESC?></td>
						</tr>
						<?php endif;?>

						<?php if($PROGRAM) : ?>
						<tr>
							<th scope="row">프로그램 소개</th>
							<td><?=$PROGRAM?></td>
						</tr>
						<?php endif;?>

						<?php if($GCODE) : ?>
						<tr>
							<th scope="row">자치구</th>
							<td><?=$GCODE?></td>
						</tr>
						<?php endif;?>

						<?php if($ORG_LINK) : ?>
						<tr>
							<th scope="row">원문</th>
							<td><?=$ORG_LINK?></td>
						</tr>
						<?php endif;?>
					</tbody>
				</table>
			</div>
			<!--// pc_goods_table2 -->

			<!-- pc_txt_area1 -->
			<div class="pc_txt_area1">
				<p class="txt_detail_01">해당 정보는 문화본부 문화기획관 문화정책과에서 제공한 정보로 제공됩니다.</p>
			</div>
			<!--// pc_txt_area1 -->

		</div>
		<!--// used_area -->





	</div></section>
	<!--// content_area -->
	<button id="scrollTopButton" class="btn_scroll_top" type="button" title="스크롤을 맨 위로 이동합니다">맨위로 이동</button>
