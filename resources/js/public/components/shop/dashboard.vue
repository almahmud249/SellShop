<template>
    <div>
        <h4>This is dashboard</h4>
    </div>
</template>
<script>
export default {

  mounted() {
    this.$store.dispatch("Users");

  },

}
</script>
