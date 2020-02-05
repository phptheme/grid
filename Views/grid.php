<?php if($headers):?>

    <thead>

        <tr>
            <?php foreach($headers as $tag):?>

                <?= $tag;?>

            <?php endforeach;?>

        </tr>

    </thead>

<?php endif;?>

<tbody>

    <?php foreach($items as $rows):?>

        <tr>

            <?php foreach($rows as $cell):?>

                <?= $cell;?>

            <?php endforeach;?>

        </tr>

    <?php endforeach;?>

</tbody>