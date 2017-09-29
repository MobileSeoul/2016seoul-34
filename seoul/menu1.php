	<!-- content_area -->
	<section id="content_area"><div class="content_wrap" >

		<!-- used_area -->
		<div class="used_area" style="margin: 47px 10px 10px 10px">

			<!-- pc_goods_table2 -->
			<div class="pc_goods_table2">
				<h3 class="pc_goods_title">서울시 권역별 실시간 대기환경 현황 - <em class="num_red">[<?=$main['MSRSTE_NM']?>]</em>
				<select  id="areaCodeSelectBox" name="areaCodeSelectBox" title="검색 옵션 선택">
					<?php foreach($areaInfo as $key => $area) : ?>
					<option value="<?=$key?>" <?= $areaCode == $key ? ' selected' : '';?>><?=$area['name']?></option>
					<?php endforeach;?>
				</select>
				</h3>
				<table class="tbl_goods_t1">
					<caption class="shidden">대기 환경지수, 미세먼지, 오존, 이산화질소, 일산화탄소, 아황산가스 등의 권역별 실시간 대기환경정보를 제공합니다.</caption>
					<tbody>
						<tr>
							<th style="width:100px" scope="row">미세먼지 </th>
							<td><?=$main['PM10']?> ㎍/㎥</td>
						</tr>

						<tr>
							<th  scope="row">초미세먼지</th>
							<td>
								<?php if(count($sub1) > 0) : ?>
								<div class="table_margin2">
									<table class="tbl_goods_t1">
										<caption class="shidden">초미세먼지농도 정보 : 발표시간, 예보등급, 행동요령 정보에 관한 목록입니다.</caption>
										<thead>
											<tr>
												<th class="col_1" scope="row">발표시간</th>
												<th class="col_2" scope="row">예보등급</th>
												<th class="col_3" scope="row">행동요령</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($sub1 as $sub) : ?>
											<tr>

												<td><?=substr($sub['APPLC_DT'], 4, 2)?>-<?=substr($sub['APPLC_DT'], 6, 2)?> <?=substr($sub['APPLC_DT'], 8, 2)?>시</td>
												<td><?=$sub['CAISTEP']?></td>
												<td><?=$sub['ALARM_CNDT']?></td>
											</tr>
											<?php endforeach;?>
										</tbody>
									</table>
								</div>
								<?php else : ?>
								<?=$main['PM25']?> ㎍/㎥
								<?php endif;?>
							</td>
						</tr>
						<tr>
							<th scope="row">오존</th>
							<td>
								<?php if(count($sub2) > 0) : ?>
								<div class="table_margin2">
									<!-- tbl_goods_t1 -->
									<table class="tbl_goods_t1">
										<caption class="shidden">오존 정보 : 발표시간, 예보등급, 오염물질종류, 행동요령 정보에 관한 목록입니다.</caption>
										<thead>
											<tr>
												<th class="col_1" scope="row">발표시간</th>
												<th class="col_2" scope="row">예보등급</th>
												<th class="col_3" scope="row">행동요령</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($sub2 as $sub) : ?>
											<tr>

												<td><?=substr($sub['APPLC_DT'], 4, 2)?>-<?=substr($sub['APPLC_DT'], 6, 2)?> <?=substr($sub['APPLC_DT'], 8, 2)?>시</td>
												<td><?=$sub['CAISTEP']?></td>
												<td><?=$sub['ALARM_CNDT']?></td>
											</tr>
											<?php endforeach;?>
										</tbody>
									</table>
								</div>
								<?php else : ?>
								<?=$main['O3']?> ppm
								<?php endif;?>
							</td>

						</tr>
						<tr>
							<th scope="row">이산화질소</th>
							<td><?=$main['NO2']?> ppm</td>
						</tr>
						<tr>
							<th scope="row">일산화탄소</th>
							<td><?=$main['CO']?> ppm</td>

						</tr>
						<tr>
							<th scope="row">아황산가스</th>
							<td><?=$main['SO2']?> ppm</td>

						</tr>

						<tr>
							<th scope="row">통합대기환경등급</th>
							<td><?=$main['IDEX_NM']?></td>

						</tr>
						<tr>
							<th scope="row">통합대기환경지수</th>
							<td><?=$main['IDEX_MVL']?></td>

						</tr>
						<tr>
							<th scope="row">지수결정물질</th>
							<td><?=$main['ARPLT_MAIN']?></td>

						</tr>
					</tbody>
				</table>
			</div>
			<!--// pc_goods_table2 -->


			<!-- pc_txt_area1 -->
			<div class="pc_txt_area1">
				<p class="txt_detail_01">대기 환경지수, 미세먼지, 오존, 이산화질소, 일산화탄소, 아황산가스 등의 권역별 실시간 대기환경정보를 제공합니다.</p>
			</div>
			<!--// pc_txt_area1 -->

		</div>
		<!--// used_area -->



	</div></section>
	<!--// content_area -->