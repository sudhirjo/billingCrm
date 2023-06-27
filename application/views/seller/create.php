<div class="col-sm-9">
	<h1>Seller</h1>

      <div class="well">
    <form action="<?php echo site_url('SellerController/store'); ?>" method="POST">
    <label for="name">Seller Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="gstin">Seller GST :</label>
    <input type="text" name="gstin" id="gstin" required>

    <label for="address">Address :</label>
    <input type="text" name="address" id="address" required>

    <button type="submit" class="btn btn-primary"> Create Seller </button>
</form>
</div>

<div class="row">
        <div class="col-sm-12">
          <div class="well">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr.</th>
            <th>Seller</th>
            <th>Address</th>
            <th>GST</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		//print_r($sellerList);die;
		if(empty($sellerList)){ echo "<tr><th colspan='4' class='text-center'>Data Not Found</th></tr>"; };
		foreach ($sellerList as $index => $item): ?>
            <tr>


                <td><?php echo $index + 1; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['address']; ?></td>
                <td><?php echo $item['gstin']; ?></td>
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
