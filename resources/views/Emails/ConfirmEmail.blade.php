@extends('Emails.Layouts.Master')

@section('message_content')

<p>Hi {{$full_name}}</p>
<p>
    感谢注册云麓谷！请打开下面的链接进行确认登录！
</p>

<div style="padding: 5px; border: 1px solid #ccc;">
   {{route('confirmEmail', ['confirmation_code' => $confirmation_code])}}
</div>
<p>
    我的二维码：
</p>
<div class="barcode">
    {!! DNS2D::getBarcodeSVG($api_token, "QRCODE") !!}
</div>
<p>
    如果您有任何问题或者建议请回复此邮件！谢谢您的支持！
</p>
<p>
    Thank you
</p>

@stop

@section('footer')


@stop
