<h1 class="text-center pt-3">COGIT: Contacts Directory</h1>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Company</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>

    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $line) : ?>
        <tr>
            <td><a href="/contacts/details/<?= $line->getId() ?>"><?= $line->getFirstName()," ", $line->getLastName() ?></a></td>
            <td><?= $line->getPhone() ?></td>
            <td><?= $line->getEmail() ?></td>
            <td><?= $line->getCompany()->getName() ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/contacts/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete contact" class="icone"></a></td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>