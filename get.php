<?php
error_reporting(0);
set_time_limit(0);
$min = 2000001;
$max = 2071045;
function CURL($sbd) {
    
    $url = "https://diemthi.vnanet.vn/Home/SearchBySobaodanh?nam=2019&code=".$sbd;
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data = curl_exec($ch);
        curl_close($ch);
        return $data;
}
for ($i = $min; $i <= $max; $i++) {
$i = '0'.$i;
$re = json_decode(CURL($i));
$json = ''.$i.','.$re->result[0]->CityCode.','.$re->result[0]->Toan.','.$re->result[0]->NguVan.','.$re->result[0]->NgoaiNgu.','.$re->result[0]->VatLi.','.$re->result[0]->HoaHoc.','.$re->result[0]->SinhHoc.','.$re->result[0]->DiaLi.','.$re->result[0]->LichSu.','.$re->result[0]->GDCD.'';
file_put_contents('diem02.html', $json."\n", FILE_APPEND);
echo $json."\n";
}

?>