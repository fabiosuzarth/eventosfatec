/* ----------------------------------------------------------------------- */
function SetPageDescription(title, desc){
    var page_description_html=`
        <h1>` + title + `</h1>
        <hr>
        <p>` + desc + `</p>`;
    $("#page-description").html(page_description_html);
    $("#page-description").show();
}
/* ----------------------------------------------------------------------- */
function SetOptionSelectString(select_string, id_select, value)
{    
    var $ret = $(select_string); 
    $ret.find('#'+id_select).find('option[value="'+ value +'"]').attr('selected', 'selected').parent().trigger('change');
    return $ret.html();
}
/* ----------------------------------------------------------------------- */
function HideMessages(){
    $("#page-messages").addClass('d-none');
}
/* ----------------------------------------------------------------------- */
function ShowMessages(){
    $("#page-messages").removeClass('d-none');
}
/* ----------------------------------------------------------------------- */
function BaseUrl(){
	var string = window.location.origin,
	substring = "localhost";
	if(string.includes(substring) == true){
		return window.location.origin + '/eventosfatec';
	}
	else{
		return window.location.origin;
	}
}
/* ----------------------------------------------------------------------- */	
function AlertMessage(state, message)
{   
    var html_message="";
    if(state=="success"){
        html_message+=`<div class="alert alert-success mt-3" role="alert">`;
    }
    else if(state=="warning"){
        html_message+=`<div class="alert alert-warning mt-3" role="alert">`;
    }
    else if(state=="error"){
        html_message+=`<div class="alert alert-danger mt-3" role="alert">`;
    }
    else return;
    
    html_message+=message+`</div>`;

    $('#page-messages').html(html_message);
    $("#page-messages").removeClass('d-none');
}
/* ----------------------------------------------------------------------- */
function GenerateURL_TinyGraphs()
{
    //http://tinygraphs.com/isogrids/tinygraphs?theme=daisygarden&numcolors=4&size=220&fmt=svg

    var shape = ['squares', 'isogrids', 'spaceinvaders'];
    var theme = ['daisygarden', 'frogideas', 'seascape', 'bythepool'];
    var randShape = shape[Math.floor(Math.random() * shape.length)];
    var randTheme = theme[Math.floor(Math.random() * theme.length)];

    return `http://tinygraphs.com/` + randShape + `/tinygraphs?theme=` + randTheme + `&numcolors=4&size=220&fmt=svg`
}