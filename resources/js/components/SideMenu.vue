<template>
  <div class="sideMenu">
    <div class="sideMenu__wrap">
      <slot></slot>
    </div>
  </div>
</template>
<script>
export default {
  name: "SideMenu",
};
</script>
<style lang="scss">
.sideMenu {
    &__list {
    &-item {
      padding: 0.8rem;
      margin: 0.3rem 0;
      background-color: #f2f2f2;
      transition: all 0.3s ease-in-out;
      cursor: pointer;

      &:hover{
        background-color: #cecece;
      }
    }
  }
}
</style>