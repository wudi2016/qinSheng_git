@extends('layouts.layoutHome')

@section('title', '微信扫码支付')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/lessonSubject/WeChatPay.css') }}">
@endsection

@section('content')
    <div class="contain_we_chat">
        <div style="height: 60px;width: 100%"></div>
        <div class="we_chat_pay">
            <div style="height: 80px;width: 100%"></div>

            <div class="we_chat_pay_top">
                <span>实付金额：</span><span class="price">{{$orderInfo -> orderPrice / 100}}元</span>
            </div>
            <div style="height: 60px;width: 100%"></div>
            <div class="we_chat_pay_cen">
                {!! \QrCode::encoding('UTF-8') -> size(200) -> generate($url) !!}
            </div>
            <div style="height: 30px;width: 100%"></div>
            <div class="we_chat_pay_bot">
                <span>使用微信扫一扫支付</span>
            </div>
        </div>
    </div>
    <div class="clear hr-8"></div>
@endsection

@section('js')
    <script>
        require(['lessonSubject/WeChatPay'], function (wxPay) {
            wxPay.orderID = '{{$orderID}}' || null;
            wxPay.getData('/lessonSubject/orderStatus/' + wxPay.orderID, 'orderStatus');
            avalon.scan();
        });
    </script>
@endsection