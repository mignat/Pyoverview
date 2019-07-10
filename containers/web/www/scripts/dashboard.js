window.setInterval(function(){
    $('#cpu-widget').load('ajax/systeminfo.php?type=cpu');
    $('#ram-widget').load('ajax/systeminfo.php?type=ram');
}, 1000);