<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="{{URL::asset('/includes/jquery.js')}}"></script>
        <script src="{{URL::asset('/includes/underscore.js')}}"></script>
        <script src="{{URL::asset('/includes/backbone.js')}}"></script>
        <script>
            function probeersel1(){
                var Song =  Backbone.Model.extend({
                    initialize: function(test) {
                        console.log("Song gemaakt"+test);
                    },
                    jojo: function() {
                        alert("in jojo");
                        var cssColor = prompt("Please enter a CSS color:");
                        this.set({color: cssColor});
                    },
                    color:'orange',
                    defaults:{
                        artist:'unknown',
                        length:24
                    }
                   
                });
                var song = new Song({color:'pink'});
                song.set({color:'white'});
                song.set({optreden:'fred'});
                song.get('optreden');
                console.log(song.color);
                var song1 = new Song('twee');
                var song2 = new Song('ricardo vilanodoz');
                var song3 = new Song('tiesto');
                song.jojo();
                console.log(song.color);
                song.artist = 'piet';
                console.log(song.artist);
                console.log(song.get('length'));
                console.log(song.length);
                console.log(song);
            }
            function probeersel2(){
                var Boot = Backbone.Model.extend({
                    verlengen: function() {
                        alert();
                        this.set({bootlengte: 35});
                    }
                });
                var boot = new Boot();
                boot.verlengen();
                console.log(boot.get('bootlengte'));
                console.log(boot.attributes);
                console.log(boot.has('bootbreedte'));
                console.log(boot.has('bootlengte'));
            }
            function probeersel3(){
                var Kip = Backbone.Model.extend({
                    initialize:function(){
                        this.set('snavellengte', 124);
                        this.on('change', function(){
                            console.log('changecallback');
                        });
                        this.on('kakelen', function(){
                            console.log('kakelcallback');
                        });
                    },
                    kakelen : function(){
                        console.log('aan het kakalen');
                    }
                });
                var kip = new Kip();
                console.log(kip.attributes);
                kip.set('snavellengte', 35);
                kip.kakelen();
                console.log(kip.get('snavellengte'));
                console.log(kip.previous('snavellengte'))
            }
            function probeersel4(){
                var Draak = Backbone.Model.extend({
                    validate: function(attrs) {
                        if (this.has('prinses')){
                        }else{
                            alert('geen prinses');
                            return false;
                        }
                    },
                    initialize:function(){
                        a('draak is gemaakt');
                    }
                });
                var draak = new Draak();
                draak.set('prinses','neeltje');
                a(draak.isValid());
                draak.clear();
                a('cleared');
                a(draak.isValid());
                a(draak.has('prinses'));
                console.log(draak);
                
            }
            function probeersel5(){
                var Device = Backbone.Model.extend({
                    urlRoot : '/device',
                    brand:'unknown'
                });
                var device = new Device();
                device.fetch({
                    success: function(model){
                        a(model.get('brand'));
                        probeersel5callback(model);
                    }
                });
                a('vb1'+device.get('brand'));
            }
            function probeersel5callback(devicemodel){
                a('vb2'+devicemodel.get('brand'));
            }
            function probeersel6(){
                var Fruit = Backbone.Model.extend({
                    defaults: {
                        Rijpheid: ""
                    },
                    initialize: function () {
                        a('Fruit is aangemaakt');
                        this.on("invalid", function (model, error) {
                            console.log("Ik  wil wel weten wat ik eet: " + error)
                        });
                    },
                    validate: function (attr) {
                        if (!attr.Rijpheid) {
                            return "Geen rijpheid opgegeven."
                        }
                    },
                    urlRoot: 'fruit'
                });
                var fruit = new Fruit({ Rijpheid: "heel rijp" });
                var saveOptions = {
                    success: function (model, response, options) {
                        a("Het is gesaved");
                        console.log(model);
                        console.log(response);
                        console.log(options);
                    },
                    error: function (model, xhr, options) {
                        a("Er is iets misgegaan");
                    }
                };
                fruit.save({}, saveOptions);
                var fruit2 = new Fruit();
                fruit2.save({}, saveOptions);
            }
            function a(detekst){
                var deOutput = document.getElementById('output');
                deOutput.innerHTML = deOutput.innerHTML + '<br>' + detekst;
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
                <br><input type="button" value="start proberen 1" onclick="probeersel1()">
                <br><input type="button" value="start proberen 2" onclick="probeersel2()">
                <br><input type="button" value="start proberen 3" onclick="probeersel3()">
                <br><input type="button" value="start proberen 4" onclick="probeersel4()">
                <br><input type="button" value="start proberen 5" onclick="probeersel5()">
                <br><input type="button" value="start proberen 6" onclick="probeersel6()">
                <div class="title" id="iets">Laravel 5</div>
            </div>
        </div>
        <div id="output"></div>
    </body>
</html>
