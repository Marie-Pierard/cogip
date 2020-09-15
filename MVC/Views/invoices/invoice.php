<h1 class="text-center pt-3">COGIP: Invoices List</h1>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice Number</th>
      <th scope="col">Dates</th>
      <th scope="col">Companies</th>
      <th scope="col">Type</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($invoices as $line) : ?>
      <tr>
          <td><a href="/invoices/details/<?= $line->getId() ?>"><?= $line->getNumberInvoice() ?></a></td>
          <td><?= $line->getDate() ?></td>
          <td><a href="/companies/details/<?= $line->getIdCompany() ?>"><?= $line->getCompany()->getName() ?></td>
          <td><?= $line->getCompany()->getType()->getType() ?></td>
          <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/invoices/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete invoice" class="icone"></a></td>
          <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
