<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MeetDoc</title>
</head>
<body>

<div style="
            width: 100%;
            min-height: 50vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            ">

    <div style="
            width: 940px;
            height: 500px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-size: contain;
            display: flex;
            flex-direction: column;
            align-items: center;
            ">
        <div style="padding-top: 70px;">
            <img style="width: 300px;height: 180px;" src="{{url('/mailTemplate/images/company_logo.png')}}" alt="company_logo">
        </div>
        <div style="padding-top:30px;width:350px">
            <form>
                <div>
                    <div style="display:flex;flex-direction: column">
                        <div class="flex-column">
                            <h2 style="text-align: center;color:#6B2D80">Forgot your password ?</h2>
                            <p style="text-align: center;font-size: 18px;color:#A1A1A1">That's ok it happens! Click on the button <br> below to reset your password</p>
                        </div>
                        <a href="{{ $myUrl }}" style="
                                                        background-color: #7CBD42;
                                                        border-radius: 29px;
                                                        color: white;
                                                        text-transform: uppercase;
                                                        width: 100%;
                                                        height: 30px;
                                                        text-align: center;
                                                        text-decoration: none;
                                                       justify-content: center;
                                                       align-items: center;
                                                       padding-top: 15px;
                        " type="submit"> reset password</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
