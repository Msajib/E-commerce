//$(document).ready(function () {
//		
//			
//			var $invoice_items = $('#productinfo');
//
//	
//					
//
//            $("#product").select2({
//                theme: "bootstrap"
//            });
//			
//
//            $("#customer_id").select2({
//                theme: "bootstrap"
//            });
//			
//			
//			var rowNum = 0;
//			$('#blank-add').on('click', function(){
//				rowNum++;
//				$invoice_items.find('tbody')
//					.append(
//					'<tr>\n\
//                                                <td><input type="text" class="form-control" required name="product[]" id="i_' + rowNum + '"/></td> \n\\n\
//                                                    <td style="text-align: center !important;"> <input type="text" class="form-control" required name="type[]" id="i_' + rowNum + '"/> </td>' +
//						'<td><input type="number"  name="qty[]"  class="number per_product_price" onkeyup="total_products_price('+rowNum+')" id="total_qty_' + rowNum + '"></td> ' +
//						'<td><input type="number" name="price[] "  class="number per_product_price" onkeyup="total_products_price('+rowNum+')"  id="per_price_' + rowNum + '" ></td> ' +
//						'<td class="ltotal"><input  id="total_product_price_' + rowNum + '" type="text"  class=" number total_per_product" readonly ></td>' +
//						'</tr>'
//
//				);
//
//				item_remove.show();
//				
//				
//							$(".product").select2({
//								theme: "bootstrap"
//							});
//			});
//			
//			$("#t_cost, #advance_payment, #l_cost").keyup(function (e) {
//                //if the letter is not digit then display error and don't type anything
//                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//                    //display error message
//                    return false;
//                }
//				total_price();
//            });
//			
//			
//		
//			
//			});
//			
//				
//var maxRow, total, subtotal;
//
//function total_products_price(row_num) {
//
//    var qty = $("#total_qty_"+row_num).val();
//    var price = $("#per_price_"+row_num).val();
//
//    var total_per_product = qty*price;
//
//    $("#total_product_price_"+row_num).val(total_per_product);
//   // console.log("total_per_product: "+total_per_product+" Quantity: "+qty+" Per price: "+price);
//    maxRow = $("#last_row").val();
//
//    if(maxRow < row_num){
//        $("#last_row").val(row_num);
//    }
//    total_price();
//}
//
//function total_price() {
//    total = 0;
//    var per_product =0;
//    maxRow = parseInt($("#last_row").val());
//
//    var t_cost = $('#t_cost').val();
//    var advance_payment = $('#advance_payment').val();
//    var l_cost = $('#l_cost').val();
//
//
//
//    t_cost==''?t_cost=0:t_cost=parseFloat(t_cost);
//    l_cost==''?l_cost=0:l_cost=parseFloat(l_cost);
//    advance_payment==''?advance_payment=0:advance_payment=parseFloat(advance_payment);
//
//
//   // console.log("delivery_charge: "+delivery_charge);
//    for(var i=0; i<=maxRow;i++)
//    {
//        per_product = parseFloat($("#total_product_price_"+i).val());
//
//        total+=per_product;
//
//        //$("#total_amount").val(total);
//      //  console.log("Total: "+total);
//    }
//
//
//    total=total+t_cost+l_cost;
//	
//    due_amount=total-advance_payment;
//	
//	if(advance_payment!='null')
//		$('#due_amount').val(parseFloat(due_amount));
//	
//	
//    $('#total').val(parseFloat(total));
//}
