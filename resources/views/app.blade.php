<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{mix('css/app.css')}}">


    </head>
    <body class="antialiased">
    <div id="app" class="container">
        <header>
            <div class="column is-multiline">
                <div class="column is-12-mobile has-text-centered">
                    <h1 class="is-size-1">Tech Challenge</h1>
                </div>
            </div>
        </header>
        <section class="section">
            <div class="container">
                <div class="columns is-multiline container">
                    <div class="column is-2">
                        <aside class="menu">
                            <p class="menu-label">Dashboard</p>
                            <ul class="menu-list">
                                <li><router-link to="/categories">Categories</router-link></li>
                                <li><router-link to="/products">Products</router-link></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="column is-10">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
