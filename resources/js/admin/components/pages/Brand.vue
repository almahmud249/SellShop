<template>
  <div class="content-wrapper">
    <div style="display: flex; justify-content: center">
      <v-app>
        <v-data-table
          :headers="headers"
          :items="GetBrand"
          class="elevation-1"
          show-select
          @input="handleSelect"
          multiple
        >
          <template v-slot:top>
            <h3 style="display: flex; justify-content: center">
              Category List
            </h3>
            <v-toolbar flat>
              <template>
                <v-btn
                  small
                  color="error"
                  v-if="multiSelect.length > 0"
                  dark
                  @click="MultiDelete()"
                >
                  Multi Delete
                </v-btn>
              </template>
              <!-- <v-divider class="mx-4" inset vertical></v-divider> -->
              <v-spacer></v-spacer>

              <v-dialog v-model="dialog" max-width="500px">
                <template v-slot:activator="{ on, attrs }">
                  <v-btn
                    color="primary"
                    dark
                    class="mb-2"
                    v-bind="attrs"
                    v-on="on"
                  >
                    New Item
                  </v-btn>
                </template>

                <v-card>
                  <v-card-title>
                    <span class="text-h5">Add Brand</span>
                  </v-card-title>

                  <v-card-text>
                    <v-container>
                      <v-row>
                        <v-form ref="form">
                          <v-col cols="12" sm="6" md="8">
                            <v-text-field
                              v-model="AddItem.name"
                              :rules="[
                                (v) =>
                                  v.length >= 3 || 'This field is required',
                              ]"
                              label="Category name"
                            ></v-text-field>
                          </v-col>
                        </v-form>
                      </v-row>
                    </v-container>
                  </v-card-text>

                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="dialog = false">
                      Cancel
                    </v-btn>
                    <v-btn color="blue darken-1" text @click="save">
                      Save
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>

              <!-- edit modal -->
              <v-dialog v-model="Editdialog" max-width="500px">
                <v-card>
                  <v-card-title>
                    <span class="text-h5">Update Category</span>
                  </v-card-title>

                  <v-card-text>
                    <v-container>
                      <v-row>
                        <v-form ref="form">
                          <v-col cols="12" sm="6" md="8">
                            <v-text-field
                              v-model="editedItem.name"
                              :rules="[
                                (v) =>
                                  v.length >= 3 || 'This field is required',
                              ]"
                              label="Category name"
                            ></v-text-field>
                          </v-col>
                        </v-form>
                      </v-row>
                    </v-container>
                  </v-card-text>

                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                      color="blue darken-1"
                      text
                      @click="Editdialog = false"
                    >
                      Cancel
                    </v-btn>
                    <v-btn color="blue darken-1" text @click="Update">
                      Save
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>
              <!-- delete modal -->
              <v-dialog v-model="dialogDelete" max-width="500px">
                <v-card>
                  <v-card-title class="text-h5"
                    >Are you sure you want to delete this item?</v-card-title
                  >
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                      color="blue darken-1"
                      text
                      @click="dialogDelete = false"
                      >Cancel</v-btn
                    >
                    <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                      >OK</v-btn
                    >
                    <v-spacer></v-spacer>
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>
          <template v-slot:item.actions="{ item }">
            <v-icon small class="mr-2" @click="editItem(item)">
              mdi-pencil
            </v-icon>
            <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
          </template>

          <template v-slot:item.created_at="{ item }">
            {{ item.created_at | timeformat }}
          </template>
        </v-data-table>
        <div>
          <template>
            <div class="text-center">
              <v-snackbar
                v-model="snackbar"
                :timeout="timeout"
                top
                class="mt-12"
                color="red"
              >
                {{ text }}

                <template v-slot:action="{ attrs }">
                  <v-btn
                    color="black"
                    text
                    v-bind="attrs"
                    @click="snackbar = false"
                  >
                    Close
                  </v-btn>
                </template>
              </v-snackbar>
            </div>
          </template>
        </div>
      </v-app>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    dialog: false,
    dialogDelete: false,
    headers: [
      { text: "Category", value: "name" },
      { text: "Date", value: "created_at" },
      { text: "Actions", value: "actions", sortable: false },
    ],

    DeleteIndex: -1,
    DeleteItems: {},
    AddItem: {
      name: "",
    },
    editedItem: {
      name: "",
    },
    editedIndex: "",

    text: "",
    snackbar: false,
    timeout: 2000,
    Editdialog: false,
    multiSelect: [],
  }),

  mounted() {
    this.$store.dispatch("AllBrand");
  },

  computed: {
    GetBrand() {
      return this.$store.getters.allBrand;
    },
  },
  methods: {
    editItem(item) {
      this.editedIndex = this.GetBrand.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.Editdialog = true;
    },

    deleteItem(item) {
      this.DeleteIndex = this.GetBrand.indexOf(item);
      this.DeleteItems = Object.assign({}, item);
      this.dialogDelete = true;
    },

    deleteItemConfirm() {
      const axios = require("axios");
      if (this.multiSelect.length > 0) {
        axios.post("/admin/multi_delete_brand", this.multiSelect).then((response) => {

            this.$store.dispatch("AllBrand");

          this.multiSelect = "";
          // this.GetCategory.splice(this.DeleteIndex, 1);
          this.dialogDelete = false;
          this.text = "successfully data Deleted";
          this.snackbar = true;
        });
      } else {
        axios
          .post("/admin/delete_brand", this.DeleteItems)
          .then((response) => {
            this.$store.dispatch("AllBrand");
            // this.GetCategory.splice(this.DeleteIndex, 1);
            this.dialogDelete = false;
            this.text = "successfully data Deleted";
            this.snackbar = true;
          });
      }
    },

    save() {
      const axios = require("axios");
      if (this.$refs.form.validate()) {
        axios
          .post("/admin/add_brand", this.AddItem)
          .then((res) => {
            //   this.GetCategory.unshift(res.data);
            this.$store.dispatch("AllBrand");
            this.dialog = false;

            this.AddItem.name = "";
            this.text = "successfully data added";
            this.snackbar = true;
          })
          .catch((error) => {
            this.text = error.response.data.errors.name[0];
            this.snackbar = true;
          });
      }
    },

    Update() {
      const axios = require("axios");
      if (this.$refs.form.validate()) {
        axios
          .post("/admin/update_brand", this.editedItem)
          .then((res) => {
            //   this.GetCategory.unshift(res.data);
            this.$store.dispatch("AllBrand");

            this.Editdialog = false;

            this.editedItem.cat_name = "";
            this.text = "successfully data Updated";
            this.snackbar = true;
          })
          .catch((error) => {
            this.text = error.response.data.errors.name[0];
            this.snackbar = true;
          });
      }
    },
    handleSelect(item) {
      this.multiSelect = item;
    },
    MultiDelete() {
      this.dialogDelete = true;
    },
  },
};
</script>
