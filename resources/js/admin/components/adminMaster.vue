<template>
  <div>
    <template
      v-if="$route.name == 'adminLogin' || $route.name == 'registration'"
    >
      <router-view></router-view>
    </template>
    <template v-else>
      <adminHeader></adminHeader>
      <adminSidebar></adminSidebar>
      <router-view></router-view>
      <adminFooter></adminFooter>
    </template>
  </div>
</template>

 <script>
import adminHeader from "./adminHeader";
import adminSidebar from "./adminSidebar";
import adminFooter from "./adminFooter";
export default {
  components: {
    adminHeader,
    adminSidebar,
    adminFooter,
  },
};
</script>
