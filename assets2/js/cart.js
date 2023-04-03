$(document).ready(function(){


    let $deal_price = $("#deal_price");

  $(".plus").click(function(){
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
    // console.log($price.text());
    $.ajax({url:"../handler/ajax.php",type:'post',data:{product_id: $(this).data("id")},success: function(result){
        let objPrice=JSON.parse(result);
        let item_price=objPrice['price'];
        // console.log($input.val());
        if($input.val() >= 1 && $input.val()<=10 ){
          $input.val(function(i, oldval){
              return ++oldval;
          });
        }
        $price.text(parseInt(item_price * $input.val()).toFixed(2));
       

        let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
            $deal_price.text(subtotal.toFixed(2));  
    
     }

    
    })
  
  
   
  });

  $(".minus").click(function(){
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
    // console.log($price.text());
    $.ajax({url:"../handler/ajax.php",type:'post',data:{product_id: $(this).data("id")},success: function(result){
        let objPrice=JSON.parse(result);
        let item_price=objPrice['price'];

        if($input.val() > 1 ){
            $input.val(function(i, oldval){
                return --oldval;
            });
        $price.text(parseInt(item_price * $input.val()).toFixed(2));

        let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
            $deal_price.text(subtotal.toFixed(2));
        }

    //   console.log(item_price);  
     }

    
    })
  
  
   
  });

  $(".delete-btn").click(function(){
         
          
                // event.preventDefault();
                       
                 var product_id=$(this).data("id");
               
          // if(confirm("do you realy want to delete this record")){

          
          var product_id=$(this).data("id");
          var user_id=$(this).data("userid");
          // const record = $(`.record[data-userid="${user_id}"][data-id="${product_id}"]`);
          const record = $(`.row[data-record="${user_id}"][data-id="${product_id}"]`);
          
           var element=this;
          
          $.ajax({url:"../handler/deleteFromCart.php",
              type:'post',
              data:{product_id: $(this).data("id"),user_id:user_id},
              success: function(data){
                if (data === 'Record deleted successfully') {
                  record.remove();
                  location.reload();
                } else {
                  alert('Error deleting record');
                }
          }
      
        })
      // }
      })



});

  //  $('.qty_input').prop('defaultValue' );

                //     let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
                //         //    $input=$('.qty_input').val();
                //     let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
                //     // console.log($price);
                //     $('.product_price').each(function(){
                //         // console.log(this.index);
                //         $.ajax({url:"handler/ajax.php",type:'post',data:{product_id: $(this).data("id")},success: function(data){
                //          let objPrice=JSON.parse(data);
                //         // console.log(data);
                //         let item_price=objPrice['price'];
                //     //      $input=$('.qty_input');
                    
                //         // console.log( item_price);
                //         console.log( $input);

                //         if($input.val() >= 1 && $input.val()<=10 ){
                //         $input.val(function(i, oldval){
                //             return ++oldval;
                //         });
                //      }


                //       $price.text(parseInt(item_price * $input.val()).toFixed(2));
                // //    console.log($price.text(parseInt(item_price * $input.val()).toFixed(2)));

                //     }
                //     });
                 
                // });


                    //     $input=$('.qty_input').val();
                    //    console.log($input);
                
                    //     $price=$('.product_price');


                    //     console.log($price);
                        
                        //    $price.each()
                    //    $price.text(parseInt(parseInt($price.text()) * $input).toFixed(2));
                     
                    //    console.log($price);




