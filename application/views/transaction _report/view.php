<div class="col-sm-9">
	<h1>Transaction Report</h1>

  <div class="well">
    <form action="<?php echo site_url('ReportController/view_transaction_report'); ?>" method="POST">
    <label for="from_date">From Date:</label>
    <input  class="form-control" type="date" name="from_date" id="from_date">

    <label for="gstin">To Date :</label>
    <input  class="form-control" type="date" name="to_date" id="to_date">

    <label for="product_id">Product:</label>
    <select  class="form-control" name="product_id" id="product_id">
		<option value=""> Seletct </option>
        <?php foreach ($products as $product): ?>
            <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
        <?php endforeach; ?>
    </select>
	
	
    <label for="type">Type:</label>
    <select  class="form-control" name="type" id="type">
		<option value="">select Type </option>
		<option value="purchase"> Purchase </option>
		<option value="seller"> Seller </option>
    </select>
<br>
    <button type="submit" class="btn btn-primary"> Search </button>	
</form>

</div>

<div class="row">
        <div class="col-sm-12">
          <div class="well">
<table class="table table-bordered">
    <thead>
        <tr>
      <th>Sr.</th>
      <th>Date</th>
      <th>Seller</th>
      <th>Buyer</th>
      <th>Type</th>
      <th>Qty</th>
      <th>Rate</th>
      <th>Amt.</th>
      <th>GST</th>
      <th>Total</th>
        </tr>
    </thead>
    <tbody>
	
        <?php
		if(empty($stockReport)){ echo "<tr><th colspan='10' class='text-center'>Data Not Found</th></tr>"; };
		foreach ($stockReport as $index => $item): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
				<td><?php echo date("d-m-Y", strtotime($item['bill_date']));?></td>
                <td><?php echo $item['seller']; ?></td>
                <td><?php echo $item['buyer']; ?></td>
                <td><?php echo $item['type']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['rate']; ?></td>
                <td><?php echo $item['amount']; ?></td>
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

</body>
</html>