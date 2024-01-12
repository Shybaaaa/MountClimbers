<?php

$sql = "SELECT * FROM logs order by logs_id desc";
$stmt = $db->prepare($sql);
$stmt->execute();

$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="flex items-center justify-center table-auto">
    <div class="mt-6 bg-white w-full overflow-x-hidden rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 py-2 px-2 uppercase border-b bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Type</th>
                <th scope="col" class="px-6 py-3">Message</th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($logs as $id => $log): ?>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                        <?= $log["logs_date"] ?>
                    </th>
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <?= $log["logs_type"] ?>
                    </th>
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <?= $log["logs_message"] ?>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>