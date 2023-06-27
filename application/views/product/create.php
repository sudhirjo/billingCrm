<div class="col-sm-9">
	<h1>Product</h1>

      <div class="well">
    <form action="<?php echo site_url('ProductController/store'); ?>" method="POST">
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="code">Product Code:</label>
    <input type="text" name="code" id="code" required>

    <label for="gst_rate">Applicable GST Rate:</label>
    <input type="text" name="gst_rate" id="gst_rate" required>

    <button type="submit" class="btn btn-primary" > Create Product </button>
</form>
</div>

<div class="row">
        <div class="col-sm-12">
          <div class="well">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr.</th>
            <th>Product</th>
            <th>Code</th>
            <th>GST Rate</th>
        </tr>
    </thead>
    <tbody>
        <?php 
			if(empty($productList)){ echo "<tr><th colspan='4' class='text-center'>Data Not Found</th></tr>"; };
		//print_r($productList);die;
		foreach ($productList as $index => $item): ?>
            <tr>


                <td><?php echo $index + 1; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['code']; ?></td>
                <td><?php echo $item['gst_rate']; ?></td>
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
