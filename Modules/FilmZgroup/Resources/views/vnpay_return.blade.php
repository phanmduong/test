<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525764756TOI3CROQKmr7chO.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Podkova" rel="stylesheet">
    <link rel="stylesheet" id="fw-googleFonts-css"
          href="http://fonts.googleapis.com/css?family=Roboto+Condensed%3A300%2Cregular&amp;subset=latin-ext&amp;ver=4.9.4"
          media="all">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ledahlia Response</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">
    <script src="/js/jquery-1.11.3.min.js"></script>
</head>
<style type="text/css">
    div {
        padding: 50px 0 30px 15%;
        margin-bottom: 50px;
        color: #6c1c1c;
        font-size: 40px;
        border-bottom: 2px solid #6c1c1c;
        font-weight: bold;
        letter-spacing: 12px;
        font-family: Podkova;
        white-space: nowrap;
    }

    p, button {
        font-family: Roboto Condensed, latin-ext;
        font-size: 30px;
        letter-spacing: 2px;
        padding-left: 15%;
        margin: 15px;
    }

    button {
        border: none;
        background: none;
        color: #6c1c1c;
        text-decoration: none
    }

    button:focus {
        outline: none
    }

    @media (max-width: 850px) {
        div {
            font-size: 30px;
            padding-right: 15%;
            text-align: center;
        }

        p, button {
            font-size: 20px
        }
    }

    @media (max-width: 700px) {
        form {
            margin-top: -30px
        }

        div {
            font-size: 25px;
        }

        p, button {
            font-size: 15px;
        }
    }

    @media (max-width: 600px) {
        div {
            letter-spacing: 10px;
            padding-left: 10%;
            padding-right: 10%
        }

        p, button {
            font-size: 15px;
            padding-left: 10%
        }
    }

    @media (max-width: 500px) {
        div {
            letter-spacing: 9px;
            padding-left: 5%;
            padding-right: 5%
        }

        p, button {
            font-size: 15px;
            padding-left: 5%
        }
    }

    @media (max-width: 430px) {
        div {
            letter-spacing: 4px
        }

        p, button {
            font-size: 14px
        }
    }

    @media (max-width: 350px) {
        div {
            font-size: 20px
        }

        p, button {
            font-size: 14px
        }
    }
</style>
<body style="margin: 0px; padding-top: 0px ">
<?php
use App\DiscountCode;use App\FilmSession;use App\FilmSessionRegister;use App\FilmSessionRegisterSeat;use App\Seat;use App\SeatBookingHistory;use App\SessionSeat;use Carbon\Carbon;use function Modules\FilmZgroup\Http\Controllers\addSeatBookingHistory;
require_once(public_path("plugins/vnpay_config.php"));
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}
unset($inputData['vnp_SecureHashType']);
unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . $key . "=" . $value;
    } else {
        $hashData = $hashData . $key . "=" . $value;
        $i = 1;
    }
}

$secureHash = md5($vnp_HashSecret . $hashData);

$register_id = substr($_GET['vnp_TxnRef'], -4);
$register = \App\FilmSessionRegister::find($register_id);
$session_id = 0;
if ($register) {
    $session_id = $register->film_session_id;
}
$str_len = (int)strlen($_GET['vnp_TxnRef']);
$code_order = "";
$code = "";
$code_length = (int)substr($_GET['vnp_TxnRef'], -6, 2);
$start_index = -6 - $code_length;
if ($code_length) {
    $code = substr($_GET['vnp_TxnRef'], $start_index, $code_length);
}
$code_order = substr($_GET['vnp_TxnRef'], 0, $str_len - 6 - $code_length) . $register_id;

$pay_time = Carbon::createFromFormat('YmdHis', $_GET['vnp_PayDate'])->format('d/m/Y - H:i');

?>

<div>LE DAHLIA RESPONSE</div>
<p>Mã đơn hàng: <?php echo $code_order ?></p>
@if(!$register)
    <p style="font-weight:600; color:red">Đơn hàng không tồn tại</p>
@endif
<p>Số tiền: <?php echo (int)$_GET['vnp_Amount'] / 100 ?> VNĐ</p>
<p style="padding-right: 10%">Nội dung thanh toán: <?php echo $_GET['vnp_OrderInfo'] ?></p>
<p>Mã GD tại VNPAY: <?php echo $_GET['vnp_TransactionNo'] ?></p>
<p>Thời gian thanh toán: <?php echo $pay_time ?></p>
@if($register)
<p>Vui lòng check email để xem lại thông tin vé!</p>
@endif
<p>Kết quả thanh toán:
    <?php
    if ($secureHash == $vnp_SecureHash) {
        if ($_GET['vnp_ResponseCode'] == '00') {
            echo "Giao dịch thành công!";
            $req_mail = new \Illuminate\Http\Request();
            $req_mail->code = $code;
            $req_mail->payment = "online";
            if($register){
                $FilmZgroupSendingMailController->book_info($register_id, $req_mail);
            }
        } else {
            echo "Giao dịch không thành công!";
        }
    } else {
        echo "Chữ ký không hợp lệ!";
    }
    ?>
</p>
<br><br>
@if($session_id)
    <form action="{{ url('/session/'.$session_id) }}">
        <button type="submit">Tiếp tục đặt vé</button>
    </form>
@else
    <form action="{{ url('/') }}">
        <button type="submit">Tiếp tục đặt vé</button>
    </form>
@endif


</body>
<script>
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 5);
        return {
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            if (Date.parse(deadline) >= Date.parse(new Date())) {
                var t = getTimeRemaining(endtime);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
                if (t.total <= 0) {
                    clearInterval(timeinterval);
                }
            } else {
                window.open("file:///home/legendary/Desktop/Film/One-Film.html", "_self")
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + 5 * 60 * 1000);
</script>
</html>
