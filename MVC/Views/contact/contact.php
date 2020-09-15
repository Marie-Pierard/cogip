<h1 class="text-center pt-3git ">COGIT: Contacts Directory</h1>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Company</th>


    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $line) : ?>
        <tr>
            <td><a href="/contacts/details/<?= $line->getId() ?>"><?= $line->getFirstName()," ", $line->getLastName() ?></a></td>
            <td><?= $line->getPhone() ?></td>
            <td><?= $line->getEmail() ?></td>
            <td><?= $line->getCompany()->getName() ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>