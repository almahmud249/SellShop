<template>
  <div class="content-wrapper">
    <v-app>
      <v-row justify="center" style="display: flex; justify-content: center">
        <v-col cols="12" sm="10" md="8" lg="6">
          <v-card ref="form">
            <v-card-text>
              <v-text-field
                v-model="form.name"
                :class="{ 'is-invalid': form.errors.has('name') }"
                label="Product Name *"
                placeholder="John Doe"
                name="name"
                required
              ></v-text-field>
              <HasError
                :form="form"
                style="color: red; margin-top: -15px"
                field="name"
              />

              <v-autocomplete
                :class="{ 'is-invalid': form.errors.has('cate_id') }"
                v-model="form.cate_id"
                :items="GetCategory"
                label="Category"
                item-value="id"
                placeholder="Select..."
                required
              >
                <template v-slot:item="{ item }">
                  {{ item.name }}
                </template>
                <template v-slot:selection="{ item }">
                  {{ item.name }}
                </template>
              </v-autocomplete>
              <HasError
                :form="form"
                style="color: red; margin-top: -15px"
                field="cate_id"
              />

              <v-autocomplete
                v-model="form.barn_id"
                :items="GetBrand"
                label="Brand"
                item-value="id"
                placeholder="Select..."
                required
                :class="{ 'is-invalid': form.errors.has('barn_id') }"
              >
                <template v-slot:item="{ item }">
                  {{ item.name }}
                </template>
                <template v-slot:selection="{ item }">
                  {{ item.name }}
                </template>
              </v-autocomplete>
              <HasError
                :form="form"
                style="color: red; margin-top: -15px"
                field="barn_id"
              />

              <v-text-field
                v-model="form.price"
                :class="{ 'is-invalid': form.errors.has('name') }"
                label="Price"
                required
                placeholder="Tk"
              ></v-text-field>
              <HasError
                :form="form"
                style="color: red; margin-top: -15px"
                field="price"
              />

              <v-text-field
                ref="discount_price"
                v-model="form.discount_price"
                label="Discount Price"
                required
                placeholder="Tk"
                :class="{ 'is-invalid': form.errors.has('discount_price') }"
              ></v-text-field>
              <HasError
                :form="form"
                style="color: red"
                field="discount_price"
              />

              <v-text-field
                v-model="form.quantity"
                label="Quantity"
                required
                placeholder="786"
                :class="{ 'is-invalid': form.errors.has('quantity') }"
              ></v-text-field>
              <HasError
                :form="form"
                style="color: red; margin-top: -15px"
                field="quantity"
              />

              <v-autocomplete
                v-model="form.color"
                :items="sizes.colors.clr"
                dense
                chips
                label="Color"
                multiple
                required
              ></v-autocomplete>

              <v-autocomplete
                ref="size"
                v-model="form.size"
                :items="sizes.options.size"
                dense
                chips
                label="Size"
                multiple
                required
              ></v-autocomplete>

              <v-textarea
                v-model="form.description"
                label="Description"
                placeholder="John Doe"
                required
              >
              </v-textarea>
              <v-file-input
                name="photo"
                label="Image Upload"
                show-size
                type="file"
                @change="changePhoto($event)"
                accept="image/*"
                outlined
                :class="{ 'is-invalid': form.errors.has('image') }"
              ></v-file-input>
              <HasError
                :form="form"
                style="color: red; margin-top: -15px"
                field="image"
              />

              <img :src="updateImage()" alt="" width="80" height="80" />
            </v-card-text>
            <v-divider class="mt-12"></v-divider>
            <v-card-actions>
              <v-btn text> Cancel </v-btn>
              <v-spacer></v-spacer>

              <v-btn color="primary" text @click="submit"> Update </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-app>
  </div>
</template>
<script>
import jsonData from "../../../jsonData";
export default {
  data: () => ({
     sizes: jsonData,

    form: new Form({
      name: null,
      cate_id: null,
      barn_id: null,

      price: null,
      discount_price: null,
      quantity: null,
      color: null,
      size: null,
      image: null,
      description: null,
    }),
  }),

  computed: {
    GetCategory() {
      return this.$store.getters.getCategory;
    },
    GetBrand() {
      return this.$store.getters.allBrand;
    },
  },

  mounted() {
    this.$store.dispatch("AllCategory");
    this.$store.dispatch("AllBrand");
  },

  methods: {
    changePhoto(event) {
      let file = event;
      //    this.form.photo = event;
      //   console.log(file);

      let reader = new FileReader();
      reader.onload = (event) => {
        this.form.image = event.target.result;                                           // console.log(event.target.result);
      };
      reader.readAsDataURL(file);
    },

    submit() {
      this.form.post("/admin/update_product/"+this.$route.params.id).
      then((res) => {

        //   this.$router.push('/admin/allproduct')
         this.$router.push("/admin/allproduct");


      });
    },
    updateImage() {
      let img = this.form.image;
      if (img != null && img.length > 100) {
        return this.form.image;
      } else {
        return `/img/${this.form.image}`;

      }
    },
  },
  created() {
    axios.get("/admin/get_item/" + this.$route.params.id).then((res) => {
      this.form.fill(res.data);
    });
  },
};
</script>
