@extends('layouts.master')

@section('content')
<form action="{{ route('pos.save') }}" method="POST">@csrf
<div class="content-wrapper">
    <div class="content"> 
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ordered Produk </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table_order">
                              <thead>
                                <tr>
                                  <th>Product</th>
                                  <th>Size</th>
                                  <th>QTY</th>
                                  <th>Price</th>
                                  <th>Total</th>
                                  <th><a class="btn btn-social-icon btn-dropbox" id="add_row"><i class="fa fa-plus-square"></i></a></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr id="row_product">
                                  <td>
                                    <input id="product_0" list="product_list_0" class="form-control" type="text" name="products[]" onkeyup="findProduct(0)" style="width: 300px;">
                                  </td>
                                  <td>
                                    <input id="size_0" class="form-control" id="basicInput" name="size[]" type="number" onkeyup="total_product(0)" placeholder="Size" min="1" value="1" style="width: 60px;">
                                  </td>
                                  <td>
                                    <input id="qty_0" class="form-control" id="basicInput" name="qty[]" type="number" onkeyup="total_product(0)" placeholder="QTY" min="1" value="1" style="width: 50px;">
                                  </td>
                                  <td><input id="harga_0" class="form-control" id="basicInput" name="harga[]" type="number" placeholder="Harga"></td>
                                  <td><input id="total_0" class="form-control" id="basicInput" name="total[]" type="number" readonly disabled placeholder="Total"></td>
                                </tr>
                                <tr>
                                    <td colspan="5"><textarea class="form-control" id="basicInput" name="catatan" type="text" placeholder="Catatan" rows="5"></textarea></td>
                                </tr>
                              </tbody>
                            </table>
                            
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" id="basicInput" type="text">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label>No HP</label>
                                    <input class="form-control" name="no_hp" id="basicInput" type="text">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <label>Total</label>
                                    <input class="form-control" name="total_text" id="total_pesanan_text" type="text">
                                    <input class="form-control" name="total" id="total_pesanan" type="hidden">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <label>Uang</label>
                                    <input class="form-control" name="bayar" value="0" onkeyup="hitung_kembalian()"  id="bayar" type="text">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <label>Kembalian</label>
                                    <input class="form-control" name="kembali" id="kembali" type="text">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success"><i class="fa  fa-save"></i> Save</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" style="float: right" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
@section('script')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        var count=1;
        $("#add_row").click(function(){
            $('#table_order tr:last').prev().after('\
            <tr id="row_product'+count+'">\
                <td>\
                    <input id="product_'+count+'" list="product_list_'+count+'" class="form-control type="text" name="products[]" onkeyup="findProduct('+count+')" style="width: 300px;">\
                </td>\
                <td>\
                <input id="size_'+count+'" class="form-control" id="basicInput" type="number" name="size[]" placeholder="Size" onkeyup="total_product('+count+')" min="1" value="1" style="width: 60px;">\
                </td>\
                <td>\
                <input id="qty_'+count+'" class="form-control" id="basicInput" type="number" name="qty[]" placeholder="QTY" onkeyup="total_product('+count+')" min="1" value="1" style="width: 50px;">\
                </td>\
                <td><input id="harga_'+count+'" class="form-control" id="basicInput" type="number" name="harga[]" placeholder="Harga"></td>\
                <td><input id="total_'+count+'" class="form-control" id="basicInput" type="number" name="total[]" readonly disabled placeholder="Total"></td>\
                <td><a class="btn btn-social-icon btn-foursquare" onclick="remove_row('+count+')"><i class="fa  fa-trash-o"></i></a></td>\
            </tr>'
            );
            count++;
        });
        function remove_row(id){
            $('#row_product'+id).remove()
        }
        function findProduct(ref_id){
            var id='product_'+ref_id
            var _text = document.getElementById(id);
            var id_list='product_list_'+ref_id;
            if(_text.value.length>3){
                $('datalist#'+id_list).remove()
                $('#'+id).after('\
                <datalist id="'+id_list+'" >\
                </datalist>\
                ')
                $.ajax({
                    type: 'GET',
                    url: '/products-pos/'+_text.value,
                    success: function (data) {
                       for (let index = 0; index < data.length; index++) {
                        $('datalist#'+id_list).append(
                        '<option value="'+data[index].name+'"> '+data[index].name+' </option>'
                        )
                       }
                       if(data.length==1){
                        //    alert(data[0].harga)
                           $("#harga_"+ref_id+"").val(data[0].harga)
                           total_product(ref_id)
                       }
                    },
                    error: function() { 
                        console.log(data);
                    }
                });
            }
        }
        function total_product(ref_id){
            var size=$('#size_'+ref_id+'').val()
            var harga=$('#harga_'+ref_id+'').val()
            var qty=$('#qty_'+ref_id+'').val()
            total=(harga*size)*qty
            $('#total_'+ref_id+'').val(total)
            var sum = 0;
            $('input[name="total[]"]').each(function(){
                sum += +$(this).val();
            });
            $("#total_pesanan_text").val("Rp. "+sum.toLocaleString());
            $("#total_pesanan").val(sum);
            hitung_kembalian()
        }

        function hitung_kembalian(){
            var total=$("#total_pesanan").val();
            var bayar=$("#bayar").val();
            $("#kembali").val("Rp."+(bayar-total).toLocaleString());
        }
    </script>
@endsection