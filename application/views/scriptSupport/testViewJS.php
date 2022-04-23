<script>

    //function changeHeader(){$("button").html("Button Changed");}    
    $(document).ready(function(){
        //$('h1').html("It's working");
        
        function changeHeader(){$("h2").html("It's working boys");}
        
        $('#test_btn').click( function(){ 
            changeHeader(); 
            if($(this).html()!="Button Changed"){ $(this).html("Button Changed");}
            else if($(this).html()=="Button Changed") {$(this).html("Go back");}
        });
    });
</script>   