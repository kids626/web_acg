<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>自用後台整合管理</title>

    <!-- CSS only -->
    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <!-- asset()會指定到public下的目錄 -->

    <link rel="stylesheet" href="{{asset('tpy/bootstrap-5.1.1/css/bootstrap.min.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />

    <!-- datatables fixcolumn -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.2.1/css/fixedColumns.dataTables.min.css" />
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('tpy/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.min.css')}}">
    <!-- 自定義css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">



    <!-- javascript -->
    <!-- jquery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> -->

    <script src="{{asset('tpy/jquery/jquery-3.6.1.min.js')}}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{asset('tpy/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js')}}"></script>




    <!-- bootstrap -->
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script> -->
    <script src="{{asset('tpy/bootstrap-5.1.1/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>-->

    <!-- datatables dataselect -->
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>
    <!-- datatables fixcolumn -->
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--圖表 -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <style>
        #notifDiv {
            z-index: 10000;
            display: none;
            background: green;
            font-weight: 450;
            width: 350px;
            position: fixed;
            top: 80%;
            left: 5%;
            color: white;
            padding: 5px 20px;
        }
    </style>

</head>

<body>

    <!-- body內容分為header main把主要內容移出去所以用yield footer 最外面一層container
        在最下面放一個script準備放js
        將此頁面切為上中下三塊
    -->

    <div class="container">

        <!-- 頭部 -->
        <div class="header w-100 p-3" style="height:70px ;">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark bg-gradient">
                <div class="container-fluid">

                    <a class="navbar-brand" href="#">Management</a>
                    @auth
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">

                            @if(in_array("A1",$permission))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    官網會員相關數據(A1)
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                    @if(in_array("A1-1",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/memberinfo">Member會員資料(A1-1)</a></li>
                                    @endif

                                    @if(in_array("A1-1-3",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/membergroupinfo">Member會員國別群組資料(A1-1-3)</a></li>
                                    @endif

                                    @if(in_array("A1-1-1",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/membergdinfo">Member註冊會員圖表(A1-1-1)</a></li>
                                    @endif

                                     @if(in_array("A1-2",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/edmmemberinfo">EDM會員資料(A1-2)</a></li>
                                    @endif

                                    @if(in_array("A1-1-2",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/edmmembergdinfo">EDM會員增長圖表(A1-1-2)</a></li>
                                    @endif



                                    @if(in_array("A1-3",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/warrantyinfo">會員保固清單資料(A1-3)</a></li>
                                    @endif

                                    @if(in_array("A1-4",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/orderinfo">商城訂單資料(A1-4)</a></li>
                                    @endif


                                </ul>
                            </li>
                            @endif

                             @if(in_array("F1",$permission))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkF" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    活動頁面相關(F1)
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkF">
                                    @if(in_array("F1-1",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/eventedmmemberinfo">活動電子報會員(F1-1)</a></li>
                                    @endif
                                    @if(in_array("F1-2",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/trialf12info">2023試用產品資料(F1-2)</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif

                            @if(in_array("G1",$permission))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    網頁編輯(G1)
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">

                                    @if(in_array("G1-1",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/jpbloginfo">JP BLOG(G1-1)</a></li>
                                    @endif

                                    @if(in_array("G1-2",$permission))
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/uploadtest">產品列表(G1-2)</a></li>
                                    @endif

                                </ul>
                            </li>
                            @endif



                            @if(in_array("D1",$permission))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    投資人關係管理(D1)
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/eventinfo">活動與簡報管理</a></li>
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/financialinfo">每月營收報告管理</a></li>
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/financialinfoatt">每季財務報表與年報管理</a></li>
                                    <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/dividendinfo">股利資訊管理</a></li>
                                </ul>
                            </li>
                            @endif

                            @if(in_array("B1",$permission))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    QR CODE網址產生(B1)
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                    @if(in_array("B1-1",$permission))
                                        <li><a class="dropdown-item" target="_blank" href="http://backend.avermedia.com/qrcodewidget"> QR CODE短網址產生(B1-1)(old)</a></li>
                                    @endif

                                    @if(in_array("B1-2",$permission))
                                        <li><a class="dropdown-item" href="/{{env('APP_NAME')}}/public/admin/qrcodeinfo"> QR CODE短網址產生(B1-2)</a></li>
                                    @endif<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script>
                                </ul>
                            </li>
                            @endif

                            @if(in_array("C1",$permission))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    API相關設定管理(C1)
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                    <li><a class="dropdown-item" target="_blank" href="#">API LOG 狀態</a></li>
                                    <li><a class="dropdown-item" href="#">API相關設定管理</a></li>
                                    <li><a class="dropdown-item" href="#">API相關設定管理</a></li>
                                </ul>
                            </li>
                            @endif






                            @if(in_array("E1",$permission))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    延伸功能(E1)
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink4">
                                    <li><a class="dropdown-item" target="_blank" href="../admin/upload">上傳檔案到AWS S3</a></li>
                                    <li><a class="dropdown-item" href="#">延伸模組一</a></li>
                                    <li><a class="dropdown-item" href="#">延伸模組二</a></li>
                                </ul>
                            </li>
                            @endif

                            @if(in_array("Z1",$permission))
                            <li class="nav-item">
                                <a class="nav-link" href="/{{env('APP_NAME')}}/public/admin/admininfo">使用者帳號管理(Z1)</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                    @endauth
                </div>
            </nav>
            <!-- <a href="/web_averir/public/">
                後台管理表單
            </a> -->

        </div>

        <!-- 主頁內容 挖洞 yield main 來自module_v2.blade 的section(main)-->
        <div class="main d-flex " style="height:830px">
            @yield("main")
        </div>



    </div>

    <!-- 頁尾 -->
    <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; by jason.Hsu</small>
        </div>
    </footer>

    <!-- 輔助區塊-CRUD彈跳視窗 -->
    <div id="modal"></div>

    <!-- 輔助區塊-SEARCH彈跳視窗 -->
    <div id="search_modal"></div>

    <!-- 輔助區塊-checkbox delete提示視窗 -->
    <div id="notifDiv"></div>

</body>

</html>
 <!--  挖洞 yield script 來自module_v2.blade 的section(script)-->
@yield("script")
