function maj_select(route, selectRef, selectRafraichi, valeurRafraichiParDefaut)
{
    valeur = $('#' + selectRef).val(); 
    console.log(valeur);
   
    if(valeur != '' && valeur != null && valeur != 0){
        
        $.ajax({
             type: 'POST',
             url: Routing.generate(route),
             data : { ref : valeur},
             success : function (data){
                 // récupération du test par default 
                 empty_text = $('#' + selectRafraichi + ' option[value=\'\']').html();
                 console.log(empty_text);
                 // Suppression des anciennes options disponnibles sauf celle par default (empty)'
                 $('#' + selectRafraichi + ' option').each(function(){
                     if($(this).attr('value') != ''){
                         console.log("yhhghj");
                        $(this).remove();
                     }
                 });
                 // Chargement options disponnibles      
                 $.each(data, function(i, item) {
                    if(valeurRafraichiParDefaut == 0 && i == 0){
                       if(empty_text != '')
                           $('#s2id_' + selectRafraichi + ' .select2-chosen').html(empty_text);
                       else
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
}	

