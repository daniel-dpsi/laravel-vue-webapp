<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="fetchOrders"
        />
        <q-toolbar-title> Orders </q-toolbar-title>
        <div>Connection status: Online</div>
      </q-toolbar>
    </q-header>

    <div class="row justify-end q-pt-md">
      <q-btn
        size="lg"
        class="full-width"
        color="blue"
        label="Submit"
        @click="addUser"
      />
    </div>

    <div class="q-pa-md">
      <q-table title="Panel" :rows="rows" :columns="columns" row-key="name">
        <template v-slot:header="props">
          <q-tr :props="props">
            <q-th auto-width />

            <q-th v-for="order in orders" :key="order.id">
              <q-btn
                size="me"
                color="accent"
                dense
                label="Sprejmi"
                @click="changeStatus"
              />
              <div class="q-mx-xl">
                <p>Order number: #{{ order.id }}</p>
              </div>
            </q-th>
            <q-td auto-width> </q-td>
          </q-tr>
        </template>

        <template v-slot:body="props">
          <q-tr :props="props">
            <q-td auto-width> </q-td>
            <q-td v-for="order in orders" :key="order.id">
              {{ order.id }} <br />
              {{ order.Date_of_submission }} <br />
              {{ order.Status }} <br />
              {{ order.Content }} <br />
            </q-td>
          </q-tr>
        </template>
      </q-table>
    </div>

    <q-footer>
      <q-toolbar>
        <q-toolbar-title>Footer</q-toolbar-title>
      </q-toolbar>
    </q-footer>
  </q-layout>
</template>

<script>
import axios from "axios";

const columns = [
  {
    name: "",
  },
];

const rows = [
  {
    name: "",
  },
];

export default {
  setup() {
    return {
      columns,
      rows,
    };
  },

  data: function () {
    return {
      orders: [],
    };
  },

  methods: {
    fetchOrders: function () {
      try {
        axios
          .get("http://127.0.0.1:8000/api/orders")

          .then((response) => {
            this.orders = response.data;
            console.log(response);
          })
          .catch((error) => {
            console.log(error);
          });
      } catch (error) {
        console.log(error); // V kolikor je povezava ne uspesna javi v konzolo (500 Internal server error)
      }
    },

    changeStatus: function () {
      try {
        axios
          .put("http://127.0.0.1:8000/api/order/{id}", this.orders.Status)

          .then((response) => {
            this.orders.Status = response.data.Status;
            console.log(response);
          })
          .catch((error) => {
            console.log(error);
          });
      } catch (error) {
        console.log(error); // V kolikor je povezava ne uspesna javi v konzolo (500 Internal server error)
      }
    },
  },

  /*mounted: function () {
    axios
      .get("http://127.0.0.1:8000/api/orders")

      .then((response) => {
        this.orders = response.data;
        console.log(response);
      })
      .catch((error) => {
        console.log(error);
      });
  },*/
};

/*import { useRouter } from "vue-router";
import { ref } from "vue";
import { server } from "src/boot/axios";

const date = ref("");
const status = ref("");

const router = useRouter();

const addUser = async () => {
  try {
    await server.post("/api/order/store", {
      date: date.value,
      status: status.value,
    });
  } catch (error) {
    console.log(error);
  }
};

const fetchOrders = () => {
  router.push("");
};
*/
</script>
