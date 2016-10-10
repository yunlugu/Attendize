@extends('Public.Layouts.Master')

@section('title')
    云麓蛋
@stop

@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{url('plugins/danmaku/static/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('plugins/danmaku/dist/css/barrager.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('plugins/danmaku/static/pick-a-color/css/pick-a-color-1.2.3.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('plugins/danmaku/static/syntaxhighlighter/styles/shCoreDefault.css')}}"/>

@stop

@section('navbar')
    @include('Public.Partials.Navbar')
@stop

@section('content')
    <div id="content" class="bb-docs-header" tabindex="-1">
        <div class="container text-center">
            <div class="bb-masthead">
                <h1>云麓蛋？？</h1>
                <p>
                    到底念tan还是dan
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <section class="bb-section">
            <div class="lead-top">
                <div class="text-center">
                    <p class="hidden-xs bb-code code-leader">
                        云麓谷弹幕测试</br>
                    </p>
                    <p>
                        <button  class="bb-trigger btn btn-primary btn-lg  bb-light-blue"  onclick="run_example()"> 弹弹弹</button>
                    </p>
                </div>
            </div>
        </section>
        <section id="custom" class="bb-section">
            <div class="page-header">
                <h2>自定义</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >文字</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="info" type="text" placeholder="弹幕文字信息"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >链接</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="href" type="text" placeholder="http://git.yunlugu.org"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >速度</label>
                            <div class="col-sm-2">
                                <input  class="form-control"  name="speed" type="text" placeholder="10" value="10" />
                            </div>

                            <label class="col-sm-2 control-label" >关闭按钮</label>
                            <div class="col-sm-2">
                                <input  class="form-control"  name="close" type="checkbox" checked   >
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >高度</label>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                  <input type="radio" name="bottomradio"   value="0" checked="checked"> 随机
                                </label>
                                <label class="radio-inline">
                                   <input type="radio" name="bottomradio"   value="1" > 设置
                                </label>
                            </div>
                            <div class="col-sm-2">
                                <input class="form-control" name="bottom" type="text" placeholder="70"  value="70"   />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >图片</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                  <input type="radio" name="img"  value="cute.png" checked=""> cute.png
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="img"  value="haha.gif"> haha.gif
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="img"   value="none">  无图
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >颜色</label>
                            <div class="col-sm-6">
                                <input type="text" value="fff" name="color" class="pick-a-color form-control">
                            </div>
                        </div>
                    </form>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" ></label>
                            <div class="col-sm-3">
                                <button  class="btn btn-primary   bb-light-blue"  onclick="run()"> 运行</button>
                            </div>
                                                        <div class="col-sm-3">
                                <button  class="btn btn-warning   "  onclick="clear_barrage()"> 清除</button>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                        <textarea class="form-control" id="barrager-code" rows="14"  ></textarea>
                </div>
            </div>


        </section>
    </div>

@stop

@section('script')
    <script type="text/javascript" src="{{url('plugins/danmaku/static/js/tinycolor-0.9.15.min.js')}}"></script>
    <script type="text/javascript" src="{{url('plugins/danmaku/dist/js/jquery.barrager.min.js')}}"></script>
    <script type="text/javascript" src="{{url('plugins/danmaku/static/syntaxhighlighter/scripts/shCore.js')}}"></script>
    <script type="text/javascript" src="{{url('plugins/danmaku/static/syntaxhighlighter/scripts/shBrushJScript.js')}}"></script>
    <script type="text/javascript" src="{{url('plugins/danmaku/static/syntaxhighlighter/scripts/shBrushPhp.js')}}"></script>
    <script type="text/javascript" src="{{url('plugins/danmaku/static/pick-a-color/js/pick-a-color-1.2.3.min.js')}}"></script>
    <script type="text/javascript">

    String.prototype.format = function(args) {
        var result = this;
        if (arguments.length < 1) {
            return result;
        }
        var data = arguments;
        if (arguments.length == 1 && typeof (args) == "object") {
            data = args;
        }
        for (var key in data) {
            var value = data[key];
            if (undefined != value) {
                result = result.replace("{" + key + "}", value);
            }
        }
        return result;
    }
    var  barrager_code=
        'var item={\n'+
        "   img:'{img}', //图片 \n"+
        "   info:'{info}', //文字 \n"+
        "   href:'{href}', //链接 \n"+
        "   close:{close}, //显示关闭按钮 \n"+
        "   speed:{speed}, //延迟,单位秒,默认6 \n"+
        "   bottom:{bottom}, //距离底部高度,单位px,默认随机 \n"+
        "   color:'{color}', //颜色,默认白色 \n"+
        "   old_ie_color:'{old_ie_color}', //ie低版兼容色,不能与网页背景相同,默认黑色 \n"+
        " }\n"+
        "$('body').barrager(item);"
        ;

    $(function() {

        SyntaxHighlighter.all();
        $(".pick-a-color").pickAColor();

        var  default_item={
                'img':'static/heisenberg.png',
                'info':'弹幕文字信息',
                'href':'http://www.yaseng.org',
                'close':true,
                'speed':6,
                'bottom':70,
                'color':'#fff' ,
                'old_ie_color':'#000000'
            };
        var item={'img':'static/img/heisenberg.png','href':'http://www.baidu.com','info':'Jquery.barrager.js 专业的网页弹幕插件'};
        //item1={'href':'http://www.baidu.com','info':'这是一条很长很长的字幕','close':false};
        $('#barrager-code').val(barrager_code.format(default_item));


        $('body').barrager(item);



         //每条弹幕发送间隔
        var looper_time=3*1000;
        //是否首次执行
        var run_once=true;
       // do_barrager();

        function do_barrager(){
            if(run_once ){
                //如果是首次执行,则设置一个定时器,并且把首次执行置为false
                looper=setInterval(do_barrager,looper_time);
                run_once=false;
            }
            //获取
            $.getJSON('server.php?mode=1',function(data){
                //是否有数据
                if(data.info){

                     $('body').barrager(data);
                }

            });
        }

        function barrager(){



        }







    });

    function  run(){

        var  info=$('input[name=info]').val();
        (info == '' ) ?  info='我是大傻子' : info=info;
        var  href=$('input[name=href]').val();
        var  speed=parseInt($('input[name=speed]').val());
        var  bottom=parseInt($('input[name=bottom]').val());
        var  code=barrager_code;
        if($('input:radio[name=bottomradio]:checked').val() == 0){
        var  window_height=$(window).height()-150;
        bottom=Math.floor(Math.random()*window_height+40);
        code=code.replace("   bottom:{bottom}, //距离底部高度,单位px,默认随机 \n",'');

        }

        var  img=$('input:radio[name=img]:checked').val();

        if   (img == 'none' ){

            code=code.replace("   img:'{img}', //图片 \n",'');
        }




        var  item={
                'img':'static/img/'+img,
                'info':info,
                'href':href,
                'close':true,
                'speed':speed,
                'bottom':bottom,
                'color':'#'+$('input[name=color').val(),
                'old_ie_color':'#'+$('input[name=color').val()



                };

         if(!$('input[name=close]').is(':checked')){


            item.close=false;


        }


        code=code.format(item);
        console.log(code);
        $('#barrager-code').val(code);
        eval(code);


    }

    function  clear_barrage(){

        $.fn.barrager.removeAll();
    }





    function  run_example(){

    var example_item={'img':'static/img/heisenberg.png','info':'Hello world!'};
    $('body').barrager(example_item);
    return false;

    }

    </script>
@stop
