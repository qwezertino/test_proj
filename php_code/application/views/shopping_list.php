<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Shopping List</h1>
	<form id="add-category-form">
		<input type="text" name="category_name" placeholder="New Category Name" required>
		<button type="submit">Add Category</button>
	</form>
	<br/>
    <form id="add-item-form">
        <input type="text" name="name" placeholder="Item name" required>
        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Add Item</button>
    </form>
	<br/>
	<form id="filter-form">
		<select name="category_id">
			<option value="">All Categories</option>
			<?php foreach ($categories as $category): ?>
				<option value="<?= $category->id ?>"><?= $category->name ?></option>
			<?php endforeach; ?>
		</select>
		<select name="status">
			<option value="">All Statuses</option>
			<option value="purchased">Purchased</option>
			<option value="not_purchased">Not Purchased</option>
		</select>
		<button type="submit">Filter</button>
	</form>
    <h2>Items</h2>

    <ul id="items-list"></ul>

    <script>
		function fetchItems() {
			var formData = $('#filter-form').serialize();
			$.ajax({
				url: 'shoppinglist/fetch_items',
				type: 'GET',
				data: formData,
				success: function(data) {
					console.log(data)
					$('#items-list').html(data);
				}
			});
		}

		$(document).ready(function() {
			fetchItems();
		});

		$('#filter-form').on('submit', function(e) {
			e.preventDefault();
			fetchItems();
		});

		$('#add-category-form').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				url: 'shoppinglist/add_category',
				type: 'POST',
				data: $(this).serialize(),
				success: function(data) {
					location.reload();
				}
			});
		});
        $('#add-item-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'shoppinglist/add_item',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    location.reload();
                }
            });
        });


    </script>
</body>
</html>
