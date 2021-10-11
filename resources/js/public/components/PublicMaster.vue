<template>
  <div>
 <ShopHeader></ShopHeader>
    <router-view></router-view>
      <ShopFooter></ShopFooter>
  </div>
</template>

<script>
import ShopHeader from './shop/header'
import ShopFooter from './shop/footer'
export default {
 components:{
      ShopHeader,
      ShopFooter
  }
};
</script>

