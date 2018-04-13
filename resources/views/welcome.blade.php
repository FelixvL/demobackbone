<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="{{URL::asset('/includes/jquery.js')}}"></script>
        <script src="{{URL::asset('/includes/underscore.js')}}"></script>
        <script src="{{URL::asset('/includes/backbone.js')}}"></script>
        <script>
            function proberen(){
                var Song =  Backbone.Model.extend({
                    initialize: function(test) {
                        console.log("Song gemaakt"+test);
                    },
                    jojo: function() {
                        alert("in jojo");
                        var cssColor = prompt("Please enter a CSS color:");
                        this.set({color: cssColor});
                    }
                });
                var song = new Song('een');
                var song1 = new Song('twee');
                var song2 = new Song('ricardo vilanodoz');
                var song3 = new Song('tiesto');
                song.jojo();
                console.log(song.color);
            }
        </script>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <input type="button" value="start proberen" onclick="proberen()">
                <div class="title" id="iets">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
