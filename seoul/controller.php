<?php
/**
 * 서울시 공모전 앱 "모두모아" 관련 컨트롤러
 * @author hq1004@gmail.com
 */

include_once 'include/config.php';
include_once 'include/common.php';

// 서울시 권역별 실시간 대기현황
if($_POST['mode'] == 'menu1') {

	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	// 서울시 권역별 실시간 대기현황
	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/RealtimeCityAir/1/25/%20/'.$AREA_CONFIG[$areaCode]['name'];
	$mainData = json_decode(getData($url), true);



	if(isset($mainData['RealtimeCityAir'])) {
		if($mainData['RealtimeCityAir']['RESULT']['CODE'] == 'INFO-000') {
			$data = array();
			$data['main'] =  array_pop($mainData['RealtimeCityAir']['row']);
			$data['areaInfo'] = $AREA_CONFIG;
			$data['areaCode'] = $areaCode;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';


			// 서울시 초미세먼지 예경보 현황
			try {
				$data['sub1'] = array();

				$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/ForecastWarningUltrafineParticleOfDustService/1/5/';
				$subData = json_decode(getData($url), true);

				if(isset($subData['ForecastWarningUltrafineParticleOfDustService'])) {
					if($subData['ForecastWarningUltrafineParticleOfDustService']['RESULT']['CODE'] == 'INFO-000') {
						$data['sub1'] =  $subData['ForecastWarningUltrafineParticleOfDustService']['row'];
					}
				}
			} catch (Exception $ex) {}


			// 서울시 권역별 오존 예경보 현황
			try {
				$data['sub2'] = array();

				$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/ForecastWarningOzoneService/1/5/';
				$subData = json_decode(getData($url), true);

				if(isset($subData['ForecastWarningOzoneService'])) {
					if($subData['ForecastWarningOzoneService']['RESULT']['CODE'] == 'INFO-000') {
						$data['sub2'] =  $subData['ForecastWarningOzoneService']['row'];
					}
				}
			} catch (Exception $ex) {}


			$result['result'] = fetch("menu1", $data);
		}

		else if($mainData['RESULT']['CODE'] == 'INFO-200') {
			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = '';
		}
	}

	echo json_encode($result);
}

