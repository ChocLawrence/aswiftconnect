<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AswiftConnect Payment Received</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <a href="{{route('home')}}"><img src="{{ asset('assets/frontend/images/logo.png')}}" alt="Logo" border="0"
            width="48" style="margin:0 auto;display: block; width:485px; max-width: 48px; min-width: 48px;padding:30px;"></a>
    <div style="margin:0 auto;width:500px; box-shadow:0 0 3px #aaa; height:auto;color:#666;">
        <div
            style="width:100%; padding:10px; float:left; background:#1ca8dd; color:#fff; font-size:30px; text-align:center;">
            Payment Received
        </div>
        <br>
        <div style="width:100%; padding:0px 0px;border-bottom:1px solid rgba(0,0,0,0.2);float:left;">
            <div style="width:60%; float:left;padding:10px;">

                <span style="font-size:14px;float:left;">
                    ASWIFTCONNECT
                </span><br>
                <span style="font-size:14px;float:left;">
                    Payment Method : PayPal
                </span><br>
                <span style="font-size:14px;float:left;">
                    Project Status : Approved
                </span>
            </div>

            <div style="width:50%; float:right;padding:">
                <span style="font-size:14px;float:right;  padding:10px; text-align:right;">
                    <b>Date : </b>{{substr($post->payment_date,0,10)}}
                </span>
                <span style="font-size:14px;float:right;  padding:10px; text-align:right;">
                    <b>Transaction# : </b>{{$post->transaction_id}}
                </span>
            </div>
        </div>

        <div style="width:100%; padding:0px; float:left;">

            <div style="width:100%;float:left;background:#efefef;">
                <span style="float:left; text-align:left;padding:10px;width:50%;color:#888;font-weight:600;">
                    Project Decription
                </span>
                <span style="font-weight:600;float:left;padding:10px ;width:40%;color:#888;text-align:right;">
                    Amount
                </span>
            </div>

            <div style="width:100%;float:left;">
                <span style="float:left; text-align:left;padding:10px;width:50%;color:#888;">
                    {{$post->title}}


                    <span style="font-size:10px; float:left; width:100%;">
                        (Deadline : {{$post->deadline}})
                    </span>
                </span>
                <span style="font-weight:normal;float:left;padding:10px ;width:40%;color:#888;text-align:right;">
                    $ {{$post->amount}}
                </span>
            </div>

            <div style="width:100%;float:left; background:#fff;">

                <span style="font-weight:600;float:right;padding:10px 0px;width:40%;color:#666;text-align:center;">
                    Total : $ {{$post->amount}}
                </span>
            </div>

        </div>

        <div style="width:100%; padding:10px; float:left;">
            <span style="font-size:14px;float:left;">
                You will be notified once a freelancer is assigned to your project.
            </span><br>
            <span style="font-size:14px;float:left;">
                Thanks for Trusting ASwiftConnect.
            </span><br>
            <span style="font-size:14px;float:left;">
                The ASwiftConnect Team.
            </span><br>
        </div>
    </div>

</body>

</html>