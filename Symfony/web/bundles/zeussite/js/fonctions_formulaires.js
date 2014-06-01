function maj_select(route, selectRef, selectRafraichi, valeurRafraichiParDefaut)
{
   valeur = $('#' + selectRef).val(); 
        
    $.ajax({
         type: "POST",
         url: Routing.generate(route),
         data : { ref : valeur},
         success : function (data){
             var option_empty = $('#' + selectRafraichi + " option[value='']");
             console.log(option_empty);
             $('#' + selectRafraichi).empty();
             $.each(data, function(i, item) {
                if(valeurRafraichiParDefaut == 0 && i == 0){
                   //var valeurParDefault$() 
                   $('#s2id_' + selectRafraichi + ' .select2-chosen').html(item.option); 
                }
                else if(valeurRafraichiParDefaut != 0 && item.value == valeurRafraichiParDefaut){
                    $('#s2id_' + selectRafraichi + ' .select2-chosen').html(item.option);
                }
                $('#' + selectRafraichi).append(
                    '<option value="' + item.value + '">' + item.option  +'</option>'
                );
             });
         }
    });       
}	

