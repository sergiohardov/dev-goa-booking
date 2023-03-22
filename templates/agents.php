<tr class="agent-table__item">
    <th class="agent-table__item-id"><?php echo $data->id; ?></th>
    <td><?php echo $data->first_name; ?></td>
    <td><?php echo $data->last_name; ?></td>
    <td><?php echo $data->email; ?></td>
    <td><?php echo $data->phone; ?></td>
    <td class="agent-table__item-login"><?php echo $data->login; ?></td>
    <td>
        <button type="button" class="agent_delete_btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteAgent">
            <i class="bi bi-trash"></i>
        </button>
    </td>
</tr>