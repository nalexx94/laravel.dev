$(function(){
    var selectedBrand;

    function getNewModels(id)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.ajax({
               url: window.productUrl,
               type: "POST",
               dataType: "json",
               data: {'method': 'getModelsByBrand', 'brand': id},
               success: function (response) {
                   console.log(response);
                   if (response.length > 0)
                   {
                       var options = '';
                       response.forEach(function (item, i, arr) {
                           options +='<option value="'+item.id+'">'+item.name+'</option>';

                       });

                       $('#brandmodels').empty().append(options).removeAttr('disabled');
                   }

               },

           }
        );
    }

    $('#choose-brand').on('change',function(){
        var newSelected = Number($(this).val());
        if (window.selectedBrand) {
            if (selectedBrand !== newSelected) {
                getNewModels(newSelected);
            }
        }
        else {
            getNewModels(newSelected);
        }

    });

});
