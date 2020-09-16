<h1 class="text-primary text-center pt-3">Welcome to the COGIP</h1>

<h3>Welcome <?= isset($_SESSION['user']['login']) ? $_SESSION['user']['login'] : '' ?>!</h3>
<h5>What would you like to do today?</h5>

<div class="d-flex justify-content-center">
  <a class="btn btn-secondary m-2 mr-5 border-dark" href="/invoices/add">+ New Invoice</a>
  <a class="btn btn-secondary m-2 mr-5 border-dark" href="/contacts/add">+ New Contact</a>
  <a class="btn btn-secondary m-2 border-dark" href="/companies/add">+ New Company</a>
</div>

<h5 class="text-secondary mt-5">5 Last Invoices</h5>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice number</th>
      <th scope="col">Dates</th>
      <th scope="col">Company</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($invoice as $line) : ?>
        <tr>
            <td class="font-weight-bold"><a href="/invoices/details/<?= $line->getId() ?>"><?= $line->getNumberInvoice() ?></a></td>
            <td><?= $line->getDate() ?></td>
            <td class="font-weight-bold"><a href="/companies/details/<?= $line->getCompany()->getId() ?>"><?= $line->getCompany()->getName() ?></a></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/invoices/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete invoice" class="icone"></a></td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h5 class="text-secondary mt-5">5 Last Contacts</h5>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Company</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($contact as $line) : ?>
        <tr>
            <td class="font-weight-bold"><a href="/contacts/details/<?= $line->getId() ?>"><?= $line->getFirstName() . ' ' . $line->getLastName() ?></a></td>
            <td><?= $line->getEmail() ?></td>
            <td><?= $line->getPhone() ?></td>
            <td class="font-weight-bold"><a href="/companies/details/<?= $line->getCompany()->getId() ?>"><?= $line->getCompany()->getName() ?></a></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/contacts/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete invoice" class="icone"></a></td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h5 class="text-secondary mt-5">5 Last Companies</h5>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">VAT No</th>
      <th scope="col">Country</th>
      <th scope="col">Type</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($company as $line) : ?>
        <tr>
            <td class="font-weight-bold"><a href="/companies/details/<?= $line->getId() ?>"><?= $line->getName() ?></a></td>
            <td><?= $line->getTva() ?></td>
            <td><?= $line->getCountry()->getCountry() ?></td>
            <td><?= $line->getType()->getType() ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/companies/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete company" class="icone"></a></td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>