window.setInterval(function(){
    $('#cpu-widget').load('lib/systeminfo.php?type=cpu');
    $('#ram-widget').load('lib/systeminfo.php?type=ram');
}, 1000);