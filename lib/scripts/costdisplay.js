
// Cost display on the single.php page
// 06 Sep 2017
$('.event--meta').each(function(){
    if($(this).find('ul').children().length == 0)
    $(this).hide();
    });
