<h1 class="text-center">COGIT: Invoice Details</h1>

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
            <td><?= $company->getCompany()->getName() ?></td>
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
            <td><?= $line->LastName . ' ' . $line->FirstName?></td>
            <td><?= $line->Email ?></td>
            <td><?= $line->Phone ?></td>
        </tr>

    <?php endforeach; ?>

  </tbody>
</table>