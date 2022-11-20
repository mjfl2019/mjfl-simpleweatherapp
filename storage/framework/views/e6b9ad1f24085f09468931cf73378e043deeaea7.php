<?php




?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery-3.6.1.min.js"></script>
    <script>
    vCity = "";
    $(function() {

        checkInternetConnection();
        execOpenWeatherMapAPICall();

        $("#listCities").change(function(){
            vCity = $("#listCities").val();
            checkInternetConnection();
            execOpenWeatherMapAPICall();
        });

        $("#btnEnter").click(function(){
            vCity = $("#txtCity").val();
            checkInternetConnection();
            execOpenWeatherMapAPICall();
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
        
        $.ajax({

                type: 'POST',
                url: 'https://api.openweathermap.org/data/2.5/weather?q='+vCity+',japan&appid=49d712725a899af85dd5b4b45c724a57',
                /*ata: { queue_id:1},
                cache: false,*/
                tryCount : 0,
                retryLimit : 3,
                success: function (d) {
                    var retData = JSON.stringify(d);
                    console.log(retData);
                    //var pData = JSON.parse(d);
                    //console.log("Data is " + sData.queuer);
                    //$.each(d, function(i,v) {
                        //var nVal = JSON.stringify(v);
                        //console.log("Data is " + v + ".");
                        //$("#pNewAcct").text(v);
                    //});
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
        $.ajax({
                type: 'POST',
                url: '',
                /*ata: { queue_id:1},
                cache: false,*/
                tryCount : 0,
                retryLimit : 3,
                success: function (d) {
                    var retData = JSON.stringify(d);
                    console.log(retData);
                    //var pData = JSON.parse(d);
                    //console.log("Data is " + sData.queuer);
                    //$.each(d, function(i,v) {
                        //var nVal = JSON.stringify(v);
                        //console.log("Data is " + v + ".");
                        //$("#pNewAcct").text(v);
                    //});
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
    <div align="left"><h3>Hey! Let's check the weather before we go!<h3></div>
    <div align="left"><h3>Select a City to Check<h3></div>
    <select name="listCities" id="listCities">
        <option value="tokyo">TOKYO</option>
        <option value="nagoya">NAGOYA</option>
        <option value="osaka">OSAKA</option>
        <option value="kyoto">KYOTO</option>
        <option value="sapporo">SAPPORO</option>
        <option value="asahikawa">ASAHIKAWA</option>
        <option value="hakodate">HAKODATE</option>
        <option value="aomori">AOMORI</option>
        <option value="akita">AKITA</option>
        <option value="morioka">MORIOKA</option>
        <option value="sendai">SENDAI</option>
        <option value="yamagata">YAMAGATA</option>
        <option value="fukushima">FUKUSHIMA</option>
        <option value="niigata">NIIGATA</option>
        <option value="nagano">NAGANO</option>
        <option value="utsunomiya">UTSUNOMIYA</option>
        <option value="mito">MITO</option>
        <option value="maebashi">MAEBASHI</option>
        <option value="saitama">SAITAMA</option>
        <option value="chiba">CHIBA</option>
        <option value="kawasaki">KAWASAKI</option>
        <option value="shizuoka">SHIZUOKA</option>
        <option value="hamamatsu">HAMAMATSU</option>
        <option value="toyama">TOYAMA</option>
        <option value="kanazawa">KANAZAWA</option>
        <option value="fukui">FUKUI</option>
        <option value="tsu">TSU</option>
        <option value="otsu">OTSU</option>
        <option value="sakai">SAKAI</option>
        <option value="wakayama">WAKAYAMA</option>
        <option value="kobe">KOBE</option>
        <option value="okayama">OKAYAMA</option>
        <option value="takamatsu">TAKAMATSU</option>
        <option value="tokushima">TOKUSHIMA</option>
        <option value="matsuyama">MATSUYAMA</option>
        <option value="kochi">KOCHI</option>
        <option value="tottori">TOTTORI</option>
        <option value="matsue">MATSUE</option>
        <option value="hiroshima">HIROSHIMA</option>
        <option value="yamaguchi">YAMAGUCHI</option>
        <option value="oita">OITA</option>
        <option value="kitakyushu">KITAKYUSHU</option>
        <option value="fukuoka">FUKUOKA</option>
        <option value="saga">SAGA</option>
        <option value="kumamoto">KUMAMOTO</option>
        <option value="kyushu">KYUSHU</option>
        <option value="miyazaki">MIYAZAKI</option>
        <option value="satsumasendai">SATSUMASENDAI</option>
        <option value="nagasaki">NAGASAKI</option>
        <option value="kagoshima">KAGOSHIMA</option>
    </select>
    <br>
    <div align="left"><h3>OR<h3></div>
    <div align="left"><h3>Type the City you know in Japan before clicking enter button below.<h3></div>
    <div align="left"><input type="text" name="txtCity" id="txtCity" placeholder="Enter a City here"/></div>
    <br>
    <div align="left"><button name="btnEnter" id="btnEnter">ENTER</button></div>
</body>
</html><?php /**PATH C:\xampp\htdocs\mjfl-simpleweatherapp\resources\views/welcome.blade.php ENDPATH**/ ?>