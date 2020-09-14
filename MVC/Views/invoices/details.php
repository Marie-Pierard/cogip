<h1 class="text-center">COGIT: Invoice Details</h1></br>

<h2 class="text-center">Invoice: <?= $company->getNumberInvoice()?></h2></br>

<table class="table mt-3">
  <h3>Company linked to the invoice</h3>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Tva</th>
      <th scope="col">Company Type</th>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td><a href="/company/details/<?= $company->getCompany()->getId() ?>"><?= $company->getCompany()->getName() ?></a></td>
            <td><?= $company->getCompany()->getTva() ?></td>
            <td><?= $company->getCompany()->getType()->getType() ?></td>
        </tr>

  </tbody>
</table>

<table class="table mt-3">
  <h3>Contact</h3>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email </th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($contacts as $line) : ?>
        <tr>
            <td><a href="/contacts/details/<?= $line->id ?>"><?= $line->LastName . ' ' . $line->FirstName?></a></td>
            <td><?= $line->Email ?></td>
            <td><?= $line->Phone ?></td>
        </tr>

    <?php endforeach; ?>

  </tbody>
</table>