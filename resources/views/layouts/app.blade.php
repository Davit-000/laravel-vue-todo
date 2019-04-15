<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body>
<div id="app" class="is-component">
    <el-container style="height: 100%; border: 1px solid #eee">
        <el-container>
{{--            <el-header>--}}
{{--                @yield('navigation')--}}
{{--            </el-header>--}}

            <el-main>
                <el-row :gutter="20">
                    <el-col :span="20" :offset="2">
                        @yield('content')

                        <el-footer>
                            <p style="text-align: center">Double-click to edit a todo</p>
                            <p style="text-align: center">
                                Written by <a href="http://evanyou.me">David Hovhannisyan</a>
                            </p>
                        </el-footer>
                    </el-col>
                </el-row>
            </el-main>
        </el-container>
    </el-container>
</div>
</body>
</html>
