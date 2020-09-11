<h1 class="text-center">COGIT: Invoices List</h1>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice Number</th>
      <th scope="col">Dates</th>
      <th scope="col">Companies</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($invoices as $line) : ?>
      <tr>
          <td><?= $line->getNumberInvoice() ?></td>
          <td><?= $line->getDate() ?></td>
          <td><?= $line->getCompany()->getName() ?></td>
          <td><?= $line->getCompany()->getType()->getType() ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>