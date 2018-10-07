
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="{{config("app.favicon")}}"/>
    <base href="/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Trang quản lý</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- Bootstrap core CSS     -->
    <link href="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!--datetime picker-->
{{--<link href="http://d1j8r0kxyu9tj8.cloudfront.net/libs/bootstrap-datetimepicker.min.css" rel="stylesheet"/>--}}

<!--  Material Dashboard CSS    -->
    <link href="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/css/material-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/css/demo.css" rel="stylesheet"/>

    <link href="http://d1j8r0kxyu9tj8.cloudfront.net/webs/chartist/chartist-plugin-tooltip.css" rel="stylesheet"/>

    <link href="http://d1j8r0kxyu9tj8.cloudfront.net/webs/nouislider.min.css" rel="stylesheet"/>

    <!-- cSliders Plugin -->
    <!-- <script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/nouislider.min.js"></script> -->

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"/>

    {{--<link href="manage/email/main.8beb53522833d876fdbefef05a414858.css" rel="stylesheet">--}}

    @yield("css")

    <link href="{{url('config.css')}}" rel="stylesheet">
</head>
<body>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js"></script>
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/jquery-1.12.4.min.js"></script>
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/jquery.validate.min.js"></script>
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/moment.min.js"></script>
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/bootstrap-datetimepicker.js"></script>

<!-- TagsInput Plugin -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/jquery.tagsinput.js"></script>

<div id="app"></div>

<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/jquery-ui.min.js"
        type="text/javascript"></script>
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/bootstrap.min.js"
        type="text/javascript"></script>
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/material.min.js"
        type="text/javascript"></script>

<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/perfect-scrollbar.jquery.min.js"
        type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/chartist.min.js"></script>
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/webs/chartist/chartist-plugin-tooltip.min.js"></script>


<!--  Plugin for the Wizard -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/bootstrap-notify.js"></script>
<!-- Vector Map plugin -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/jquery-jvectormap.js"></script>

<!-- Select Plugin -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/fullcalendar.min.js"></script>
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/localeall.js"></script>

<script>
    var OneSignal = window.OneSignal || [];
    if (OneSignal) {
        OneSignal.push([
            "init",
            {
                appId: "ceea18e8-322a-4748-b18b-fdf066d9a5ff",
                autoRegister: true /* Set to true to automatically prompt visitors */,
                persistNotification: false,
                subdomainName: "colorme",
                promptOptions: {
                    /* These prompt options values configure both the HTTP prompt and the HTTP popup. */
                    /* actionMessage limited to 90 characters */
                    actionMessage: "Bạn có muốn nhận thông báo từ trang này ?",
                    /* acceptButtonText limited to 15 characters */
                    acceptButtonText: "ĐỒNG Ý",
                    /* cancelButtonText limited to 15 characters */
                    cancelButtonText: "HỦY",
                },
            },
        ]);
        OneSignal.sendTag("device_type", "manage", function(tagsSent) {
            console.log("tag ok ", tagsSent);
        });
    }

    function sendTagNoti(tag, value) {
        OneSignal.sendTag(tag, value, function(tagsSent) {
            console.log("tag ok ", tagsSent);
        });
    }
</script>

<script src="{{url('config.js')}}?2222"></script>

@yield("js")
{{--<script type="text/javascript" src="manage/email/main.210435a02bd621175a20.js"></script>--}}

<!-- Material Dashboard javascript methods -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="http://d1j8r0kxyu9tj8.cloudfront.net/libs/material/assets/js/demo.js"></script>
</body>
</html>