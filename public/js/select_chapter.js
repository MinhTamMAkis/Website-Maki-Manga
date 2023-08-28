$('.select-chapter').on('change',function(){
    var url = $(this).val();

    if(url){
        window.location = url;
        
    }
    return false;
});

current_chapter();

function current_chapter() {
    var url = window.location; 
    $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);
}
