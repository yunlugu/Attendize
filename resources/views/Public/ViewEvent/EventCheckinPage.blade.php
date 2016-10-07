<!DOCTYPE html>
<html>
  <!-- Html Head Tag-->
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="John Doe">
  <!-- Open Graph Data -->
  <meta property="og:title" content="Hexo"/>
  <meta property="og:description" content="" />
  <meta property="og:site_name" content="Hexo"/>
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://yoursite.comundefined"/>

    <link rel="alternate" href="/atom.xml" title="Hexo" type="application/atom+xml">
    <link rel="icon" href="/favicon.png">

  <!-- Site Title -->
  <title>云麓谷</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{url('css/style.light.css')}}">
</head>

  <body>
    <!-- Page Header -->


<header class="site-header header-background" style="background-image: url({{url('img/default-banner-dark.jpg')}})">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="page-title with-background-image">
          <p class="title">云麓谷</p>
          <p class="subtitle"></p>
        </div>
        <div class="site-menu with-background-image">
          <ul>
              <li>
                <a href="/">
                  Home
                </a>
              </li>
              <li>
                <a href="/archives">
                  归档
                </a>
              </li>
              <li>
                <a href="https://github.com/yunlugu">
                  Github
                </a>
              </li>

              <li>
                <a href="#">
                  加入我们
                </a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>


<!-- Home Page Post List -->
<div class="container">
    <canvas id="my_canvas" width="1000" height="1000"></canvas>
</div>

    <!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <p class="copyright text-muted">
          Theme By <a target="_blank" href="https://github.com/levblanc">Levblanc.</a>
        <p class="copyright text-muted">
          Powered By <a target="_blank" href="https://ylg.csu.edu.cn/">云麓谷</a>
        </p>
      </div>
    </div>
  </div>
</footer>


    <!-- After Footer Scripts -->
<script src="{{url('/js/highlight.pack.js')}}"></script>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    var codeBlocks = Array.prototype.slice.call(document.getElementsByTagName('pre'))
    codeBlocks.forEach(function(block, index) {
      hljs.highlightBlock(block);
    });
  });
</script>
{!! HTML::script('assets/javascript/wordcloud2.js') !!}

<script type="text/javascript">
    // WordCloud(document.getElementById('my_canvas'), {shape: 'circle', list: [['吴泽冉', 100], ['胡浩斌', 80], ['吴大屁', 40], ['胡大屎', 70]]} );
</script>
<script src="{{url('plugins/socket.io/node_modules/socket.io-client/socket.io.js')}}"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
  <script>
    var socket = io('http://localhost:6001');
    socket.on('connection', function (data) {
        console.log('this is data');
        console.log(data);
        console.log('end of data');
    });
    socket.on('checkin-channel:App\\Events\\CheckinEvent', function(message){
        // $('#messages').append($('<li>').text(message.user_id));
        var name_list = [];
        name_list = JSON.parse(message.name_list);
        var arr = $.map(name_list, function(el, key) { return [[key, el]] });
        WordCloud(document.getElementById('my_canvas'), {shape: 'circle', list: arr} );

    });
    console.log(socket);
  </script>

  </body>
</html>