// 서울시 문화행사 정보
else if($_POST['mode'] == 'menu2') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 20;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/SearchConcertDetailService/'.$start.'/'.$end.'/';


	$seq = $_POST['seq'];
	if((int)$seq > 0) {
		$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/SearchConcertDetailService/1/1/'.$seq;
	}

	$mainData = json_decode(getData($url), true);

	if(isset($mainData['SearchConcertDetailService'])) {
		if($mainData['SearchConcertDetailService']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['SearchConcertDetailService']['row'];
			$data['page'] = $page;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';

			if((int)$seq > 0) {
				$result['result'] = fetch("menu2View", array_pop($mainData['SearchConcertDetailService']['row']));
			} else {
				$result['result'] = fetch("menu2", $data);
			}
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울의공원 프로그램 정보
else if($_POST['mode'] == 'menu3') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 20;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/SearchParkProgramService/'.$start.'/'.$end.'/';
	$mainData = json_decode(getData($url), true);


	if(isset($mainData['SearchParkProgramService'])) {
		if($mainData['SearchParkProgramService']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['SearchParkProgramService']['row'];
			$data['page'] = $page;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu3", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 남산예술센터 공연 정보
else if($_POST['mode'] == 'menu4') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 20;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/NamsanPerformance/'.$start.'/'.$end.'/';
	$mainData = json_decode(getData($url), true);

	if(isset($mainData['NamsanPerformance'])) {
		if($mainData['NamsanPerformance']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['NamsanPerformance']['row'];
			$data['page'] = $page;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu4", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울연극센터 이벤트 정보
else if($_POST['mode'] == 'menu5') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 20;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/CenterEvent/'.$start.'/'.$end.'/';
	$mainData = json_decode(getData($url), true);


	if(isset($mainData['CenterEvent'])) {
		if($mainData['CenterEvent']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['CenterEvent']['row'];
			$data['page'] = $page;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu5", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 문화공간
else if($_POST['mode'] == 'menu6') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 20;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/SearchCulturalFacilitiesDetailService/'.$start.'/'.$end.'/';
	$mainData = json_decode(getData($url), true);


	if(isset($mainData['SearchCulturalFacilitiesDetailService'])) {
		if($mainData['SearchCulturalFacilitiesDetailService']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['SearchCulturalFacilitiesDetailService']['row'];
			$data['page'] = $page;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu6", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 공구도서관 (대여소) 정보
else if($_POST['mode'] == 'menu7') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 20;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/getToolRentalInfo/'.$start.'/'.$end.'/';
	$mainData = json_decode(getData($url), true);


	if(isset($mainData['getToolRentalInfo'])) {
		if($mainData['getToolRentalInfo']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['getToolRentalInfo']['row'];
			$data['page'] = $page;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu7", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 자치구 재활용센터 시설 현황
else if($_POST['mode'] == 'menu8') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 10;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/FleamarketFcltyInfo/'.$start.'/'.$end.'/';
	$mainData = json_decode(getData($url), true);


	if(isset($mainData['FleamarketFcltyInfo'])) {
		if($mainData['FleamarketFcltyInfo']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['FleamarketFcltyInfo']['row'];
			$data['page'] = $page;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu8", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 동물병원
else if($_POST['mode'] == 'menu9') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 10;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$service = $AREA_CONFIG[$areaCode]['animalHospital'];
	$serviceUrl = $AREA_CONFIG[$areaCode]['animalHospitalUrl'];

	$url = $serviceUrl.'/'.$start.'/'.$end.'/';

	$mainData = json_decode(getData($url), true);


	if(isset($mainData[$service])) {
		if($mainData[$service]['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData[$service]['row'];
			$data['page'] = $page;
			$data['areaName'] = $AREA_CONFIG[$areaCode]['name'];
			$data['areaInfo'] = $AREA_CONFIG;
			$data['areaCode'] = $areaCode;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu9", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 공영주차장 주차 가능대수
else if($_POST['mode'] == 'menu10') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 15;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;


	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/PublicParkingAvaliable/'.$start.'/'.$end.'/';
	$mainData = json_decode(getData($url), true);


	if(isset($mainData['PublicParkingAvaliable'])) {
		if($mainData['PublicParkingAvaliable']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['PublicParkingAvaliable']['row'];
			$data['page'] = $page;
			$data['areaName'] = $AREA_CONFIG[$areaCode]['name'];

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu10", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 대중교통 보관 분실물 검색
else if($_POST['mode'] == 'menu11') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 10;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;

	$cate = $_POST['cate'];
	$cate = $cate ? $cate : '가방';
	$sendCate = urlencode($cate);

	$wbCode = $_POST['wbCode'];
	$wbCode = $wbCode ? $wbCode : 'b1';

	$getName = $_POST['getName'];
	if($getName) $sendGetName = urlencode($getName);

	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/SearchLostArticleService/'.$start.'/'.$end.'/'.$sendCate.'/'.$wbCode;

	if($getName) {
		$url.='/'.$sendGetName;
	}

	$mainData = json_decode(getData($url), true);


	if(isset($mainData['SearchLostArticleService'])) {
		if($mainData['SearchLostArticleService']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['SearchLostArticleService']['row'];

			foreach ($mainData['SearchLostArticleService']['row'] as $row) {

				// 이미지 정보
				$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/SearchLostArticleImageService/1/1/'.$row['ID'];
				$imageData = json_decode(getData($url), true);

				if(isset($imageData['SearchLostArticleImageService'])) {
					if($imageData['SearchLostArticleImageService']['RESULT']['CODE'] == 'INFO-000') {
						$image = array_pop($imageData['SearchLostArticleImageService']['row']);

						if(strpos($image['IMAGE_URL'], 'http') !== false) {
							$data['imageData'][$row['ID']] =  $image['IMAGE_URL'];
						} else {
							$data['imageData'][$row['ID']] = '/seoul/img/binCartImg.png';
						}
					}
				}

				// 상세정보
				$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/SearchLostArticleInfoService/1/1/'.$row['ID'];
				$detailData = json_decode(getData($url), true);

				if(isset($detailData['SearchLostArticleInfoService'])) {
					if($detailData['SearchLostArticleInfoService']['RESULT']['CODE'] == 'INFO-000') {
						$detail = array_pop($detailData['SearchLostArticleInfoService']['row']);
						$data['detail'][$row['ID']]['GET_THING'] = $detail['GET_THING'];
						$data['detail'][$row['ID']]['CONTACT'] = $detail['CONTACT'];
						$data['detail'][$row['ID']]['DRIVE_NUM'] = $detail['DRIVE_NUM'];
					}
				}
			}

			$data['page'] = $page;

			$data['cate'] = $cate;
			$data['wbCode'] = $wbCode;
			$data['getName'] = $getName;
			$data['code'] = $mainData['SearchLostArticleService']['RESULT']['CODE'];

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu11", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = false;
		$result['message'] = '데이터가 없습니다.';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 도서관 이용시간 및 휴관일 정보
else if($_POST['mode'] == 'menu12') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 15;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;


	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/SeoulLibraryTime/'.$start.'/'.$end.'/'.$AREA_CONFIG[$areaCode]['name'];;
	$mainData = json_decode(getData($url), true);

	if(isset($mainData['SeoulLibraryTime'])) {
		if($mainData['SeoulLibraryTime']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['SeoulLibraryTime']['row'];
			$data['page'] = $page;
			$data['areaName'] = $AREA_CONFIG[$areaCode]['name'];
			$data['areaInfo'] = $AREA_CONFIG;
			$data['areaCode'] = $areaCode;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu12", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 생필품 농수축산물 가격 정보
else if($_POST['mode'] == 'menu13') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 15;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;



	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/ListNecessariesPricesService/'.$start.'/'.$end;

	$marketName = $_POST['marketName'];
	$send_marketName = urlencode($marketName);

	if($marketName) {
		$url.='/'.$send_marketName;
	} else {
		$url.='/%20';
	}

	$goodsName = $_POST['goodsName'];
	$send_goodsName = urlencode($goodsName);

	if($goodsName) {
		$url.='/'.$send_goodsName;
	} else {
		$url.='/%20';
	}

	$url.='/%20';
	$url.='/%20';
	$url.='/'.$AREA_CONFIG[$areaCode]['name'];


	$mainData = json_decode(getData($url), true);


	if(isset($mainData['ListNecessariesPricesService'])) {
		if($mainData['ListNecessariesPricesService']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['ListNecessariesPricesService']['row'];
			$data['page'] = $page;
			$data['areaName'] = $AREA_CONFIG[$areaCode]['name'];
			$data['areaInfo'] = $AREA_CONFIG;
			$data['areaCode'] = $areaCode;
			$data['marketName'] = $marketName;
			$data['goodsName'] = $goodsName;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu13", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = false;
		$result['message'] = '데이터가 없습니다.';
		$result['result'] = '';
	}

	echo json_encode($result);
}
// 서울시 전통시장 현황
else if($_POST['mode'] == 'menu14') {
	$result = array(
		'status'	=> false,
		'message'	=> '데이터 조회 실패',
		'result'	=> ''
	);

	$areaCode = $_POST['areaCode'];

	$page = $_POST['page'];
	$page = (int)$page > 0 ? $page : 1;
	$limit = 15;

	$start = (($page-1)*$limit) + 1;
	$end = ($start - 1) + $limit;


	$url = 'http://openapi.seoul.go.kr:8088/'.$API.'/json/ListTraditionalMarket/'.$start.'/'.$end.'/'.$AREA_CONFIG[$areaCode]['name'];;
	$mainData = json_decode(getData($url), true);

	if(isset($mainData['ListTraditionalMarket'])) {
		if($mainData['ListTraditionalMarket']['RESULT']['CODE'] == 'INFO-000') {
			$data['dataList'] = $mainData['ListTraditionalMarket']['row'];
			$data['page'] = $page;
			$data['areaName'] = $AREA_CONFIG[$areaCode]['name'];
			$data['areaInfo'] = $AREA_CONFIG;
			$data['areaCode'] = $areaCode;

			$result['status'] = true;
			$result['message'] = '데이터 조회 성공';
			$result['result'] = fetch("menu14", $data);
		}
	}
	else if($mainData['RESULT']['CODE'] == 'INFO-200') {
		$result['status'] = true;
		$result['message'] = '데이터 조회 성공';
		$result['result'] = '';
	}

	echo json_encode($result);
}
?>