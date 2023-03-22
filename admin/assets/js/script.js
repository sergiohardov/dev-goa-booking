"use strict";

const goa_booking_app = document.querySelector("#goa-booking");

const goa_booking_agents_table = {
  table: document.querySelector(".agent-table"),
  btn_add: document.querySelector(".agent_add_btn"),
  btns_delete: document.querySelectorAll(".agent_delete_btn"),
  btn_delete_confirm: document.querySelector(".agent_delete_btn_confirm"),
  btn_delete_discard: document.querySelector(".agent_delete_btn_discard"),
  modal_delete: document.querySelector("#modalDeleteAgent"),
  data_add: {},
  data_delete: {},
  init: function () {
    this.btn_add.addEventListener("click", this.add_agent.bind(this));

    this.btns_delete.forEach((btn) => {
      btn.addEventListener("click", this.delete_agent.bind(this));
    });

    this.btn_delete_confirm.addEventListener(
      "click",
      this.confirm_delete.bind(this)
    );
  },
  add_agent: function () {
    // Собрать все поля с формы
    // Вытащить в цикле их значения
    // Добавление значений в обьект
    this.data_add.name = "Alex";
    this.data_add.last = "Chizas";

    // Отправка на сервер и получение ответа
    const response = this.send_add(this.data_add);

    // Условная обработка
    if (response.status) {
      // Если статус true добавляем строку
      this.add_row(response.html);
    } else {
      // Если статус false консолим response и думаем логику
    }
  },
  delete_agent: function (e) {
    const deleteBtn = e.currentTarget;
    const tr = deleteBtn.closest("tr");

    this.data_delete.row = tr;
    this.data_delete.id = tr.querySelector(".agent-table__item-id").innerText;
    this.data_delete.login = tr.querySelector(
      ".agent-table__item-login"
    ).innerText;

    this.modal_delete.querySelector(
      ".modal-title"
    ).innerHTML += `<u>${this.data_delete.login}</u>`;
  },
  confirm_delete: function () {
    const result = this.send_delete(this.data_delete);

    if (result.status) {
      this.delete_row(this.data_delete.row);
    }
  },
  send_add: function (dataAdd) {
    const result = {
      status: true,
      html: `
            <tr class="agent-table__item">
                <th class="agent-table__item-id">Example id</th>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td class="agent-table__item-login">examplelogin</td>
                <td>
                    <button type="button" class="agent_delete_btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteAgent">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        `,
    };

    return result;
  },
  send_delete: function (dataDelete) {
    let request = {
      status: true,
    };
    return request;
  },
  add_row: function (html) {
    const elTable = document.createElement("table");
    const elTbody = document.createElement("tbody");

    elTable.appendChild(elTbody);
    elTbody.innerHTML = html;

    const deleteBtn = elTbody.querySelector(".agent_delete_btn");
    deleteBtn.addEventListener("click", this.delete_agent.bind(this));

    this.table.querySelector("tbody").append(elTbody.querySelector("tr"));
  },
  delete_row: function (row) {
    this.modal_delete.querySelector(".btn-close").click();
    row.remove();
    this.modal_delete.querySelector("u").remove();
  },
};

goa_booking_agents_table.init();
