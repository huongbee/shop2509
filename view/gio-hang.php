<style>
.tongtien{
  color:blue
}
td[class^="gia-"]{
  font-weight:bold
}
</style>
<div class="page-container">
  <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-reservation">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Giỏ hàng của bạn</div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
        <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">Just a few click to make the reservation online for saving your time and money</div>
      </div>
    </div>
  </div>
  <div class="page-content-wrapper">
    <section class="section-reservation-form padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="section-content">
			<?php
			if($data->totalPrice==0){
				echo '<div class="swin-sc swin-sc-title style-2">
				<h3 class="title"><span>Giỏ hàng rỗng</span></h3>
			  </div>';
			}
			else{

				?>
			<div class="swin-sc swin-sc-title style-2">
				<h3 class="title"><span>Chi tiết giỏ hàng</span></h3>
			</div>
			<div class="reservation-form">
				<div class="swin-sc swin-sc-contact-form light mtl">
				<table class="table table-striped" style="text-align: center;">
					<thead>
						<tr>
						<th width="30%" style="text-align: center;">Product</th>
						<th width="20%" style="text-align: center;">Price</th>
						<th width="20%" style="text-align: center;">Qty.</th>
						<th width="20%" style="text-align: center;">Total</th>
						<th width="10%" style="text-align: center;">Remove</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($data->items as $idSP => $sanpham):?>
						<tr class="sanpham-<?=$idSP?>">
						<td>
							<img src="public/source/assets/images/hinh_mon_an/<?=$sanpham['item']->image?>" width="150px">
							<p><br><b><?=$sanpham['item']->name?></b></p>
						</td>
						<td><?=number_format($sanpham['item']->price)?></td>
						<td>
						<select name="product-qty" id="product-qty" class="form-control soluongSP" dataID="<?=$idSP?>" width="50">
							<?php for($i=1; $i<8; $i++):?>
							<option value="<?=$i?>" <?= $i==$sanpham['qty'] ? "selected" : ''?> ><?=$i?></option>
							<?php endfor?>
						</select>
						</td>
						<td class="gia-<?=$idSP?>"><?=number_format($sanpham['price'])?> vnd</td>
						<td>
							<a dataId="<?=$idSP?>" class="remove" title="Remove this item">
							<i class="fa fa-trash-o fa-2x"></i></a>
						</td>
						</tr>
					<?php endforeach?>
					<tr>
						<td colspan="3"><h3>Tổng tiền:</h3></td>
						<td colspan="2"><h3 class="tongtien"><?=number_format($data->totalPrice)?> vnđ</h3></td>
					</tr>
					</tbody>
				</table>    
				</div>
				<div class="swin-sc swin-sc-contact-form light mtl style-full">
				<div class="swin-sc swin-sc-title style-2">
					<h3 class="title"><span>Đặt hàng</span></h3>
				</div>
				<form method="POST" action="checkout.php">
					<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-user"></i></div>
						<input type="text" placeholder="Fullname" class="form-control" name="fullname">
					</div>
					</div>
					<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
						<input type="text" placeholder="Email" class="form-control" name="email">
					</div>
					</div>
					<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
						<div class="fa fa-map-marker"></div>
						</div>
						<input type="text" placeholder="Address" class="form-control" name="address">
					</div>
					</div>
					<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
						<div class="fa fa-phone"></div>
						</div>
						<input type="text" placeholder="Phone" class="form-control" name="phone" required>
					</div>
					</div>

					<div class="form-group">
					<textarea placeholder="Message" class="form-control" name="message"></textarea>
					</div>
					<div class="form-group">
					<div class="swin-btn-wrap center">
						<button type="submit" class="swin-btn center form-submit" name="btnCheckout">Gửi đơn hàng</button>			
					</div>
					</div>
				</form>
				</div>
				</div>
			<?php }?>
		
		</div>
      </div>
    </section>
    <section data-bottom-top="background-position: 50% 100px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" class="section-reservation-service padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="section-content">
          <div class="swin-sc swin-sc-title style-2 light">
            <h3 class="title"><span>Fooday Best Service</span></h3>
          </div>
          <div class="swin-sc swin-sc-iconbox light">
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="item icon-box-02 wow fadeInUpShort">
                  <div class="wrapper-icon"><i class="icons swin-icon-dish"></i><span class="number">1</span></div>
                  <h4 class="title">Reservation</h4>
                  <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div data-wow-delay="0.5s" class="item icon-box-02 wow fadeInUpShort">
                  <div class="wrapper-icon"><i class="icons swin-icon-dinner-2"></i><span class="number">2</span></div>
                  <h4 class="title">Private Event</h4>
                  <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div data-wow-delay="1s" class="item icon-box-02 wow fadeInUpShort">
                  <div class="wrapper-icon"><i class="icons swin-icon-browser"></i><span class="number">3</span></div>
                  <h4 class="title">Online Order</h4>
                  <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div data-wow-delay="1.5s" class="item icon-box-02 wow fadeInUpShort">
                  <div class="wrapper-icon"><i class="icons swin-icon-delivery"></i><span class="number">4</span></div>
                  <h4 class="title">Fast Delivery</h4>
                  <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div id="deleteCartModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Bạn có chắc chắn muốn xoá hay không?</p>
      </div>
      <div class="modal-footer">
	  	<button type="button" class="btn btn-success btnAccept">OK</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancer</button>
      </div>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){
$('.soluongSP').change(function(){
    var soluong = $(this).val();
    var idSP = $(this).attr('dataID')
    console.log(soluong,idSP);
    $.ajax({
      url:"cart.php",
      data:{
        qty:soluong,
        id:idSP,
        action:"update"
      },
      type:"POST",
      dataType:"JSON",
      success:function(data){
        $('.gia-'+idSP).html(data.giaSp)
        $('.tongtien').html(data.tongDongia)
      },
      error:function(){
          console.log('errrr')
      }
    })
})

$('.remove').click(function(){
	
	$('#deleteCartModal').modal('show')
	var id = $(this).attr('dataId');

	$('.btnAccept').click(function(){
		if(id!=''){
			$.ajax({
			 	url:"cart.php",
			 	data:{
				 	id:id,
				 	action: "delete"
				},
			 	type:"POST",
				success:function(data){
					if(data==0){
						$('.section-content').html('<div class="swin-sc swin-sc-title style-2"><h3 class="title"><span>Giỏ hàng rỗng</span></h3></div>')
					}
					else{
						//console.log(data)
						$('#deleteCartModal').modal('hide')
						console.log($('.sanpham-'+id))
						$('.sanpham-'+id).hide(500);
						$('.tongtien').html(data+" vnđ")
						id = ''
					}
				},
				error:function(){
					console.log('err')
				}
			})		
			
		}
		

	})
  	
})
})
</script>