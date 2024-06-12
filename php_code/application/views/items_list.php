<?php if (empty($items)): ?>
    <li>No items found</li>
<?php else: ?>
    <?php foreach ($items as $item): ?>
        <li>
            <?= $item->name ?> - <?= $item->category_name ?> - <?= $item->status ?> - <?= $item->created_at ?>
            <button class="delete-item" data-id="<?= $item->id ?>">Delete</button>
            <button class="mark-purchased" data-id="<?= $item->id ?>">Mark as Purchased</button>
        </li>
    <?php endforeach; ?>
    <script>
        $('.delete-item').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'shoppinglist/delete_item/' + id,
                success: function(data) {
                    location.reload();
                }
            });
        });

        $('.mark-purchased').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'shoppinglist/mark_as_purchased/' + id,
                success: function(data) {
                    location.reload();
                }
            });
        });
    </script>
<?php endif; ?>