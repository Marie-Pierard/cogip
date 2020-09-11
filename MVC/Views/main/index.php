<h1>Welcome to COGIP</h1>

<h3>Bonjour <?= isset($_SESSION['user']['login']) ? $_SESSION['user']['login'] : '' ?>!</h3>

<h5 class="mt-5">5 Last Invoice</h5>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice number</th>
      <th scope="col">Dates</th>
      <th scope="col">Company</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($invoice as $line) : ?>
        <tr>
            <td><?= $line->getNumberInvoice() ?></td>
            <td><?= $line->getDate() ?></td>
            <td><?= $line->getCompany()->getName() ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- <?php var_dump($contact); ?>
<?php var_dump($company); ?> -->
