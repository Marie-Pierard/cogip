<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $line) : ?>
        <tr>
            <td><?= $line->login ?></td>
            <td><?= $line->email ?></td>
            <td><?= $line->role ?> <a href="/admin/edit/<?= $line->id ?>"><img src="/assets/images/edit.png" alt="Edition du rôle" class="icone"></a></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>