$(function(){
    $('#budgetmodal').click(function(){
        $('#budgetmodal').modal('show')
        .find('#budgetContent')
        .load($(this).attr('value'));
    });
});