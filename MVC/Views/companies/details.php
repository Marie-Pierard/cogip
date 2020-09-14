<h1>Company : <?= $company->getName() ?></h1>

<table>
    <tr>
        <td>TVA</td>
        <td class="pl-2 pr-2">:</td>
        <td><?= $company->getTva() ?></td>
    </tr>
    <tr>
        <td>Type</td>
        <td class="pl-2 pr-2">:</td>
        <td><?= $company->getType()->getType() ?></td>
    </tr>
</table>

<h5 class="mt-3">Contact persons</h5>

<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($contacts as $line) : ?>
        <tr>
            <td><a href="/contacts/details/<?= $line->id ?>"><?= $line->LastName . ' ' . $line->FirstName?></a></td>
            <td><?= $line->Phone ?></td>
            <td><?= $line->Email ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h5 class="mt-3">Invoices</h5>

<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice Number</th>
      <th scope="col">Date</th>
      <th scope="col">Contact person</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($invoice as $line) : ?>
        <tr>
            <td><a href="/invoices/details/<?= $line->id ?>"><?= $line->NumberInvoice?></a></td>
            <td><?= $line->date ?></td>
            <td><?= $contacts->LastName ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
