<template>
  <div class="content-wrapper" style="display: flex; justify-content: center">
    <v-app>
      <v-main>
        <v-data-table
          :headers="headers"
          :items="getAllProduct"
          sort-by="calories"
          class="elevation-3"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Product List</v-toolbar-title>
              <v-divider class="mx-4" inset vertical></v-divider>
              <v-spacer></v-spacer>
              <!-- addCategory -->
              <router-link to="/admin/product">
                <v-btn color="primary" dark class="mb-2">New Product</v-btn>
              </router-link>
            </v-toolbar>
          </template>

          <template v-slot:item.photo="{ item }">
            <v-img
              :src="`/img/${item.image}`"
              style="width: 100px; height: 100px"
            ></v-img>
          </template>
          <!-- <template v-slot:item.description="{ item }">
            {{ item.description | sortlength(40, "......") }}
          </template> -->
          <template v-slot:item.actions="{ item }">
            <router-link :to="`/admin/editProduct/${item.id}`">
              <v-icon small class="mr-2">
                mdi-pencil
              </v-icon>
              </router-link>
              <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>

          </template>
        </v-data-table>
      </v-main>
    </v-app>
    <!-- delete popup -->
    <v-dialog v-model="dialogDelete" max-width="500px">
      <v-card>
        <v-card-title class="text-h5"
          >Are you sure you want to delete this item?</v-card-title
        >
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="deleteItemConfirm"
            >OK</v-btn
          >
          <v-spacer></v-spacer>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <!-- snackbar -->
    <template>
      <div class="text-center">
        <v-snackbar v-model="snackbar" color="red">
          {{ text }}

          <template v-slot:action="{ attrs }">
            <v-btn color="red" text v-bind="attrs" @click="snackbar = false">
              Close
            </v-btn>
          </template>
        </v-snackbar>
      </div>
    </template>
  </div>
</template>
<script>
export default {
  data: () => ({
    dialogDelete: false,
    headers: [
      { text: "Title", value: "name" },
      { text: "Category", value: "category.name" },
      { text: "Brand", value: "brand.name" },
      { text: "Price", value: "price" },
      { text: "Photo", value: "photo" },

      { text: "Actions", value: "actions", sortable: false },
    ],
    editedIndex: -1,
    editedItem: {
      cat_name: "",
    },
    addCategory: {
      cat_name: "",
    },
    editCategory: {},

    deleteData: {},
    deleteIndex: -1,

    text: "",
    snackbar: false,
  }),

  mounted() {
    this.$store.dispatch("AllProduct");
  },

  computed: {
    getAllProduct() {
      return this.$store.getters.allProduct;
    },
  },

  methods: {
    deleteItem(item) {
      this.deleteIndex = this.getAllProduct.indexOf(item);
      this.deleteData = Object.assign({}, item);

      this.dialogDelete = true;
    },

    deleteItemConfirm() {

      axios.post("/admin/delete_product", this.deleteData).then((response) => {
        this.$store.dispatch("AllProduct");
        this.dialogDelete = false;

        this.text = "successfully data Deleted";
        this.snackbar = true;
      });
    },

    closeDelete() {
      this.dialogDelete = false;
    },
  },
};
</script>

