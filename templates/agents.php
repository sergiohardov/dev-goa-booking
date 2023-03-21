<tr>
    <th scope="row"><?php echo $data->id; ?></th>
    <td><?php echo $data->first_name; ?></td>
    <td><?php echo $data->last_name; ?></td>
    <td><?php echo $data->email; ?></td>
    <td><?php echo $data->phone; ?></td>
    <td><?php echo $data->login; ?></td>
    <td>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteAgent">
            <i class="bi bi-trash"></i>
        </button>
    </td>
</tr>