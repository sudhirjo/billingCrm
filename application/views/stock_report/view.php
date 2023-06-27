<div class="col-sm-9">
	<h1>Stock Report</h1>

  <div class="well">
    <form action="<?php echo site_url('ReportController/view_stock_report'); ?>" method="POST">
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
            <th>Qty</th>
            <th>Product</th>
            <th>Opening</th>
            <th>Purchase</th>
            <th>Sale</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
	
        <?php
				if(empty($stockReport)){ echo "<tr><th colspan='7' class='text-center'>Data Not Found</th></tr>"; };

		foreach ($stockReport as $index => $item): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $item['qty']; ?></td>
                <td><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['opening']; ?></td>
                <td><?php echo $item['total_purchase']; ?></td>
                <td><?php echo $item['total_sale']; ?></td>
                <td><?php echo $item['stock']; ?></td>
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