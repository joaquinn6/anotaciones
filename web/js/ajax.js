$(function(){
  $('.loadAjax').click(function(event){
    $('#visualiceData').load(event.target.id);
  });

});
