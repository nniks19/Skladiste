$(document).ready(function(){
    LoadStats();
})
function LoadStats(){
    $.ajax(
        {
            url:'../action/action.php?action_id=get_dashboard_stats',
            type:'GET',
            success:function (oData)
            {
                $('#UkBrAr').append(oData[0].UkBrAr);
                $('#UkBrDo').append(oData[0].UkBrDo);
                $('#UkBrIz').append(oData[0].UkBrIz);
                $('#UkBrPr').append(oData[0].UkBrPr);
                $('#UkKoAr').append(oData[0].UkKoAr);
                $('#UkCiAr').append(oData[0].UkCiAr + ' kn');
                $('#CiMaAr').append(oData[0].CiMaAr + ' kn');
                $('#CiMiAr').append(oData[0].CiMiAr + ' kn');
                $('#BrKr').append(oData[0].BrKr);
            }
        });
}
