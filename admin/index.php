<?php

if (!defined('ABSPATH')) die;
?>

<div id="goa-booking" class="goa-booking">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col">
                <h1 class="text-center"><?php echo get_admin_page_title(); ?></h1>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Agents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-between">
                <h2 class="text-center">Agents</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddAgent">
                    <i class="bi bi-plus"></i><span><?php _e('Add Agent', 'goa-booking'); ?></span>
                </button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <table id="goa_booking_add_agent_table" class="table table-striped table-sm align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Login</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Name</td>
                            <td>Last</td>
                            <td>example</td>
                            <td>+38093123142</td>
                            <td>examplelogiin</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteAgent">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Name</td>
                            <td>Last</td>
                            <td>example</td>
                            <td>+38093123142</td>
                            <td>examplelogiin</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteAgent">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Name</td>
                            <td>Last</td>
                            <td>example</td>
                            <td>+38093123142</td>
                            <td>examplelogiin</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteAgent">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <!-- Modals -->
    <div class="modal fade" id="modalAddAgent" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5"><?php _e('Create New Agent', 'goa-booking'); ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="agent_login" class="form-label"><?php _e('Login', 'goa-booking'); ?></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input id="agent_login" class="form-control" type="text" name="login" placeholder="<?php _e('example', 'goa-booking'); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="agent_password" class="form-label"><?php _e('Password', 'goa-booking'); ?></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input id="agent_password" class="form-control" type="password" name="password" placeholder="********">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="agent_repeat_password" class="form-label"><?php _e('Repeat Password', 'goa-booking'); ?></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input id="agent_repeat_password" class="form-control" type="password" name="re_password" placeholder="********">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="agent_email" class="form-label"><?php _e('Email', 'goa-booking'); ?></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-at"></i></span>
                                <input id="agent_email" class="form-control" type="email" name="email" placeholder="example@mail.com">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="agent_first_name" class="form-label"><?php _e('First Name', 'goa-booking'); ?></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-add"></i></span>
                                <input id="agent_first_name" class="form-control" type="text" name="first_name" placeholder="<?php _e('Alex', 'goa-booking'); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="agent_last_name" class="form-label"><?php _e('Last Name', 'goa-booking'); ?></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-add"></i></span>
                                <input id="agent_last_name" class="form-control" type="text" name="last_name" placeholder="<?php _e('Chizas', 'goa-booking'); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="agent_phone" class="form-label"><?php _e('Phone', 'goa-booking'); ?></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                <input id="agent_phone" class="form-control" type="text" name="phone" placeholder="+380 (99) 99 99 999">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php _e('Close', 'goa-booking'); ?></button>
                    <button type="button" class="btn btn-primary"><span><?php _e('Add', 'goa-booking'); ?></span></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDeleteAgent" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5"><?php _e('Delete Agent: ', 'goa-booking'); ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p><?php _e('Do you really want to delete this agent?', 'goa-booking'); ?></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php _e('Close', 'goa-booking'); ?></button>
                    <button type="button" class="btn btn-danger"><span><?php _e('Delete', 'goa-booking'); ?></span></button>
                </div>
            </div>
        </div>
    </div>

</div>