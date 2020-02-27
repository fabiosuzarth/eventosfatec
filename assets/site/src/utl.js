/* ----------------------------------------------------------------------- */
//  Ordenar JSON por atributo
//      yourArray.sort( predicateBy("age") );
/*function predicateBy(prop){
    return function(a,b){
       if( a[prop] > b[prop]){
           return 1;
       }else if( a[prop] < b[prop] ){
           return -1;
       }
       return 0;
    }
}*/
/* ----------------------------------------------------------------------- */
// function to make form values to json format
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
/* ----------------------------------------------------------------------- */
function AddZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
/* ----------------------------------------------------------------------- */
function FormatDate2Hour(sDate){      
    // formata data yyyy/mm/dd hh:mm:ss para hh:mm
    sDate=sDate.replace(/-/g, "/");
    var date = new Date(sDate);
    var hh = AddZero(date.getHours());
    var mm = AddZero(date.getMinutes());

    return hh + ":" + mm;
}
/* ----------------------------------------------------------------------- */
function formatDate(sDate){      
    // formata data para dd/mm/yyyy
    // para instanciar nova data, string deve ser yyyy/mm/dd
    sDate=sDate.replace(/-/g, "/");
    var date = new Date(sDate);
    var day = date.getDate();
    var month = date.getMonth() + 1; // janeiro = 0
    if(day < 10) day="0"+day;
    if(month < 10) month="0"+month;
    var ret=day + "/" + month + "/" + date.getFullYear();
    return ret;
}
/* ----------------------------------------------------------------------- */
function formatDateDB(sDate){      
    // formata data para yyyy-mm-dd ou mm-dd
    // string deve vir mm/yyyy dd/mm
    // para instanciar nova data, string deve ser yyyy/mm/dd
    sDate=sDate.replace(/\//g, "-");
    var d = sDate.split("-");
    var dd, mm, yyyy;
    // Se veio dd-mm-yyyy
    if(d.length>2){
        yyyy=d[2];
        mm=d[1];
        dd=d[0];
        return yyyy+"-"+mm+"-"+dd;
    }
    else if (d[1].length>2){
        yyyy=d[1];
        mm=d[0];
        return yyyy+"-"+mm;
    }
    else{
        mm=d[1];
        dd=d[0];
        return mm+"-"+dd;
    }
}
/* ----------------------------------------------------------------------- */
// function PossuiInscricaoAtividade(jsonArray, atividade)
// {
//     var rslt=false;

//     for (var index = 0; index < jsonArray.length; ++index) 
//     {
//         var j = jsonArray[index];
//         if(j.atividade_id == atividade)
//         {
//             rslt = true;
//             break;
//         }
//     }
    
//     return rslt;
// }
/* ----------------------------------------------------------------------- */
function SubstituirEspacoHtml(str){
    return str.split(" ").join("%20");
}
/* ----------------------------------------------------------------------- */
function LimitarCaracteres(str, tamanho){
    if(str.length <= tamanho) return str
    return str.substring(0,tamanho) + "...";
}