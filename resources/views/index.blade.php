<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/vue-3.2.36.js"></script>
    <script>
    var vCity = "";
    var vWeather = "";

    $(function() {

        $("#tblWeatherStatus").hide();
        $("#imgWeather").hide();

        checkInternetConnection();
        execOpenWeatherMapAPICall();
        execFourSquarePlacesAPICall();

        $("#list_cities").change(function(){
            vCity = $("#list_cities").val();
            checkInternetConnection();
            execOpenWeatherMapAPICall();
            execFourSquarePlacesAPICall();
        });

        $("#btnEnter").click(function(){
            vCity = $("#txtCity").val();
            checkInternetConnection();
            execOpenWeatherMapAPICall();
            execFourSquarePlacesAPICall();
        });

    });

    var connectionMessage = "Internet Connection Success!";
    var noConnectionMessage = "No internet connection. Please connect to the internet first!";
    window.onload = checkInternetConnection;

    function checkInternetConnection() {
        var isOnLine = navigator.onLine;
        if (isOnLine) {
            //alert(connectionMessage);
        } else {
            alert(noConnectionMessage);
        }
    }
    
    function execOpenWeatherMapAPICall() {
        var vSrc = "";
        $.ajax({

                type: 'POST',
                url: 'https://api.openweathermap.org/data/2.5/weather?q='+vCity+',japan&appid=49d712725a899af85dd5b4b45c724a57',
                tryCount : 0,
                retryLimit : 3,
                success: function (d) {
                    var retData = JSON.stringify(d);
                    var vJSONparsed = JSON.parse(retData).weather;
                    var vMain = vJSONparsed[0].main;
                    console.log(retData);
                    console.log(vMain);
                    console.log(vJSONparsed[0].description);
                    $("#tblWeatherStatus").show();
                    $("#imgWeather").show();
                    $("#pWeather").text(vMain);
                    $("#pDesc").text(vJSONparsed[0].description);

                    if (vMain == "Clouds") {
                        vSrc = "/images/cloudy.gif";
                    } else if (vMain == "Rain") {
                        vSrc = "/images/rainy.gif";
                    } else if (vMain == "Sun") {
                        vSrc = "/images/sunny.gif";
                    } else if (vMain == "Clear") {
                        vSrc = "/images/clear.gif";
                    } else if (vMain == "Fog") {
                        vSrc = "/images/foggy.gif";
                    } else if (vMain == "Mist") {
                        vSrc = "/images/misty.gif";
                    } else if (vMain == "Wind") {
                        vSrc = "/images/windy.gif";
                    } else if (vMain == "Drizzle") {
                        vSrc = "/images/rainy.gif";
                    } else if (vMain == "Thunderstorm") {
                        vSrc = "/images/thunderstorm.gif";
                    } else if (vMain == "Squall") {
                        vSrc = "/images/windy.gif";
                    } else if (vMain == "Haze") {
                        vSrc = "/images/hazy.gif";
                    } else if (vMain == "Tornado") {
                        vSrc = "/images/tornado.gif";
                    } else if (vMain == "Ash") {
                        vSrc = "/images/volcanicash.gif";
                    } else if (vMain == "Smoke") {
                        vSrc = "/images/hazy.gif";
                    } else if (vMain == "Dust") {
                        vSrc = "/images/dusty.gif";
                    } else if (vMain == "Snow") {
                        vSrc = "/images/snowy.gif";
                    }
                    $("#imgWeather").attr('src',vSrc);
                },
                error: function (jqXHR, exception) {
                        var msg = '';
                        console.log("Fetching data error!");
                        $('.modaloader').hide();
                        if (jqXHR.status === 0) {
                            msg = 'Not connected.\n Verify the network first.';
                        } else if (jqXHR.status == 404) {
                            msg = 'City not found!';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                            this.tryCount++;//                         ]
                            if (this.tryCount <= this.retryLimit) {//  ]
                                //try again                            ]
                                $.ajax(this);//                        ]--> This whole statement handles the retry function
                                return;//                              ]    if the connection was cut.
                            }//                                        ]
                            return;//                                  ]
                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        console.log(msg);
                        alert(msg);
                    }
              });
    }

    function execFourSquarePlacesAPICall() {
        var vTextPlaces = "";
        $.ajax({
                type: 'GET',
                url: 'https://api.foursquare.com/v3/places/search?near='+vCity+',JP',
                headers: {"Accept": "application/json", "Authorization": "fsq36WezprtE3gwJ10Qw7lX7Z+yKv+RTOWOOrEjx69xBO/8="},
                tryCount : 0,
                retryLimit : 3,
                success: function (d) {
                    var retData = JSON.stringify(d);
                    var vJSONparsed = JSON.parse(retData).results;
                    for (var i = 0; i < JSON.parse(retData).results.length; i++) {
                        var vName = "<tr><td><p style='color:darkcyan;'>-NAME- </p><strong>"+vJSONparsed[i].name+"</strong></td>";
                        var vAddress = "<td><p style='color:darkcyan;'>-ADDRESS- </p>"+"<strong>"+vJSONparsed[i].location['formatted_address']+"</strong></td></tr>";
                        console.log(vName);
                        console.log(vAddress);
                        vTextPlaces = vTextPlaces + vName + vAddress;
                    }
                    $("#tblPlaces").html(vTextPlaces);
                    //console.log(vJSONparsed);
                    //console.log(vJSONparsed[2]['categories']);
                    //console.log(vJSONparsed[0]['categories'][1]['name']);
                },
                error: function (jqXHR, exception) {
                        var msg = '';
                        console.log("Fetching data error!");
                        $('.modaloader').hide();
                        if (jqXHR.status === 0) {
                            msg = 'Not connected.\n Verify the network first.';
                        } else if (jqXHR.status == 404) {
                            msg = 'Place not found!';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                            this.tryCount++;//                         ]
                            if (this.tryCount <= this.retryLimit) {//  ]
                                //try again                            ]
                                $.ajax(this);//                        ]--> This whole statement handles the retry function
                                return;//                              ]    if the connection was cut.
                            }//                                        ]
                            return;//                                  ]
                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        console.log(msg);
                    }
              });
    }
    
    </script>
</head>
<body>
    <div align="left"><h1>HELLO JAPAN!</h1></div>
    <div align="left"><h3>Hey! Let's check the weather before you go!<h3></div>
    <div><h3>Select a City to Check<h3></div>
    <select name="list_cities" id="list_cities">
        @foreach($cities as $row)
            <option value="{{$row->city_val}}">{{$row->city_name}}</option>
        @endforeach
    </select>
    <br>
    <div align="left"><h2>or<h2></div>
    <div align="left"><h3>Type the City you know in Japan then click the search button.<h3></div>
    <div id="vuebound">
        <div align="left"><input type="text" name="txtCity" id="txtCity" placeholder="Type a city here."/>&nbsp;<button name="btnEnter" id="btnEnter" title="Click to search.">SEARCH</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id="imgWeather" width="200" height="120" style="border-radius:7%;"></div>
    </div>
    <table width="50%" id="tblWeatherStatus">
        <tr width="auto">
            <td width="25%" align="right">
                <h4>Weather Status:</h4>
            </td>
            <td width="25%" align="center">
                <i><h3 style="color:blue;" id="pWeather"></h3></i>
            </td>
            <td width="25%" align="right">
                <h4>Description:</h4>
            </td>
            <td width="25%" align="center">
                <i><h3 style="color:blue;" id="pDesc"></h3></i>
            </td>
        </tr>
    </table>
    <h3 style="color:#ff0000;">NEARBY PLACES (Popular Restaurants, Museum, etc.)</h3>
    <table width="50%" id="tblPlaces">
    </table>
    <script src="myvue.js"></script>
</body>
</html>