window.setInterval(function(){
    $('#cpu-widget').load('ajax/systeminfo.php?type=cpu');
    $('#ram-widget').load('ajax/systeminfo.php?type=ram');
    $('#device-num').load('ajax/systeminfo.php?type=device_num')
}, 1000);