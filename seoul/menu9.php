<?php if($page  == 1) : ?>
	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!--  main_hot_deal -->
		<div class="main_hot_deal mt10" >
			<!-- title_header -->
			<div class="title_header">
				<h3 class="title_com">서울시 <?=$areaName?> 동물병원
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

				<div id="menu9_apv_ymd_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['APV_YMD'], 0, 4)?>-<?=substr($data['APV_YMD'], 4, 2)?>-<?=substr($data['APV_YMD'], 6, 2)?></div>
				<div id="menu9_wrkp_nm_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['WRKP_NM']?></div>
				<div id="menu9_trd_state_gbn_ctn_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['TRD_STATE_GBN_CTN']?></div>
				<div id="menu9_site_addr_cn_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['SITE_ADDR']?></div>
				<div id="menu9_clg_stdt_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['CLG_STDT'], 0, 4)?>-<?=substr($data['CLG_STDT'], 4, 2)?>-<?=substr($data['CLG_STDT'], 6, 2)?></div>
				<div id="menu9_clg_enddt_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['CLG_ENDDT'], 0, 4)?>-<?=substr($data['CLG_ENDDT'], 4, 2)?>-<?=substr($data['CLG_ENDDT'], 6, 2)?></div>
				<div id="menu9_dcb_ymd_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['DCB_YMD'], 0, 4)?>-<?=substr($data['DCB_YMD'], 4, 2)?>-<?=substr($data['DCB_YMD'], 6, 2)?></div>
				<div id="menu9_ropn_ymd_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['ROPN_YMD'], 0, 4)?>-<?=substr($data['ROPN_YMD'], 4, 2)?>-<?=substr($data['ROPN_YMD'], 6, 2)?></div>
				<div id="menu9_apv_cancel_ymd_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['APV_CANCEL_YMD'], 0, 4)?>-<?=substr($data['APV_CANCEL_YMD'], 4, 2)?>-<?=substr($data['APV_CANCEL_YMD'], 6, 2)?></div>
				<div id="menu9_apv_cancel_why_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['APV_CANCEL_WHY']?></div>
				<div id="menu9_site_tel_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['SITE_TEL']?></div>

				<li><a class="block_link menu9View" seq="<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>">
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['WRKP_NM']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['TRD_STATE_GBN_CTN']?> <span class="tltle_bar"> | </span><?=$data['SITE_TEL']?></div>
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

				<div id="menu9_apv_ymd_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['APV_YMD'], 0, 4)?>-<?=substr($data['APV_YMD'], 4, 2)?>-<?=substr($data['APV_YMD'], 6, 2)?></div>
				<div id="menu9_wrkp_nm_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['WRKP_NM']?></div>
				<div id="menu9_trd_state_gbn_ctn_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['TRD_STATE_GBN_CTN']?></div>
				<div id="menu9_site_addr_cn_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['SITE_ADDR']?></div>
				<div id="menu9_clg_stdt_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['CLG_STDT'], 0, 4)?>-<?=substr($data['CLG_STDT'], 4, 2)?>-<?=substr($data['CLG_STDT'], 6, 2)?></div>
				<div id="menu9_clg_enddt_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['CLG_ENDDT'], 0, 4)?>-<?=substr($data['CLG_ENDDT'], 4, 2)?>-<?=substr($data['CLG_ENDDT'], 6, 2)?></div>
				<div id="menu9_dcb_ymd_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['DCB_YMD'], 0, 4)?>-<?=substr($data['DCB_YMD'], 4, 2)?>-<?=substr($data['DCB_YMD'], 6, 2)?></div>
				<div id="menu9_ropn_ymd_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['ROPN_YMD'], 0, 4)?>-<?=substr($data['ROPN_YMD'], 4, 2)?>-<?=substr($data['ROPN_YMD'], 6, 2)?></div>
				<div id="menu9_apv_cancel_ymd_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=substr($data['APV_CANCEL_YMD'], 0, 4)?>-<?=substr($data['APV_CANCEL_YMD'], 4, 2)?>-<?=substr($data['APV_CANCEL_YMD'], 6, 2)?></div>
				<div id="menu9_apv_cancel_why_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['APV_CANCEL_WHY']?></div>
				<div id="menu9_site_tel_<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>" class="hide"><?=$data['SITE_TEL']?></div>

				<li><a class="block_link menu9View" seq="<?=$data['SF_TEAM_CODE']?><?=$data['APV_YMD']?>">
					<div class="block_right_txt">
						<p class="title_s01"><?=$data['WRKP_NM']?></p>
						<div class="title_nums">
							<div class="author2"><?=$data['TRD_STATE_GBN_CTN']?> <span class="tltle_bar"> | </span><?=$data['SITE_TEL']?></div>
						</div>
						<!--// title_nums -->
					</div>
				</a></li>
				<?php endforeach;?>
<?php endif; ?>
