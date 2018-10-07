<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="http://d1j8r0kxyu9tj8.cloudfront.net/files/1525764756TOI3CROQKmr7chO.ico"/>
    <title>Đang thanh toán</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">
    <script src="/js/jquery-1.11.3.min.js"></script>
</head>
<style>
    .ant-spin-spinning {
        position: fixed;
        top: 46%;
        left: 50%;
        z-index: 2;
    }

    .ant-spin-lg .ant-spin-dot {
        width: 50px;
        height: 50px;
    }

    .ant-spin-dot-spin {
        -webkit-transform: rotate(45deg);
    = [ ` ] -ms-transform: rotate(45 deg);
        transform: rotate(45deg);
        -webkit-animation: antRotate 1.2s infinite linear;
        animation: antRotate 1.2s infinite linear;
    }

    .ant-spin-dot {
        display: inline-block;
    }

    .ant-spin-lg .ant-spin-dot i {
        width: 20px;
        height: 20px;
    }

    .gCUkXE.gCUkXE .ant-spin-dot i {
        background-color: #4482FF;
    }

    .ant-spin-dot i {
        width: 9px;
        height: 9px;
        border-radius: 100%;
        background-color: #1890ff;
        -webkit-transform: scale(.75);
        -ms-transform: scale(.75);
        transform: scale(.75);
        display: block;
        position: absolute;
        opacity: .3;
        -webkit-animation: antSpinMove 1s infinite linear alternate;
        animation: antSpinMove 1s infinite linear alternate;
        -webkit-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
    }

    .ant-spin-dot i:first-child {
        left: 0;
        top: 0;
    }

    .ant-spin-dot i:nth-child(2) {
        right: 0;
        top: 0;
        -webkit-animation-delay: .4s;
        animation-delay: .4s;
    }

    .ant-spin-dot i:nth-child(3) {
        right: 0;
        bottom: 0;
        -webkit-animation-delay: .8s;
        animation-delay: .8s;
    }

    .ant-spin-dot i:nth-child(4) {
        left: 0;
        bottom: 0;
        -webkit-animation-delay: 1.2s;
        animation-delay: 1.2s;
    }

    @-webkit-keyframes antSpinMove {
        to {
            opacity: 1
        }
    }

    @keyframes antSpinMove {
        to {
            opacity: 1
        }
    }

    @-webkit-keyframes antRotate {
        to {
            -webkit-transform: rotate(405deg);
            transform: rotate(405deg)
        }
    }

    @keyframes antRotate {
        to {
            -webkit-transform: rotate(405deg);
            transform: rotate(405deg)
        }
    }

</style>
<body>
<div class="container">
    <div class="ant-spin ant-spin-lg ant-spin-spinning sc-dxgOiQ gCUkXE"><span class="ant-spin-dot ant-spin-dot-spin"><i></i><i></i><i></i><i></i></span></div>
</div>
<div class="container" style="display: none">
    <div class="header clearfix">
        <h3 class="text-muted">VNPAY DEMO</h3>
        <h1></h1>
    </div>
    <h3>Tạo mới đơn hàng</h3>
    <div class="table-responsive">
        <form action="{{ url('/payment/create_payment') }}" id="create_form" method="post">

            <div class="form-group">
                <label for="language">Loại hàng hóa </label>
                <select name="order_type" id="order_type" class="form-control">
                    {{--<option value="topup">Nạp tiền điệnt thoại</option>--}}
                    <option value="billpayment">Thanh toán hóa đơn</option>
                    {{--<option value="fashion">Thời trang</option>--}}
                    {{--<option value="other">Khác - Xem thêm tại VNPAY</option>--}}
                </select>
            </div>
            <div class="form-group">
                <label for="order_id">Mã hóa đơn</label>
                <input class="form-control" id="order_id" name="order_id" type="text" value="{{$order_code}}"/>
            </div>
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input class="form-control" id="amount"
                       name="amount" type="number" value="{{$price}}"/>
            </div>
            <div class="form-group">
                <label for="order_desc">Nội dung thanh toán</label>
                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Thanh toán vé xem phim tại Ledahlia.vn</textarea>
            </div>
            <div class="form-group">
                <label for="bank_code">Ngân hàng</label>
                <select name="bank_code" id="bank_code" class="form-control">
                    <option value="">Không chọn</option>
                    {{--<option value="NCB"> Ngan hang NCB</option>--}}
                    {{--<option value="AGRIBANK"> Ngan hang Agribank</option>--}}
                    {{--<option value="SCB"> Ngan hang SCB</option>--}}
                    {{--<option value="SACOMBANK">Ngan hang SacomBank</option>--}}
                    {{--<option value="EXIMBANK"> Ngan hang EximBank</option>--}}
                    {{--<option value="MSBANK"> Ngan hang MSBANK</option>--}}
                    {{--<option value="NAMABANK"> Ngan hang NamABank</option>--}}
                    {{--<option value="VNMART"> Vi dien tu VnMart</option>--}}
                    {{--<option value="VIETINBANK">Ngan hang Vietinbank</option>--}}
                    {{--<option value="VIETCOMBANK"> Ngan hang VCB</option>--}}
                    {{--<option value="HDBANK">Ngan hang HDBank</option>--}}
                    {{--<option value="DONGABANK"> Ngan hang Dong A</option>--}}
                    {{--<option value="TPBANK"> Ngân hàng TPBank</option>--}}
                    {{--<option value="OJB"> Ngân hàng OceanBank</option>--}}
                    {{--<option value="BIDV"> Ngân hàng BIDV</option>--}}
                    {{--<option value="TECHCOMBANK"> Ngân hàng Techcombank</option>--}}
                    {{--<option value="VPBANK"> Ngan hang VPBank</option>--}}
                    {{--<option value="MBBANK"> Ngan hang MBBank</option>--}}
                    {{--<option value="ACB"> Ngan hang ACB</option>--}}
                    {{--<option value="OCB"> Ngan hang OCB</option>--}}
                    {{--<option value="IVB"> Ngan hang IVB</option>--}}
                    {{--<option value="VISA"> Thanh toan qua VISA/MASTER</option>--}}
                </select>
            </div>
            <div class="form-group">
                <label for="language">Ngôn ngữ</label>
                <select name="language" id="language" class="form-control">
                    <option value="vn">Tiếng Việt</option>
                    {{--<option value="en">English</option>--}}
                </select>
            </div>

            {{--<button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Popup</button>--}}
            <button type="submit" class="btn btn-default">Thanh toán Redirect</button>

        </form>
    </div>
    <p>
        &nbsp;
    </p>
    <footer class="footer">
        <p>&copy; VNPAY 2015</p>
    </footer>
</div>
<link href="https://pay.vnpay.vn/lib/vnpay/vnpay.css" rel="stylesheet"/>
<script src="https://pay.vnpay.vn/lib/vnpay/vnpay.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#create_form').submit();
    });
</script>
<script type="text/javascript">
    $("#btnPopup").click(function () {
        var postData = $("#create_form").serialize();
        var submitUrl = $("#create_form").attr("action");
        $.ajax({
            type: "POST",
            url: submitUrl,
            data: postData,
            dataType: 'JSON',
            success: function (x) {
                if (x.code === '00') {
                    if (window.vnpay) {
                        vnpay.open({width: 768, height: 600, url: x.data});
                    } else {
                        location.href = x.data;
                    }
                    return false;
                } else {
                    alert(x.Message);
                }
            }
        });
        return false;
    });
</script>



</body>
</html>
