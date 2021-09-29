$(document).ready(function(){
    $('#regform').submit(function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url:"index.php",
            data: $(this).serialise(),
            success:function(response){
                
            }
        });
    });
});