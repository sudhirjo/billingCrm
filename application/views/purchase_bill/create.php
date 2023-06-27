<!-- Purchase bill creation form -->
<div class="col-sm-9">
	<h1>Purchase Bill</h1>

      <div class="well">
<form  class="form-horizontal" action="<?php echo site_url('PurchaseBillController/store'); ?>" method="POST">
  <div class="form-group">
    <label for="date">Date:</label>
    <input  class="form-control" type="date" name="date" id="date" required>
	</div>
	<div class="form-group">
    <label for="product_id">Product:</label>
    <select  class="form-control" name="product_id" id="product_id" required>
		<option value=""> Seletct </option>
        <?php foreach ($products as $product): ?>
            <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
        <?php endforeach; ?>
    </select>
	</div>
		<div class="form-group">
    <label for="seller_id">Seller:</label>
    <select  class="form-control" name="seller_id" id="seller_id" required>
		<option value=""> Seletct </option>
        <?php foreach ($sellers as $seller): ?>
            <option value="<?php echo $seller['id']; ?>"><?php echo $seller['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
		<div class="form-group">
    <label for="purchaser_id">Purchaser:</label>
    <select  class="form-control" name="purchaser_id" id="purchaser_id" required>
	<option value=""> Seletct </option>
        <?php foreach ($purchasers as $purchaser): ?>
            <option value="<?php echo $purchaser['id']; ?>"><?php echo $purchaser['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="rate">Rate:</label>
    <input type="text" name="rate" id="rate" required>

    <label for="gst">GST:</label>
    <input type="text" name="gst" id="gst" readonly >

    <label for="total">Total:</label>
    <input type="text" name="total" id="total" readonly>
    <button type="submit" class="btn btn-primary">Create Purchase Bill</button>
	</div>
</form>
<div class="row">
        <div class="col-sm-12">
          <div class="well">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr.</th>
			<th>Date</th>
            <th>Product</th>
			<th>Seller</th>
            <th>Purchaser</th>
            <th>Rate</th>
			<th>Gst</th>
			<th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		if(empty($purchase_billes)){ echo "<tr><th colspan='4' class='text-center'>Data Not Found</th></tr>"; };
		foreach ($purchase_billes as $index => $item): ?>
            <tr>


                <td><?php echo $index + 1; ?></td>
				<td><?php echo date("d-m-Y", strtotime($item['date']));?></td>
				<td><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['seller_name']; ?></td>
				<td><?php echo $item['purchaser_name']; ?></td>
                <td><?php echo $item['rate']; ?></td>
			    <td><?php echo $item['gst']; ?></td>
				<td><?php echo $item['total']; ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

			</div>
		</div>
	</div>
</div>
</div>
<script>
        $(document).ready(function() {
            $('#rate').on('change', function(event) {
                event.preventDefault();
                var product_id = parseFloat($('#product_id').val());
				 var rate = parseFloat($('#rate').val());
                $.ajax({
                    url: '<?php echo base_url("PurchaseBillController/get_product_data"); ?>',
					type: 'post',
					data: {product_id:product_id},
                    dataType: 'json',
                    success: function(response) {
                        // Update the GST and Total fields with the calculated values
                        $('#gst').val(response.gst.toFixed(2));
                        $('#total').val((rate + response.gst).toFixed(2));
                    }
                });
            });
        });
</script>
</body>
</html>