$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');
    
    $('#modal-title').text(title);
    $('.modal-dialog').removeClass('modal-lg');
    $('#modal-btn-save').removeClass('hide')
    .text(me.hasClass('edit') ? 'Update' : 'Create');
    
    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            
            $('#modal-body').html(response);
            $('#select').select2({
                width: '100%'
            });
            $('#select2').select2({
                width: '100%'
            });
            $('#select3').select2({
                width: '100%'
            });
            $('#code')
            .keyup(function() {
                var value = $( this ).val();
                if(value == null || value == 0){
                    $('.barcode-container').hide();
                }else{
                    JsBarcode("#barcode", value, {
                        width: 2,
                        height: 50,
                        displayValue: true,
                        fontSize: 10
                    });
                    $('.barcode-container').show();
                }
            })
            .keyup();
        }
    });

    $('#modal').modal('show');
});

$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                type : 'success',
                title : 'Success!',
                text : 'Data has been saved!'
            });
        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>' + value + '</strong></span>');
                });
            }
        }
    })
});
$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'Are you sure want to delete ' + title + ' ?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function (response) {
                    $('#datatable').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Success!',
                        text: 'Data has been deleted!'
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            });
        }
    });
});

$('body').on('click', '.btn-active', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        id = me.attr('data');

    swal({
        title: 'Are you sure want to ' + title + ' ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "PUT",
                data : id,
                success: function (response) {
                    $('#datatable').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Success!',
                        text: 'Data has been '+ title +'!'
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            });
        }
    });
});
function print(){
    var value = $('#code').val();
    if(value==null || value==0){
        const toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          
          toast({
            type: 'error',
            title: 'Code Empty',
            text: 'Write a Code!'
          })
    }else{
        $('.barcode-container').printArea();
    }
    
}
$('body').on('click', '.btn-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');
    $('.modal-dialog').addClass('modal-lg');
    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('hide');
    me.hasClass('create') ? 
        $('#modal-btn-save').removeClass('hide').text('Save') : $('#modal-btn-save').addClass('hide');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
            $('#mytable').hide();
            $('#article-name').hide();
        }
    });

    $('#modal').modal('show');
});

$('body').on('keydown.autocomplete', '#code-article', function(e){
    $("#code-article").autocomplete({
        source: function( request, response ) {
           
            $.ajax({
            type: 'GET',
            url: "/werehouse/articles/search",
            data: {
                term : request.term
            },
            dataType: "JSON",
            success: function(data) {
                    
                response(data);
            }
            });
        },
        minLength: 1,
        select: function (event, ui) {
         // Set selection
         $("#code-article").val(ui.item.label); // display the selected text
         //$('').val(ui.item.value); // save selected id to input
         return false;
        }
       });
})


    
/*$('body').on('keypress', '#code-article', function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
        var value = $(this).val();
        var article = $("#article-name");
        
        $.ajax({
            type : 'get',
            url  : '{!! route("articles.search") !!}',
            data: {
                term : request.term
            },
            dataType: "JSON",
        success: function(data) {
            if(data.article.length > 0){
                article.val(data.article[0].name);  
                $('#article-name').show();
            }else{
                article.val("No records found")
            }
        },
        error : function() {
            swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Nothing Data'
            })
        }
        });
      
      
	}
	event.stopPropagation();
});*/

// function for table income create
$(document).on('click', '#add', function(){
    articleName = $('#article-name').val();
    price = $('#price').val();
    quantity = $('#quantity').val();
    tax = $('#tax').val();
    subtotal = 0;
    total = 0;
    validator = 0;

    if(quantity.trim().length === 0){
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'La cantidad del articulo '+articleName+' no debe etar vacía'
        }); validator++;
    }

    if(price.trim().length === 0){
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Pro favor verica la casilla de precio del articulo '+articleName
        }); 
        validator++;
    }
        
    if(articleName.trim().length === 0){
        
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Ingresa un articulo' 
        }); 
        validator++;
    }    

    if(validator === 0){
        quantity = parseInt(quantity);
        price = parseFloat(price);

        if(isNaN(price)){
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'El precio del articulo '+articleName+' debe ser valida'
            }); 
            validator++;
        }

        if(isNaN(quantity)){
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'La cantidad del articulo '+articleName+' debe ser valida'
            }); 
            validator++;            
        }

        if(validator === 0){
            $('#mytable').show();
            $('#mytable > tbody').append('<tr><td><button class="btn btn-danger btn-sm" id="delete-row"><i class="fas fa-times-circle"></i></button></td><td>'+articleName+
                                            '</td><td>'+price+'</td><td>'+quantity+'</td><td>'+(quantity*price)+'</td></tr>');            

            $('#mytable > tbody > tr').each(function(idx, obj){
                subtotal +=parseFloat($(obj).find('td').eq(4).text());
            });
              

            rowSubtotal = $('#mytable > tfoot > tr:first');
            
            (rowSubtotal.find('td').length === 1) ? rowSubtotal.append('<td>'+subtotal+'</td>'): rowSubtotal.find('td').eq(1).text(subtotal);
            
            rowTax = $('#mytable >tfoot > tr:nth-child(2)');

            (rowTax.find('td').length === 1) ? rowTax.append('<td>'+tax+'</td>'): rowTax.find('td').eq(1).text(tax);

            total += (subtotal * tax ) + subtotal ;

            rowTotal  = $('#mytable >tfoot > tr:nth-child(3)');

            (rowTotal.find('td').length === 1) ? rowTotal.append('<td>'+total+'</td>'): rowTotal.find('td').eq(1).text(total);
        }
    }
    
    
});


$(document).on('click','#delete-row',function(){

    subT = 0;
    rowT  = 0;
    subRow  = parseFloat($(this).closest('tr').remove().find('td').eq(4).text());
    subRowT = parseFloat(rowSubtotal.find('td').eq(1).text());
    
    subT = subRowT - subRow;
    (rowSubtotal.find('td').length === 1) ? rowSubtotal.append('<td>'+subT+'</td>'): rowSubtotal.find('td').eq(1).text(subT);
    
    rowT += ((subT*tax)+subT);
    
    (rowTotal.find('td').length === 1) ? rowTotal.append('<td>'+rowT+'</td>'): rowTotal.find('td').eq(1).text(rowT);
    if(subT === 0 ){
        $('#mytable').hide();
    }
    
    $(this).closest('tr').remove();
     return false;
});
