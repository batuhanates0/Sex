﻿<?php
//lưu api.php chạy api dạng domain/api.php?Simi=nghia&cauhoi=
$text = $_GET[cauhoi]; // thay nếu mày thích
$act = "nghia"; // thay nếu mày thích
$check = $_GET[Simi]; // thay nếu mày thích
if($check !== $act){
echo "Liên Hệ FB : -https://www.facebook.com/BMN.2312- Để Lấy Key Simsimi";
exit;
}
echo BMN2312(nghia($text)); // thay nếu mày đã thay nghia bên trên

function BMN2312($data){
$data = preg_replace("/đụ|cặc|lồn|cặt|loz|buồi|địt/is", "***", $data); // lọc từ max xấu
return $data;
}

function nghia($noidung) {
$key = 'e5fbeb60-09d7-40e3-96ef-7a6495da1832'; // paid key
$curl = curl_init(); if (!$curl) exit;
$headers = array(
'Accept: application/json, text/javascript, */*; q=0.01',
'Content-type: application/json; charset=utf-8',
'Referer:  https://bót.vn',
'User-Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; pl; rv:1.9.2.13) Gecko/20101203 Firefox/3.5.13',
'X-Requested-With: XMLHttpRequest'
);
//curl_setopt($curl, CURLOPT_URL, 'http://api.simsimi.com/request.p?key='.$key.'&lc=vn&ft=1.0&text='.urlencode($noidung));
curl_setopt($curl, CURLOPT_URL, 'http://simsimi.com/getRealtimeReq?uuid=m0njJQ6vh8ElgCfIsaZ6Zp8yYoZ0O1szQWaIvPOlpXg&lc=vi&ft=0&status=A&reqText='.urlencode($noidung));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
$pharr = json_decode($result,true);
//$phanhoi = $pharr[response];
$phanhoi = $pharr[respSentence];
if($phanhoi == '')
{
$a = array(' Em chưa được học câu đó - dạy cho em bằng ứng dụng SimSimi trên Android, iOS và Windows Phone nha ',
' Cài đặt Bot Cảm Xúc Miễn Phí Tại Website  Bót•Vn <3 ', ' Em không hiểu được nhãn dán với icon đâu ', 
' Em không hiểu huhu anh Nghĩa chưa lập trình cho em phần này '); // respond nếu nội dung sim trả lời == NULL
$b = array_rand($a,3);
$phanhoi = $a[$b[1]];
}
return $phanhoi; // hiển thị nội dung respond
}
?>
