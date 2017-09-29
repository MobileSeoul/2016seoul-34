// ajax 로딩 상태 변수
var ajaxLoadingStatus = true;

var initStatus = true;

// 검색조건
var globalSearch = {
	mode		: '',
	page		: 1,
	areaCode	: '',
	title		: '',
	seq			: 0,
	wbCode		: 'b1',
	cate		: '가방',
	getName		: '',
	marketName	: '',
	A_NAME		: ''
}

// ajax 기본 셋팅
$.ajaxSetup({
	type		: 'POST',
	dataType	: 'json',
	cache		: false,
	crossDomain	: true,
	complete	: function() {
		$('#prevLink').show();
	},
	error		: function(jqXHR, textStatus, errorThrown) {

		alert(textStatus + '\r\n' +  errorThrown);
		//ajaxLoading('off');
		//ajaxLoadingStatus = true;
	   location.reload();
	}
});


$(document).ready(function () {

	// 메인페이지 지역구 선택 시 레이어 노출
	$('#seoul_map area').click(function(e, data) {

		// 선택된 지역 코드
		var areaCode = $(this).attr('area');

		layerInit();

		var html = [];
			html.push('<div id="layer_area">');
			html.push('	<div class="check_box_01">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<ul class="check_box_list01">');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu1"><span class="label_t1">실시간 대기현황</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu13"><span class="label_t1">생필품 농수축산물 가격정보</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu10"><span class="label_t1">공영주차장 주차 가능대수</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu9"><span class="label_t1">서울시 동물병원</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu12"><span class="label_t1">도서관 이용시간 및 휴관일정보</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu7"><span class="label_t1">서울시 공구대여소</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu8"><span class="label_t1">서울시 재활용센터</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu11"><span class="label_t1">대중교통 보관 분실물 검색</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu14"><span class="label_t1">서울시 전통시장 현황</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu6"><span class="label_t1">서울시 문화공간</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu3"><span class="label_t1">공원프로그램</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu4"><span class="label_t1">남산예술센터 공연</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu5"><span class="label_t1">서울연극센터 이벤트</span></a></li>');
			html.push('			<li><a href="#" areaCode="' + areaCode + '" class="menu2"><span class="label_t1">서울시 문화행사 정보</span></a></li>');			
			html.push('		</ul>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));
	});

	// 메뉴 레이어 닫기버튼 클릭 시
	$('#menuLayerClose').live('click', function (e) {
		e.preventDefault();
		$('#maskForApplication, #applicationBoxes').remove();
		globalSearch.seq  = 0;
	});


	// 이전페이지 버튼 클릭 시
	$('#prevLink').live('click', function (e) {
		e.preventDefault();

		var seq = globalSearch.seq;

		globalSearch.seq = 0;
		globalSearch.page = 1;

		if(seq > 0) {
			getData();
		} else {
			mainMove();
		}

	});


	// 서울시 권역별 실시간 대기현황 메뉴 클릭 시
	$('.menu1').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu1';
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 권역별 실시간 대기현황';
		getData();
	});


	// 서울시 문화행사 정보 메뉴 클릭 시
	$('.menu2').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu2';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 문화행사';
		getData();
	});


	// 서울시 문화행사 정보 상세페이지 클릭 시
	$('.menu2View').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu2';
		globalSearch.title = '서울시 문화행사';
		globalSearch.seq = $(this).attr('seq');
		getData();
	});

	// 서울의공원 프로그램 정보
	$('.menu3').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu3';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울의공원 프로그램';
		getData();
	});

	// 서울의공원 프로그램 상세페이지 클릭 시
	$('.menu3View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var p_name = $('#menu3_p_name_' + seq).html();
		var p_eduperson = $('#menu3_p_eduperson_' + seq).html();
		var p_eamax = $('#menu3_p_eamax_' + seq).html();
		var p_content = $('#menu3_p_content_' + seq).html();
		var p_eduday_s = $('#menu3_p_eduday_s_' + seq).html();
		var p_eduday_e = $('#menu3_p_eduday_e_' + seq).html();
		var p_edutime = $('#menu3_p_edutime_' + seq).html();
		var p_proday = $('#menu3_p_proday_' + seq).html();
		var p_park = $('#menu3_p_park_' + seq).html();
		var p_list_content = $('#menu3_p_list_content_' + seq).html();
		var p_addr = $('#menu3_p_addr_' + seq).html();
		var p_zone = $('#menu3_p_zone_' + seq).html();
		var p_division = $('#menu3_p_division_' + seq).html();
		var p_img = $('#menu3_p_img_' + seq).html();
		var p_admintel = $('#menu3_p_admintel_' + seq).html();
		var lat = $('#menu3_lat_' + seq).html();
		var lng = $('#menu3_lng_' + seq).html();

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="zoom_spec_shadow">');
			html.push('			<div class="goods_zoom_area">');
			html.push('				<div class="goods_zoom_imgs">');
			html.push('					<img src="' + p_img + '" class="zoom_img_150" alt="' + p_name + '">');
			html.push('				</div>');
			html.push('			</div>');
			html.push('			<div class="goods_zoom_spec">');
			html.push('				<p class="goods_spec_txt">' + p_park + ' / ' + p_name + '</p>');
			html.push('			</div>');
			html.push('		</div>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">공원 이용정보 : 해당 공원정보에대해 프로그램 내용, 시간, 공원명, 행사대상 등의 정보를 자세히 알수있습니다.</caption>');
			html.push('				<tbody>');
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">프로그램 기간</th>');
			html.push('						<td>' + p_eduday_s + ' ~ ' + p_eduday_e + '</td>');
			html.push('					</tr>');

			if(p_edutime.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">프로그램 시간</th>');
			html.push('						<td>' + p_edutime + '</td>');
			html.push('					</tr>');
			}

			if(p_proday.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">요일</th>');
			html.push('						<td>' + p_proday + '</td>');
			html.push('					</tr>');
			}

			if(p_eduperson.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">행사대상</th>');
			html.push('						<td>' + p_eduperson + '</td>');
			html.push('					</tr>');
			}

			if(p_eamax.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">인원</th>');
			html.push('						<td>' + p_eamax + '</td>');
			html.push('					</tr>');
			}

			if(p_content.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">프로그램 내용</th>');
			html.push('						<td>' + p_content + '</td>');
			html.push('					</tr>');
			}

			if(p_list_content.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">공원설명</th>');
			html.push('						<td>' + p_list_content + '</td>');
			html.push('					</tr>');
			}

			if(p_addr.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">주소</th>');
			html.push('						<td>' + p_addr + '</td>');
			html.push('					</tr>');


			if(lat.length > 0 && lng.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">위치</th>');
			html.push('						<td><div id="map" style="width:100%;height:400px;"></div></td>');
			html.push('					</tr>');
			}
			}

			if(p_zone.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">지역</th>');
			html.push('						<td>' + p_zone + '</td>');
			html.push('					</tr>');
			}

			if(p_division.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">관리부서</th>');
			html.push('						<td>' + p_division + '</td>');
			html.push('					</tr>');
			}

			if(p_admintel.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">연락처</th>');
			html.push('						<td>' + p_admintel + '</td>');
			html.push('					</tr>');
			}

			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">이 서비스는 서울시 푸른도시국 공원녹지청책과에서 제공하고 있습니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));


		var mapOptions = {
			center: new naver.maps.LatLng(lat, lng),
			zoom: 12
		};

		var map = new naver.maps.Map('map', mapOptions);
		var marker = new naver.maps.Marker({
			position: new naver.maps.LatLng(lat, lng),
			map: map
		});

		globalSearch.seq  = seq;
	});


	// 서울시 남산예술센터 공연 정보
	$('.menu4').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu4';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 남산예술센터 공연 정보';
		getData();
	});

	// 서울시 남산예술센터 공연 정보 상세페이지 클릭 시
	$('.menu4View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var name = $('#menu4_name_' + seq).html();
		var open = $('#menu4_open_' + seq).html();
		var close = $('#menu4_close_' + seq).html();
		var genrename = $('#menu4_genrename_' + seq).html();
		var theatername = $('#menu4_theatername_' + seq).html();
		var runningtime = $('#menu4_runningtime_' + seq).html();
		var grade = $('#menu4_grade_' + seq).html();
		var listprice = $('#menu4_listprice_' + seq).html();
		var juche = $('#menu4_juche_' + seq).html();
		var conduct = $('#menu4_conduct_' + seq).html();
		var producer = $('#menu4_producer_' + seq).html();
		var author = $('#menu4_author_' + seq).html();
		var director = $('#menu4_director_' + seq).html();
		var mainimg = $('#menu4_mainimg_' + seq).html();
		var contents = $('#menu4_contents_' + seq).html();

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="zoom_spec_shadow">');
			html.push('			<div class="goods_zoom_area">');
			html.push('				<div class="goods_zoom_imgs">');
			html.push('					<img src="' + mainimg + '" class="zoom_img_150" alt="' + name + '">');
			html.push('				</div>');
			html.push('			</div>');
			html.push('			<div class="goods_zoom_spec">');
			html.push('				<p class="goods_spec_txt">' + genrename + ' / ' + name + '</p>');
			html.push('			</div>');
			html.push('		</div>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">문화 이용정보 : 해당 문화정보에대해 날짜,시간,장소, 이용대상, 이용요금, 주최, 문의, 주관및 후원등의 정보를 자세히 알수있습니다.</caption>');
			html.push('				<tbody>');
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">공연기간</th>');
			html.push('						<td>' + open + ' ~ ' + close + '</td>');
			html.push('					</tr>');

			if(runningtime.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">관람시간</th>');
			html.push('						<td>' + runningtime + '</td>');
			html.push('					</tr>');
			}

			if(grade.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">관람등급</th>');
			html.push('						<td>' + grade + '</td>');
			html.push('					</tr>');
			}

			if(listprice.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">가격정보</th>');
			html.push('						<td>' + listprice + '</td>');
			html.push('					</tr>');
			}

			if(juche.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">주최</th>');
			html.push('						<td>' + juche + '</td>');
			html.push('					</tr>');
			}

			if(conduct.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">주관</th>');
			html.push('						<td>' + conduct + '</td>');
			html.push('					</tr>');
			}

			if(producer.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">제작</th>');
			html.push('						<td>' + producer + '</td>');
			html.push('					</tr>');
			}

			if(author.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">작가</th>');
			html.push('						<td>' + author + '</td>');
			html.push('					</tr>');
			}

			if(director.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">연출</th>');
			html.push('						<td>' + director + '</td>');
			html.push('					</tr>');
			}

			if(theatername.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">공연장소</th>');
			html.push('						<td>' + theatername + '</td>');
			html.push('					</tr>');
			}

			if(contents.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">공연소개</th>');
			html.push('						<td>' + contents + '</td>');
			html.push('					</tr>');
			}

			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">이 서비스는 남산예술센터에서 진행하는 공연 및 연극에 대한 정보입니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		globalSearch.seq  = seq;
	});

	// 서울연극센터 이벤트 정보
	$('.menu5').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu5';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울연극센터 이벤트 정보';
		getData();
	});

	// 서울연극센터 이벤트 상세페이지 클릭 시
	$('.menu5View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var title = $('#menu5_title_' + seq).html();
		var eventdate = $('#menu5_eventdate_' + seq).html();
		var eventdate2 = $('#menu5_eventdate2_' + seq).html();
		var enddate = $('#menu5_enddate_' + seq).html();
		var contents = $('#menu5_contents_' + seq).html();
		var mainfilename = $('#menu5_mainfilename_' + seq).html();
		var regdate = $('#menu5_regdate_' + seq).html();

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="zoom_spec_shadow">');
			html.push('			<div class="goods_zoom_area">');
			html.push('				<div class="goods_zoom_imgs">');
			html.push('					<img src="' + mainfilename + '" class="zoom_img_150" alt="' + title + '">');
			html.push('				</div>');
			html.push('			</div>');
			html.push('			<div class="goods_zoom_spec">');
			html.push('				<p class="goods_spec_txt">' + title + '</p>');
			html.push('			</div>');
			html.push('		</div>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이벤트 이용정보 : 해당 정보에대해 날짜, 참가일, 당첨자 발표 등의 정보를 자세히 알수있습니다.</caption>');
			html.push('				<tbody>');
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">이벤트기간</th>');
			html.push('						<td>' + eventdate + ' ~ ' + eventdate2 + '</td>');
			html.push('					</tr>');

			if(enddate.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">당첨자 발표일</th>');
			html.push('						<td>' + enddate + '</td>');
			html.push('					</tr>');
			}

			if(contents.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">이벤트 내용</th>');
			html.push('						<td>' + contents + '</td>');
			html.push('					</tr>');
			}

			if(regdate.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">등록일자</th>');
			html.push('						<td>' + regdate + '</td>');
			html.push('					</tr>');
			}


			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">이 서비스는 서울시 보화사업팀에서 제공하고 있는 정보입니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		globalSearch.seq  = seq;
	});

	// 서울시 문화공간
	$('.menu6').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu6';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 문화공간 현황';
		getData();
	});

	// 서울시 문화공간 현황 상세페이지 클릭 시
	$('.menu6View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var codename = $('#menu6_codename_' + seq).html();
		var fac_name = $('#menu6_fac_name_' + seq).html();
		var main_img = $('#menu6_main_img_' + seq).html();
		var addr = $('#menu6_addr_' + seq).html();
		var phne = $('#menu6_phne_' + seq).html();
		var fax = $('#menu6_fax_' + seq).html();
		var homepage = $('#menu6_homepage_' + seq).html();
		var openhour = $('#menu6_openhour_' + seq).html();
		var entr_fee = $('#menu6_entr_fee_' + seq).html();
		var closeday = $('#menu6_closeday_' + seq).html();
		var open_day = $('#menu6_open_day_' + seq).html();
		var seat_cnt = $('#menu6_seat_cnt_' + seq).html();
		var etc_desc = $('#menu6_etc_desc_' + seq).html();
		var fac_desc = $('#menu6_fac_desc_' + seq).html();

		var lat = $('#menu6_x_coord_' + seq).html();
		var lng = $('#menu6_y_coord_' + seq).html();


		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="zoom_spec_shadow">');
			html.push('			<div class="goods_zoom_area">');
			html.push('				<div class="goods_zoom_imgs">');
			html.push('					<img src="' + main_img + '" class="zoom_img_150" alt="' + fac_name + '">');
			html.push('				</div>');
			html.push('			</div>');
			html.push('			<div class="goods_zoom_spec">');
			html.push('				<p class="goods_spec_txt">' + fac_name + '</p>');
			html.push('			</div>');
			html.push('		</div>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이용정보 : 해당 정보에대해 장르명, 문화공간명, 주소 등의 정보를 자세히 알수있습니다.</caption>');
			html.push('				<tbody>');

			if(codename.length > 0) {
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">장르분류</th>');
			html.push('						<td>' + codename + '</td>');
			html.push('					</tr>');
			}

			if(openhour.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">관람시간</th>');
			html.push('						<td>' + openhour + '</td>');
			html.push('					</tr>');
			}

			if(entr_fee.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">관람료(원)</th>');
			html.push('						<td>' + entr_fee + '</td>');
			html.push('					</tr>');
			}

			if(addr.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">주소</th>');
			html.push('						<td>' + addr + '</td>');
			html.push('					</tr>');

			if(lat.length > 0 && lng.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">위치</th>');
			html.push('						<td><div id="map" style="width:100%;height:400px;"></div></td>');
			html.push('					</tr>');
			}
			}

			if(phne.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">연락처</th>');
			html.push('						<td>' + phne + '</td>');
			html.push('					</tr>');
			}

			if(fax.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">팩스</th>');
			html.push('						<td>' + fax + '</td>');
			html.push('					</tr>');
			}

			if(homepage.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">홈페이지</th>');
			html.push('						<td>' + homepage + '</td>');
			html.push('					</tr>');
			}

			if(closeday.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">휴관일</th>');
			html.push('						<td>' + closeday + '</td>');
			html.push('					</tr>');
			}

			if(open_day.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">개관일자</th>');
			html.push('						<td>' + open_day + '</td>');
			html.push('					</tr>');
			}

			if(seat_cnt.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">객석수</th>');
			html.push('						<td>' + seat_cnt + '</td>');
			html.push('					</tr>');
			}

			if(etc_desc.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">기타사항</th>');
			html.push('						<td>' + etc_desc + '</td>');
			html.push('					</tr>');
			}

			if(fac_desc.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">시설소개</th>');
			html.push('						<td>' + fac_desc + '</td>');
			html.push('					</tr>');
			}


			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">이 서비스는 서울시 문화본부 문화기획관 문화정책과에서 제공하고 있는 정보입니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));


		var mapOptions = {
			center: new naver.maps.LatLng(lat, lng),
			zoom: 12
		};

		var map = new naver.maps.Map('map', mapOptions);
		var marker = new naver.maps.Marker({
			position: new naver.maps.LatLng(lat, lng),
			map: map
		});

		globalSearch.seq  = seq;
	});


	// 서울시 공구도서관 (대여소) 정보
	$('.menu7').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu7';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 공구도서관 (대여소) 정보';
		getData();
	});

	// 서울시 공구도서관 (대여소) 상세페이지 클릭 시
	$('.menu7View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var atdrc = $('#menu7_atdrc_' + seq).html();
		var bsns_nm = $('#menu7_bsns_nm_' + seq).html();
		var poses_thng = $('#menu7_poses_thng_' + seq).html();
		var adres = $('#menu7_adres_' + seq).html();
		var telno = $('#menu7_telno_' + seq).html();
		var target = $('#menu7_target_' + seq).html();
		var opentime = $('#menu7_opentime_' + seq).html();
		var rent = $('#menu7_rent_' + seq).html();

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이용정보 : 해당 정보에대해 구비공구 현황, 운영시간 등의 정보를 자세히 알수있습니다.</caption>');
			html.push('				<tbody>');

			if(bsns_nm.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">공구도서관명</th>');
			html.push('						<td>' + bsns_nm + '</td>');
			html.push('					</tr>');
			}

			if(atdrc.length > 0) {
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">관할구청</th>');
			html.push('						<td>' + atdrc + '</td>');
			html.push('					</tr>');
			}

			if(poses_thng.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">구비공구 현황</th>');
			html.push('						<td>' + poses_thng + '</td>');
			html.push('					</tr>');
			}

			if(adres.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">주소</th>');
			html.push('						<td>' + adres + '</td>');
			html.push('					</tr>');
			}

			if(telno.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">전화번호</th>');
			html.push('						<td>' + telno + '</td>');
			html.push('					</tr>');
			}

			if(target.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">대여대상</th>');
			html.push('						<td>' + target + '</td>');
			html.push('					</tr>');
			}

			if(opentime.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">운영시간</th>');
			html.push('						<td>' + opentime + '</td>');
			html.push('					</tr>');
			}

			if(rent.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">대여료</th>');
			html.push('						<td>' + rent + '</td>');
			html.push('					</tr>');
			}



			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">이 서비스는 서울시 서울혁신기획관 사회혁신담당관에서 제공하고 있는 정보입니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		globalSearch.seq  = seq;
	});


	// 서울시 자치구 재활용센터 시설 현황 정보
	$('.menu8').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu8';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 자치구 재활용센터 시설 현황';
		getData();
	});

	// 서울시 자치구 재활용센터 시설 현황 상세페이지 클릭 시
	$('.menu8View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var area_se = $('#menu8_area_se_' + seq).html();
		var cmpnm = $('#menu8_cmpnm_' + seq).html();
		var detail_adres_cn = $('#menu8_detail_adres_cn_' + seq).html();
		var cttpc_cn = $('#menu8_cttpc_cn_' + seq).html();
		var site_url = $('#menu8_site_url_' + seq).html();

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이용정보 : 해당 정보에대해 지역구분, 상호, 주소 등의 정보를 자세히 알수있습니다.</caption>');
			html.push('				<tbody>');

			if(cmpnm.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">상호</th>');
			html.push('						<td>' + cmpnm + '</td>');
			html.push('					</tr>');
			}

			if(area_se.length > 0) {
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">지역구분</th>');
			html.push('						<td>' + area_se + '</td>');
			html.push('					</tr>');
			}

			if(detail_adres_cn.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">상세주소</th>');
			html.push('						<td>' + detail_adres_cn + '</td>');
			html.push('					</tr>');
			}

			if(cttpc_cn.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">연락처</th>');
			html.push('						<td>' + cttpc_cn + '</td>');
			html.push('					</tr>');
			}

			if(site_url.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">사이트URL</th>');
			html.push('						<td>' + site_url + '</td>');
			html.push('					</tr>');
			}


			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">이 서비스는 서울시 기후환경본부 자원순환과에서 제공하고 있는 정보입니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		globalSearch.seq  = seq;
	});


	// 서울시 동물병원 정보
	$('.menu9').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu9';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 동물병원';
		getData();
	});

	// 서울시 동물병원 상세페이지 클릭 시
	$('.menu9View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var apv_ymd = $('#menu9_apv_ymd_' + seq).html();
		var wrkp_nm = $('#menu9_wrkp_nm_' + seq).html();
		var trd_state_gbn_ctn = $('#menu9_trd_state_gbn_ctn_' + seq).html();
		var site_addr = $('#menu9_site_addr_cn_' + seq).html();
		var clg_stdt = $('#menu9_clg_stdt_' + seq).html();
		var clg_enddt = $('#menu9_clg_enddt_' + seq).html();
		var dcb_ymd = $('#menu9_dcb_ymd_' + seq).html();
		var ropn_ymd = $('#menu9_ropn_ymd_' + seq).html();
		var apv_cancel_ymd = $('#menu9_apv_cancel_ymd_' + seq).html();
		var apv_cancel_why = $('#menu9_apv_cancel_why_' + seq).html();
		var site_tel = $('#menu9_site_tel_' + seq).html();

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이용정보 : 해당 정보에대해 업소명, 사업장소재지, 전화번호 등의 정보를 자세히 알수있습니다.</caption>');
			html.push('				<tbody>');

			if(wrkp_nm.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">업소명</th>');
			html.push('						<td>' + wrkp_nm + '</td>');
			html.push('					</tr>');
			}

			if(trd_state_gbn_ctn.length > 0) {
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">영업상태</th>');
			html.push('						<td>' + trd_state_gbn_ctn + '</td>');
			html.push('					</tr>');
			}

			if(apv_ymd.length > 0 && apv_ymd != '--') {
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">신고일자</th>');
			html.push('						<td>' + apv_ymd + '</td>');
			html.push('					</tr>');
			}

			if(site_addr.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">사업장소재지</th>');
			html.push('						<td>' + site_addr + '</td>');
			html.push('					</tr>');
			}

			if(clg_stdt.length > 0 && clg_stdt != '--') {
			html.push('					<tr>');
			html.push('						<th scope="row">휴업시작일자</th>');
			html.push('						<td>' + clg_stdt + '</td>');
			html.push('					</tr>');
			}

			if(clg_enddt.length > 0 && clg_enddt != '--') {
			html.push('					<tr>');
			html.push('						<th scope="row">휴업종료일자</th>');
			html.push('						<td>' + clg_enddt + '</td>');
			html.push('					</tr>');
			}

			if(dcb_ymd.length > 0 && dcb_ymd != '--') {
			html.push('					<tr>');
			html.push('						<th scope="row">폐업일자</th>');
			html.push('						<td>' + dcb_ymd + '</td>');
			html.push('					</tr>');
			}

			if(ropn_ymd.length > 0 && ropn_ymd != '--') {
			html.push('					<tr>');
			html.push('						<th scope="row">재개업일자</th>');
			html.push('						<td>' + ropn_ymd + '</td>');
			html.push('					</tr>');
			}

			if(apv_cancel_ymd.length > 0 && apv_cancel_ymd != '--') {
			html.push('					<tr>');
			html.push('						<th scope="row">행정처분일자</th>');
			html.push('						<td>' + apv_cancel_ymd + '</td>');
			html.push('					</tr>');
			}

			if(apv_cancel_why.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">행정처분사유</th>');
			html.push('						<td>' + apv_cancel_why + '</td>');
			html.push('					</tr>');
			}

			if(site_tel.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">전화번호</th>');
			html.push('						<td>' + site_tel + '</td>');
			html.push('					</tr>');
			}



			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">이 서비스는 새올행정정보시스템에서 제공하고 있는 정보입니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		globalSearch.seq  = seq;
	});


	// 서울시 공영주차장 주차 가능대수
	$('.menu10').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu10';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '공영주차장 주차 가능대수';
		getData();
	});

	// 서울시 공영주차장 주차 가능대수 상세페이지 클릭 시
	$('.menu10View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var park_name = $('#menu10_park_name_' + seq).html();
		var max_parking_cnt = $('#menu10_max_parking_cnt_' + seq).html();
		var parking_cnt = $('#menu10_parking_cnt_' + seq).html();
		var park_address = $('#menu10_park_address_' + seq).html();
		var tel_no = $('#menu10_tel_no_' + seq).html();
		var owner_name = $('#menu10_owner_name_' + seq).html();
		var company_nm = $('#menu10_company_nm_' + seq).html();

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이용정보 : 서울시설공단에서 운영하는 공영주차장 중 자동화주차장의 주차가능댓수를 서비스 합니다</caption>');
			html.push('				<tbody>');

			if(park_name.length > 0) {
			html.push('					<tr>');
			html.push('						<th style="width:150px" scope="row">주차장명</th>');
			html.push('						<td>' + park_name + '</td>');
			html.push('					</tr>');
			}

			if(max_parking_cnt.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">최대주차대수</th>');
			html.push('						<td>' + max_parking_cnt + ' 대</td>');
			html.push('					</tr>');
			}

			if(parking_cnt.length > 0) {
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">잔여주차가능대수</th>');
			html.push('						<td><em class="num_red">' + parking_cnt + ' 대</em></td>');
			html.push('					</tr>');
			}

			if(park_address.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">주소</th>');
			html.push('						<td>' + park_address + '</td>');
			html.push('					</tr>');
			}

			if(tel_no.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">전화</th>');
			html.push('						<td>' + tel_no + '</td>');
			html.push('					</tr>');
			}

			if(owner_name.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">대표명</th>');
			html.push('						<td>' + owner_name + '</td>');
			html.push('					</tr>');
			}

			if(company_nm.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">기관명</th>');
			html.push('						<td>' + company_nm + '</td>');
			html.push('					</tr>');
			}


			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">서울시설공단에서 운영하는 공영주차장 중 자동화주차장의 주차가능댓수를 서비스 합니다.</p>');
			html.push('			<p class="txt_detail_01">데이터는 10분주기로 가져오므로 실제 주차장의 주차가능댓수와는 차이가 발생할 수 있습니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		globalSearch.seq  = seq;
	});


	// 서울시 대중교통 보관 분실물 검색
	$('.menu11').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu11';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '대중교통 보관 분실물 검색';
		getData();
	});


	// 서울시 대중교통 보관 분실물 검색 상세페이지 클릭 시
	$('.menu11View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var seq = $(this).attr('seq');
		var take_place = $('#menu11_take_place_' + seq).html();
		var get_name = $('#menu11_get_name_' + seq).html();
		var get_date = $('#menu11_get_date_' + seq).html();
		var get_position = $('#menu11_get_position_' + seq).html();
		var image = $('#menu11_image_' + seq).html();
		var get_thing = $('#menu11_get_thing_' + seq).html();
		var contact = $('#menu11_contact_' + seq).html();
		var drive_num = $('#menu11_drive_num_' + seq).html();

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="zoom_spec_shadow">');
			html.push('			<div class="goods_zoom_area">');
			html.push('				<div class="goods_zoom_imgs">');
			html.push('					<img src="' + image + '" class="zoom_img_150" alt="' + get_name + '">');
			html.push('				</div>');
			html.push('			</div>');
			html.push('			<div class="goods_zoom_spec">');
			html.push('				<p class="goods_spec_txt">' + get_name + '</p>');
			html.push('			</div>');
			html.push('		</div>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이용정보 : 버스, 지하철, 택시에서 분실한 물품에 대한 검색기능을 제공</caption>');
			html.push('				<tbody>');


			if(get_date.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">습득일자</th>');
			html.push('						<td>' + get_date + '</td>');
			html.push('					</tr>');
			}

			if(get_position.length > 0) {
			html.push('					<tr>');
			html.push('						<th style="width:85px" scope="row">회사명</th>');
			html.push('						<td>' + get_position + '</td>');
			html.push('					</tr>');
			}

			if(take_place.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">수령가능장소</th>');
			html.push('						<td>' + take_place + '</td>');
			html.push('					</tr>');
			}

			if(get_thing.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">상세정보</th>');
			html.push('						<td>' + get_thing + '</td>');
			html.push('					</tr>');
			}

			if(contact.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">연락처</th>');
			html.push('						<td>' + contact + '</td>');
			html.push('					</tr>');
			}

			if(drive_num.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">습득차량번호</th>');
			html.push('						<td>' + drive_num + '</td>');
			html.push('					</tr>');
			}


			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">버스, 지하철, 택시에서 분실한 물품에 대한 검색기능을 제공합니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		globalSearch.seq  = seq;
	});

	$('#searchLostBtn').live('click', function(e) {
		e.preventDefault();

		ajaxLoadingStatus = true;

		globalSearch.page = 1;
		globalSearch.cate = $('#cate').val();
		globalSearch.wbCode = $('#wbCode').val();
		globalSearch.getName = $('#getName').val();

		getData();
	});

	// 서울시 도서관 이용시간 및 휴관일 정보
	$('.menu12').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu12';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 도서관 이용시간 및 휴관일 정보';
		getData();
	});


	// 서울시 도서관 이용시간 및 휴관일 정보 상세페이지 클릭 시
	$('.menu12View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var lbrry_name = $(this).attr('lbrry_name');
		var lat = $(this).attr('lat');
		var lng = $(this).attr('lng');

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="zoom_spec_shadow">');
			html.push('			<div class="goods_zoom_spec">');
			html.push('				<p class="goods_spec_txt">' + lbrry_name + '</p>');
			html.push('			</div>');
			html.push('		</div>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이용정보 : 서울특별시 각 자치구의 도서관 이용시간과 휴관일 정보, 도서관의 위치정보를 제공합니다.</caption>');
			html.push('				<tbody>');


			if(lat.length > 0 && lng.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">도서관 위치</th>');
			html.push('						<td><div id="map" style="width:100%;height:400px;"></div></td>');
			html.push('					</tr>');
			}

			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">서울특별시 각 자치구의 도서관 이용시간과 휴관일 정보, 도서관의 위치정보를 제공합니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		var mapOptions = {
			center: new naver.maps.LatLng(lat, lng),
			zoom: 12
		};

		var map = new naver.maps.Map('map', mapOptions);
		var marker = new naver.maps.Marker({
			position: new naver.maps.LatLng(lat, lng),
			map: map
		});

		globalSearch.seq  = 999;
	});


	// 서울시 생필품 농수축산물 가격 정보
	$('.menu13').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu13';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 생필품 농수축산물 가격 정보';
		getData();
	});

	$('#searchMarketBtn').live('click', function(e) {
		e.preventDefault();

		ajaxLoadingStatus = true;

		globalSearch.page = 1;
		globalSearch.marketName = $('#marketName').val();
		globalSearch.goodsName = $('#goodsName').val();
		globalSearch.areaCode = $('#areaCode').val();

		getData();
	});

	// 서울시 전통시장 현황
	$('.menu14').live('click', function(e) {
		e.preventDefault();

		globalSearch.mode = 'menu14';
		globalSearch.seq = 0;
		globalSearch.areaCode = $(this).attr('areaCode');
		globalSearch.title = '서울시 전통시장 현황';
		getData();
	});


	// 서울시 전통시장 현황 상세페이지 클릭 시
	$('.menu14View').live('click', function(e) {
		e.preventDefault();

		layerInit();

		var m_name = $(this).attr('m_name');
		var m_tel = $(this).attr('m_tel');
		var m_addr = $(this).attr('m_addr');
		var lat = $(this).attr('lat');
		var lng = $(this).attr('lng');

		var html = [];
			html.push('<div id="layer_view">');
			html.push('	<div class="used_area">');
			html.push('		<a href="#" class="btn_viewed_close" id="menuLayerClose"><span class="icon_close2">닫기</span></a>');
			html.push('		<div class="zoom_spec_shadow">');
			html.push('			<div class="goods_zoom_spec">');
			html.push('				<p class="goods_spec_txt">' + m_name + '</p>');
			html.push('			</div>');
			html.push('		</div>');
			html.push('		<div class="pc_goods_table2">');
			html.push('			<h3 class="pc_goods_title">이용정보</h3>');
			html.push('			<table class="tbl_goods_t1">');
			html.push('				<caption class="shidden">이용정보 : 서울시 전통시장별 위치정보 및 교통정보입니다.</caption>');
			html.push('				<tbody>');


			if(m_tel.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">연락처</th>');
			html.push('						<td>' + m_tel + '</td>');
			html.push('					</tr>');
			}

			if(m_addr.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">주소</th>');
			html.push('						<td>' + m_addr + '</td>');
			html.push('					</tr>');
			}

			if(lat.length > 0 && lng.length > 0) {
			html.push('					<tr>');
			html.push('						<th scope="row">전통시장 위치</th>');
			html.push('						<td><div id="map" style="width:100%;height:400px;"></div></td>');
			html.push('					</tr>');
			}

			html.push('				</tbody>');
			html.push('			</table>');
			html.push('		</div>');
			html.push('		<div class="pc_txt_area1">');
			html.push('			<p class="txt_detail_01">서울시 전통시장별 위치정보 및 교통정보입니다.</p>');
			html.push('		</div>');
			html.push('	</div>');
			html.push('</div>');

		$("#applicationDialog").empty().html(html.join(''));

		var mapOptions = {
			center: new naver.maps.LatLng(lat, lng),
			zoom: 12
		};

		var map = new naver.maps.Map('map', mapOptions);
		var marker = new naver.maps.Marker({
			position: new naver.maps.LatLng(lat, lng),
			map: map
		});

		globalSearch.seq  = 999;
	});


	// 지역셀렉트박스 변경시
	$('#areaCodeSelectBox').live('change', function(e) {
		e.preventDefault();
		globalSearch.areaCode = $(this).val();
		getData();
	});



	// 레이어 초기화
	var layerInit = function() {

		var html = [];
			html.push('<div id="maskForApplication"></div>');
			html.push('<div id="applicationBoxes">');
			html.push('		<div class="window" id="applicationDialog"></div>');
			html.push('</div>');

			$("body").append(html.join(''));

			$("#maskForApplication").css({
				'background-color'	: '#000000',
				'left'				: '0',
				'position'			: 'absolute',
				'top'				: '0',
				'z-index'			: '100000'
			});

			$("#applicationBoxes #applicationDialog").css({
//				'height'		: '290px',
				'padding'		: '0',
				'width'			: '100%',
				'display'		: 'none',
//				'left'			: '0',
				'position'		: 'absolute',
				'top'			: '0',
				'z-index'		: '200000'
			});

			var id = "#applicationDialog";

			var maskHeight = $(document).height();
			var maskWidth = $(window).width();

			$('#maskForApplication').css({'width':maskWidth,'height':maskHeight}).fadeTo("slow",0.7);

			var winH = $(window).height();
			var winW = $(window).width();


			if(initStatus == true) {
				$(id).css({
					'top' : 250,
					'left': winW/2-jQuery(id).width()/2
				}).fadeIn(1000);
			} else {
				$("#applicationDialog").show().center();
			}

	}

	/**
	 * ajax 로딩중 표시
	 * @param string mode on/off
	 */
	var ajaxLoading = function(mode) {
		var loading = [];
			loading.push('<div class="intro_popup_wrap" id="loadingContainer" style="position: fixed; width: 100%; height: 120%; top: 0px; left: 0px; z-index: 1000; display: none;">');
			loading.push('	<div class="intro_loading_wrap" style="position: absolute; top: 40%; left: 50%; margin-left: -18px; margin-top: -18px">');
			loading.push('		<div class="intro_cont_wrap" style="position: relative">');
			loading.push('			<img src="//img.danawa.com/totalMain/ajax-loader.gif" alt="로딩중">');
			loading.push('		</div>');
			loading.push('	</div>');
			loading.push('</div>');


		if(mode == 'on') {
			$('body').append(loading.join(' '));
			$('#loadingContainer').show();
		} else {
			$('#loadingContainer').remove();
		}

	}

	/**
	 * 상단 타이틀 셋팅
	 * @param string title
	 */
	var setTitle = function(title) {
		var title = title ? title : '서울시 공공정보 - 모두모아';
		$('#topTitle').text(title);
	}

	/**
	 * 메인페이지 이동
	 */
	var mainMove = function() {
		document.location.hash = '';
		$('#contentsContainer').hide().empty();
		$('#prevLink').hide();
		setTitle('서울시 공공정보 - 모두모아');
		ajaxLoadingStatus = true;
		initStatus = true;
		$('main').fadeIn(1000);
	}


	/**
	 * 데이터 조회
	 */
	var getData = function(type) {
		$('#menuLayerClose').trigger('click');

		if(ajaxLoadingStatus == true) {
			ajaxLoadingStatus = false;


			if(type == undefined || type != 'historyBack') {
				document.location.hash = '#' + globalSearch.mode;
			}


			initStatus = false;

			ajaxLoading('on');

			$.ajax({
				url		: '/seoul/controller.php',
				data	: globalSearch,
				success	: function(response) {
					if(response.status == false) {
						alert(response.message);

						if(globalSearch.mode == 'menu11' || globalSearch.mode == 'menu13') {
							if(response.message == '데이터가 없습니다.') {
								ajaxLoadingStatus = false;
							}
						}
						location.reload();
					} else {
						$('main').hide();

						setTitle(globalSearch.title);

						if(globalSearch.mode == 'menu1' || globalSearch.page == 1 || globalSearch.seq > 0) {
							$('#contentsContainer').hide().empty().append(response.result).fadeIn(1000);
						} else {
							$('#dataContainer').append(response.result).fadeIn(1000);
						}
					}

					ajaxLoading('off');
					ajaxLoadingStatus = true;

					if($.trim(response.result).length == 0) {
						ajaxLoadingStatus = false;
						globalSearch.page--;
					}
				}
			});

		}
	}

	$('#scrollTopButton').live('click', function() {
		$('html,body').animate({scrollTop: 0}, 800);
	});

	// 스크롤시 리스트 페이지 더보기 기능 이벤트 적용 및 위로 가기 버튼
	$(window).scroll(function() {
		if(initStatus != true) {

			if(globalSearch.mode != 'menu1') {
				if(globalSearch.seq  == 0) {
					if($(window).scrollTop() >= $(document).height() - $(window).height()) {
						if(ajaxLoadingStatus == true) {
							globalSearch.page++;
							getData();
						}
					}
				}
			}

			if ($(this).scrollTop() > 100) {
				$('#scrollTopButton').fadeIn();
			} else {
				$('#scrollTopButton').fadeOut();
			}
		}
	});

	$(window).on('hashchange', function() {
		checkHashcode();
	});

	/**
	 * hash 코드를 체크하여 ajax 후 뒤로가기 버튼 을 해결한다.
	 */
	var checkHashcode = function() {
		$('#maskForApplication, #applicationBoxes').remove();

		var hash = document.location.hash;
		if(hash) {
			hash = hash.replace('#', '');

			if(hash.indexOf('menu') > -1) {
				globalSearch.mode = hash;
				globalSearch.page = 1;
				globalSearch.seq = 0;
				getData('historyBack');
			} else {
				globalSearch.mode = '';
				globalSearch.page = 1;
				globalSearch.seq = 0;
				mainMove();
			}

		} else {
			globalSearch.mode = '';
			globalSearch.page = 1;
			globalSearch.seq = 0;
			mainMove();
		}
	}

});



$.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop() - 200) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
    return this;
}


